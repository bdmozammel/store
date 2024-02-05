<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>
<body>

<?php
	if(isset($_GET['id'])) //list_of_product edit button press and enter into edit_product.php page by the help of id
	{
	$target_row_id=$_GET['id'];
	
	
	$sql = $sql = "SELECT * FROM product where product_id=$target_row_id";
	$query=$conn->query($sql);
	
	
	$data=mysqli_fetch_assoc($query); // these are for display in the form by using value=""
		$product_id		= $data['product_id'];
		$product_name	= $data['product_name'];
		$product_category= $data['product_category'];
		$product_code	= $data['product_code'];
		$product_entrydate= $data['product_entrydate'];
		
	}
		
	

?>
<?php
if(isset($_POST['update'])){ // form data that are caught by input type name and cast/initialized into varialbes for update 
	$new_product_id			= $_POST['product_id'];
	$new_product_name		=$_POST['product_name'];
	$new_product_category 	=$_POST['product_category'];
	$new_product_code 		= $_POST['product_code'];
	$new_product_entrydate	= $_POST['product_entrydate'];

$sql2="update product set product_name= '$new_product_name',product_category='$new_product_category',product_code='$new_product_code',product_entrydate='$new_product_entrydate' where product_id=$new_product_id";

if($conn->query($sql2)==True){echo "update successfully";} else
	{echo "Error updating records:".$conn->error;}
	
	
	}
?>
<head>
<title>Edit product Form</title>
</head>
<h2>Edit product</h2>

<?php
	$sql1 = "SELECT * FROM category";
	$query1=$conn->query($sql1);
	

?>
<form action="edit_product.php" method="POST">
	
  
  <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden><br>
  
  <label for="product_name">product name:</label><br>
  <input type="text" name="product_name" value="<?php echo $product_name ?>"><br>
 
  <label for="product_category">product category:</label><br>
  <select name="product_category">
  <?php
  
	while($data1=mysqli_fetch_assoc($query1))
	{
		$category_id=$data1['category_id'];
		$category_name=$data1['category_name'];
	
  ?>
	<option value="<?php echo $category_id ?>"<?php	if ($category_id==$product_category){echo 'selected';}?> >
	<?php echo $category_name ?></option>
	
	<?php } ?>
	
  </select><br><br>
  
  <label for="product_code">product code:</label><br>
  <input type="text" name="product_code" value="<?php echo $product_code ?>" ><br>
  
  
  
  <label for="product_entrydate">product Entry Date:</label><br>
  <input type="date" name="product_entrydate" value="<?php echo $product_entrydate ?>"><br><br>
  
  <input type="submit" value="update" name="update">
</form> 



</body>
</html>

