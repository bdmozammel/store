<?php
$conn = new mysqli("localhost","root","","store_db");
require_once('myfunction.php');
?>
<!DOCTYPE html>
<html>
<body>
<?php
if (isset($_POST['submit']))
{
	//$product_id=$_POST['product_id'];
	$store_product_name   		=$_POST['store_product_name'];
	$store_product_quantity		=$_POST['store_product_quantity'];
	$store_product_entrydate	=$_POST['store_product_entrydate'];
	
	$sql2 = "INSERT INTO store_product(store_product_name,store_product_quantity,store_product_entrydate) VALUES ('$store_product_name','$store_product_quantity','$store_product_entrydate')";
	
	$result=mysqli_query($conn,$sql2);

	
	if($result==true){
		{
		echo "Store Product Inserted";
		}
		
	}
}

?>
<head>
<title>Add Store product Form</title>
</head>
<h2>Add Store product</h2>

<form action="add_store_product.php" method="POST">
	  
  <label for="store_product_name">Store product :</label><br>
  <select name="store_product_name">
  <?php
	data_list('product','product_id','product_name');
  ?>
  </select><br><br>
  
  <label for="store_product_quantity">Store product Quantitiy:</label><br>
  <input type="text" id="store_product_quantity" name="store_product_quantity" ><br>
  
  <label for="store_product_entrydate">Stroe product Entry Date:</label><br>
  <input type="date" id="store_product_entrydate" name="store_product_entrydate" ><br><br>
  
  <input type="submit" value="Submit" name="submit">
</form> 
</body>
</html>

