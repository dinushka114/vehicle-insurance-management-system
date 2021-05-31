<?php
session_start();

require "config.php";


//contact us page operations
if (isset($_POST["new_contact"])) {
	$firstName = $_POST["first_name"];
	$lastName = $_POST["last_name"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	if (trim($firstName) == '' || trim($lastName) == ''  || trim($contact) == '' || trim($email) == '' || trim($subject) == '' || trim($message) == '') {
		echo 0;
		exit;
	}

	$sql = "INSERT INTO contacts (first_name , last_name , contact_no , email , subject , message ) VALUES ('{$firstName}' ,
	'{$lastName}' , '{$contact}' , '{$email}' , '{$subject}' , '{$message}')";

	if (mysqli_query($conn, $sql)) {
		echo 1;
	} else {
		echo 0;
	}
}


if (isset($_POST["get_provinces"])) {
	$sql = "SELECT * FROM province";
	$result_set = mysqli_query($conn, $sql);
	$province_list = " ";
	while ($result = mysqli_fetch_assoc($result_set)) {
		$province_list .= "<option value=\"{$result['province_id']}\">{$result['province_name']}</option>";
	}
	echo $province_list;
}


if (isset($_POST["get_district"])) {
	$id = $_POST["province_id"];
	$sql = "SELECT * FROM district WHERE province_id = {$id}";
	$result_set = mysqli_query($conn, $sql);
	$district_list = "";
	while ($result = mysqli_fetch_assoc($result_set)) {
		$district_list .= "<option value=\"{$result['district_id']}\">{$result['district_name']}</option>";
	}
	echo $district_list;
}



if (isset($_POST["get_city"])) {
	$id = $_POST["district_id"];
	$sql = "SELECT * FROM div_sec WHERE district_id = {$id}";
	$result_set = mysqli_query($conn, $sql);
	$div_sec_list = "";
	while ($result = mysqli_fetch_assoc($result_set)) {
		$div_sec_list .= "<option value=\"{$result['div_sec_id']}\">{$result['div_sec_name']}</option>";
	}
	echo $div_sec_list;
}



if (isset($_POST["check_email"])) {
	$email = $_POST["email"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 0; // email not valid
	} else {
		$sql = "SELECT * FROM users WHERE email = '{$email}'";
		$result_set = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result_set) > 0) {
			echo 2; // already exixts
		} else {
			echo 1; // no user with this email
		}
	}
}


if (isset($_POST["send_email"])) {
	$to  = $_POST["email"];
	$email = "dinushkachandrarathna@gmail.com";
	$subject = "email worked";
	$msg = "Hello this is my email";

	$headers = "From ". $email;
	if(mail($to , $subject , $msg , $headers)){
		echo "sucess";
	}else{
		echo "failed";
	}

}

