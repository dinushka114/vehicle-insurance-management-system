<?php


session_start();
if (!isset($_SESSION["isAuthenticated"]) == true) {
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">  -->
    <title>Insurance Details</title>
</head>


<body>
    <?php include_once "./includes/header.php" ?>


    <div class="wrapper" id="insu_details">
        <div class="row">
            <div class="col-6">
                <h1>Insurance details</h1>

            </div>
        </div>

        <form action="">

            <div class="row">
                <div class="col-4">
                    <label for="vehicleType">Vehicle Type <span class="req">*</span> </label>
                    <select id='vSelectType' onchange="selectVtype()" style='margin-top:5px;'>
                        <option> Vehicle Type </option>
                        <option value='Car/SUV/Jeep'> Motor car </option>
                        <option value='MotorBike'> Motor Bike </option>
                        <option value='ThreeWheeler'> Three wheeler </option>
                        <option value='Commercial'> Commercial Vehicle </option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="in_type">Insurance Type<span class="req">*</span> </label>
                    <select id='insuranceType' onchange="activeOthres()" disabled style='margin-top:5px;'>
                        <option> Select Insurance Type </option>
                        <option value='full'> Full Insurance</option>
                        <option value='third'> Third Party </option>
                    </select>

                </div>

                <div class="col-4">
                    <label for="market_value">Market value<span class="req">*</span> </label>
                    <input type='text' disabled required name='marketValue' id='mValue'>
                </div>



            </div>

            <div class="row">
                <div class="col-4">
                    <label for="make">Vehicle Make<span class="req">*</span> </label>
                    <input type='text' disabled required name='make' id='make'>
                </div>

                <div class="col-4">
                    <label for="model">Vehicle Model<span class="req">*</span> </label>
                    <input type = 'text' disabled required  name ='model' id='model' >
                </div>

                <div class="col-4">
                    <label for="year">Vehicle Manuf. Year<span class="req">*</span> </label>
                    <input type = 'text' disabled disabled required  name ='year' id='year'>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="registerNumber">Vehicle Register number<span class="req">*</span> </label>
                    <input type="text" disabled required name="registerNumber" id="regNumber">
                </div>
                <div class="col-4">
                    <label for="chassisNumber">Vehicle Chassis number<span class="req">*</span> </label>
                    <input type="text" disabled required name="chassisNumber" id="chassNumber">
                </div>
                <div class="col-4">
                    <label for="color">Vehicle color<span class="req">*</span> </label>
                    <input type="text" disabled required name="color" id="color">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="fuel_type">Fuel Type<span class="req">*</span> </label> <br>
                    <select style="margin-top:5px;" disabled name="" id="fuel_type">
                        <option value="diesel">diesel</option>
                        <option value="petrol">petrol</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-6">

                    <h1 id="inPrice"> <img class="process hidden" width="24px" src="public/images/ajax-loader.gif"></h1>
                </div>
            </div>

        </form>

        <div class="row">
            <div class="col-12">

                <input type="button" id="showPay" value="show payment" onclick="showQuote()">
                <input type="button" id="toPay" disabled value="process to payment" onclick="saveAndPayment( <?php echo $_SESSION['userID']; ?> )">

            </div>

        </div>

    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/insurance_details.js"></script>

</body>

</html>