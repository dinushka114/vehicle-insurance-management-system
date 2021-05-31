<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet"> -->
    <title>About us | guardinsurance.lk</title>
</head>

<style>
    #bigImage {
        height: 200px;
        width: 100%;
        overflow: hidden;
    }

    #bigImage img {
        width: 100%;
        /* height: auto; */
        overflow: hidden;
    }

    .content h2 {
        text-transform: uppercase;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .content .types {
        margin-top: 20px;
    }

    .content .types div {
        background-color: dodgerblue;
        color: white;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .content .types div:hover {
        cursor: pointer;
    }

    .motorCar ul {
        margin-left: 50px;
    }

    .motorCycle ul {
        margin-left: 50px;
    }

    .threeWheel ul {
        margin-left: 50px;
    }

    .commercial ul {
        margin-left: 50px;
    }

    #details>div {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 20px;
        margin-top: 30px;
    }

    #details h1,
    h2 {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .types div:hover {
        background-color: #f2f2f2;
        color: #333;
    }
</style>

<body>
    <?php include_once "./includes/header.php" ?>
    <div id="bigImage">
        <img src="./public/images/imgLogo.jpg" alt="">
    </div>

    <div class="wrapper">
        <div class="content">
            <h2>Motor insurance</h2>
            <p id="des">Road accidents are a nightmare for everyone. That’s where we come into play. Motor Insurance in Sri Lanka has never been easier with a range of solutions available for all types of vehicles, be it a car, truck, motorbike or hybrid. So, the next time your vehicle takes a hit, we will weather the hit for you. Find out more about our policy coverages now.</p>

            <div class="row types">
                <div class="col-2" onclick="seeData(1)">
                    <img src="./public/images/motor-car.png" width="30px" alt="">
                    <p>Motor Car</p>
                </div>
                <div class="col-2" onclick="seeData(2)">
                    <img src="./public/images/motorcycle.png" width="30px" alt="">
                    <p>Motor Cycle</p>
                </div>
                <div class="col-2" onclick="seeData(3)">
                    <img src="./public/images/tuk-tuk.png" width="30px" alt="">
                    <p>Three Wheel</p>
                </div>
                <div class="col-3" onclick="seeData(4)">
                    <img src="./public/images/vehicle.png" width="30px" alt="">
                    <p>Commercial Vehicle</p>
                </div>
            </div>

        </div>

        <div id="details">
            <div class="motorCar hidden">
                <h1>Motor Car</h1>
                <h2>What does the policy cover</h2>
                <p>Losses/damages caused by:</p>
                <ul>
                    <li>Accident</li>
                    <li>Fire</li>
                    <li>External explosion</li>
                    <li>Self-ignition</li>
                    <li>Lightning</li>
                    <li>Theft of vehicle or parts</li>
                    <li>Malicious act</li>
                    <li>3rd party damages (Unlimited bodily injuries cover & Rs.5 mn property damage cover)</li>
                    <li>Strikes, Riots and Civil Commotion (SRCC)</li>
                    <li>Specified natural perils (According to the policy schedule)</li>
                </ul>

                <h2>Free Covers</h2>
                <ul>
                    <li>A free towing cover up to a maximum of Rs.10,000 per annum.</li>
                    <li>Free accidental hospitalization cover (including ambulance service) worth Rs.5,000 per day up to a maximum of Rs.50,000 per annum. (Excluding the first 2 days)</li>
                    <li>A 100% airbag cover per annum for first event of the year.</li>
                    <li>If the repair takes more than 4 days, from the 5th day onwards you will get a taxi/rental allowance of Rs.1,500 for a maximum of 10 days.</li>
                    <li>Free personal accident cover up to a maximum Rs.1,000,000 for 4 persons (including insured) per annum. (Maximum Rs.250,000 per person)</li>
                    <li>A special windscreen cover worth maximum of Rs.10,000 per annum.</li>
                </ul>

                <h2>Additional covers</h2>
                <p>You can also obtain the following covers for an added premium.</p>
                <ul>
                    <li>Repairs by the agent if your vehicle age is within 5 years or less</li>
                    <li>Extended towing charges</li>
                    <li>Learner driver</li>
                    <li>Extended personal accident benefits</li>
                    <li>Terrorism</li>
                    <li>Extended special windscreen and window glass cover</li>
                </ul>
            </div>
            <div class="motorCycle hidden">
                <h1>Motor Cycle</h1>
                <h2>What does the policy cover</h2>
                <p>Losses/damages caused by:</p>
                <ul>
                    <li>Accident</li>
                    <li>Fire</li>
                    <li>External explosion</li>
                    <li>Self-ignition</li>
                    <li>Lightning</li>
                    <li>Theft of vehicle or parts</li>
                    <li>Malicious act</li>
                    <li>3rd party damages (Unlimited bodily injuries cover & Rs.5 mn property damage cover)</li>
                    <li>Strikes, Riots and Civil Commotion (SRCC)</li>
                    <li>Specified natural perils (According to the policy schedule)</li>
                </ul>

                <h2>Free covers</h2>

                <ul>
                    <li>You also get, a free accidental hospitalization cover (including ambulance service) worth Rs.5,000 per day up to a maximum of Rs.50,000 per annum ABSOLUTELY FREE. (Excluding the first 2 days)</li>
                </ul>

                <h2>Additional covers</h2>
                <ul>
                    <li>Personal accident benefits</li>
                    <li>Extended towing charges</li>
                    <li>Terrorism</li>
                    <li>Learner driver</li>
                    <li>Third party property damage extension</li>

                </ul>

            </div>



            <div class="threeWheel hidden">
                <h1>Three Wheel</h1>
                <h2>What does the policy cover</h2>
                <p>Losses/damages caused by:</p>
                <ul>
                    <li>Accident</li>
                    <li>Fire</li>
                    <li>External explosion</li>
                    <li>Self-ignition</li>
                    <li>Lightning</li>
                    <li>Theft of vehicle or parts</li>
                    <li>Malicious act</li>
                    <li>3rd party damages (Unlimited bodily injuries cover & Rs.5 mn property damage cover)</li>
                    <li>Strikes, Riots and Civil Commotion (SRCC)</li>
                    <li>Specified natural perils (According to the policy schedule)</li>
                </ul>

                <h2>Free covers</h2>

                <ul>
                    <li>You also get, a free accidental hospitalization cover (including ambulance service) worth Rs.5,000 per day up to a maximum of Rs.50,000 per annum ABSOLUTELY FREE. (Excluding the first 2 days)</li>
                </ul>

                <h2>Additional covers</h2>
                <ul>
                    <li>Personal accident benefits</li>
                    <li>Extended towing charges</li>
                    <li>Terrorism</li>
                    <li>Learner driver</li>
                    <li>Third party property damage extension</li>

                </ul>

            </div>
            <div class="commercial hidden">
                <h1>Commercial Vehicle</h1>
                <h2>What does the policy cover</h2>
                <p>Losses/damages caused by:</p>
                <ul>
                    <li>Accident</li>
                    <li>Fire</li>
                    <li>External explosion</li>
                    <li>Self-ignition</li>
                    <li>Lightning</li>
                    <li>Theft of vehicle or parts</li>
                    <li>Malicious act</li>
                    <li>3rd party damages (Unlimited bodily injuries cover & Rs.5 mn property damage cover)</li>
                    <li>Strikes, Riots and Civil Commotion (SRCC)</li>
                    <li>Specified natural perils (According to the policy schedule)</li>
                </ul>

                <h2>Free Covers (FOR DUAL PURPOSE PRIVATE USE VEHICLES ONLY)</h2>

                <ul>
                    <li>Free towing cover worth maximum of Rs.10,000 per annum.</li>
                    <li>Free accidental hospitalization cover (including ambulance service) worth Rs.5,000 per day up to a maximum of Rs.50,000 per annum. (Excluding the first 2 days)</li>
                    <li>Free 100% airbag cover per annum for first event of the year.</li>
                    <li>Free personal accident benefit cover, maximum Rs.1,000,000, for 5 persons (including insured) per annum. (Maximum Rs.200,000 per person)</li>
                    <li>Free special windscreen cover maximum of Rs.10,000 per annum.</li>
                </ul>

                <h2>Additional covers</h2>
                <p>You can also obtain the following covers for an added premium.</p>

                <ul>
                    <li>Repairs by the agent if your vehicle age is within 5 years or less</li>
                    <li>Extended personal accident benefit cover for driver/cleaners/passengers</li>
                    <li>Workmen compensation cover for driver/cleaners</li>
                    <li>Third party property damage extension</li>
                    <li>Enhanced airbag cover</li>
                    <li>Extended towing charges</li>
                    <li>Learner driver</li>
                    <li>Terrorism</li>
                    <li>Extended special windscreen and window glass cover</li>
                    <li>Theft of parts (Exclusively for dual purpose vehicles)</li>
                </ul>
            </div>
        </div>
    </div>

    <?php include_once "./includes/footer.php" ?>
    <script src="./public/js/all_insurance.js"></script>
</body>

</html>