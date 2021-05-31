var customerLoad = document.querySelector(".processing");
var cusLoad = document.querySelector(".cusLoad");
var veLoad = document.querySelector(".veLoad");
var clLoad = document.querySelector(".clLoad");
var payLoad = document.querySelector(".payLoad");

// console.log(document.getElementById("cusCunt").innerHTML )
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
c = 1;
c1 = 0;
c2 = 0;
c3 = 0;
c4 = 0;
c5 = 0;
c6 = 0;
c7 = 0;
c8 = 0;
c9 = 0;



function getCustomers() {
  document.querySelector("#customers").classList.add("hidden");
  document.getElementById("vehicles").classList.add("hidden");
  document.getElementById("allclaims").classList.add("hidden");
  document.getElementById("payments").classList.add("hidden");
  customerLoad.classList.remove("hidden");
  customerLoad.style.display = "block";

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("#customers").classList.remove("hidden");
      customerLoad.classList.add("hidden");
      customerLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      document.getElementById("cusCount").innerHTML = data.length;
      if (data.length != 0) {
        var html =
          "<h2> Customers </h2>" +
          `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> name with Initials </th>
					<th> email </th>
					<th> dob </th>
					<th> gender </th>
					<th> address </th>
					<th> zip </th>
					<th> nic </th>
					<th> phone </th>
					<th> Update </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>`;

        for (var a = 0; a < data.length; a++) {
          html += "<tr>";
          html +=
            `<td id='nametd${data[a].user_id}'  ondblclick='name(this , ${data[a].user_id})'>` +
            data[a].nameWithInitials +
            "</td>";
          html +=
            `<td id='emailtd${data[a].user_id}' ondblclick='email(this , ${data[a].user_id})'>` +
            data[a].email +
            "</td>";
          html +=
            `<td id='dobtd${data[a].user_id}' ondblclick='dob(this , ${data[a].user_id})'>` +
            data[a].dob +
            "</td>";
          html +=
            `<td id='gendertd${data[a].user_id}' ondblclick='gender(this , ${data[a].user_id})'>` +
            data[a].gender +
            "</td>";
          html +=
            `<td id='addresstd${data[a].user_id}' ondblclick='address(this , ${data[a].user_id})'>` +
            data[a].address +
            "</td>";
          html +=
            `<td id='ziptd${data[a].user_id}' ondblclick='zip(this ,${data[a].user_id})'>` +
            data[a].zip +
            "</td>";
          html +=
            `<td id='nictd${data[a].user_id}' ondblclick='nic(this , ${data[a].user_id})'>` +
            data[a].nic +
            "</td>";
          html +=
            `<td id='phonetd${data[a].user_id}' ondblclick='phone(this , ${data[a].user_id})'>` +
            data[a].phone +
            "</td>";
          html += `<td> <input type='button' class='up' value='update' id='__${data[a].user_id}'  onclick='updateCustomer(${data[a].user_id})'> </td>`;
          html += `<td> <input type='button' class='del' value='delete'  id='_${data[a].user_id}' onclick='deleteCustomer(${data[a].user_id})' > </td>`;
          html += "</tr>";
        }

        html += "</tbody></table>";

        document.getElementById("customers").innerHTML = html;
      } else {
        document.getElementById("customers").innerHTML =
          "<p style='text-align:center;'>No customers added yet!!</p>";
      }
    }
  };

  ajax.send("&get_customers=1");

  return false;
}

function deleteCustomer(id) {
  var answer = window.confirm("Are you sure?");
  if (answer) {
    // console.log(typeof id)
    // document
    // .querySelector("#_" + id.toString()).value = "deleting";
    document
      .querySelector("#_" + id.toString())
      .parentElement.parentElement.remove();
    // document.querySelector("#customers").classList.add("hidden");
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == 1) {
          //  document.querySelector("#custable").classList.add("hidden")
          // getCustomers();
          getCustomerForDashBoard();
          console.log(this.responseText);
        }
      }
    };

    ajax.send("user=" + id + "&delete_customer=1");
  } else {
    console.log("Not deleted");
  }
}

