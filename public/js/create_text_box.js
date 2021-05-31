var count = 0,
  count1 = 0,
  count2 = 0,
  count3 = 0,
  count4 = 0,
  count5 = 0,
  count6 = 0,
  count7 = 0,
  count8 = 0,
  count9 = 0;
  count10 = 0;
c = 0;
c1 = 0;
c2 = 0;
c3 = 0;
c4 = 0;
c5 = 0;
c6 = 0;
c7 = 0;
c8 = 0;
c9 = 0;

function name(e, id) {
  c++;
  if (c == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "nameWithInitials" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("nameWithInitials" + id.toString()).focus();
  document.getElementById("nameWithInitials" + id.toString()).onblur =
    function () {
      document.getElementById(
        "nameWithInitials" + id.toString()
      ).parentElement.innerHTML = document.getElementById(
        "nameWithInitials" + id.toString()
      ).value;
      c = 0;
    };
}

function email(e, id) {
  c1++;
  if (c1 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "email" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("email" + id.toString()).focus();
  document.getElementById("email" + id.toString()).onblur = function () {
    document.getElementById("email" + id.toString()).parentElement.innerHTML =
      document.getElementById("email" + id.toString()).value;
    c1 = 0;
  };
}

function dob(e, id) {
  c2++;
  if (c2 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "date");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "dob" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("dob" + id.toString()).focus();
  document.getElementById("dob" + id.toString()).onblur = function () {
    document.getElementById("dob" + id.toString()).parentElement.innerHTML =
      document.getElementById("dob" + id.toString()).value;
    c2 = 0;
  };
}

function gender(e, id) {
  c3++;
  if (c3 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "gender" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("gender" + id.toString()).focus();
  document.getElementById("gender" + id.toString()).onblur = function () {
    document.getElementById("gender" + id.toString()).parentElement.innerHTML =
      document.getElementById("gender" + id.toString()).value;
    c3 = 0;
  };
}

function address(e, id) {
  c4++;
  if (c4 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "address" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("address" + id.toString()).focus();
  document.getElementById("address" + id.toString()).onblur = function () {
    document.getElementById("address" + id.toString()).parentElement.innerHTML =
      document.getElementById("address" + id.toString()).value;
    c4 = 0;
  };
}

function zip(e, id) {
  c5++;
  if (c5 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "zip" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("zip" + id.toString()).focus();
  document.getElementById("zip" + id.toString()).onblur = function () {
    document.getElementById("zip" + id.toString()).parentElement.innerHTML =
      document.getElementById("zip" + id.toString()).value;
    c5 = 0;
  };
}

function nic(e, id) {
  c6++;
  if (c6 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "nic" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("nic" + id.toString()).focus();
  document.getElementById("nic" + id.toString()).onblur = function () {
    document.getElementById("nic" + id.toString()).parentElement.innerHTML =
      document.getElementById("nic" + id.toString()).value;
    c6 = 0;
  };
}

function phone(e, id) {
  c7++;
  if (c7 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "phone" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("phone" + id.toString()).focus();
  document.getElementById("phone" + id.toString()).onblur = function () {
    document.getElementById("phone" + id.toString()).parentElement.innerHTML =
      document.getElementById("phone" + id.toString()).value;
    c7 = 0;
  };
}


function vtype(e , id){
  // console.log("cliciking" + id)
  count1++;
  console.log(count1)
  if (count1 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "vehicle" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("vehicle" + id.toString()).focus();
  document.getElementById("vehicle" + id.toString()).onblur = function () {
    document.getElementById("vehicle" + id.toString()).parentElement.innerHTML =
      document.getElementById("vehicle" + id.toString()).value;
    count1 = 0;
  };
}

function itype(e , id){
  // console.log("cliciking" + id)
  count2++;
  // console.log(count1)
  if (count2 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "insurance" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("insurance" + id.toString()).focus();
  document.getElementById("insurance" + id.toString()).onblur = function () {
    document.getElementById("insurance" + id.toString()).parentElement.innerHTML =
      document.getElementById("insurance" + id.toString()).value;
    count2 = 0;
  };
}

function value(e , id){
  // console.log("cliciking" + id)
  count3++;
  // console.log(count1)
  if (count3 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "value" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("value" + id.toString()).focus();
  document.getElementById("value" + id.toString()).onblur = function () {
    document.getElementById("value" + id.toString()).parentElement.innerHTML =
      document.getElementById("value" + id.toString()).value;
    count3 = 0;
  };
}

function make(e , id){
  // console.log("cliciking" + id)
  count4++;
  // console.log(count1)
  if (count4 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "make" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("make" + id.toString()).focus();
  document.getElementById("make" + id.toString()).onblur = function () {
    document.getElementById("make" + id.toString()).parentElement.innerHTML =
      document.getElementById("make" + id.toString()).value;
    count4 = 0;
  };
}

function model(e , id){
  // console.log("cliciking" + id)
  count5++;
  // console.log(count1)
  if (count5 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "model" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("model" + id.toString()).focus();
  document.getElementById("model" + id.toString()).onblur = function () {
    document.getElementById("model" + id.toString()).parentElement.innerHTML =
      document.getElementById("model" + id.toString()).value;
    count5 = 0;
  };
}

function fuel(e , id){
  // console.log("cliciking" + id)
  count6++;
  // console.log(count1)
  if (count6 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "fuel" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("fuel" + id.toString()).focus();
  document.getElementById("fuel" + id.toString()).onblur = function () {
    document.getElementById("fuel" + id.toString()).parentElement.innerHTML =
      document.getElementById("fuel" + id.toString()).value;
    count6 = 0;
  };
}

function year(e , id){
  // console.log("cliciking" + id)
  count7++;
  // console.log(count1)
  if (count7 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "year" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("year" + id.toString()).focus();
  document.getElementById("year" + id.toString()).onblur = function () {
    document.getElementById("year" + id.toString()).parentElement.innerHTML =
      document.getElementById("year" + id.toString()).value;
    count7 = 0;
  };
}


function reg(e , id){
  // console.log("cliciking" + id)
  count8++;
  // console.log(count1)
  if (count8 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "reg" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("reg" + id.toString()).focus();
  document.getElementById("reg" + id.toString()).onblur = function () {
    document.getElementById("reg" + id.toString()).parentElement.innerHTML =
      document.getElementById("reg" + id.toString()).value;
    count8 = 0;
  };
}

function chassi(e , id){
  // console.log("cliciking" + id)
  count9++;
  // console.log(count1)
  if (count9 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "chassi" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("chassi" + id.toString()).focus();
  document.getElementById("chassi" + id.toString()).onblur = function () {
    document.getElementById("chassi" + id.toString()).parentElement.innerHTML =
      document.getElementById("chassi" + id.toString()).value;
    count9 = 0;
  };
}

function color(e , id){
  // console.log("cliciking" + id)
  count10++;
  // console.log(count1)
  if (count10 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "color" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("color" + id.toString()).focus();
  document.getElementById("color" + id.toString()).onblur = function () {
    document.getElementById("color" + id.toString()).parentElement.innerHTML =
      document.getElementById("color" + id.toString()).value;
    count10 = 0;
  };
}

function itype(e , id){
  // console.log("cliciking" + id)
  count2++;
  // console.log(count1)
  if (count2 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "insurance" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("insurance" + id.toString()).focus();
  document.getElementById("insurance" + id.toString()).onblur = function () {
    document.getElementById("insurance" + id.toString()).parentElement.innerHTML =
      document.getElementById("insurance" + id.toString()).value;
    count2 = 0;
  };
}

function value(e , id){
  // console.log("cliciking" + id)
  count3++;
  // console.log(count1)
  if (count3 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "value" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("value" + id.toString()).focus();
  document.getElementById("value" + id.toString()).onblur = function () {
    document.getElementById("value" + id.toString()).parentElement.innerHTML =
      document.getElementById("value" + id.toString()).value;
    count3 = 0;
  };
}

function make(e , id){
  // console.log("cliciking" + id)
  count4++;
  // console.log(count1)
  if (count4 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "make" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("make" + id.toString()).focus();
  document.getElementById("make" + id.toString()).onblur = function () {
    document.getElementById("make" + id.toString()).parentElement.innerHTML =
      document.getElementById("make" + id.toString()).value;
    count4 = 0;
  };
}

function model(e , id){
  // console.log("cliciking" + id)
  count5++;
  // console.log(count1)
  if (count5 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "model" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("model" + id.toString()).focus();
  document.getElementById("model" + id.toString()).onblur = function () {
    document.getElementById("model" + id.toString()).parentElement.innerHTML =
      document.getElementById("model" + id.toString()).value;
    count5 = 0;
  };
}

function fuel(e , id){
  // console.log("cliciking" + id)
  count6++;
  // console.log(count1)
  if (count6 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "fuel" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("fuel" + id.toString()).focus();
  document.getElementById("fuel" + id.toString()).onblur = function () {
    document.getElementById("fuel" + id.toString()).parentElement.innerHTML =
      document.getElementById("fuel" + id.toString()).value;
    count6 = 0;
  };
}

function year(e , id){
  // console.log("cliciking" + id)
  count7++;
  // console.log(count1)
  if (count7 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "year" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("year" + id.toString()).focus();
  document.getElementById("year" + id.toString()).onblur = function () {
    document.getElementById("year" + id.toString()).parentElement.innerHTML =
      document.getElementById("year" + id.toString()).value;
    count7 = 0;
  };
}


function reg(e , id){
  // console.log("cliciking" + id)
  count8++;
  // console.log(count1)
  if (count8 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "reg" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("reg" + id.toString()).focus();
  document.getElementById("reg" + id.toString()).onblur = function () {
    document.getElementById("reg" + id.toString()).parentElement.innerHTML =
      document.getElementById("reg" + id.toString()).value;
    count8 = 0;
  };
}

function chassi(e , id){
  // console.log("cliciking" + id)
  count9++;
  // console.log(count1)
  if (count9 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "chassi" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("chassi" + id.toString()).focus();
  document.getElementById("chassi" + id.toString()).onblur = function () {
    document.getElementById("chassi" + id.toString()).parentElement.innerHTML =
      document.getElementById("chassi" + id.toString()).value;
    count9 = 0;
  };
}

function color(e , id){
  // console.log("cliciking" + id)
  count10++;
  // console.log(count1)
  if (count10 == 1) {
    var val = e.firstChild.nodeValue;
    var textBox = document.createElement("input");
    textBox.setAttribute("type", "text");
    textBox.setAttribute("value", val);
    textBox.setAttribute("id", "color" + id.toString());
    e.firstChild.nodeValue = "";
    e.appendChild(textBox);
  }
  document.getElementById("color" + id.toString()).focus();
  document.getElementById("color" + id.toString()).onblur = function () {
    document.getElementById("color" + id.toString()).parentElement.innerHTML =
      document.getElementById("color" + id.toString()).value;
    count10 = 0;
  };
}
