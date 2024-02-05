<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>
<body>

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
<head>
<title>Add product Form</title>
</head>
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



</body>
</html>

