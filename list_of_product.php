<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>

<body>

	
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
	echo "<table border='1'>
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

</body>
</html>

