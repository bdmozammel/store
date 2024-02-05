<?php
$conn = new mysqli("localhost","root","","store_db");
//require_once('choice_table');
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
<body>
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
<head>
<title>Add spend product Form</title>
</head>
<h2>Add spend product</h2>

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
</body>
</html>

