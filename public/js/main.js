var imgSlide = document.getElementById("slide");
var vehicleTypeDiv = document.getElementById("t");
var processing = document.querySelector(".processing");
var price = document.querySelector("#price");
var dots = document.querySelectorAll(".dot");
// console.log(dots)
var disabledBuyBtn = document.getElementById("buyBtnDisbled");
var buyBtn = document.getElementById("buyBtn");

var img1 = "public/images/slide1.jpg";
var img2 = "public/images/slide2.jpg";
var img3 = "public/images/slide3.jpg";
var time = 3000;
var i = 0;
var images = [img1, img2, img3];

imgSlide.src = img1;

function imgSlider() {
  imgSlide.src = images[i];
  // document.getElementsByClassName("text").innerHTML  = "Project";
  dots[i].classList.add("dot_active");
  console.log("i =" + i);
  if (i == 2) {
    dots[i].classList.add("dot_active");
  }
  // dots[0].classList.remove("dot_active");
  // dots[1].classList.remove("dot_active");
  // dots[2].classList.remove("dot_active");
  if (i < images.length - 1) {
    i++;
  } else {
    i = 0;
  }
  setTimeout("imgSlider()", time);
  // dots[i].classList.remove("dot_active")
}

window.onload = imgSlider;

vehicleType = 0;
vtypeName = "";

function selectVehicleType(type) {
  if (type == 1) {
    vehicleTypeDiv.innerHTML = "Car/SUV/Jeep";
    vtypeName = "Car/SUV/Jeep";
  } else if (type == 2) {
    vehicleTypeDiv.innerHTML = "Motor Bike";
    vtypeName = "MotorBike";
  } else if (type == 3) {
    vehicleTypeDiv.innerHTML = "Three wheeler";
    vtypeName = "ThreeWheeler";
  } else {
    vehicleTypeDiv.innerHTML = "Commercial vehicle";
    vtypeName = "Commercial";
  }

  vehicleType = type;
}

var quotationPrice;

function getQuote() {
  var itype = document.getElementById("itype").value;
  var vtype = vtypeName;
  var value = document.getElementById("value").value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      quotationPrice = this.responseText;
      processing.classList.add("hidden");
      // console.log(this.responseText)
      if (this.responseText == 0) {
        price.innerHTML = `check vehicle value again`;
      } else {
        price.innerHTML = `Rs ${this.responseText}.00/=`;
      }

      // console.log(this.responseText)
    }
  };

  // vtype=="Car/SUV/Jeep" || vtype=="MotorBike" || vtype =="ThreeWheeler" || vtype=="Commercial"

  if (!vtype) {
    document.querySelector("#vtype_error").classList.remove("hidden");
  }

  if (itype !== "select" && vtype) {
    processing.classList.remove("hidden");
    price.innerHTML = "";
    document.querySelector("#vtype_error").classList.add("hidden");
    ajax.send(
      "type=" +
        vtype +
        "&itype=" +
        itype +
        "&value=" +
        value +
        "&get_quotation=1"
    );
  }

  return false;
}

function buyInsurance() {
  // console.log(vehicleType);
  var itype = document.getElementById("itype").value;
  var make = document.getElementById("make").value;
  var model = document.getElementById("model").value;
  var year = document.getElementById("year").value;
  var marketValue = document.getElementById("value").value;
  window.location.href = `insurance_details.php?type=${vehicleType}&itype=${itype}
    &make=${make}&model=${model}&year=${year}&quote=${quotationPrice}&value=${marketValue}
  `;
}
