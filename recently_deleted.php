<?php require 'header.php'?> 
<?php 
$mysqli = mysqli_connect('localhost', 'root', '', 'companies');

?>


<body  class="bg-gradient-to-r from-teal-400 to-blue-500">
    <?php  
        $query="SELECT * FROM `recently_deleted` ORDER BY time DESC";
        if($result=mysqli_query($mysqli,$query)){
            while ($row = $result->fetch_assoc()){
                echo '<div class="my-4 bg-gray-200 rounded ml-20 mr-20 p-2">
                    <table width="100%" style="vertical-align:text-top;" id="myTable">'.
                    '<tr style="vertical-align:text-top;">
                        <td width="13%">Company ID</td><td width="1%">:</td><td width="19%">'.$row["CNo"].'</td>
                        <td width="13%">Company Name</td><td width="1%">:</td><td width="19%">'.$row["Name_of_the_Company"].'</td>
                        <td width="13%"></td><td width="1%">:</td><td width="19%">'.$row["time"].'</td>
                        </table></div>';
            }
        }
    ?>
</body>


<?php require 'footer.php'?>