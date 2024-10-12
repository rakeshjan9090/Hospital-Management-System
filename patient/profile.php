<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Profile Page</title>
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
	 					
	 					$patient = $_SESSION['patient'];
						$query = "SELECT * FROM patient WHERE username='$patient'";

						$res = mysqli_query($connect, $query);

						$row = mysqli_fetch_array($res);
	 				 ?>
	 			</div>
	 			<div class="col-md-10">
 					<div class="col-md-12">
 						<div class="row">
 							<div class="col-md-6">
 								
 								<?php
 									

 									if (isset($_POST['upload'])) {

 										$img = $_FILES['img']['name'];

 										if (empty($img)) {
 											
 										}else{
 											$query = "UPDATE patient SET profile='$img' WHERE username='$patient'";

 											$res = mysqli_query($connect, $query);

 											if ($res) {
 												move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
 											}
 										}
 									}

 								 ?>

 								 <form method="post" enctype="multipart/form-data">
 								 	<?php 

 								 		echo "<img src='img/".$row['profile']."' style='height: 250px;' class='col-md-8 my-3'>";

 								 	 ?>

 								 	 <input type="file" name="img" class="form-control my-1" >
 								 	 <input type="submit" name="upload" class="btn btn-info" value="Update Profile">
 								 </form>

 								 <div class="my-3">
 								 	<table class="table table-bordered">
 								 		<tr>
 								 			<th colspan="2" class="text-center">My Profile</th>
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
 								 			<td>Email</td>
 								 			<td><?php echo $row['email']; ?></td>
 								 		</tr>
 								 		<tr>
 								 			<td>Phone No.</td>
 								 			<td>+<?php echo $row['phone']; ?></td>
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
 								 			<td>Date</td>
 								 			<td><?php echo $row['date_reg']; ?></td>
 								 		</tr>
 								 			 								 			 								 			 								 			 								 			 								 			 								 			 								 		
 								 	</table>
 								 </div>

 							</div>
 							<div class="col-md-6">
 								<h5 class="text-center my-2">Change Username</h5>
 								<?php 

 								if (isset($_POST['update'])) {
 									$uname = $_POST['uname'];

 									if (empty($uname)) {
 										
 									}else{
 										$query = "UPDATE patient SET username='$uname' WHERE username='$patient'";

 										$res = mysqli_query($connect, $query);

 										if ($res) {
 											$_SESSION['patient'] = $uname;
 										}
 									}
 								}

 								 ?>
 								<form method="post">
 									<label>Change Username</label>
 									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
 									<br>
 									<input type="submit" name="update" class="btn btn-info" value="Update Username">
 								</form>
 								<br><br>

 								<h5 class="text-center my-2">Change Password</h5>
 								<?php 

 								if (isset($_POST['change'])) {
 									$old = $_POST['old_pass'];
 									$new = $_POST['new_pass'];
 									$con = $_POST['con_pass'];

 									$q = "SELECT * FROM patient WHERE username='$patient'";
 									$re = mysqli_query($connect, $q);
 									$row = mysqli_fetch_array($re);

 									if (empty($old)) {
 										echo "<script>alert('Enter old password')</script>";
 									}else if(empty($new)){
 										echo "<script>alert('Enter New password')</script>";
 									}else if($con != $new){
 										echo "<script>alert('Both password do not match')</script>";
 									}else if($old != $row['password']){
 										echo "<script>alert('Check the password')</script>";
 									}else{
 										$query = "UPDATE patient SET password='$new' WHERE username='$patient'";

 										mysqli_query($connect,$query);
 									}
 								}

 								 ?>
 								<form method="post">
 									<div class="form-group">
 										<label>Old Password</label>
	 									<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
 									</div>
 									<div class="form-group">
 										<label>New Password</label>
	 									<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
 									</div>
 									<div class="form-group">
 										<label>Confirm Password</label>
	 									<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
 									</div>
 									<br>
	 								<input type="submit" name="change" class="btn btn-info" value="Change Password">
 								</form>
 							</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>