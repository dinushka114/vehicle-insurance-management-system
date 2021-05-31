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

	<style>
		footer {
			margin-top: 0 !important;
		}

		#msgBtn{
			border: none;
			display: block;
			margin: auto;
			padding: 10px;
			background-color: #333;
			color: white;
		}

		#msgBtn:hover{
			cursor: pointer;
			background-color: dodgerblue;
		}


	</style>

</head>

<body style="background-color: #f2f2f2;">
	<?php include_once "./includes/header.php" ?>

	<div class="row">
		<div class="col-6" >
			<img style="padding: 0;border:5px solid #333" src="./public/images/about.jpg" style="margin: 0;" width="100%;" alt="">
		</div>

		<div class="col-6">
			<div id="about" style="text-align: center;">
				<h1 style="padding: 20px;">About us</h1>
				<p>Welcome to guard insurance, your number one source for all things of vehicle insurance. We're dedicated to providing you the best of insurance, with a focus on dependability. customer service, and quality of us.


					We're working to turn our passion for vehicle insurance into a booming online store. We hope you enjoy our products as much as we enjoy offering them to you.


				</p>

			</div>

			<div>
				<p style="font-weight: bold; text-align:center;margin:10px">
					Sincerely,

					Gurad insurance team
				</p>

				<button onclick="redirectPage()" id="msgBtn">Send message</button>
			</div>
		</div>
	</div>

	<script>
		function redirectPage(){
			window.location.href="contact_us.php"
		}
	</script>
	<?php include_once "./includes/footer.php" ?>
</body>

</html>