if (isset($_POST["register_user"])) {


	$errors = array();

	$title = $_POST["title"];
	$nameWithinitials = $_POST["nameWithinitials"];
	$fullName = $_POST["fullName"];
	$email = $_POST["email"];
	$nic = $_POST["nic"];
	$phone = $_POST["phone"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$province = $_POST["province"];
	$district = $_POST["district"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$agreeVal = $_POST["agreeVal"];
	$password = $_POST["password"];
	$passwordC = $_POST["passwordC"];

	// echo $title . $nameWithinitials . $fullName . $email . $nic . $phone . $dob . $gender . $address . $province . $district . $city . $zip . $agreeVal . $password . $passwordC;


	$names = explode(" ", $fullName);
	// echo $names[1];
	for ($i = 0; $i < count($names); $i++) {
		if (!preg_match("/^[a-zA-z]*$/", $names[$i])) {
			$nameErr = "check Full Name again";
			array_push($errors, $nameErr);
		}
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailValidateErr = "Email is not valid";
		array_push($errors, $emailValidateErr);
	} else {
		$sql = "SELECT * FROM users WHERE email = '{$email}'";
		$result_set = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result_set) > 0) {
			$emailAvailableError = "email already exists";
			array_push($errors, $emailAvailableError);
		}
	}


	if (strlen($nic) < 10 || strlen($nic) > 12) {
		$nicErr = "NIC is not valid";
		array_push($errors, $nicErr);
	}

	if (!preg_match("/^[0-9]*$/", $phone) || strlen($phone) < 10) {
		$mobileErr = "Mobile number not valid";
		array_push($errors, $mobileErr);
	}

	if ($agreeVal == "false") {
		$agreeValErr = "User must agree with our terms and conditions";
		array_push($errors, $agreeValErr);
	}


	//password validation
	if (!preg_match('/[A-Z]/', $password)) {
		$passwordUpperErr  = "Password must contain at least one upper case letter";
		array_push($errors, $passwordUpperErr);
	}

	if (!preg_match('/[a-z]/', $password)) {
		$passwordLowerErr  = "Password must contain at least one lower case letter";
		array_push($errors, $passwordLowerErr);
	}


	if (!preg_match('/[0-9]/',  $password)) {
		$passwordNumErr = "Password must contain at least one number";
		array_push($errors, $passwordNumErr);
	}

	if (strlen($password) < 8) {
		$passwordLengthErr = "Password must containt at least 8 charactors";
		array_push($errors, $passwordLengthErr);
	}

	if (!preg_match('/[!@#$%?=*&]/', $password)) {
		$passwordSpErr = "Password must contain at least one special charactor";
		array_push($errors, $passwordSpErr);
	}

	if ($password != $passwordC) {
		$passErr = "Password did not match";
		array_push($errors, $passErr);
	}

	//if there are at least one error of error array it will check and exit
	if (count($errors) > 0) {
		echo json_encode($errors);
		exit;
	}

	//hash password before save in the database
	$hash = password_hash(
		$password,
		PASSWORD_BCRYPT
	);


	$sql = "INSERT INTO users (
	title , nameWithInitials , fullName , email , dob , gender , address , province , district , city ,zip ,nic , phone , password)
    VALUES (
   '{$title}' ,  '{$nameWithinitials}' , '{$fullName}' , '{$email}' , '{$dob}' , '{$gender}' , '{$address}' , '{$province}' ,
   '{$district}' , '{$city}' , '{$zip}' , '{$nic}' , '{$phone}' , '{$hash}')";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		$_SESSION["user"] = "customer";
		$_SESSION["userName"] = $nameWithinitials;
		$_SESSION["isAuthenticated"] = true;
	}

	$sql1 = "SELECT * FROM users WHERE email = '{$email}'";

	$result1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($result1) > 0) {
		$row = mysqli_fetch_assoc($result1);
		$_SESSION["userID"] = $row["user_id"];
		echo 1;
	}
}


if (isset($_POST['customer_login'])) {

	$email = $_POST["email"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM users WHERE email = '{$email}'";

	$result_set = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result_set) > 0) {
		$result = mysqli_fetch_assoc($result_set);
		$hashPass = $result["password"];
		$verify = password_verify($password, $hashPass);
		if ($verify) {
			// echo "user can log";
			$_SESSION["username"] = $result["fullName"];
			$_SESSION["userID"] = $result["user_id"];
			$_SESSION["user"] = "customer";
			$_SESSION["isAuthenticated"] = true;
			echo true;
		} else {
			// echo "password is incorrect";
			echo -1;
			$_SESSION["isAuthenticated"] = false;
		}
		// echo $result["password"];
	} else {
		echo 0;
		// echo "Email not found!";
	}
}


if (isset($_POST["admin_login"])) {
	$adminId = $_POST["adminId"];
	$password = $_POST["password"];

	$sql = "SELECT * FROM admin WHERE adminId = '{$adminId}'";

	$result_set = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result_set) > 0) {
		$result = mysqli_fetch_assoc($result_set);

		if (strcmp($password, $result["password"]) == 0) {
			// echo "user can log";
			$_SESSION["adminID"] = $result["adminId"];
			$_SESSION["user"] = "admin";
			$_SESSION["isAuthenticated"] = true;
			echo true;
		} else {
			// echo "password is incorrect";
			echo -1;
			$_SESSION["isAuthenticated"] = false;
		}
		// echo $result["password"];
	} else {
		// echo "agent not found!";
		echo 0;
	}
}


