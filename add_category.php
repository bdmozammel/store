<?php
$conn = new mysqli("localhost","root","","store_db");

session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name)){ 
?>

<!DOCTYPE html>
<html>
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
						
						$category_name=$_POST['category_name'];
						$category_entrydate=$_POST['category_entrydate'];
						
						$sql = "INSERT INTO category(category_name, category_entrydate) VALUES ('$category_name','$category_entrydate')";
						
						
						
						if($conn->query($sql)==true){
							{
							echo "data inserted";
							}
						
						}
					}


					?>
					<head>
						<title>Add Category Form</title>

						<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
							
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
					</head>
					<h2>Add Category</h2>

					<form action="add_category.php" method="POST">
						
					  <label for="category_name">Category name:</label><br>
					  <input type="text" id="category_name" name="category_name" ><br>
					  
					  <label for="category_entrydate">Category Entry Date:</label><br>
					  <input type="date" id="category_entrydate" name="category_entrydate" ><br><br>
					  
					  <input type="submit" value="Submit" name="submit" class="btn btn-success">
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
