<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Guard insurance | Home</title>
</head>

<body>

    <?php include_once "./includes/header.php" ?>

    <div class="slider">
        <div>
            <img id="slide" style="width:100%;height:auto;" alt="image" />
            <div class="text">Your best vehicle Insurance Serivce Provider</div>
        </div>

        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
    </div>
    <div class="dotSection" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <div class="wrapper">
        <div class="services">
            <h1>Why choose us</h1>
            <div class="row">
                <div class="col-4 service_1">
                    <img src="./public/images/pay_online.jpg" width="100%" height="auto" alt="">
                    <p>Buy or pay online and enjoy 6 / 12 months 0%&nbsp;interest&nbsp;installment plans for Commercial Bank Credit cards You have to select the installment plan in our platform when performing the transaction&#8230;</p>

                </div>
                <div class="col-4 service_2">
                    <img src="./public/images/best_services.jpg" width="100%" height="auto" alt="">
                    <p> We give you our best services.Payment, insurance purchases, customer service support are all available under our web site</p>

                </div>
                <div class="col-4 service_3">
                    <img src="./public/images/money.jpg" width="100%" height="auto" alt="">
                    <p>Buy or pay online and enjoy&nbsp;0%&nbsp;interest&nbsp;installment plans for below&nbsp;Credit cards; HSBC Schems - 3, 6 and 12 months Min&nbsp;amount - Rs.25,000&nbsp; &nbsp;/ Max amount - Rs.800,000&#8230;</p>

                </div>
            </div>
        </div>

    </div>

    <div id="myModal" class="modal hidden">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div>

    <div class="wrapper">
        <h1 style="margin-top: 100px;text-align:center;color:#333">Get sample quotation</h1>
        <div class="quotation" id="quoteSection">
            <form action="" onsubmit="return getQuote(this)">
                <div class="vehicle-type">
                    <div class="car" onclick="selectVehicleType(1)">
                        <img src="./public/images/motor-car.png" width="60px" alt="motor car">

                    </div>
                    <div class="bike" onclick="selectVehicleType(2)">
                        <img src="./public/images/motorcycle.png" width="60px" alt="motor bike">

                    </div>
                    <div class="three" onclick="selectVehicleType(3)">
                        <img src="./public/images/tuk-tuk.png" width="60px" alt="three wheeler">

                    </div>
                    <div class="other" onclick="selectVehicleType(4)">
                        <img src="./public/images/vehicle.png" width="60px" alt="commercial">

                    </div>

                </div>

                <div id="quote" class="col-6" style="float: right;">
                    <h1 id="price"></h1>
                    <img class="processing hidden" width="24px" src="public/images/ajax-loader.gif">
                </div>

                <div class="row">
                    <div class="col-6">
                        <p style="font-weight: bold;">Vehicle type : <span id="t">select vehicle type</span> </p>
                        <p id="vtype_error" class="hidden" style="color: white;background-color:red;padding:5px">select vehicle type</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="make">Make</label>
                        <input id="make" required type="text" name="make">
                    </div>
                    <div class="col-4">
                        <label for="make">Model</label>
                        <input id="model" required type="text" name="model">
                    </div>
                    <div class="col-4">
                        <label for="value">Market value</label>
                        <input id="value" required type="text" name="value">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="year">Year of manufacture</label>
                        <input id="year" required type="text" name="year">
                    </div>
                    <div class="col-6">
                        <label for="make">Fuel type</label>
                        <select required name="" id="fuelType">
                            <option value="select">Select Fuel type</option>
                            <option value="d">Diesel</option>
                            <option value="p">Petrol</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="ins_type">Insurance type</label>
                        <select required name="" id="itype">
                            <option value="select">Select Insurance type</option>
                            <option value="full">Full Insurance</option>
                            <option value="third">Third party Insurance</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" id="quotBtn" name="quote" value="Get Quote" style="width: 100%;">
                    </div>
                </div>

            </form>
        </div>
    </div>


    <div class="call_us_main">
        <div class="wrapper">
            <h1>+94 77 23 34 231</h1>
            <h3>Call Us if you have any question</h3>
        </div>
    </div>

    <div class="wrapper">
        <div class="clients">
            <h1>What Our client say</h1>
            <div class="row">
                <div class="client_1 col-4">
                    <img src="public/images/avatar_1.png" width="100px" alt="">
                    <p>I had a good experience with guard insurance company.
                        Very simple to use, friendly website. Got good deal without agent calling or speaking to anyone.</p>
                    <h3>John Doe</h3>
                </div>
                <div class="client_1 col-4">
                    <img src="public/images/avatar_2.png" width="100px" alt="">
                    <p>I just wanted to thank you all for your hard work and assistance with my insurance claim. It’s been a very difficult time, and your speedy responses and help have been a breath of fresh air amidst it all.</p>
                    <h3>Katherine Lisa</h3>
                </div>
                <div class="client_1 col-4">
                    <img src="public/images/avatar_3.png" width="100px" alt="">
                    <p>Guard insurance has been, and is, a real blessing to our people, and I receive many appreciative comments about it.</p>
                    <h3>Rebecca Sally</h3>
                </div>
            </div>
        </div>


    </div>

    <?php include_once "./includes/footer.php" ?>

    <script src="./public/js/main.js"></script>
</body>

</html>