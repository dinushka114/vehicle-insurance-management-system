var loader1 = document.querySelector(".addr1");
var loader2 = document.querySelector(".addr2");
var loader3 = document.querySelector(".loader");
var progress = document.querySelector(".processing");
var pregresspwd = document.querySelector(".processing-pwd");
var provinceLoader = document.querySelector(".pr");

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

//update user data
function updateUserData(form) {
  var title = document.getElementById("title").value;
  var fullName = form.fullName.value;
  var nameWithinitials = form.fullNamewithinitials.value;
  var email = form.email.value;
  var nic = form.nic.value;
  var phone = form.phone.value;
  var address = form.address.value;
  var dob = form.dob.value;
  var zip = form.zipcode.value;

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

  progress.classList.remove("hidden");
  document.querySelector("#upSuccess").classList.add("hidden");

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("#upSuccess").classList.remove("hidden");
      console.log(this.responseText);
      progress.classList.add("hidden");
    }
  };

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
      "&update_user=1"
  );

  return false;
}

//update customer password
function updateUserPassword(form) {
  var currentPassword = form.currentPassword.value;
  var newPassword = form.newPassword.value;
  var confirmPassword = form.confirmnewPassword.value;
  pregresspwd.classList.remove("hidden");

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      pregresspwd.classList.add("hidden");
      document.querySelector(".results").innerHTML = this.responseText;
    }
  };

  ajax.send(
    "currentPassword=" +
      currentPassword +
      "&newPassword=" +
      newPassword +
      "&confirmNewPassword=" +
      confirmPassword +
      "&update_user_password=1"
  );

  return false;
}

function getProviceList() {
  provinceLoader.classList.remove("hidden");
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      provinceLoader.classList.add("hidden");
      document.querySelector("#province").innerHTML = this.responseText;
    }
  };

  ajax.send("get_provinces");
}

function showClaim() {
  document.querySelector(".claim_form").classList.remove("hidden");
  document.querySelector(".customer_update").classList.add("hidden");
  document.getElementById("myPayments").classList.add("hidden");
  document.getElementById("myClaims").classList.add("hidden");
  document.querySelector("#myVehicles").classList.add("hidden");
}

function makeClaim() {
  document.querySelector(".right").classList.add("hidden");
  document.querySelector(".error").classList.add("hidden");
  document.getElementById("claimLoader").classList.remove("hidden");

  var fullName = document.getElementById("fullName").value;
  var vid = document.getElementById("vehicleId").value;
  var pid = document.getElementById("policyId").value;
  var accidentLocation = document.getElementById("acc_location").value;
  var garageLocation = document.getElementById("g_location").value;
  var description = document.getElementById("description").value;
  var acc = document.getElementById("acc_no").value;
  var accDate = document.getElementById("accidentDate").value;
  var contactNo = document.getElementById("contact").value;

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("claimLoader").classList.add("hidden");
      console.log(this.responseText);
      if (this.responseText == 1) {
        document.querySelector(".right").classList.remove("hidden");
      } else if (this.responseText == -1) {
        document.querySelector(".error").classList.remove("hidden");
      }
    }
  };

  ajax.send(
    "vehicleId=" +
      vid +
      "&fullName=" +
      fullName +
      "&policyId=" +
      pid +
      "&contact=" +
      contactNo +
      "&aLocation=" +
      accidentLocation +
      "&gLocation=" +
      garageLocation +
      "&description=" +
      description +
      "&accNo=" +
      acc +
      "&accDate=" +
      accDate +
      "&make_claim=1"
  );
}

function getVehicleIds() {
  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("vehicleId").innerHTML = this.responseText;
    }
  };

  ajax.send("&get_vehicle_id=1");
}

window.onload = function () {
  getVehicleIds();
  getProviceList();
};