function updateCustomer(id) {
  // console.log(id)

  document.querySelector("#__" + id.toString()).value = "updating";

  var name, email, dob, gender, address, zip, nic, phone;

  name = document.getElementById("nametd" + id.toString()).textContent;
  if (!name) {
    name = document.getElementById("nameWithInitials" + id.toString()).value;
  }
  email = document.getElementById("emailtd" + id.toString()).textContent;
  if (!email) {
    email = document.getElementById("email" + id.toString()).value;
  }
  dob = document.getElementById("dobtd" + id.toString()).textContent;
  if (!dob) {
    dob = document.querySelector("#dob" + id.toString()).value;
  }
  gender = document.getElementById("gendertd" + id.toString()).textContent;
  if (!gender) {
    gender = document.getElementById("gender" + id.toString()).value;
  }
  address = document.getElementById("addresstd" + id.toString()).textContent;
  if (!address) {
    address = document.getElementById("address" + id.toString()).value;
  }
  zip = document.getElementById("ziptd" + id.toString()).textContent;
  if (!zip) {
    zip = document.getElementById("zip" + id.toString()).value;
  }
  nic = document.getElementById("nictd" + id.toString()).textContent;
  if (!nic) {
    nic = document.getElementById("nic" + id.toString()).value;
  }

  phone = document.getElementById("phonetd" + id.toString()).textContent;
  if (!phone) {
    phone = document.getElementById("phone" + id.toString()).value;
  }

  // console.log("DOB is " + dob);
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // alert(this.responseText);
      document.querySelector("#__" + id.toString()).value = "update";
    }
  };

  ajax.send(
    "user=" +
      id +
      "&name=" +
      name +
      "&email=" +
      email +
      "&dob=" +
      dob +
      "&gender=" +
      gender +
      "&address=" +
      address +
      "&zip=" +
      zip +
      "&nic=" +
      nic +
      "&phone=" +
      phone +
      "&update_customer=1"
  );
}

