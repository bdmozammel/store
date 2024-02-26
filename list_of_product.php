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
						$sql1 = "SELECT * FROM category";
						$query1=$conn->query($sql1);
						$data_list= array();
						while($data1=mysqli_fetch_assoc($query1))
						{
							$category_id=$data1['category_id'];
							$category_name=$data1['category_name'];
							$data_list[$category_id]=$category_name; //will hit line no 36
						}
						
						$sql = "SELECT * FROM product";
						$query=$conn->query($sql);
						echo "<table class='table table-success table-striped table-hover'>
						<tr><th>product ID</th><th>product</th><th>Category</th><th>Code</th><th>Date</th><th>Action</th></tr>";
						
						while($data=mysqli_fetch_assoc($query))
						{
							$product_id= $data['product_id'];
							$product_name= $data['product_name'];
							$product_category=$data['product_category'];
							$product_code=$data['product_code'];
							$product_entrydate= $data['product_entrydate'];
						echo "<tr>
						<td>$product_id</td>
						<td>$product_name</td>
						<td>$data_list[$product_category]</td>
						<td>$product_code</td>
						<td>$product_entrydate</td>
						<td><a href='edit_product.php?id=$product_id'>Edit</a></td>
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