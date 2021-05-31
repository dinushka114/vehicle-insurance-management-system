function newContact(form) {
  //get form data to variable
  var first_name = form.firstName.value;
  var last_name = form.lastName.value;
  var contact = form.contact.value;
  var email = form.email.value;
  var subject = form.subject.value;
  var message = form.message.value;

  //selectors
  var contactForm = document.getElementById("contact");
  var thanks = document.querySelector(".thanks");
  var error = document.querySelector(".error");
  var progress = document.querySelector(".processing");
  var emailError = document.querySelector(".email_error");

  progress.classList.remove("hidden");

  //xmlhttprequest to send data wothout reloading web page
  //contact us page
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200)
      if (this.responseText == 1) {
        // alert(this.responseText);

        contactForm.classList.add("hidden");
        thanks.classList.remove("hidden");
        progress.classList.add("hidden");
      } else if (this.responseText == 0) {
        error.classList.remove("hidden");
        progress.classList.add("hidden");
      } 
  };

  ajax.send(
    "first_name=" +
      first_name +
      "&last_name=" +
      last_name +
      "&contact=" +
      contact +
      "&email=" +
      email +
      "&subject=" +
      subject +
      "&message=" +
      message +
      "&new_contact=1"
  );
  return false;
}

