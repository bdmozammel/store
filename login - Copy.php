<?php
$conn = new mysqli("localhost","root","","store_db");
session_start();

?>
<!DOCTYPE html>
<html>
<body>
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
<head>
<title>Login</title>
</head>
<h2>Login</h2>

<form action="login.php" method="POST">
	  
   <label for="user_email">User Email:</label><br>
  <input type="email" id="user_email" name="user_email" ><br>
  
   <label for="user_password">User Password:</label><br>
  <input type="password" id="user_password" name="user_password" ><br>
  
  <input type="submit" value="Login" name="login">
</form> 
</body>
</html>

