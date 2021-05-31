<?php
session_start();
if (!isset($_SESSION["adminID"]) || isset($_SESSION["user"]) != "admin") {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet"> -->
    <title>Admin</title>
</head>

<body>

    <div class="admin_acc">

        <div id="nav">
            <ul>
                <li> <a style="font-weight: bold;"> <?php echo "Hello " . $_SESSION["adminID"] ?> </a> </li>
                <li> <a onclick="getCustomers()"> customers </a> </li>
                <li> <a onclick="getVehicles()"> vehicles </a> </li>
                <li> <a onclick="getClaims()"> claims </a> </li>
                <li> <a onclick="showPayments()"> payments </a> </li>
                <li> <a style="background-color: red;" href='./logout.php'>Logout</a> </li>
            </ul>
        </div>
        <h1 class="admin_welcome " style="margin-top: 30px;">

        </h1>
        <div id="dashBoard" style="margin-bottom:40px">

            <div class="card">
                <p>Total customers</p>
                <h2 id="cusCount"></h2>
                <img class="cusLoad hidden" style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" style="margin:auto" width="18px" src="public/images/ajax-loader.gif">
            </div>
            <div class="card">
                <p>Total registered Vehicles</p>
                <h2 id="veCount"></h2>
                <img class="veLoad hidden" style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" style="margin:auto" width="18px" src="public/images/ajax-loader.gif">
            </div>
            <div class="card">
                <p>Total Sucessfully claims</p>
                <h2 id="clCount"></h2>
                <img class="clLoad hidden" style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" style="margin:auto" width="18px" src="public/images/ajax-loader.gif">
            </div>
            <div class="card">
                <p>Total Payments</p>
                <h2 id="payCount"></h2>
                <img class="payLoad hidden" style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" style="margin:auto" width="18px" src="public/images/ajax-loader.gif">
            </div>

        </div>

        <div class="addVform hidden" style="padding:10px;margin:auto;width:50%">
            <div class="row">
                <h1 class="col-6">Add new vehicle</h1>
                <button id="closeForm" onclick="closeForm()" style="float:right">x</button>
            </div>

            <div class="row ">
                <div class="col-4">
                    <label for="cid">Customer ID</label>
                    <select id="customerIds">
                    </select>
                    <span id="cname" style="margin-top: 10px;"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="vtype">Vehicle Type</label>
                    <select name="vtype" style="margin-top: 5px;" id="vtype">
                        <option value="Motor Car">Motor Car</option>
                        <option value="Motor Bike">Motor Bike</option>
                        <option value="Three Wheel">Three Wheel</option>
                        <option value="Commercial vehicle">Commercial Vehicle</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="itype">Insurance Type</label> <br>
                    <select name="itype" style="margin-top: 5px;" id="itype">
                        <option value="third">third party</option>
                        <option value="full">full insurance</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="mvalue">Market Value</label>
                    <input type="text" id="value">
                </div>

            </div>

            <div class="row">
                <div class="col-4">
                    <label for="make">Make</label>
                    <input type="text" id="make">
                </div>
                <div class="col-4">
                    <label for="model">Model</label>
                    <input type="text" id="model">
                </div>
                <div class="col-4">
                    <label for="fuel">Fuel type</label>
                    <input type="text" id="fuel">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="year">Year</label>
                    <input type="text" id="year">
                </div>
                <div class="col-4">
                    <label for="reg">Register No</label>
                    <input type="text" id="reg">
                </div>
                <div class="col-4">
                    <label for="chassi">Chassis No</label>
                    <input type="text" id="chassis">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="color">Color</label>
                    <input type="text" id="color">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <input type="button" id="createBtn" name="create" onclick="addNewVehicle()" value="add vehicle">
                </div>
            </div>


        </div>


        <img class="processing hidden" style="margin-left:auto;margin-right:auto;margin-top:40px;margin-bottom:40px" width="24px" src="public/images/ajax-loader.gif">



        <div id="customers" class="hidden" style="overflow-x: auto;margin-top:30px">


        </div>


        <div id="vehicles" class="hidden" style="overflow-x: auto;margin-top:30px">


        </div>

        <div id="allclaims" class="hidden" style="overflow-x: auto;margin-top:30px">


        </div>

        <div id="payments" class="hidden" style="overflow-x: auto;margin-top:30px">

        </div>



    </div>
    <script src="./public/js/admin.js"></script>
    <script src="./public/js/create_text_box.js"></script>
    <script>
        var greeting;
        var time = new Date().getHours();
        if (time < 10) {
            greeting = "Good morning";
        } else if (time < 20) {
            greeting = "Good day";
        } else {
            greeting = "Good evening";
        }
        document.querySelector(".admin_welcome").innerHTML = greeting;
    </script>

    <?php include_once "./includes/footer.php" ?>

</body>

</html>
