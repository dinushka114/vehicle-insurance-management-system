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
    <title>My Account | <?php if ($_SESSION) {
                            echo $_SESSION["username"];
                        } ?></title>


</head>

<body>
    <?php include_once "./includes/header.php" ?>


    <div class="wrapper">
        <h1>Page not found</h1>
    </div>





    <?php include_once "./includes/footer.php" ?>

</body>

<script src="./public/js/my_account.js">

</script>

</html>