<?php
$conn = new mysqli("localhost","root","","store_db");
?>
				<div class="row p-3">
					<div class="col-sm-9">
					<h1><a href="index.php" class="text-success text-decoration-none" >Store Management System</a></h1>
					</div>
					
					<div class="col-sm-3">
					<p><?php echo $user_first_name .' '.$user_last_name?><a href="logout.php" class="text-white text-decoration-none btn btn-success py-1 m-0"> Logout </a></p>
					</div>
				</div>