if (isset($_POST["update_user"])) {

	$id = $_SESSION["userID"];

	$title = $_POST["title"];
	$nameWithinitials = $_POST["nameWithinitials"];
	$fullName = $_POST["fullName"];
	$email = $_POST["email"];
	$nic = $_POST["nic"];
	$phone = $_POST["phone"];
	$dob = $_POST["dob"];
	$address = $_POST["address"];
	$province = $_POST["province"];
	$district = $_POST["district"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];

	$sql = "UPDATE users SET title = '{$title}' , nameWithinitials = '{$nameWithinitials}' , 
	fullName = '{$fullName}' , email = '{$email}' , nic = '{$nic}' , phone = '{$phone}' , dob =  '{$dob}',
	address = '{$address}' , province = '{$province}' , district = '{$district}', city = '{$city}' , zip=  '{$zip}' where user_id = '{$id}' ";

	$result    = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo "failed";
		exit;
	}



	// echo "received";
}


if (isset($_POST["update_user_password"])) {
	$current = $_POST["currentPassword"];
	$new = $_POST["newPassword"];
	$confirmPassword = $_POST["confirmNewPassword"];

	//get session id - this is equel to logged in customer id
	$id = $_SESSION["userID"];

	$sql = "SELECT * FROM users WHERE user_id = '{$id}'";
	$result_set = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result_set) > 0) {
		$result = mysqli_fetch_assoc($result_set);
		$hashPass = $result["password"];
		$verify = password_verify($current, $hashPass);
		if ($verify) {
			if ($new == $confirmPassword) {
				//change password
				//hashing password before save to the database
				$password = password_hash($new, PASSWORD_BCRYPT);
				$sql = "UPDATE users SET password = '{$password}' WHERE user_id = '{$id}'  ";
				if (mysqli_query($conn, $sql)) {
					echo "<p style='background-color:dodgerblue;color:white;padding:8px;margin-bottom:5px;'>password updated</p>";
				}
			} else {
				//current password and new password are not same
				echo "<p style='background-color:red;color:white;padding:8px;margin-bottom:5px;'>new password and confirm password are not same</p>";
			}
		} else {
			//current passwrd is wrong
			echo "<p style='background-color:red;color:white;padding:8px;margin-bottom:5px;'>current password is wrong</p>";
		}
		// echo "<p style='color:red;font-size:12px;'>email already exixts</p>";

	}
}


if (isset($_POST["get_quotation"])) {

	$errors =  "";

	$vtype = $_POST["type"];
	$itype = $_POST["itype"];
	$value = $_POST["value"];


	if (strcmp($itype, "third") == 0) {
		$q = 1200;
	} else if (strcmp($itype, "full") == 0) {
		if (strcmp($vtype, "Car/SUV/Jeep") == 0) {
			if ($value > 1000000 && $value < 50000000) {
				if ($value < 5000000) {
					$q = 55000;
				} else {
					$q = 95000;
				}
			} else {
				$errors = "Check vehicle value again";
			}
		} else if (strcmp($vtype, "MotorBike") == 0) {
			if ($value > 100000 && $value < 5000000) {
				if ($value < 200000) {
					$q = 5000;
				} else if ($value < 380000) {
					$q = 7500;
				} else {
					$q = 9000;
				}
			} else {
				$errors = "Check vehicle value again";
			}
		} else if (strcmp($vtype, "ThreeWheeler") == 0) {
			if ($value >= 800000 && $value < 1200000) {
				if ($value < 1000000) {
					$q = 16000;
				} else {
					$q = 25000;
				}
			} else {
				$errors = "Check vehicle value again";
			}
		} else if (strcmp($vtype, "Commercial") == 0) {
			if ($value > 1000000 && $value <= 5000000) {
				if ($value < 1000000) {
					$q = 15000;
				} else if ($value < 3000000) {
					$q = 30000;
				} else {
					$q = 45000;
				}
			} else {
				$errors = "Check vehicle value again";
			}
		}
	}

	if (strlen($errors) > 0) {
		echo 0;
		exit;
	}

	echo $q;
}



