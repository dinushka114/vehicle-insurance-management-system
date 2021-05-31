<?php
session_start();
if (!isset($_SESSION["username"]) || isset($_SESSION["user"]) != "customer") {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">  -->
    <title>My Account | <?php if ($_SESSION) {
                            echo $_SESSION["username"];
                        } ?></title>


    <style>
        .claim_form #clmBtn {
            padding: 10px;
            background-color: dodgerblue;
            color: white;
            border: none;
        }

        .claim_form #clmBtn:hover {
            cursor: pointer;
        }
    </style>

</head>

<body>
    <?php include_once "./includes/header.php" ?>

    <?php
    require "config.php";
    $id = $_SESSION["userID"];
    $sql = "SELECT * FROM users where user_id = '{$id}' ";
    $result_set = mysqli_query($conn, $sql);

    while ($result = mysqli_fetch_assoc($result_set)) {
        // $title = $_POST["title"];
        $fullName =  $result["fullName"];
        $nameWithinitials = $result["nameWithInitials"];
        $email = $result["email"];
        $dob = $result["dob"];
        $gender = $result["gender"];
        $address = $result["address"];
        $province = $result["province"];
        $district = $result["district"];
        $city = $result["city"];
        $nic = $result["nic"];
        $phone = $result["phone"];
        $zip = $result["zip"];
    }

    ?>

    <div class="wrapper account">
        <?php $name =  $_SESSION['username'] ?>

        <div class="left-bar col-4">
            <div class="container">
                <?php
                if (strcmp($gender, "male") == 0) {
                    echo "<img style='border-radius:50% ;margin-top:10px' id='profileImg' src='./public/images/avatar_1.png' width='100px'>";
                } else {
                    echo "<img style='border-radius:50% ;margin-top:10px' id='profileImg' src='./public/images/avatar_2.png' width='100px'>";
                }
                ?>
            </div>
            <p> <?php echo $name; ?> </p>

            <ul class="links">
                <li><a href="./my_account.php">my account</a></li>
                <li><a style="cursor: pointer;" onclick="showClaim()">make a claim</a></li>
                <li><a style="cursor: pointer;" onclick="getAllClaims()">my claims</a></li>
                <li><a style="cursor: pointer;" onclick="myPayments()">my payments</a></li>
                <li><a style="cursor: pointer;" onclick="myVehicles()">my vehicles</a></li>
            </ul>

        </div>

        <div class="right-bar col-8">
            <div class="customer_update">
                <div class="row">
                    <div class="col-6">
                        <h1>Update details</h1>
                    </div>
                </div>
                <form style="margin-top: 15px;" onsubmit="return updateUserData(this);">
                    <div class="row">
                        <div class="col-4">
                            <select required name="" id="title" style="margin-bottom:5px">
                                <option value="Mr.">Mr</option>
                                <option value="Mrs.">Mrs</option>
                                <option value="Ms.">Ms</option>
                                <option value="Miss.">Miss</option>
                            </select> <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="fullName">Full Name</label>
                            <input type="text" required value="<?php echo $fullName; ?>" name="fullName">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="fullNameWithInitials">Full Name With Initials</label>
                            <input type="text" required value="<?php echo $nameWithinitials; ?>" name="fullNamewithinitials">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="email" required value="<?php echo $email; ?>" name="email">
                        </div>
                        <div class="col-6">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" required value="<?php echo $dob; ?>" name="dob">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <label for="address">Address</label>
                            <input type="text" required value="<?php echo $address; ?>" name="address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="district">Provice</span><img width="14px" class="hidden pr" src="public/images/ajax-loader.gif" alt=""></label> <br>
                            <select required name="province" id="province">

                            </select>
                        </div>


                        <div class="col-4">
                            <label for="city">District<img width="14px" class="hidden addr1" src="public/images/ajax-loader.gif" alt=""></label>
                            <br>
                            <select required name="" id="district">
                                <option value="16"><?php echo $district ?></option>

                            </select>
                        </div>


                        <div class="col-4">
                            <label for="city">City <img width="14px" class="hidden addr2" src="public/images/ajax-loader.gif" alt=""></label>
                            <br>
                            <select required name="" id="city">
                                <option value="234"><?php echo $city ?></option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="zip">Zip code</label>
                            <input type="text" required name="zipcode" value="<?php echo $zip ?>">
                        </div>

                        <div class="col-4">
                            <label for="nic">NIC Number</label>
                            <input type="text" required value="<?php echo $nic ?>" name="nic">
                        </div>

                        <div class="col-4">
                            <label for="phone">Phone no:</label>
                            <input type="text" required value="<?php echo $phone ?>" name="phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p id="upSuccess" class="hidden" style="background-color: dodgerblue;color:white;padding:5px">Update sucessfully</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <input id="updateBtn" type="submit" name="submit" value="update">
                            <!-- <input id="updatingBtn" name="submit" value="updating" class="hidden"> -->
                            <img class="processing hidden" width="22px" src="public/images/ajax-loader.gif">
                        </div>
                    </div>
                </form>

                <hr style="margin-top:25px;margin-bottom:20px">

                <form action="" id="password-reset" onsubmit="return updateUserPassword(this)">

                    <div class="row">
                        <h1 class="col-6">Update password</h1>
                    </div>

                    <div class="results col-12">

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="current">Current Password</label>
                            <input type="text" required name="currentPassword">
                        </div>

                        <div class="col-6">
                            <label for="new">New Password</label>
                            <input type="text" required name="newPassword">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="new">Confirm New Password</label>
                            <input type="text" required name="confirmnewPassword">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <input id="updatePassword" type="submit" name="submit" value="update password">
                            <img class="processing-pwd hidden" width="24px" src="public/images/ajax-loader.gif">
                        </div>
                    </div>

                </form>
            </div>

            <div class="claim_form hidden">

                <div class="row">
                    <div class="col-6">
                        <h1>Make a claim</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="vehicle_id">Vehicle ID</label>
                        <select name="" id="vehicleId">
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="policy_id">Policy ID</label>
                        <select name="" id="policyId">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="acc_location">Accident Location</label>
                        <input type="text" required id="acc_location">
                    </div>
                    <div class="col-6">
                        <label for="g_location">Guarage Location</label>
                        <input type="text" required id="g_location">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="contact">Contact No</label>
                        <input type="text" id="contact">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="description">Briefly describe the situation</label>
                        <textarea name="" id="description" cols="30" rows="4"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="bank">Bank Acc.No</label>
                        <input type="text" required id="acc_no">
                    </div>
                    <div class="col-6">
                        <label for="bank">Date</label>
                        <input type="date" required id="accidentDate">
                    </div>
                </div>

                <div class="right hidden">
                    <div class="row">
                        <div class="col-12">
                            <p style="background-color: dodgerblue;color:white;padding:5px">claim sucessfully</p>
                        </div>
                    </div>
                </div>

                <div class="error hidden">
                    <div class="row">
                        <div class="col-12">
                            <p style="background-color: red;color:white;padding:5px">check details again</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="button" id="clmBtn" onclick="makeClaim()" name="claim" value="claim">
                        <img id="claimLoader" class="hidden" width="18px" src="public/images/ajax-loader.gif">
                    </div>
                </div>

            </div>

            <div id="myClaims" class="hidden">

                <div class="col-12">
                    <h1>My Claims</h1>

                    <div id="claimTable" style="overflow-x: auto;margin-top:20px">

                    </div>
                </div>

            </div>

            <div id="myPayments" class="hidden">
                <div class="col-12">
                    <h1>My Payments</h1>

                    <div id="payTable" style="margin-top:20px">
                    </div>
                </div>
            </div>

            <div id="myVehicles" class="hidden">
                <div class="col-12">
                    <h1>My Vehicles</h1>

                    <div id="vehiTable" style="margin-top:20px">
                    </div>
                </div>
            </div>



            <div class="col-4 hidden loader">
                <img width="24px" src="public/images/ajax-loader.gif">
            </div>


        </div>
    </div>

    <?php include_once "./includes/footer.php" ?>

</body>

<script src="./public/js/my_account.js">

</script>

</html>