//get vehicles for admin
function getVehicles() {
  document.getElementById("vehicles").classList.add("hidden");
  document.getElementById("customers").classList.add("hidden");
  document.getElementById("allclaims").classList.add("hidden");
  document.getElementById("payments").classList.add("hidden");
  customerLoad.classList.remove("hidden");
  customerLoad.style.display = "block";

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // quotationPrice = this.responseText;
      document.getElementById("vehicles").classList.remove("hidden");
      customerLoad.classList.add("hidden");
      customerLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      if (data.length != 0) {
        var addBtn =
          `<h2 style='float:left'> Vehicles </h2>` +
          `<input style='float:right'  type="button" id='addV' value='add new vehicle' name="add new vehicle" onclick="addNewVehicleForm()"></input>`;
        var html =
          addBtn +
          `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> name</th>
					<th> type </th>
					<th> insurance type </th>
					<th> value </th>
					<th> make </th>
					<th> model </th>
					<th> fuel type </th>
					<th> year </th>
					<th> register no </th>
					<th> chassis no </th>
					<th> color </th>
					<th> update </th>
					<th> delete </th>
				</tr>
			</thead>
			<tbody`;

        for (var a = 0; a < data.length; a++) {
          html += "<tr>";
          html += `<td  >` + data[a].nameWithInitials + "</td>";
          html +=
            `<td id='vtypetd${data[a].vehicle_id}'  ondblclick='vtype(this , ${data[a].vehicle_id})'>` +
            data[a].vehicle_type +
            "</td>";
          html +=
            `<td id='itypetd${data[a].vehicle_id}'  ondblclick='itype(this , ${data[a].vehicle_id})'>` +
            data[a].insurance_type +
            "</td>";
          html +=
            `<td id='valuetd${data[a].vehicle_id}'  ondblclick='value(this , ${data[a].vehicle_id})'>` +
            data[a].market_value +
            "</td>";
          html +=
            `<td id='maketd${data[a].vehicle_id}'  ondblclick='make(this , ${data[a].vehicle_id})'>` +
            data[a].make +
            "</td>";
          html +=
            `<td id='modeltd${data[a].vehicle_id}'  ondblclick='model(this , ${data[a].vehicle_id})'>` +
            data[a].model +
            "</td>";
          html +=
            `<td id='fueltd${data[a].vehicle_id}'  ondblclick='fuel(this , ${data[a].vehicle_id})'>` +
            data[a].fuel_type +
            "</td>";
          html +=
            `<td id='yeartd${data[a].vehicle_id}'  ondblclick='year(this , ${data[a].vehicle_id})'>` +
            data[a].year +
            "</td>";
          html +=
            `<td id='regNumtd${data[a].vehicle_id}'  ondblclick='reg(this , ${data[a].vehicle_id})'>` +
            data[a].register_number +
            "</td>";
          html +=
            `<td id='chsssiNumtd${data[a].vehicle_id}'  ondblclick='chassi(this , ${data[a].vehicle_id})'>` +
            data[a].chassis_number +
            "</td>";
          html +=
            `<td id='colortd${data[a].vehicle_id}'  ondblclick='color(this , ${data[a].vehicle_id})'>` +
            data[a].color +
            "</td>";

          html += `<td> <input type='button' class='up' value='Update' id='__${data[a].vehicle_id}' onclick='updateVehicle(${data[a].user_id},${data[a].vehicle_id})' > </td>`;
          html += `<td> <input type='button' class='del' value='Delete' id='_${data[a].vehicle_id}' onclick='deleteVehicle(${data[a].user_id},${data[a].vehicle_id})' > </td>`;
          html += "</tr>";
        }

        html += "</tbody></table>";
        document.getElementById("vehicles").innerHTML = html;
      } else {
        document.getElementById("vehicles").innerHTML =
          `<p style='text-align:center;margin:5px'>No vehicls added yet!!</p> <input style='display:block;margin-left:auto;margin-right:auto' type="button" id='addV' value='add new vehicle' name="add new vehicle" onclick="addNewVehicleForm()"></input>`;
      }
    }
  };

  // ajax.send("&pay_for_insurance=1");

  ajax.send("get_vehicles=1");
}


function updateVehicle(id, vid) {
  // console.log(document.getElementById("__" + id.toString()));

  vehicleType = document.getElementById("vtypetd" + vid.toString()).textContent;
  if (!vehicleType) {
    vehicleType = document.getElementById("vehicle" + vid.toString()).value;
  }
  insuType = document.getElementById("itypetd" + vid.toString()).textContent;
  if (!insuType) {
    insuType = document.getElementById("insurance" + vid.toString()).value;
  }

  marketValue = document.getElementById("valuetd" + vid.toString()).textContent;
  if (!marketValue) {
    marketValue = document.getElementById("value" + vid.toString()).value;
  }

  make = document.getElementById("maketd" + vid.toString()).textContent;
  if (!make) {
    make = document.getElementById("make" + vid.toString()).value;
  }

  fuel = document.getElementById("fueltd" + vid.toString()).textContent;
  if (!fuel) {
    fuel = document.getElementById("fuel" + vid.toString()).value;
  }

  model = document.getElementById("modeltd" + vid.toString()).textContent;
  if (!model) {
    model = document.getElementById("model" + vid.toString()).value;
  }

  year = document.getElementById("yeartd" + vid.toString()).textContent;
  if (!year) {
    year = document.getElementById("year" + vid.toString()).value;
  }

  register = document.getElementById("regNumtd" + vid.toString()).textContent;
  if (!register) {
    register = document.getElementById("reg" + vid.toString()).value;
  }

  chassis = document.getElementById("chsssiNumtd" + vid.toString()).textContent;
  if (!chassis) {
    chassis = document.getElementById("chassi" + vid.toString()).value;
  }

  color = document.getElementById("colortd" + vid.toString()).textContent;
  if (!color) {
    color = document.getElementById("color" + vid.toString()).value;
  }
  document.getElementById("__" + vid.toString()).value = "updating";
  // console.log(
  //   "vehicleId =" +
  //   vid+
  //   "user id = " +
  //   id +
  //   vehicleType,
  //   insuType,
  //   marketValue,
  //   make,
  //   fuel,
  //   model,
  //   year,
  //   register,
  //   chassis,
  //   color
  // );

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // alert(this.responseText);
      document.getElementById("__" + vid.toString()).value = "update";
    }
  };

  ajax.send(
    "user=" +
      id +
      "&vehicleId=" +
      vid +
      "&vtype=" +
      vehicleType +
      "&itype=" +
      insuType +
      "&value=" +
      marketValue +
      "&make=" +
      make +
      "&model=" +
      model +
      "&fuel=" +
      fuel +
      "&year=" +
      year +
      "&register=" +
      register +
      "&chassi=" +
      chassis +
      "&color=" +
      color +
      "&update_vehicle=1"
  );
}