if (isset($_POST["save_and_pay"])) {

	// $id = $_SESSION["userID"];

	$type = $_POST["type"];
	$userId = $_POST["user_id"];
	$itype = $_POST["itype"];
	$value = $_POST["value"];
	$make = $_POST["make"];
	$model = $_POST["model"];
	$year = $_POST["year"];
	$reg = $_POST["reg"];
	$chassi = $_POST["chassi"];
	$color = $_POST["color"];
	$fuel = $_POST["fuel"];

	// echo 1;


	$sql = "INSERT INTO vehicle (
		vehicle_type , insurance_type , market_value , make , model , fuel_type, year , register_number , chassis_number , color , customer_id)
		VALUES (
	   '{$type}' ,  '{$itype}' , '{$value}' , '{$make}' , '{$model}' , '{$fuel}' , '{$year}' , '{$reg}' , '{$chassi}' ,
	   '{$color}' , '{$userId}' )";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}
}


if (isset($_POST["get_vehicle_id"])) {
	$uid = $_SESSION["userID"];
	$sql = "SELECT vehicle_id from vehicle where customer_id = '{$uid}' ";
	$result_set = mysqli_query($conn, $sql);

	$vehicleIds = "";
	while ($result = mysqli_fetch_assoc($result_set)) {
		$vehicleIds .= "<option value=\"{$result['vehicle_id']}\">{$result['vehicle_id']}</option>";
	}
	echo $vehicleIds;
}


if (isset($_POST["get_user_vehicles"])) {
	$uid = $_SESSION["userID"];

	$sql = "SELECT * FROM vehicle where customer_id ='{$uid}' ";

	$result_set = mysqli_query($conn, $sql);

	$vehicles = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($vehicles, $row);

	echo json_encode($vehicles);
	exit();
}

if (isset($_POST["delete_user_vehicle"])) {
	$id = $_POST["vid"];

	$sql = "DELETE FROM vehicle where vehicle_id = '{$id}' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}
}

if (isset($_POST["make_claim"])) {
	$uid = $_SESSION["userID"];;
	$name = $_POST["fullName"];
	$vid = $_POST["vehicleId"];
	$pid = $_POST["policyId"];
	$con = $_POST["contact"];
	$al = $_POST["aLocation"];
	$gl = $_POST["gLocation"];
	$des = $_POST["description"];
	$acc = $_POST["accNo"];
	$date = $_POST["accDate"];


	if (trim($name) == '' || trim($vid) == '' || trim($pid) == '' || trim($con) == '' || trim($al) == '' || trim($gl) == '' || trim($des) == '' || trim($acc) == '' || trim($date) == '') {

		echo -1;
		exit;
	}

	$sql = "INSERT INTO Claim (customer_id , fullName,  vehicle_id , policy_id , accident_location , gurage_location,contact , description , bank_acc ,accident_date  )VALUES (
		'{$uid}' , '{$name}',  '{$vid}' , '{$pid}' , '{$al}' , '{$gl}' ,'{$con}' , '{$des}' , '{$acc}' , '{$date}')";


	// echo $uid;
	$result_set = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}

	// echo  "full name = " . $name . "vehile id = " . $vid . "policy id = " . $pid . "accide lo = " . $al . "gurage lo = " . $gl . "description " . $des . "acc no =" . $acc . "Date=" . $date;
}

