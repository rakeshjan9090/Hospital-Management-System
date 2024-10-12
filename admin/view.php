<?php 

	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor | Manage Patients</title>
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/vendor/themify-icons/themify-icons.min.css">
	<link href="admin/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
	<?php 

		include("../include/header.php");
		include("../include/connection.php");
		
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -30px;">
	 				<?php 
	 					include("sidenav.php");
	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="text-center my-3">View patient Details</h5>
	 				<?php 

	 					if (isset($_GET['id'])) {
	 						
	 						$id = $_GET['id'];

	 						$query = "SELECT * FROM patient WHERE id = $id";
	 						$res = mysqli_query($connect, $query);

	 						$row = mysqli_fetch_array($res);
	 					}

	 				 ?>

	 				 <div class="col-md-12">
	 				 	<div class="row">
	 				 		<div class="col-md-3"></div>
	 				 		<div class="col-md-6">
	 				 			
	 				 			<?php 

	 				 				echo "<img src='../patient/img/".$row['profile']."' class='col-md-12 my-2' style='height: 250px;'>";

	 				 			 ?>

	 				 			<table class="table table-bordered">
	 				 				<tr>
	 				 					<th class="text-center" colspan="2">Details</th>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Firstname</td>
	 				 					<td><?php echo $row['firstname']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Surname</td>
	 				 					<td><?php echo $row['surname']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Username</td>
	 				 					<td><?php echo $row['username']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Emailname</td>
	 				 					<td><?php echo $row['email']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Phone</td>
	 				 					<td><?php echo $row['phone']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Gender</td>
	 				 					<td><?php echo $row['gender']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Country</td>
	 				 					<td><?php echo $row['country']; ?></td>
	 				 				</tr>
	 				 				<tr>
	 				 					<td>Date Registerd</td>
	 				 					<td><?php echo $row['date_reg']; ?></td>
	 				 				</tr>

	 				 			</table>
	 				 		</div>
	 				 	</div>
	 				 </div>

	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>