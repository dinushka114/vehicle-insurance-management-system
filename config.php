 <?php

$servername = "us-cdbr-east-03.cleardb.com";
$username = "bbb10c4c99d864";
$password = "c356e2ed";
$database = "heroku_bee922821906006";


// Create connection
$conn = mysqli_connect($servername, $username, $password , $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?> 
