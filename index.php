

<?php
$conn = new mysqli("localhost","root","","store_db");
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name))
{ 

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Store Management Sytem | SMS</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	
	<body>
		<div class="container bg-light">
			
			<div class=	"container-fluid border-bottom border-success" > <!--topbar-->
				<?php include ('topbar.php'); ?>
			
			</div><!--end of topbar-->
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 bg-light p-0 m-0"›<!--start of leftbar-->
						
					<?php include ('leftbar.php'); ?>	
				   </div><!--end of leftbar col-sm-3-->
				   
				   <div class="col-sm-9 border-start border-success"> <!--start of rigth bar col-sm-9-->
						<div class="row p-4">
							<div class="col-sm-3"> <a href="add_category.php"> <i class="fa-sharp fa-solid fa-folder-plus fa-5x text-success"></i></a> <p>Add Category</p>
							</div>
							<div class="col-sm-3"> <a href="list_of_category.php"> <i class="fa-sharp fa-solid fa-folder-open fa-5x text-success"></i></a> <p>Category List</p>
							</div>
							<div class="col-sm-3"> <a href="add_product.php"> <i class="fas fa-box-open fa-5x text-success"></i></a> <p>Add Product</p>
							</div>
							<div class="col-sm-3"> <a href="list_of_product.php"> <i class="fas fa-stream fa-5x text-success"></i></a> <p>Product List</p>
							</div>
						</div>
						<hr/>
						<div class="row p-4">
							<div class="col-sm-3"> <a href="add_store_product.php"> <i class="fa-solid fa-store fa-5x text-success"></i></a> <p>Store Product</p>
							</div>
							<div class="col-sm-3"> <a href="list_of_entry_product.php"> <i class="fa-regular fa-rectangle-list fa-5x text-success"></i></a> <p>Store Product List</p>
							</div>
							<div class="col-sm-3"> <a href="add_spend_product.php"><i class="fa-sharp fa-regular fa-store fa-5x text-success"></i></a> <p>Spend Product</p>
							</div>
							<div class="col-sm-3"> <a href="list_of_spend_product.php"> <i class="fa-solid fa-table-list fa-5x text-success"></i></a> <p>Spend Product List</p>
							</div>
						</div>
						
						<hr/>
						<div class="row p-4">
							<div class="col-sm-3"> <a href="report.php"> <i class="fas fa-chart-bar fa-5x text-success"></i></a> <p>Report</p>
							</div>
							
							<div class="col-sm-3">
							</div>
							
							<div class="col-sm-3">
							</div>
							
							<div class="col-sm-3">
							</div>
						</div>
						<div class="row p-4">
							<div class="col-sm-3"> <a href="add_users.php"> <i class="fas fa-user-plus fa-5x text-success"></i></a> <p>Add User</p>
							</div>
							
							<div class="col-sm-3"> <a href="list_of_users.php"> <i class="fa-solid fa-users fa-5x text-success"></i></a> <p>Users List</p>
							</div>
							
							<div class="col-sm-3">
							</div>
							
							<div class="col-sm-3">
							</div>
						</div>
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
	header('location:login.php');
	}
?>