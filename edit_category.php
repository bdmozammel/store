<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>
<body>

<?php
	if(isset($_GET['id']))
	{
	$target_row_id=$_GET['id'];
	
	
	$sql = $sql = "SELECT * FROM category where category_id=$target_row_id";
	$query=$conn->query($sql);
	
	
	$data=mysqli_fetch_assoc($query);
		$target_category_id= $data['category_id'];
		$target_category_name= $data['category_name'];
		$target_category_entrydate= $data['category_entrydate'];
		
	}
		
	

?>
<?php
if(isset($_POST['update'])){
	$new_category_id= $_POST['target_category_id'];
	$new_category_name=$_POST['target_category_name'];
	$new_category_entrydate= $_POST['target_category_entrydate'];

$sql2="update category set category_name='$new_category_name',category_entrydate='$new_category_entrydate' where category_id=$new_category_id";

if($conn->query($sql2)==True){echo "update successfully";} else
	{echo "update not happend";}
	
	
	}
?>
<head>
<title>Edit Category Form</title>
</head>
<h2>Edit Category</h2>

<form action="edit_category.php" method="POST">
	
  
  <input type="text" name="target_category_id" value="<?php echo $target_category_id ?>" hidden><br>
  
  <label for="target_category_name">Category name:</label><br>
  <input type="text" name="target_category_name" value="<?php echo $target_category_name ?>"><br>
  
  <label for="target_category_entrydate">Category Entry Date:</label><br>
  <input type="date" name="target_category_entrydate" value="<?php echo $target_category_entrydate ?>"><br><br>
  
  <input type="submit" value="update" name="update">
</form> 



</body>
</html>

