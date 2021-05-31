<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["isAuthenticated"]) == true) {
    header("location:my_account.php");
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
    <title>Login</title>
</head>

<style>
    .login-form {
        margin: auto;
        width: 50%;
        padding: 10px;
        margin-top: 80px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .login-form h2 {
        text-align: center;
        padding: 10px;
        font-size: 30px;
    }

    .login-form h4 {
        padding: 5px;
        font-size: 20px;
    }

    .login-form .select-menu {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }


    .login-form input[type="text"] , input[type="password"]{
        width: 100%;
        border: 1px solid #333;
        padding: 5px;
    }

    .login-form input[type="submit"]{
        background-color: dodgerblue;
        color: white;
        border: none;
        padding: 10px;
        margin-top: 10px;
    }

    .login-form input[type="submit"]:hover{
        background-color: #333;
        color: white;
        cursor: pointer;
        
    }

    .customer-login a{
        text-decoration: none;
        font-size: 14px;
        color: #333;
        font-weight: bold;
    }
    .customer-login p{
        margin-top: 5px;
    }

    .customer-login a:hover{
        color: dodgerblue;
    }

</style>

<body>
    <?php include_once "./includes/header.php" ?>
    <div class="login-form">
        <h2>Login</h2>
        <h4>I am a</h4>
        <div class="select-menu">
            <select onchange="selectUsers()" id="selectUser">
                <option value="select">Select user type</option>
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <div class="customer-login hidden">
          
            <form style="margin-top: 50px;" onsubmit="return customerLogin(this);">
            <h1>Customer Login</h1>
                <label for="email">Email</label>  <p style="color: red;" class="hidden email-error">Email Not Found!!</p>
                <input type="email" required name="email">
                <label for="password">Password</label> <p style="color: red;" class="hidden psw-error">Password is wrong!!</p>
                <input type="password" required name="password">
                <input type="submit" name="submit" value="login">
                <img width="14px" class="cus-login hidden" src="./public/images/ajax-loader.gif" alt="loader">

                <br>
                <p> <a href="./reset_pwd.php">Forget password ?</a> </p>
                <p> <a href="register_user.php"> dont have an account? sign up free </a> </p>
            </form>
        </div>

        <div class="admin-login hidden">
            <form action="" style="margin-top: 50px;" onsubmit="return adminLogin(this)">
            <h1>Admin Login</h1>
                <label for="id">admin Id</label> <p style="color: red;" class="hidden id-error">Admin Id Not Found!!</p>
                <input type="text" required name="adminId">
                <label for="password">Password</label> <p style="color: red;" class="hidden p-error">Password is wrong!!</p>
                <input type="password" required name="password">
                <input type="submit" name="submit" value="login">
                <img width="14px" class="ad-login hidden" src="./public/images/ajax-loader.gif" alt="loader">

            </form>
        </div>


        <div class="errors">

        </div>

    </div>
    <?php include_once "./includes/footer.php" ?>

    <script src="./public/js/login.js"></script>
</body>



</html>