function deleteVehicle(cusId, vehicleId) {
  var answer = window.confirm("Are you sure?");
  if (answer) {
    document
      .querySelector("#_" + vehicleId.toString())
      .parentElement.parentElement.remove();

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        //  document.querySelector("#custable").classList.add("hidden")
        // getCustomers();
        getVehicleForDashBoard();
        console.log(this.responseText);
      }
    };

    ajax.send("user=" + cusId + "&vid=" + vehicleId + "&delete_vehicle=1");
  } else {
    console.log("Not deleted");
  }
}

function getClaims() {
  document.querySelector("#customers").classList.add("hidden");
  document.getElementById("vehicles").classList.add("hidden");
  document.getElementById("allclaims").classList.add("hidden");
  document.getElementById("payments").classList.add("hidden");
  customerLoad.classList.remove("hidden");
  customerLoad.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("allclaims").classList.remove("hidden");
      customerLoad.classList.add("hidden");
      customerLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      if (data.length != 0) {
        var html =
          "<h2> Claims </h2>" +
          `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> customer id </th>
					<th> vehicle id</th>
					<th> policy id </th>
					<th> accident location </th>
					<th> garage</th>
					<th> bank acc.No </th>
					<th> accident date </th>
					<th> claim date </th>
					<th> status </th>
					<th> status now</th>
					<th> update </th>
					<th> delete </th>
				</tr>
			</thead>
			<tbody>`;

        for (let a = 0; a < data.length; a++) {
          html += "<tr>";
          html += "<td >" + data[a].customer_id + "</td>";
          html += "<td >" + data[a].vehicle_id + "</td>";
          html += "<td >" + data[a].policy_id + "</td>";

          html += "<td >" + data[a].accident_location + "</td>";
          html += "<td >" + data[a].gurage_location + "</td>";
          html += "<td >" + data[a].bank_acc + "</td>";
          html += "<td >" + data[a].accident_date + "</td>";
          html += "<td >" + data[a].claim_date.substring(0, 10) + "</td>";
          html += `
          <td ><select class='clselect' id='st${data[a].claim_id}'>
          <option value='sucess'>sucess</option>
          <option value='failed'>failed</option>
        </select></td>`;
          html +=
            `<td id='statustd${data[a].claim_id}'>` + data[a].status + `</td>`;
          html += `<td > <input type='button' class='up' value='Update' id='up${data[a].claim_id}' onclick='updateClaim(${data[a].claim_id})' /> </td>`;
          html +=
            "<td > <input type='button' class='del' value='Delete' /> </td>";
          html += "</tr>";
        }

        html += "</tbody></table>";
        // console.log(data.length)
        document.querySelector("#allclaims").classList.remove("hidden");
        document.querySelector("#allclaims").innerHTML = html;
      } else {
        document.getElementById("allclaims").innerHTML =
          "<p style='text-align:center;'>No claims added yet!!</p>";
      }
    }
  };

  ajax.send("&get_claims=1");
}

