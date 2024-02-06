<?php
$conn = new mysqli("localhost","root","","store_db");
//require_once('choice_table');

?>
<!DOCTYPE html>
<html>
<body>
<?php

	if(isset($_GET['id'])) //$store_product_id from list_of_entry_product
	{
		$get_id=$_GET['id'];
	
		$sql = $sql = "SELECT * FROM store_product where store_product_id=$get_id";
		$query=$conn->query($sql);
	
	
		$data=mysqli_fetch_assoc($query); // these are for display in the form by using value=""
		$store_product_id		= $data['store_product_id'];
		$store_product_name		= $data['store_product_name'];
		$store_product_quantity	= $data['store_product_quantity'];
		$store_product_entrydate= $data['store_product_entrydate'];
		
	}

			if(isset($_POST['update'])){ // form data that are caught by input type name and cast/initialized into varialbes for update 
				$new_store_product_id			= $_POST['store_product_id'];
				$new_store_product_name			= $_POST['store_product_name'];
				$new_store_product_quantity 	= $_POST['store_product_quantity'];
				$new_store_product_entrydate	= $_POST['store_product_entrydate'];

				$sql2="update store_product set store_product_name= '$new_store_product_name',store_product_quantity='$new_store_product_quantity',store_product_entrydate='$new_store_product_entrydate' where store_product_id=$new_store_product_id";

				if($conn->query($sql2)==True)
				{
				echo "update successfully";
				} 
				else
				{
				echo "Error updating records:".$conn->error;
				}
			}
	
	
?>


<head>
<title>Edit Store product Form</title>
</head>
<h2>Edit Store product</h2>

<form action="edit_store_product.php" method="POST">
	  
  <label for="store_product_name">Store product :</label><br>
  
  <select name="store_product_name" id="store_product_name">
  <?php
	$sql = "SELECT * FROM product";
	$query=$conn->query($sql);

	while($data=mysqli_fetch_assoc($query))
	{
		$product_id= $data['product_id'];
		$product_name= $data['product_name'];
	?>
		<option value='<?php echo $product_id ?>' <?php if ($store_product_name==$product_id){echo 'selected';}?> > <?php echo $product_name ?></option>
		
		
	
	<?php }  ?>
  </select><br><br>
  
  <label for="store_product_quantity">Store product Quantity:</label><br>
  <input type="number" id="store_product_quantity" name="store_product_quantity" value="<?php echo $store_product_quantity;?>"><br>
  
  <label for="store_product_entrydate">product Entry Date:</label><br>
  <input type="date" id="store_product_entrydate" name="store_product_entrydate" value="<?php echo $store_product_entrydate;?>"><br><br>
  
  <input type="text" id="store_product_id" name="store_product_id" value="<?php echo $store_product_id	?>" hidden><br><br>
  
  <input type="submit" value="Submit" name="update">
</form> 
</body>
</html>

