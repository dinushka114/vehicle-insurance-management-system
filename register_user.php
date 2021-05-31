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
    <title>Join with us</title>
</head>

<style>

</style>

<body onload="getProvinces()">

    <?php include_once "./includes/header.php" ?>

    <div class="wrapper" id="reg_user">
        <div class="row">
            <div class="register_title col-4">
                <!-- <img src="public/images/user.png" width="50px" alt="avatar"> -->
                <h1 style="font-weight: bolder">Join with Us</h1>
            </div>
        </div>

        <div id="validation-errors" class="col-12">

        </div>

        <form id="register_user"  action="" method="POST" onsubmit="return userRegister(this)">
            <div class="row">
                <div class="col-2">
                    <label for="salutation">Title</label>
                    <select name="" id="title" style="margin-top:5px">
                        <option value="Mr.">Mr</option>
                        <option value="Mrs.">Mrs</option>
                        <option value="Ms.">Ms</option>
                        <option value="Miss.">Miss</option>
                    </select>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <label for="full name">Full name with initials <span class="req">*</span> </label>
                    <input type="text" name="nameWithinitials" placeholder="ex : A.B.C Silva">

                </div>
                <div class="col-12">
                    <label for="full name">Full Name <span class="req">*</span> </label>
                    <input type="text" name="fullName" placeholder="ex : Jhon Doe">
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <label for="email">Email <span class="req">*</span><img width="14px" class="hidden mail" src="public/images/ajax-loader.gif" alt=""></label>
                    <div id="user-found"></div>
                    <input type="email" id="emailInput" oninput="checkEmail()" placeholder="ex : abc@gmail.com" required name="email">
                </div>

                <div class="col-4">
                    <label for="nic">NIC Number <span class="req">*</span></label>
                    <input type="text" placeholder="ex : 12345678v or 19991232312" required name="nic">
                </div>

                <div class="col-4">
                    <label for="phone">Phone No <span class="req">*</span></label>
                    <input type="text" minlength="10" maxlength="10" placeholder="ex : 0661234567" required name="phone">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="dateOfBirth">Date of birth <span class="req">*</span></label>
                    <input type="date" required name="dob">
                </div>

                <div class="col-4">
                    <label for="gender">Gender <span class="req">*</span></label> <br>
                    <div class="radio-group" style="margin-top: 10px;">
                        <input type="radio" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="address">Address <span class="req">*</span></label>
                    <input type="text" required name="address_1" placeholder="adress no">
                    <input type="text" required name="address_2" placeholder="street">
                    <input type="text" name="address_3" placeholder="optional">
                </div>

                <div class="col-4">
                    <label for="district">Provice <span class="req">*</span><img width="14px" class="hidden pro" src="public/images/ajax-loader.gif" alt=""></label> <br>
                    <select required name="province" id="province">
                        
                    </select>

                    <br>
                    <label for="city">District <span class="req">* </span><img width="14px" class="hidden addr1" src="public/images/ajax-loader.gif" alt=""></label>
                    <br>
                    <select required name="" id="district">


                    </select>

                    <br>
                    <label for="city">City <span class="req">* </span><img width="14px" class="hidden addr2" src="public/images/ajax-loader.gif" alt=""></label>
                    <br>
                    <select required name="" id="city">

                    </select>
                </div>


                <div class="col-4">
                    <label for="zip">Zip code <span class="req">*</span></label>
                    <input type="text" placeholder="ex : 12345" required name="zip_code">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="password_1">Password <span class="req">*</span></label>
                    <input id="passwordInput" required type="password" name="password">
                    <img src="public/images/open.png" id="show-password" width="28px" alt="">
                </div>

                <div class="col-4">
                    <label for="password_2">Confirm Password <span class="req">*</span></label>
                    <input id="passwordConfirm" required type="password" name="password_2">
                </div>
            </div>

            <div class="row">
                <div class="col-6 hidden p-req">
                    <p id="chars" class="invalid">Minimum 8 charactors</p>
                    <p id="lower" class="invalid">1 lowercase</p>
                    <p id="upper" class="invalid">1 uppercase</p>
                    <p id="number" class="invalid">1 number</p>
                    <p id="special" class="invalid">1 special charactor !@#$%?=*&</p>
                    <p id="same" class="invalid">password confimation must be same</p>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="checkbox" id="agree">
                    <label for="agree">I agree to terms of service and privay policy</label>
                </div>
            </div>

            <br>

            <input id="registerBtn" type="submit" name="submit" value="processed to next step">
            <img class="processing hidden" width="24px" src="public/images/ajax-loader.gif">

            <p style="padding-bottom: 20px;" id="loginLink">If you already have an account <a href="./login.php" style="text-decoration: none;">log in</a> here </p>

        </form>

    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/register_page.js"></script>

</body>

</html>