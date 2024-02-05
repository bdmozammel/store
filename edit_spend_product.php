<?php
$conn = new mysqli("localhost","root","","store_db");
//require_once('choice_table');

?>
<!DOCTYPE html>
<html>
<body>
<?php

	if(isset($_GET['id'])) //list_of_product edit button press and enter into edit_product.php page by the help of id
	{
	$get_id=$_GET['id'];
	
	
	$sql = $sql = "SELECT * FROM spend_product where spend_product_id=$get_id";
	$query=$conn->query($sql);
	
	
	$data=mysqli_fetch_assoc($query); // these are for display in the form by using value=""
		$spend_product_id		= $data['spend_product_id'];
		$spend_product_name		= $data['spend_product_name'];
		$spend_product_quantity	= $data['spend_product_quantity'];
		$spend_product_entrydate= $data['spend_product_entrydate'];
		
	}

if(isset($_POST['update'])){ // form data that are caught by input type name and cast/initialized into varialbes for update 
	$new_spend_product_id			= $_POST['spend_product_id'];
	$new_spend_product_name		=$_POST['spend_product_name'];
	$new_spend_product_quantity 	=$_POST['spend_product_quantity'];
	
	$new_spend_product_entrydate	= $_POST['spend_product_entrydate'];

$sql2="update spend_product set spend_product_name= '$new_product_name',spend_product_quantity='$new_product_quantity',spend_product_entrydate='$new_product_entrydate' where spend_product_id=$new_spend_product_id";

if($conn->query($sql2)==True){echo "update successfully";} else
	{echo "Error updating records:".$conn->error;}
	
	
	}
?>


<head>
<title>Edit spend product Form</title>
</head>
<h2>Edit spend product</h2>

<form action="" method="POST">
	  
  <label for="spend_product_name">spend product :</label><br>
  
  <select name="spend_product_name">
  <?php
	$sql = "SELECT * FROM product";
	$query=$conn->query($sql);

	while($data=mysqli_fetch_assoc($query))
	{
		$data_id= $data['product_id'];
		$data_name= $data['product_name'];
	?>
		<option value="<?php echo $data_id ?>" <?php if ($spend_product_name==$data_id){echo 'selected';}?> > <?php echo $data_name ?></option>
		
		
	
	<?php }  ?>
  </select><br><br>
  
  <label for="spend_product_quantity">spend product Quantitiy:</label><br>
  <input type="number" id="spend_product_quantity" name="spend_product_quantity" value="<?php echo $spend_product_quantity;?>"><br>
  
  <label for="spend_product_entrydate">product Entry Date:</label><br>
  <input type="date" id="spend_product_entrydate" name="spend_product_entrydate" value="<?php echo $spend_product_entrydate;?>"><br><br>
  <input type="date" id="spend_product_id" name="spend_product_id" value="<?php echo $spend_product_id	?>" hidden><br><br>
  <input type="submit" value="Submit" name="submit">
</form> 
</body>
</html>

