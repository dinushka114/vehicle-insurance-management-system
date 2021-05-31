<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet"> -->
    <title>Payment</title>
</head>

<body>
    <?php include_once "./includes/header.php" ?>

    <div class="wrapper">

        <div class="payment">
            <div class="row">
                <div class="col-12">
                    <h2 id="pay"> You have to pay <?php echo "Rs" . $_GET["q"] . ".00/=" ?> </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="method">Payment Method</label><br>
                    <div id="methods">
                        <input type="radio" required name="method" id="method1" value="visa">
                        <img src="./public/images/visa.png" width="50px" alt="">
                        <input type="radio" name="method" required id="method2" value="master">
                        <img src="./public/images/master.png" width="50px" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="number">Card Number</label>
                    <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" maxlength="16" onkeyup="checkCard()" id="crdNum" required name="card_number">
                    <p style="color:red" class="hidden crdError">invalid card number</p>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="number">Expire Date</label>
                    <input type="text" placeholder="month" id="month" required name="card_number">
                </div>
                <div class="col-3">
                    <!-- <label for="number">Expire Date</label> -->
                    <input style="margin-top:24px" placeholder="year" id="year" required type="text" name="card_number">
                </div>
                <div class="col-6">
                    <label for="number">CVV</label>
                    <input type="text" id="cvv" placeholder="xxx" required name="card_number">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <img class="processing hidden" width="24px" style="margin:auto" src="public/images/ajax-loader.gif">
                    <p style="background-color: dodgerblue;padding:5px;color:white;text-align:center" id="sucess" class="hidden">Payment sucessfull</p>
                    <p style="background-color: red;padding:5px;color:white;text-align:center" id="invalid" class="hidden">Check card number</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="button" style="width:100%" value="pay" onclick="payment(<?php echo $_GET['id'] ?> ,<?php echo $_GET['q'] ?>)">
                </div>
            </div>

        </div>
    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/payment.js"></script>
</body>

</html>