if (isset($_POST["get_all_claims"])) {
	$uid = $_SESSION["userID"];

	$sql = "SELECT * FROM Claim where customer_id ='{$uid}' ";

	$result_set = mysqli_query($conn, $sql);

	$claims = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($claims, $row);

	echo json_encode($claims);
	exit();
}

//admin tasks
if (isset($_POST["get_customers"])) {
	$sql = "SELECT * FROM users";


	$result_set = mysqli_query($conn, $sql);
	$users = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($users, $row);

	echo json_encode($users);
	exit();
}


if (isset($_POST["get_customer_ids"])) {
	$sql = "SELECT user_id FROM users";


	$result_set = mysqli_query($conn, $sql);
	$user_ids = '';
	while ($row = mysqli_fetch_assoc($result_set))
		$user_ids .= "<option value = \"{$row['user_id']}\" > {$row['user_id']} </option>";

	echo $user_ids;
}


// while ($result = mysqli_fetch_assoc($result_set)) {


if (isset($_POST["get_customer_name"])) {
	$id = $_POST["id"];
	$sql = "SELECT nameWithInitials FROM users where user_id = '{$id}' ";
	$result_set = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result_set);
	echo $row['nameWithInitials'];
}



if (isset($_POST["delete_customer"])) {
	$id = $_POST["user"];
	$sql = "DELETE FROM Payment where Customer_id = '{$id}' ";

	$result_set = mysqli_query($conn, $sql);
	if ($result_set) {
		$sql = "DELETE FROM Claim where customer_id = '{$id}'";
		$result_set = mysqli_query($conn, $sql);
		if ($result_set) {
			$sql = "DELETE FROM vehicle where customer_id = '{$id}'";
			$result_set = mysqli_query($conn, $sql);
			if ($result_set) {
				$sql = "DELETE FROM users where user_id = '{$id}'";
				$result_set = mysqli_query($conn, $sql);
				if ($result_set) {
					echo 1;
				}
			}
		}
	} else {
		echo 0;
	}
}

if (isset($_POST["create_vehicle"])) {
	$uid = $_POST["userId"];
	$vtype = $_POST["vtype"];
	$itype = $_POST["itype"];
	$value = $_POST["value"];
	$make = $_POST["make"];
	$model = $_POST["model"];
	$fuel = $_POST["fuel"];
	$year = $_POST["year"];
	$reg = $_POST["reg"];
	$chassi = $_POST["chassi"];
	$color = $_POST["color"];

	$sql = "INSERT INTO vehicle (
		vehicle_type , insurance_type , market_value , make , model , fuel_type, year , register_number , chassis_number , color , customer_id)
		VALUES (
	   '{$vtype}' ,  '{$itype}' , '{$value}' , '{$make}' , '{$model}' , '{$fuel}' , '{$year}' , '{$reg}' , '{$chassi}' ,
	   '{$color}' , '{$uid}' )";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		// $_SESSION["vid"] = $result["vehicle_id"];

		exit;
	} else {
		echo 0;
		exit;
	}
}

if (isset($_POST["update_customer"])) {
	$userId = $_POST["user"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$dob = $_POST["dob"];
	$zip = $_POST["zip"];
	$nic = $_POST["nic"];
	$phone = $_POST["phone"];

	// echo $userId , $name , $email , $gender , $address , $dob , $zip,$nic ,$phone;


	$sql = "UPDATE users SET nameWithinitials = '{$name}', email = '{$email}' , nic = '{$nic}' , phone = '{$phone}' ,
	 dob =  '{$dob}',gender = '{$gender}', address = '{$address}'  , zip=  '{$zip}' where user_id = '{$userId}' ";

	$result    = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo "sucess";
		exit;
	} else {
		echo "failed";
		exit;
	}

	echo $userId;

	// echo "Name is" . $name . "Email is" . $email . "Id " . $userId;
}


