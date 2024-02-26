<?php
$conn = new mysqli("localhost","root","","store_db");

session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if(!empty($user_first_name) && !empty($user_last_name)){ 
		$sql="select * From product";
		$query= $conn->query($sql);
		$data_list=array();
		while($data=mysqli_fetch_assoc($query))
			{
			$product_id=$data['product_id'];
			$product_name=$data['product_name'];
			$data_list[$product_id]=$product_name;
			}
?>

<!DOCTYPE html>
<html>
<head>
<title>Report</title>
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
					<form action="report.php" method="GET">
						<select name="product_name" id="product_name">
					  <?php
						$sql2 = "SELECT * FROM product";
						$query2=$conn->query($sql2);

						while($data2=mysqli_fetch_assoc($query2))
						{
							$product_id= $data2['product_id'];
							$product_name= $data2['product_name'];
						?>
							<option value="<?php echo $product_id ?>"> <?php echo $product_name ?></option>
							
						<?php }  ?>
					  </select>
					   
					  <input type="submit" value="Generate Report" >
					</form> 

					<h1>Store Product</h1>
					<?php
					// Report Store data
					if(isset($_GET['product_name'])){
						$product_name=$_GET['product_name'];
						$sql3="select * from store_product where store_product_name=$product_name";
						$query3=$conn->query($sql3);
						
						while($data3=mysqli_fetch_assoc($query3))
						{
							$store_product_name= $data3['store_product_name'];
							$store_product_quantity= $data3['store_product_quantity'];
							$store_product_entrydate= $data3['store_product_entrydate'];
							
							echo "<h2> $data_list[$store_product_name]</h2>";
							echo "<table border='1'><tr><td>Store Date</td><td>Amount</td></tr>";
							echo "<tr><td>$store_product_entrydate</td><td>$store_product_quantity</td></tr>";
							echo "</table>";
						}	
					}
					?>
					<h1>Spend Product</h1>
					<?php
					// Report Spend data
					if(isset($_GET['product_name'])){
						$product_name=$_GET['product_name'];
						$sql4="select * from spend_product where spend_product_name=$product_name";
						$query4=$conn->query($sql4);
						
						while($data4=mysqli_fetch_assoc($query4))
						{
							$spend_product_name= $data4['spend_product_name'];
							$spend_product_quantity= $data4['spend_product_quantity'];
							$spend_product_entrydate= $data4['spend_product_entrydate'];
							
							echo "<h2> $data_list[$spend_product_name]</h2>";
							echo "<table border='1'><tr><th>spend Date</th><th>Amount</th></tr>";
							echo "<tr><td>$spend_product_entrydate</td><td>$spend_product_quantity</td></tr>";
							echo "</table>";
						}	
					}
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