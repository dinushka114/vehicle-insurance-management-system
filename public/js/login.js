var customer = document.querySelector(".customer-login");
var admin = document.querySelector(".admin-login");
var agent = document.querySelector(".agent-login");

var loader = document.querySelector(".cus-login");
var adLoader = document.querySelector(".ad-login");

function selectUsers() {
  var user = document.getElementById("selectUser").value;
  if (user == "Customer") {
    customer.classList.remove("hidden");
    admin.classList.add("hidden");
  } else if (user == "Admin") {
    admin.classList.remove("hidden");
    customer.classList.add("hidden");
  }
}

function customerLogin(form) {
  loader.classList.remove("hidden");
  document.querySelector(".email-error").classList.add("hidden");
  document.querySelector(".psw-error").classList.add("hidden");
  var email = form.email.value;
  var password = form.password.value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader.classList.add("hidden");
      //   document.getElementById("district").innerHTML = this.responseText;
      console.log(this.responseText);
      if (this.responseText == 0) {
        document.querySelector(".email-error").classList.remove("hidden");
        // window.location.href = "my_account.php";
      } else if (this.responseText == -1) {
        document.querySelector(".psw-error").classList.remove("hidden");
      } else {
        window.location.href = "my_account.php";
      }
    }
  };

  ajax.send("email=" + email + "&password=" + password + "&customer_login=1");

  return false;
}

function adminLogin(form) {
  adLoader.classList.remove("hidden")
  document.querySelector(".id-error").classList.add("hidden");
  document.querySelector(".p-error").classList.add("hidden");

  var adminId = form.adminId.value;
  var password = form.password.value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      adLoader.classList.add("hidden");
      //   document.getElementById("district").innerHTML = this.responseText;
      if (this.responseText == 0) {
        document.querySelector(".id-error").classList.remove("hidden");
      } else if (this.responseText == -1) {
        document.querySelector(".p-error").classList.remove("hidden");
      } else {
        window.location.href = "admin.php";
      }
    }
  };

  ajax.send("adminId=" + adminId + "&password=" + password + "&admin_login=1");

  return false;
}
