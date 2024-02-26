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
<title>Add Product</title>
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
							
						if (isset($_POST['submit']))
						{
							//$product_id=$_POST['product_id'];
							$product_name=$_POST['product_name'];
							$product_code=$_POST['product_code'];
							$product_category=$_POST['product_category']; // comes from category table category_name option value is category_id
							$product_entrydate=$_POST['product_entrydate'];
							
							$sql2 = "INSERT INTO product(product_name,product_category,product_code, product_entrydate) VALUES ('$product_name','$product_category','$product_code','$product_entrydate')";
							
							$result=mysqli_query($conn,$sql2);

							
							if($result==true){
								{
								echo "data inserted";
								}
							
							}
						}


						?>
						
						<h2>Add product</h2>

						<form action="add_product.php" method="POST">
							
						  <label for="product_name">product name:</label><br>
						  <input type="text" id="product_name" name="product_name" ><br>
						  
						   <label for="product_category">product category:</label><br>
						  <select name="product_category">
						  <?php
							
							while($data=mysqli_fetch_assoc($query1))
							{
								$category_id= $data['category_id'];
								$category_name= $data['category_name'];
								
							echo "<option value='$category_id'> $category_name</option>";
							}
						  ?>
						  </select><br><br>
						 
						 
						  
						  <label for="product_code">product code:</label><br>
						  <input type="text" id="product_code" name="product_code" ><br>
						  
						  <label for="product_entrydate">product Entry Date:</label><br>
						  <input type="date" id="product_entrydate" name="product_entrydate" ><br><br>
						  
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