function getAllClaims() {
  loader3.classList.remove("hidden");
  document.getElementById("myPayments").classList.add("hidden");
  document.getElementById("myClaims").classList.remove("hidden");
  document.querySelector(".claim_form").classList.add("hidden");
  document.querySelector(".customer_update").classList.add("hidden");
  document.querySelector("#myVehicles").classList.add("hidden");

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader3.classList.add("hidden");
      var data = JSON.parse(this.responseText);
      var html = `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> vehicle id </th>
					<th> policy id </th>
					<th> bank accno </th>
					<th> accident date </th>
					<th> claim date </th>
					<th> status </th>
				</tr>
			</thead>
			<tbody>`;

      for (let a = 0; a < data.length; a++) {
        html += "<tr>";
        html += "<td >" + data[a].vehicle_id + "</td>";
        html += "<td >" + data[a].policy_id + "</td>";
        html += "<td >" + data[a].bank_acc + "</td>";
        html += "<td >" + data[a].accident_date + "</td>";
        html += "<td >" + data[a].claim_date + "</td>";
        html += "<td >" + data[a].status + "</td>";
        html += "</tr>";
      }

      html += "</tbody></table>";
      document.querySelector("#claimTable").innerHTML = html;
    }
  };

  ajax.send("&get_all_claims=1");
}

function myPayments() {
  loader3.classList.remove("hidden");
  document.getElementById("myPayments").classList.remove("hidden");
  document.getElementById("myClaims").classList.add("hidden");
  document.querySelector(".claim_form").classList.add("hidden");
  document.querySelector(".customer_update").classList.add("hidden");
  document.querySelector("#myVehicles").classList.add("hidden");

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader3.classList.add("hidden");
      var data = JSON.parse(this.responseText);
      var html = `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> payment id </th>
					<th> payment </th>
					<th> payment date </th>
					<th> next payment date </th>
				</tr>
			</thead>
			<tbody>`;

      for (let a = 0; a < data.length; a++) {
        html += "<tr>";
        html += "<td >" + data[a].payment_id + "</td>";
        html += `<td > Rs. ${data[a].payment}.00/=</td>`;
        html += "<td >" + data[a].payment_date.substring(0, 10) + "</td>";
        var d = new Date(Date.parse(data[a].payment_date));
        html +=
          "<td >" +
          `${d.getFullYear() + 1}-${d.getMonth() + 1}-${d.getDate()} ` +
          "</td>";
        html += "</tr>";
      }
      html += "</tbody></table>";
      document.getElementById("payTable").innerHTML = html;
    }
  };

  ajax.send("&my_payments=1");

  return false;
}

function myVehicles() {
  loader3.classList.remove("hidden");
  document.getElementById("myPayments").classList.add("hidden");
  document.getElementById("myClaims").classList.add("hidden");
  document.querySelector(".claim_form").classList.add("hidden");
  document.querySelector(".customer_update").classList.add("hidden");
  document.querySelector("#myVehicles").classList.remove("hidden");

  var ajax = new XMLHttpRequest();
  ajax.open("POST", "http.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      loader3.classList.add("hidden");
      var data = JSON.parse(this.responseText);
      var html = `<table id='custable' width='100%'> 
			<thead>
				<tr>
					<th> vehicle id </th>
					<th> vehicle type </th>
					<th> make </th>
					<th> model </th>
					<th> color </th>
					<th> delete </th>
				</tr>
			</thead>
			<tbody>`;

      for (let a = 0; a < data.length; a++) {
        html += "<tr>";
        html += "<td >" + data[a].vehicle_id + "</td>";
        html += "<td >" + data[a].vehicle_type + "</td>";
        html += "<td >" + data[a].make + "</td>";
        html += "<td >" + data[a].model + "</td>";
        html += "<td >" + data[a].color + "</td>";
        html +=
          "<td >" +
          `<input type='button' onclick='deleteVehicle(${data[a].vehicle_id})' value='delete' id='${data[a].vehicle_id}' class='delVehicle'>` +
          "</td>";
        html += "</tr>";
      }
      html += "</tbody></table>";
      document.getElementById("vehiTable").innerHTML = html;
    }
  };

  ajax.send("&get_user_vehicles=1");
}

function deleteVehicle(id) {
  var answer = window.confirm("Are you user?");
  if (answer) {
    document.getElementById(id.toString()).value = "deleting";
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText==1){
          console.log(this.responseText);

        document
          .getElementById(id.toString())
          .parentElement.parentElement.remove();
        }else{
          alert("Cannot delete vehicle.contact your administrator")
          document.getElementById(id.toString()).value = "delete";
        }
      }
    };

    ajax.send("vid=" + id + "&delete_user_vehicle=1");
  }
}
