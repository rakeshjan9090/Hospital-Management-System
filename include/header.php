<?php error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<!-- <link rel="stylesheet" href="https://kit.fontawesome.com/ac325822a8.css" crossorigin="anonymous"> -->
	<script src="https://kit.fontawesome.com/ac325822a8.js" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" type="text/css" href="./include/drop.css">-->
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<a href="index.php">
			<h5 class="text-white">Hospital Management System</h5>
		</a>
		<!-- Just an image -->
		<!-- <img src="../hms/img/logo2.jpg"> -->
		<!-- <div class="container">
		    <a class="navbar-brand" href="index.php">
		      <img src="../hms/img/logo2.jpg" class="me-2" height="40" alt="Hospital"
		        loading="lazy" />
		    </a>
		</div> -->
		<div class="mr-auto"></div>

		<ul class="navbar-nav">
			<?php

				if (isset($_SESSION['admin'])) {
					
					$user = $_SESSION['admin'];
					echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
						
					';
				}else if (isset($_SESSION['doctor'])) {
					$user = $_SESSION['doctor'];
					echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>	
					';
				}else if(isset($_SESSION['patient'])) {
					$user = $_SESSION['patient'];
					echo '
						<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
						
					';
				}else{
					echo '
					<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
					<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
					<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
					<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
					';
				}
				

			 ?>
			<!-- <i class="fa-solid fa-right-from-bracket"></i> -->
		</ul>
	</nav>
	
</body>
</html>