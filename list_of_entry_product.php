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
<title>List of Store Product</title>
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
					//store_product table has no product_name field this is why this code of lines
					$sql1 = "SELECT * FROM product";
					$query1=$conn->query($sql1);
					$data_list= array();
					while($data1=mysqli_fetch_assoc($query1))
					{
						$product_id=$data1['product_id'];
						$product_name=$data1['product_name'];
						$data_list[$product_id]=$product_name; 
					}
					// display data from store_product table
					$sql = "SELECT * FROM store_product";
					$query=$conn->query($sql);
					echo "<table class='table table-success table-striped table-hover'>
					<tr><th>product Name</th><th>Quantity</th><th>Entry Date</th><th>Action</th></tr>";
					
					while($data=mysqli_fetch_assoc($query))
					{
						$store_product_id= $data['store_product_id'];
						$store_product_name= $data['store_product_name'];
						$store_product_quantity=$data['store_product_quantity'];
						$store_product_entrydate= $data['store_product_entrydate'];
					echo "<tr>
					
					<td>$data_list[$store_product_name]</td>
					<td>$store_product_quantity</td>
					<td>$store_product_entrydate</td>
					<td><a href='edit_store_product.php?id=$store_product_id'>Edit</a></td>
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
