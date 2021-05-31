var loader = document.querySelector(".processing");
var username = document.querySelector("#username");
var foundUser = document.querySelector(".user");

var emailNotValid =
  "<p style='color:red;font-size:12px;'>email is not valid</p>";
var emailAlreadyexists =
  "<p style='color:red;font-size:12px;'>User found with this email</p>";
var noUserWithEmail =
  "<p style='color:green;font-size:12px;'>no user with this email</p>";

function sendEmail(form) {
  var email = form.email.value;
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    //   loader.classList.add("hidden");
      //   document.getElementById("district").innerHTML = this.responseText;
      console.log(this.responseText);
    }
  };

  ajax.send("email="+email +"&send_email=1");

  return false;
}
