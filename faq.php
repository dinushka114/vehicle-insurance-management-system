<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>FAQ</title>
</head>
<style>

    .quiz{

        margin-top: 10px;
    }
    #qAndA div{
        margin-top: 10px;
        margin-bottom: 20px;
    }
    #qAndA div .id{
        font-weight: bold;
        font-size: 20px;
    }

    #qAndA div p{
        font-weight:lighter;
        font-size: 18px;
    }
</style>

<body>
    <?php include_once "./includes/header.php" ?>

    <div class="wrapper">

        <h1 style="margin-top: 20px;">Frequently Asked Quetions</h1>

        <div class="row quiz">
            <div class="col-6" style="padding-left: 0;">
                <div id="qAndA">
                    <div>
                        <p> <span class="id">Q:</span> How long does it take to get an insurance quote? </p>
                        <p><span class="id">A:</span> auto insurance online takes as little as 5 minutes when you use CoverHound.</p>
                    </div>

                    <div>
                        <p> <span class="id">Q:</span> What happens if I lie about my driving history? </p>
                        <p><span class="id">A:</span> If you lie about your driving history, the DMV reports that you are committing what is known as “soft fraud.” If you do lie, the insurance company can deny you services and cancel your coverage.</p>
                    </div>

                    <div>
                        <p> <span class="id">Q:</span> What does auto insurance cover? </p>
                        <p><span class="id">A:</span>Auto insurance covers you, your car and others involved in a vehicular accident.</p>
                    </div>

                    <div>
                        <p> <span class="id">Q:</span> Is auto insurance mandatory? </p>
                        <p><span class="id">A:</span> Yes, auto insurance is mandatory in every state across the U.S., but insurance carrying laws vary. To make sure you have the right insurance, visit your state government’s transportation website.</p>
                    </div>

                    <div>
                        <p> <span class="id">Q:</span> What is the cheapest policy? </p>
                        <p><span class="id">A:</span> The most affordable policy is auto liability. Though it is often recommended that you purchase more than this coverage type.</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img width="100%" src="./public/images/quiz.jpg" alt="">
            </div>
        </div>

    </div>

    <?php include_once "./includes/footer.php" ?>


</body>



</html>