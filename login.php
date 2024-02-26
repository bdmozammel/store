<?php
$conn = new mysqli("localhost","root","","store_db");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container bg-light">
			
			<div class="col-sm-9">
					<h1><a href="index.php" class="text-success text-decoration-none" >Store Management System</a></h1>
			</div>
			
			<div class="container-fluid">
				<div class="row">
					
				   
				   <div class="col-sm-12 border-start border-success"> <!--start of rigth bar col-sm-9-->
					<div class= "container p-4 m-4">
					
						<?php
							if (isset($_POST['login']))
							{
								
								$user_email=$_POST['user_email']; 
								$user_password=$_POST['user_password']; 
								
								$sql = "SELECT * From users where user_email='$user_email' AND user_password= 'user_password'";
								
								$result=mysqli_query($conn,$sql);

								
								if(mysqli_num_rows($result)>0){
									{
										$data= mysqli_fetch_array($result);
										
										$user_first_name= $data['user_first_name'];
										$user_last_name= $data['user_last_name'];
										
										$_SESSION['user_first_name']=$user_first_name;
										$_SESSION['user_last_name']=$user_last_name;
										
										
									header('location:index.php');
									}
								
								}
							}

							?>
												
						<h2>Login</h2>

						<form action="login.php" method="POST">
	  
						<label for="user_email">User Email:</label><br>
					    <input type="email" id="user_email" name="user_email" ><br>
					  
					   <label for="user_password">User Password:</label><br>
					   <input type="password" id="user_password" name="user_password" ><br>
					  
					   <input type="submit" value="Login" name="login">
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

