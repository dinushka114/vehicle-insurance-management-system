<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet"> -->
    <title>reset password</title>
</head>

<body>
    <?php include_once "./includes/header.php" ?>

    <div class="wrapper">


        <form action="" onsubmit="return sendEmail(this)">
            <label for="email">Enter your email here:</label>
            <input type="email" required name="email" placeholder="example@gmail.com">

            <input type="submit" value="send email">

        </form>


    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/forget_pwd.js"></script>
</body>

</html>