<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>
<body>
<?php
	if(isset($_GET['id'])) //list_of_users edit button press and enter into edit_users.php page by the help of id
	{
	$target_row_id=$_GET['id'];
		
	$sql1 = "SELECT * FROM users where user_id=$target_row_id";
	$query1=$conn->query($sql1);
		
		$data=mysqli_fetch_assoc($query1); // these are for display in the form by using value=""
		$old_user_id			= $data['user_id'];
		$old_user_first_name	= $data['user_first_name'];
		$old_user_last_name		= $data['user_last_name'];
		$old_user_email			= $data['user_email'];
		$old_user_password		= $data['user_password'];
	}
?>
<?php
if(isset($_POST['update']))
{ // Posting form data received by input type name
	$new_user_id			= $_POST['list_of_user_id'];
	$new_user_first_name	= $_POST['list_of_user_first_name'];
	$new_user_last_name		= $_POST['list_of_user_last_name'];
	$new_user_email 		= $_POST['list_of_user_email'];
	$new_user_password		= $_POST['list_of_user_password'];

	$sql2="update users set user_first_name= '$new_user_first_name',user_last_name= '$new_user_last_name',user_email='$new_user_email',user_password='$new_user_password' where user_id=$new_user_id";

	if($conn->query($sql2)==True)
	{echo "update successfully";} 
	else
	{echo "Error updating records:".$conn->error;}
}
?>
<head>
<title>Edit user Form</title>
</head>
<h2>Edit user</h2>


<form action="edit_users.php" method="POST">
	
  <!-- before update table data displaying in the form -->
  <input type="text" name="list_of_user_id" value="<?php echo $old_user_id ?>" hidden><br>
  
  <label for="user_first_name">user First name:</label><br>
  <input type="text" name="list_of_user_first_name" value="<?php echo $old_user_first_name ?>"><br>
  
  <label for="user_last_name">user Last name:</label><br>
  <input type="text" name="list_of_user_last_name" value="<?php echo $old_user_last_name ?>"><br>
 
   
  
  <label for="user_email">user Email:</label><br>
  <input type="email" name="list_of_user_email" value="<?php echo $old_user_email ?>" ><br>
  
  
  
  <label for="user_password">user Password:</label><br>
  <input type="password" name="list_of_user_password" value="<?php echo $old_user_password ?>"><br><br>
  
  <input type="submit" value="update" name="update">
</form> 



</body>
</html>

