<?php
$con = mysqli_connect("localhost", "root", "", "companies");
$id = $_GET['id'];
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(mysqli_query($con,"DELETE FROM `cdb_cno_name` WHERE CNo='$id'"))
mysqli_close($con);
header("Location: index.php?c_name=&type=&city=&page=1");

?> 
