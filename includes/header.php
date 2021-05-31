<header>
    <div style="background-color: dodgerblue;padding-top:5px;padding-bottom:5px;">
        <div class="wrapper">
            <!-- <p style="float:left;">guard insurance company</p> -->
            <p style="text-align: end;color:white">

                <?php
                if (!isset($_SESSION["adminID"]) && !isset($_SESSION["userID"])) {
                    echo "<a style='text-decoration: none;color:white' href='./my_account.php'> my account </a> |";
                    echo "<a style='text-decoration: none;color:white' href='./login.php'> login</a>";
                } else if (isset($_SESSION["adminID"]) && isset($_SESSION["user"]) == "admin") {
                    echo "<a style='text-decoration: none;color:white' href='./admin.php'> admin </a> |";
                    echo "<a style='text-decoration: none;color:white;cursor:pointer' href='./logout.php' > logout</a>";
                } else if (isset($_SESSION["userID"]) && isset($_SESSION["user"]) == "customer") {
                    echo "<a style='text-decoration: none;color:white' href='./insurance_details.php'>register vehicle</a> |";
                    echo "<a style='text-decoration: none;color:white' href='./my_account.php'> my account</a> |";
                    echo "<a style='text-decoration: none;color:white;cursor:pointer' href='./logout.php' > logout</a>";
                }
                ?>


            </p>
        </div>
    </div>
    <div class="upper-header clearfix">
        <div class="wrapper">
            <div class="title">
                <div class="title_box">
                    <h1 id="brand_name"> <strong><span class="brand">g u a r d</span> i n s u r a n c e</h1></strong>
                    <!-- <p>Best Insurance Service provider in srilanka</p> -->

                </div>
            </div>
            <div class="login">
                <button onclick="window.location.href='register_user.php'" id="joinbtn">join with us</button>
            </div>
        </div>
    </div>
    <div class="navbar">
        <nav class="wrapper clearfix">
            <ul id="navigation-menu">
                <li> <a <?php if (stripos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
                            echo 'class="active"';
                        } ?> href="index.php">Home</a> </li>

                <li> <a <?php if (stripos($_SERVER['REQUEST_URI'], 'all_insurance.php') !== false) {
                            echo 'class="active"';
                        } ?> href="./all_insurance.php">All Insurance</a> </li>
                <li> <a <?php if (stripos($_SERVER['REQUEST_URI'], 'faq.php') !== false) {
                            echo 'class="active"';
                        } ?> href="./faq.php">FAQ</a> </li>
                <li> <a <?php if (stripos($_SERVER['REQUEST_URI'], 'contact_us.php') !== false) {
                            echo 'class="active"';
                        } ?> href="contact_us.php">Contact Us</a> </li>
                <li> <a <?php if (stripos($_SERVER['REQUEST_URI'], 'about.php') !== false) {
                            echo 'class="active"';
                        } ?> href="about.php">About Us</a> </li>


            </ul>

        </nav>

</header>
