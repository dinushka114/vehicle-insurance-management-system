var loader1 = document.querySelector(".addr1");
var loader2 = document.querySelector(".addr2");
var pro = document.querySelector(".pro");

function getProvinces() {
  pro.classList.remove("hidden");
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      pro.classList.add("hidden");
      document.getElementById("province").innerHTML = this.responseText;
    }
  };

  ajax.send("&get_provinces=1");

  return false;
}

function getDistrict(province) {
  loader1.classList.remove("hidden");
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader1.classList.add("hidden");
      document.getElementById("district").innerHTML = this.responseText;
    }
  };

  ajax.send("province_id=" + province + "&get_district=1");

  return false;
}

function getCities(district) {
  loader2.classList.remove("hidden");
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader2.classList.add("hidden");
      document.getElementById("city").innerHTML = this.responseText;
    }
  };

  ajax.send("district_id=" + district + "&get_city=1");

  return false;
}

//select provice to get district list for dropdwon menu
document
  .querySelector("#province")
  .addEventListener("click", function (province) {
    getDistrict(province.target.value);
  });

//select disctrict to get cities list for dropdown menu
document
  .querySelector("#district")
  .addEventListener("click", function (district) {
    getCities(district.target.value);
  });

//register user page
function userRegister(form) {
  var title = document.getElementById("title").value;
  var nameWithinitials = form.nameWithinitials.value;
  var fullName = form.fullName.value;
  var email = form.email.value;
  var nic = form.nic.value;
  var phone = form.phone.value;
  var dob = form.dob.value;
  var zip = form.zip_code.value;
  var progress = document.querySelector(".processing");

  progress.classList.remove("hidden");

  var genders = document.getElementsByName("gender");
  var gender;
  for (var i = 0; i < genders.length; i++) {
    if (genders[i].checked) {
      gender = genders[i].value;
    }
  }

  //user agree with policies
  var agreeVal = document.getElementById("agree").checked;

  var address1 = form.address_1.value;
  var address2 = form.address_2.value;

  //optional
  var address3 = form.address_3.value;

  if (address3 !== "") {
    var address = address1 + "," + address2 + "," + address3;
  } else {
    var address = address1 + "," + address2;
  }

  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");

  try {
    var p = province.options[province.selectedIndex].text;
    var d = district.options[district.selectedIndex].text;
    var c = city.options[city.selectedIndex].text;
  } catch (error) {
    console.log(error);
  }

  var password = document.getElementById("passwordInput").value;
  var passwordC = document.getElementById("passwordConfirm").value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      progress.classList.add("hidden");
      try {
        if (Array.isArray(JSON.parse(this.responseText)) == true) {
          console.log("running");
          var data = JSON.parse(this.responseText);
          var html = " ";
          for (let index = 0; index < data.length; index++) {
            html += `<p style='background-color:red;color:white;padding:5px;margin-bottom:5px;'>${data[index]}</p>`;
          }
          // document.querySelector("#validation-errors").classList.remove("hidden");
          document.getElementById("validation-errors").innerHTML = html;
        }
        if (this.responseText == 1) {
          window.location.href = "insurance_details.php";
          // console.log("suceesssssssssssssss");
        } else if (this.responseText == "failed") {
          alert("failed");
        }
      } catch (error) {
        if (this.responseText == 1) {
          window.location.href = "insurance_details.php";
          // console.log("suceesssssssssssssss");
        } else if (this.responseText == "failed") {
          alert("failed");
        }
      }
    }
  };

  // ajax.send("register_user=1");

  ajax.send(
    "title=" +
      title +
      "&nameWithinitials=" +
      nameWithinitials +
      "&fullName=" +
      fullName +
      "&email=" +
      email +
      "&nic=" +
      nic +
      "&phone=" +
      phone +
      "&dob=" +
      dob +
      "&gender=" +
      gender +
      "&address=" +
      address +
      "&province=" +
      p +
      "&district=" +
      d +
      "&city=" +
      c +
      "&zip=" +
      zip +
      "&password=" +
      password +
      "&passwordC=" +
      passwordC +
      "&agreeVal=" +
      agreeVal +
      "&register_user=1"
  );

  return false;
}

//password validations for user interafce
var passwordInput = document.getElementById("passwordInput");
var passwordConfirm = document.getElementById("passwordConfirm");
var lower = document.getElementById("lower");
var upper = document.getElementById("upper");
var number = document.getElementById("number");
var special = document.getElementById("special");
var same = document.getElementById("same");
var chars = document.getElementById("chars");

passwordInput.onfocus = function () {
  document.querySelector(".p-req").style.display = "block";
};

passwordConfirm.onfocus = function () {
  document.querySelector(".p-req").style.display = "block";
};

passwordInput.onblur = function () {
  document.querySelector(".p-req").style.display = "none";
};

passwordConfirm.onblur = function () {
  document.querySelector(".p-req").style.display = "none";
};

passwordInput.onkeyup = function () {
  var lowerCaseLetters = /[a-z]/g;
  if (passwordInput.value.match(lowerCaseLetters)) {
    lower.classList.remove("invalid");
    lower.classList.add("valid");
  } else {
    lower.classList.remove("valid");
    lower.classList.add("invalid");
  }

  var upperCaseLetters = /[A-Z]/g;
  if (passwordInput.value.match(upperCaseLetters)) {
    upper.classList.remove("invalid");
    upper.classList.add("valid");
  } else {
    upper.classList.remove("valid");
    upper.classList.add("invalid");
  }

  var numberList = /[0-9]/g;
  if (passwordInput.value.match(numberList)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  var specialChars = /[!@#$%?=*&]/g;
  if (passwordInput.value.match(specialChars)) {
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }

  if (passwordInput.value.length >= 8) {
    chars.classList.remove("invalid");
    chars.classList.add("valid");
  } else {
    chars.classList.remove("valid");
    chars.classList.add("invalid");
  }

  passwordConfirm.onkeyup = function () {
    if (passwordInput.value === passwordConfirm.value) {
      same.classList.remove("invalid");
      same.classList.add("valid");
    } else {
      same.classList.remove("valid");
      same.classList.add("invalid");
    }
  };
};

//show and hide password
var passwordShower = document.getElementById("show-password");
var closeEye = "./public/images/close.png";
var openEye = "./public/images/open.png";
var checked = false;

passwordShower.addEventListener("click", function () {
  if (checked === true) {
    passwordInput.type = "text";
    passwordShower.setAttribute("src", closeEye);
    checked = false;
  } else {
    passwordInput.type = "password";
    passwordShower.setAttribute("src", openEye);
    checked = true;
  }
});

var emailNotValid= "<p style='color:red;font-size:12px;'>email is not valid</p>";
var emailAlreadyexists = "<p style='color:red;font-size:12px;'>email already exixts</p>";
var noUserWithEmail = "<p style='color:green;font-size:12px;'>no user with this email</p>";

//check email exists in database
function checkEmail() {
  var email = document.getElementById("emailInput").value;
  var checkMailProgress = document.querySelector(".mail");
  var userFoundDiv = document.querySelector("#user-found");

  if (email.length > 0) {
    var ajax = new XMLHttpRequest();
    checkMailProgress.classList.remove("hidden");
    ajax.open("POST", "http.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        checkMailProgress.classList.add("hidden");
        if(this.responseText==1){
          userFoundDiv.innerHTML = noUserWithEmail;
        }else if(this.responseText==2){
          userFoundDiv.innerHTML = emailAlreadyexists;
        }else{
          userFoundDiv.innerHTML = emailNotValid;
        }
      }
    };

    ajax.send("email=" + email + "&check_email=1");
  }
  return false;
}