if (isset($_POST["update_vehicle"])) {
	$userID = $_POST["user"];
	$vid = $_POST["vehicleId"];
	$vtype = $_POST["vtype"];
	$itype = $_POST["itype"];
	$mvalue = $_POST["value"];
	$make = $_POST["make"];
	$model = $_POST["model"];
	$fuel = $_POST["fuel"];
	$year = $_POST["year"];
	$reg = $_POST["register"];
	$chassi = $_POST["chassi"];
	$color = $_POST["color"];

	$sql = "UPDATE vehicle set vehicle_type = '{$vtype}' , insurance_type = '{$itype}' , market_value = '{$mvalue}' , make = '{$make}' , model = '{$model}', fuel_type = '{$fuel}' , year = '{$year}' , register_number = '{$reg}' , chassis_number = '{$chassi}' , color = '{$color}' WHERE (customer_id = '{$userID}' AND vehicle_id = '{$vid}') ";

	$result   = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo "sucess";
		exit;
	} else {
		echo "failed";
		exit;
	}
}

if (isset($_POST["get_vehicles"])) {
	$sql = "SELECT users.nameWithInitials , users.user_id , vehicle.vehicle_id ,   vehicle.vehicle_type ,vehicle.insurance_type , vehicle.market_value, vehicle.make , vehicle.model, vehicle.fuel_type , vehicle.year, vehicle.register_number , vehicle.chassis_number , vehicle.color FROM vehicle INNER JOIN users ON vehicle.customer_id = users.user_id";


	$result_set = mysqli_query($conn, $sql);
	$users = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($users, $row);

	echo json_encode($users);
	exit();
}

if (isset($_POST["delete_vehicle"])) {
	$uid = $_POST["user"];
	$vid = $_POST["vid"];

	$sql = "DELETE FROM Claim where vehicle_id = '{$vid}' AND customer_id = '{$uid}'";

	$result_set = mysqli_query($conn, $sql);
	if ($result_set) {
		$sql = "DELETE FROM vehicle where vehicle_id = '{$vid}' AND customer_id = '{$uid}'";
		$result_set = mysqli_query($conn, $sql);
		if ($result_set) {
			echo 1;
		}
	} else {
		echo 0;
	}

	// echo $uid, $vid;
}

if (isset($_POST["get_payments"])) {
	$sql = "SELECT users.nameWithInitials , Payment.payment , Payment.payment_date , Payment.payment_id FROM Payment INNER JOIN users ON users.user_id = Payment.Customer_id";
	$result_set = mysqli_query($conn, $sql);
	$payments = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($payments, $row);

	echo json_encode($payments);
	exit();
}

if (isset($_POST["delete_pay"])) {
	$id = $_POST["id"];
	$sql = "DELETE FROM Payment where payment_id = '{$id}' ";
	$result   = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}
}


if (isset($_POST["get_claims"])) {

	$sql = "SELECT * FROM Claim";
	$result_set = mysqli_query($conn, $sql);
	$claims = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($claims, $row);

	echo json_encode($claims);
	exit();
}


//customer payment for insurance
if (isset($_POST["pay_for_insurance"])) {
	$cusId = $_POST["id"];
	$pay = $_POST["pay"];

	$sql = "INSERT INTO Payment (payment,Customer_id) VALUES('$pay', '$cusId') ";

	$result   = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo 1;
		exit;
	} else {
		echo 0;
		exit;
	}

	// echo 1;
}

if (isset($_POST["update_claim"])) {
	$id =  $_POST["claimId"];
	$status = $_POST["status"];
	// echo $status;
	$sql = "UPDATE Claim set status= '{$status}' where claim_id = '{$id}'";

	$result   = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		echo "sucess unaa";
		exit;
	} else {
		echo "failed unaa";
		exit;
	}
}


if (isset($_POST["my_payments"])) {
	$id = $_SESSION["userID"];
	$sql = "SELECT payment_id, payment, payment_date FROM Payment where Customer_id = '{$id}' ";

	$result_set = mysqli_query($conn, $sql);
	$payments = array();
	while ($row = mysqli_fetch_object($result_set))
		array_push($payments, $row);

	echo json_encode($payments);
	exit();
}
