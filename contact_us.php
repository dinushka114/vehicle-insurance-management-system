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
    <title>Contact Us</title>


</head>

<body>

    <?php include_once "./includes/header.php" ?>

    <div class="wrapper">
        <div class="about_company">
            <div class="row">
                <div class="col-4">
                    <img src="public/images/phone.png" alt="phone">
                    <p>+94 77 23 34 567</p>
                    <p>+94 77 23 34 567</p>
                </div>
                <div class="col-4">
                    <img src="public/images/location.png" alt="location">
                    <div id="address">
                        <p>Guard Insurance Company </p>

                        <p> New Kandy Road</p>

                        <p>Malabe</p>

                        <p> Sri Lanka</p>
                    </div>
                </div>
                <div class="col-4">
                    <img src="public/images/email.png" alt="email">
                    <p>guardinsu@gmail.com</p>
                </div>
            </div>
        </div>



        <div id="contact" style="background-color: #f2f2f2;margin-bottom:40px">
            <h1 style="text-align: center;padding-top:20px;margin-bottom:10px;">Get in touch with us</h1>
            <div class="row">
                <div class="col-6">
                    <form action="" method="POST" onsubmit="return newContact(this)">

                        <p class="hidden error" style="text-align: center;background-color: red;color: #f2f2f2;padding: 10px;margin-bottom: 5px">Please fill data</p>

                        <p class="hidden email_error" style="text-align: center;background-color: red;color: #f2f2f2;padding: 10px">Invalid Email</p>

                        <label for="firstName">First Name</label>
                        <input type="text" required name="firstName">

                        <label for="lastName">Last Name</label>
                        <input type="text" required name="lastName">

                        <label for="contact">Contact No</label>
                        <input type="tel" required minlength="10" maxlength="10" pattern="^\d{10}$" name="contact">

                        <label for="email">Email</label>
                        <input type="email" required name="email">

                        <label for="subject">Subject</label>
                        <input type="text" required name="subject">

                        <label for="message">Message</label>
                        <textarea name="message" required id="" rows="3"></textarea>

                        <input type="submit" name="submit" value="send message">
                        <img class="processing hidden" width="24px" src="public/images/ajax-loader.gif">

                    </form>
                </div>
                <div class="col-6 location">
                    <iframe id="map" width="430px" height="390px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=79.97171670198442%2C6.913480944042085%2C79.97427552938463%2C6.915467319140525&amp;layer=mapnik" style="border: none;margin-left: 30px;margin-top: 26px"></iframe>

                </div>
            </div>
        </div>

        <div class="hidden thanks">
            <img src="public/images/success.png">
            <h3 style="color: #333;">Thanks for contact with us</h3>
        </div>

    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/contact_us.js" type="text/javascript">

    </script>




</body>

</html>