function updateClaim(id) {
  document.getElementById("up" + id.toString()).value = "Updating";
  var status = document.getElementById("st" + id.toString()).value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      getClaimsForDashboard();
      // document.getElementById("vehicleId").innerHTML = this.responseText;
      document.getElementById("up" + id.toString()).value = "Update";
      // console.log(this.responseText);
      document.getElementById("statustd" + id.toString()).textContent = status;
    }
  };

  ajax.send("claimId=" + id + "&status=" + status + "&update_claim=1");
}

function getCustomerForDashBoard() {
  cusLoad.classList.remove("hidden");
  cusLoad.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      cusLoad.classList.add("hidden");
      cusLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      document.getElementById("cusCount").innerHTML = data.length;
      // console.log(data.length)
    }
  };

  ajax.send("&get_customers=1");

  return false;
}

function getVehicleForDashBoard() {
  veLoad.classList.remove("hidden");
  veLoad.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      veLoad.classList.add("hidden");
      veLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      document.getElementById("veCount").innerHTML = data.length;
      // console.log(data.length)
    }
  };

  ajax.send("&get_vehicles=1");

  return false;
}

function getClaimsForDashboard() {
  clLoad.classList.remove("hidden");
  clLoad.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      clLoad.classList.add("hidden");
      clLoad.style.display = "none";
      var data = JSON.parse(this.responseText);

      count = 0;
      for (let a = 0; a < data.length; a++) {
        if (data[a].status == "sucess") {
          count++;
        } 
      }

      document.getElementById("clCount").innerHTML = count;

      // console.log(data.length)
      console.log(count)
    }
  };

  ajax.send("&get_claims=1");

  return false;
}

window.onload = function () {
  getCustomerForDashBoard();
  getVehicleForDashBoard();
  getClaimsForDashboard();
  getPaymentsForDashBoard();
  getVehicleIds();
};

function getVehicleIds() {
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("customerIds").innerHTML = this.responseText;
      // console.log(this.responseText);
    }
  };

  ajax.send("&get_customer_ids=1");

  return false;
}

function addNewVehicleForm() {
  document.querySelector(".addVform").style.display = "block";
}

function closeForm() {
  document.querySelector(".addVform").style.display = "none";
}

document.getElementById("customerIds").addEventListener("click", function (e) {
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("cname").innerHTML = this.responseText;
      // console.log(this.responseText);
    }
  };

  ajax.send("id=" + e.target.value + "&get_customer_name=1");
});

