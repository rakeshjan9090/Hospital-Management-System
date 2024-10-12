<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Income</title>
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
	 				<h5 class="text-center my-2">Total Income</h5>

	 				<?php 
	 					
	 					$query = "SELECT * FROM income";

	 					$res = mysqli_query($connect, $query);

	 					$output = "";

	 					$output .= "

	 					<table class='table table-bordered'>
	 						<tr>
	 							<td>ID</td>
	 							<td>Doctors</td>
	 							<td>Patient</td>
	 							<td>Date_discharge</td>
	 							<td>Amount Paid</td>
	 						</tr>
	 					

	 					";

	 					if (mysqli_num_rows($res)<1) {
	 						 
	 						$output .= "
	 							<tr>
	 								<td class='text-center' colspan='5'>No Patent Discharge yet.</td>
	 							</tr>
	 						";
	 					}

	 					while ($row = mysqli_fetch_array($res)) {
	 						
	 						$output .= "

	 							<tr>
	 								<td>".$row['id']."</td>
	 								<td>".$row['doctor']."</td>
	 								<td>".$row['patient']."</td>
	 								<td>".$row['date_discharge']."</td>
	 								<td>".$row['amount_paid']."</td>
	 							</tr>
	 						";
	 					}

	 					$output .= "</tr></table>";

	 					echo $output;
	 				 ?>
	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>