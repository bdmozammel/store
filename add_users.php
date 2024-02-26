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
<title>Add Users</title>
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
						if (isset($_POST['submit']))
						{
							//$product_id=$_POST['product_id'];
							$user_first_name=$_POST['user_first_name'];
							$user_last_name=$_POST['user_last_name'];
							
							$user_email=$_POST['user_email']; 
							$user_password=$_POST['user_password']; 
							
							$sql = "INSERT INTO users(user_first_name,user_last_name,user_email,user_password) VALUES ('$user_first_name','$user_last_name','$user_email', 'user_password')";
							
							$result=mysqli_query($conn,$sql);

							
							if($result==true){
								{
								echo "User Inserted";
								}
							
							}
						}

						?>
												
						<h2>Add Users</h2>

						<form action="add_users.php" method="POST">
	  
						  <label for="user_first_name">User First Name:</label><br>
						  <input type="text" id="user_first_name" name="user_first_name" ><br>
						  
						  <label for="user_last_name">User Last Name:</label><br>
						  <input type="text" id="user_last_name" name="user_last_name" ><br>
						  
						  <label for="user_email">User Email:</label><br>
						  <input type="email" id="user_email" name="user_email" ><br>
						  
						   <label for="user_password">User Password:</label><br>
						  <input type="password" id="user_password" name="user_password" ><br>
						  
						  <input type="submit" value="Submit" name="submit">
						</form> 
					
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