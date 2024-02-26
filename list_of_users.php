<?php
$conn = new mysqli("localhost","root","","store_db");

session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name)){ 
?>

<!DOCTYPE html>
<html>
<head>
<title>List of Users</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container bg-light">
			
			<div class=	"container-fluid border-bottom border-success" > <!--start of topbar-->
				<?php include ('topbar.php'); ?>
			</div><!--end of topbar-->
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 bg-light p-0 m-0"›<!--start of leftbar-->
						
					<?php include ('leftbar.php'); ?>	
				   </div><!--end of leftbar col-sm-3-->
				   
				   <div class="col-sm-9 border-start border-success"> <!--start of rigth bar col-sm-9-->
					<div class= "container p-4 m-4">
					
							
					<?php
						
						echo "<table class='table table-success table-striped table-hover'>
						<tr><th>User First Name</th><th>User Last Name</th><th>User Email</th><th>User Password</th><th>Action</th></tr>";
						
						$sql="select * from users";
						$query=$conn->query($sql);
						while($data=mysqli_fetch_assoc($query))
						{
							$user_id			= $data['user_id'];
							$user_first_name	= $data['user_first_name'];
							$user_last_name		= $data['user_last_name'];
							$user_email			= $data['user_email'];
							$user_password		= $data['user_password'];
						echo "<tr>
						
						<td>$user_first_name</td>
						<td>$user_last_name</td>
						<td>$user_email</td>
						<td>$user_password</td>
						<td><a href='edit_users.php?id=$user_id'>Edit</a></td>
						</tr>";
						}
						
						echo "</table>";
						
						


					?>

					</div><!--end of container of inner rightbar-->	
				   </div><!--end of rightbar col-sm-9-->
				
				</div><!--@end of row-->
			</div><!--@end of second container-fluid-->	
					
			<div class="container-fluid border-top border-success" >
			<?php include ('bottombar.php'); ?>		
			</div>
			
		</div><!--@end of container-->	






</body>
</html>

<?php

}
else{
header('location:login.php');}
?>