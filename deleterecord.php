<?php
$con = mysqli_connect("localhost", "root", "", "companies");
$id = $_GET['id'];
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($result=mysqli_query($con,"SELECT * FROM `cdb_cno_name` WHERE CNo='$id'")){
    $row=$result->fetch_assoc();
    $CNo=$row["CNo"];
    $name=$row["Name_of_the_Company"];
    $insertion="INSERT INTO `recently_deleted`(`CNo`, `Name_of_the_Company`) VALUES ('$CNo','$name')";
    mysqli_query($con,$insertion);
    if(mysqli_query($con,"DELETE FROM `cdb_cno_name` WHERE CNo='$id'"));
}
mysqli_close($con);
header("Location: index.php?c_name=&type=&city=&page=1");

?> 