function addNewVehicle() {
  var table = document.getElementById("custable");
  var userId = document.getElementById("customerIds").value;
  var name = document.getElementById("cname").textContent;
  var vtype = document.getElementById("vtype").value;
  var itype = document.getElementById("itype").value;
  var value = document.getElementById("value").value;
  var make = document.getElementById("make").value;
  var model = document.getElementById("model").value;
  var fuel = document.getElementById("fuel").value;
  var year = document.getElementById("year").value;
  var reg = document.getElementById("reg").value;
  var chassi = document.getElementById("chassis").value;
  var color = document.getElementById("color").value;
  // console.log(userId)

  document.getElementById("createBtn").value = "adding vehicle";

  var data = [
    name,
    vtype,
    itype,
    value,
    make,
    model,
    fuel,
    year,
    reg,
    chassi,
    color,
    `<td> <input type='button' class='up' disabled value='Update' id='__${userId}' onclick='updateVehicle(${userId})' > </td>`,
    "<input type='button' class='del' disabled value='Delete'>",
  ];

  // console.log(itype, vtype);
  // console.log(table);
  // var row = table.insertRow(table.rows.length);
  // // console.log(row);

  // for (let index = 0; index < data.length; index++) {
  //   row.insertCell(index).innerHTML = data[index];
  // }

  // var tds = row.querySelectorAll("td");

  // tds[1].setAttribute("id" , "vtypetd"+userId.toString());
  // tds[1].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[2].setAttribute("id" , "itypetd"+userId.toString());
  // tds[2].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[3].setAttribute("id" , "valuetd"+userId.toString());
  // tds[3].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[4].setAttribute("id" , "maketd"+userId.toString());
  // tds[4].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[5].setAttribute("id" , "modeltd"+userId.toString());
  // tds[5].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[6].setAttribute("id" , "fueltd"+userId.toString());
  // tds[6].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[7].setAttribute("id" , "yeartd"+userId.toString());
  // tds[7].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[8].setAttribute("id" , "regNumtd"+userId.toString());
  // tds[8].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[9].setAttribute("id" , "chsssiNumtd"+userId.toString());
  // tds[9].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  // tds[10].setAttribute("id" , "colortd"+userId.toString());
  // tds[10].setAttribute("ondblclick" , `vehicle(this, ${userId} )`);

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // document.getElementById("customerIds").innerHTML = this.responseText;
      document.getElementById("createBtn").value = "add vehicle";
      getVehicles();
      getVehicleForDashBoard();
    }
  };

  ajax.send(
    "userId=" +
      userId +
      "&vtype=" +
      vtype +
      "&itype=" +
      itype +
      "&value=" +
      value +
      "&make=" +
      make +
      "&model=" +
      model +
      "&fuel=" +
      fuel +
      "&year=" +
      year +
      "&reg=" +
      reg +
      "&chassi=" +
      chassi +
      "&color=" +
      color +
      "&create_vehicle=1"
  );

  return false;
}

function showPayments() {
  document.getElementById("payments").classList.remove("hidden");
  document.querySelector("#customers").classList.add("hidden");
  document.getElementById("vehicles").classList.add("hidden");
  document.getElementById("allclaims").classList.add("hidden");
  customerLoad.classList.remove("hidden");
  customerLoad.style.display = "block";

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // document.getElementById("customerIds").innerHTML = this.responseText;
      customerLoad.classList.add("hidden");
      customerLoad.style.display = "none";
      var data = JSON.parse(this.responseText);
      if (data.length != 0) {
        var html =
          "<h2> Payments </h2>" +
          `<table id='custable' class='pay' width='100%'> 
			<thead>
				<tr>
					<th> name with Initials </th>
					<th> payment </th>
					<th> payment date </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>`;

        for (let a = 0; a < data.length; a++) {
          html += "<tr>";
          html +=
            `<td id='name${data[a].payment_id}' >` +
            data[a].nameWithInitials +
            "</td>";
          html +=
            `<td id='pay${data[a].payment_id}' >` + data[a].payment + "</td>";
          html +=
            `<td id='date${data[a].payment_id}' >` +
            data[a].payment_date.substring(0, 10) +
            "</td>";
          html += `<td> <input type='button' class='del' value='Delete' id='_${data[a].payment_id}' onclick='deletePayment(${data[a].payment_id})'> </td>`;
          html += "</tr>";
        }
        html += "</tbody></table>";
        document.getElementById("payments").innerHTML = html;
      }
    }
  };

  ajax.send("get_payments=1");
}

function deletePayment(id) {
  var answer = window.confirm("Are you sure?");
  if (answer) {
    document
      .querySelector("#_" + id.toString())
      .parentElement.parentElement.remove();
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // alert(this.responseText);
        getPaymentsForDashBoard();
      }
    };

    ajax.send("id=" + id + "&delete_pay=1");
  }
}

function getPaymentsForDashBoard() {
  payLoad.classList.remove("hidden");
  payLoad.style.display = "block";
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      payLoad.classList.add("hidden");
      payLoad.style.display = "none";
      document.getElementById("payCount").innerHTML = data.length;
      // console.log(this.responseText);
    }
  };

  ajax.send("&get_payments=1");

  return false;
}
