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
<title>List of Category</title>
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

							
							$sql = "SELECT * FROM category";
							$query=$conn->query($sql);
							echo "<table class='table table-success table-striped table-hover'>
							<tr><th>Category</th><th>Category name</th><th>Date</th><th>Action</th><th>Delete</th></tr>";
							
							while($data=mysqli_fetch_assoc($query))
							{
								$category_id= $data['category_id'];
								$category_name= $data['category_name'];
								$category_entrydate= $data['category_entrydate'];
							echo "<tr>
							<td>$category_id</td>
							<td>$category_name</td>
							<td>$category_entrydate</td>
							<td><a href='edit_category.php?id=$category_id' class='btn btn-success'>Edit</a></td>
							<td><a href='delete_category.php?id=$category_id' class='btn btn-danger'>Delete</a></td>
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