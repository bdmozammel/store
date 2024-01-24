<?php
$conn = new mysqli("localhost","root","","store_db");
?>
<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_POST['submit']))
{
	
	$category_name=$_POST['category_name'];
	$category_entrydate=$_POST['category_entrydate'];
	
	$sql = "INSERT INTO category(category_name, category_entrydate) VALUES ('$category_name','$category_entrydate')";
	
	
	
	if($conn->query($sql)==true){
		{
		echo "data inserted";
		}
	
	}
}


?>
<head>
<title>Add Category Form</title>
</head>
<h2>Add Category</h2>

<form action="add_category.php" method="POST">
	
  <label for="category_name">Category name:</label><br>
  <input type="text" id="category_name" name="category_name" ><br>
  
  <label for="category_entrydate">Category Entry Date:</label><br>
  <input type="date" id="category_entrydate" name="category_entrydate" ><br><br>
  
  <input type="submit" value="Submit" name="submit">
</form> 



</body>
</html>

