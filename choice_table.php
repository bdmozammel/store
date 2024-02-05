<?php
function data_list($tablename,$col1,$col2)
{
$conn = new mysqli("localhost","root","","store_db");
$sql = "SELECT * FROM $tablename";
$query=$conn->query($sql);

	while($data=mysqli_fetch_assoc($query))
	{
		$data_id= $data[$col1];
		$data_name= $data[$col2];
	echo "option value='$data_id'>$data_name</option>";	
	}
}
data_list('product','product_id','product_name');
?>