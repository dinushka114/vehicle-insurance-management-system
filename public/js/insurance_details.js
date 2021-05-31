var process = document.querySelector(".process");
document.getElementById("toPay").style.cursor = "not-allowed";
var vtypeSelectorValue = document.querySelector("#vSelectType");
var itypeSelectorValue = document.querySelector("#insuranceType");

document.querySelector("#showPay").disabled = true;
document.querySelector("#showPay").style.cursor = "not-allowed";

var mvalueBox = document.querySelector("#mValue");
var makeBox = document.querySelector("#make");
var modelBox = document.querySelector("#model");
var yearBox = document.querySelector("#year");
var regBox = document.querySelector("#regNumber");
var chassiBox = document.querySelector("#chassNumber");
var colorBox = document.querySelector("#color");
var fuelSelect = document.querySelector("#fuel_type");

var boxes = [
  mvalueBox,
  makeBox,
  modelBox,
  yearBox,
  regBox,
  chassiBox,
  colorBox,
  fuelSelect,
];

var quotationPrice = 0;

function selectVtype() {
  if (
    vtypeSelectorValue.value == "Car/SUV/Jeep" ||
    vtypeSelectorValue.value == "MotorBike" ||
    vtypeSelectorValue.value == "ThreeWheeler" ||
    vtypeSelectorValue.value == "Commercial"
  ) {
    document.querySelector("#insuranceType").disabled = false;
  } else {
    for (let index = 0; index < boxes.length; index++) {
      boxes[index].disabled = true;
    }

    document.querySelector("#insuranceType").disabled = true;
    document.querySelector("#showPay").disabled = true;
    document.querySelector("#showPay").style.cursor = "not-allowed";
  }
}

function activeOthres() {
  if (
    itypeSelectorValue.value == "full" ||
    itypeSelectorValue.value == "third"
  ) {
    for (let index = 0; index < boxes.length; index++) {
      boxes[index].disabled = false;
    }
    document.querySelector("#showPay").disabled = false;
    document.querySelector("#showPay").style.cursor = "pointer";
    document.querySelector("#showPay").style.backgroundColor = "dodgerblue";
  } else {
    for (let index = 0; index < boxes.length; index++) {
      boxes[index].disabled = true;
    }
    document.querySelector("#showPay").disabled = true;
    document.querySelector("#showPay").style.cursor = "not-allowed";
  }
}

function showQuote() {
  var vtypeSelect = document.getElementById("vSelectType").value;
  var itypeSelect = document.getElementById("insuranceType").value;
  var marketValue = document.getElementById("mValue").value;
  // console.log(vtypeSelect, itypeSelect, marketValue);

  process.classList.remove("hidden");
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("toPay").disabled = false;
      document.getElementById("toPay").style.cursor = "pointer";
      process.classList.add("hidden");
      if (this.responseText == 0) {
        document.getElementById(
          "inPrice"
        ).innerHTML = `Please Check vehicle value again!`;
      } else if (this.responseText == 1) {
        document.getElementById("inPrice").innerHTML = `check form again`;
      } else {
        quotationPrice = this.responseText;

        document.getElementById(
          "inPrice"
        ).innerHTML = `Price : Rs ${this.responseText}.00/=`;
      }
    }
  };

  ajax.send(
    "type=" +
      vtypeSelect +
      "&itype=" +
      itypeSelect.trim() +
      "&value=" +
      marketValue +
      "&get_quotation=1"
  );
}

function saveAndPayment(userID) {
  var vtypeSelect = document.getElementById("vSelectType").value;
  var itypeSelect = document.getElementById("insuranceType").value;
  var marketValue = document.getElementById("mValue").value;

  var make = document.getElementById("make").value;
  var model = document.getElementById("model").value;
  var year = document.getElementById("year").value;
  var regNumber = document.getElementById("regNumber").value;
  var chassiNumber = document.getElementById("chassNumber").value;
  var color = document.getElementById("color").value;
  var fuel = document.getElementById("fuel_type").value;

  document.getElementById("toPay").value = "processing";

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // quotationPrice = this.responseText;
      console.log(this.responseText);
      if (this.responseText == 1) {
        window.location.href = `payment.php?q=${quotationPrice}&itype=${itypeSelect}&id=${userID}`;
      }
    }
  };

  ajax.send(
    "type=" +
      vtypeSelect.replace(" ", "") +
      "&user_id=" +
      userID +
      "&itype=" +
      itypeSelect.trim() +
      "&value=" +
      marketValue +
      "&make=" +
      make +
      "&model=" +
      model +
      "&year=" +
      year +
      "&reg=" +
      regNumber +
      "&chassi=" +
      chassiNumber +
      "&color=" +
      color +
      "&fuel=" +
      fuel +
      "&save_and_pay=1"
  );
}
