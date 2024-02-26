<?php
$conn = new mysqli("localhost","root","","store_db");
//require_once('myfunction.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name)){ 

function data_list($tablename,$col1,$col2)
{
$conn = new mysqli("localhost","root","","store_db");
$sql = "SELECT * FROM $tablename";
$query=$conn->query($sql);

	while($data=mysqli_fetch_assoc($query))
	{
		$data_id= $data[$col1];
		$data_name= $data[$col2];
		echo "<option value='$data_id'>$data_name</option>"; 		
	}
}
data_list('product','product_id','product_name');
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Spend Product</title>
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
							$spend_product_name=$_POST['spend_product_name'];
							$spend_product_quantity=$_POST['spend_product_quantity'];
							
							$spend_product_entrydate=$_POST['spend_product_entrydate'];
							
							$sql2 = "INSERT INTO spend_product(spend_product_name,spend_product_quantity,spend_product_entrydate) VALUES ('$spend_product_name','$spend_product_quantity','$spend_product_entrydate')";
							
							$result=mysqli_query($conn,$sql2);

							
							if($result==true){
								{
								echo "spend Product Inserted";
								}
							
							}
						}

						?>
						
						<h2>Add Spend product</h2>

						<form action="add_spend_product.php" method="POST">
	  
						  <label for="spend_product_name">spend product :</label><br>
						  <select name="spend_product_name">
						  <?php
							data_list('product','product_id','product_name');
						  ?>
						  </select><br><br>
						  
						  <label for="spend_product_quantity">spend product Quantity:</label><br>
						  <input type="text" id="spend_product_quantity" name="spend_product_quantity" ><br>
						  
						  <label for="spend_product_entrydate">Spend product Entry Date:</label><br>
						  <input type="date" id="spend_product_entrydate" name="spend_product_entrydate" ><br><br>
						  
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