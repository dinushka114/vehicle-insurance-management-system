var loader = document.querySelector(".processing");
var sucess = document.querySelector("#sucess");
var invalid = document.querySelector("#invalid");
var cardText = document.querySelector("#crdNum");
var crdError = document.querySelector(".crdError");

// console.log(document.getElementById("crdNum").value != " ");
var valid = false;

function checkCard() {
  if (cardText.value.match(/^(?:4[0-9]{12}(?:[0-9]{3})?)$/g)) {
    valid = true;
    crdError.classList.add("hidden");
  } else {
    valid = false;
    crdError.classList.remove("hidden");
  }

  // console.log(cardText.value)
}

function payment(id, pay) {

  invalid.classList.add("hidden");

  loader.classList.remove("hidden");
  loader.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // quotationPrice = this.responseText;
      // console.log(this.responseText);
      if (this.responseText == 1) {
        loader.classList.add("hidden");
        invalid.classList.add("hidden");
        sucess.classList.remove("hidden");
        loader.style.display = "none";
        window.location.href = "my_account.php"
      }
    }
  };

  // ajax.send("&pay_for_insurance=1");

  if (valid) {
    ajax.send("id=" + id + "&pay=" + pay + "&pay_for_insurance=1");
    // console.log("valid number")
  }else{
    invalid.classList.remove("hidden");
    loader.classList.add("hidden");
    loader.style.display = "none";
  }

  // console.log("clicked")
}
