<?php
$con = new mysqli("localhost", "root", "", "companies");
if(isset($_GET['page']))
    $page=$_GET['page'];
else
    $page=1;
if(isset($_GET['let']))
$let = $_GET['let'];
else
$let='';
$query1 = "SELECT * FROM cdb_cno_name,cdb_company_data WHERE cdb_cno_name.`CNo`=cdb_company_data.`CNo` AND Name_of_the_Company LIKE '$let%'";
if ($result = $con->query($query1)) {
    $row_cnt=$result->num_rows;
}
$start=100*($page-1);
$query1 = "SELECT * FROM cdb_cno_name,cdb_company_data WHERE cdb_cno_name.`CNo`=cdb_company_data.`CNo` AND Name_of_the_Company LIKE '$let%' LIMIT ".$start.",100";
?>
<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Company Database</title>
</head>
<body class="bg-gradient-to-r from-teal-400 to-blue-500">
    <div>
        <form class="h-50 border rounded my-10 mx-10" method="GET" action="index.php">
            <div class="flex flex-wrap justify-center my-10">
            <button class="rounded border p-2 ml-4 sm:my-2 bg-yellow-500"> <a href="insert.php">Insert a New Company</a></button>
                <input type="text" class="h-12 border rounded p-1 ml-4 sm:my-2 " placeholder="Company Name" name="c_name">
                <select class="h-12 border rounded p-1 ml-4 sm:my-2 text-gray-500"  placeholder="Select an Industry" name="type">
                    <option value=''>Select a Industry</option>
                    <?php
                        $con = new mysqli("localhost", "root", "", "companies");
                        $query="SELECT DISTINCT `Type_of_Organization` FROM cdb_cno_name,cdb_company_data WHERE cdb_cno_name.`CNo`=cdb_company_data.`CNo`AND LENGTH(`Type_of_Organization`)<51 ORDER BY LENGTH(`Type_of_Organization`)";
                        if ($result = $con->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['Type_of_Organization'] ."'>" . $row['Type_of_Organization'] ."</option>";
                            }
                            $result->free();
                        }
                    ?>
                </select>
                <select class="h-12 border rounded p-1 ml-4 sm:my-2 text-gray-500"  placeholder="Select City" name="city">
                    <option value=''>Select a city</option>
                    <?php
                        $con = new mysqli("localhost", "root", "", "companies");
                        $query="SELECT DISTINCT `Origin` FROM cdb_cno_name,cdb_company_data WHERE cdb_cno_name.`CNo`=cdb_company_data.`CNo`AND LENGTH(`Origin`)<51 ORDER BY LENGTH(`Origin`)";
                        if ($result = $con->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['Origin'] ."'>" . $row['Origin'] ."</option>";
                            }
                            $result->free();
                        }
                    ?>
                </select>
                <button class="rounded border p-2 ml-4 sm:my-2 bg-red-400">Search</button>
            </div>
        </form>
    </div>
    <div class="border rounded my-10 mx-10">
            <div id="Sort">A</div>
            <hr class="bg-black"/>
            <div id="pagination" class="p-2" align="right"></div>
            <div id="Companies">
                <?php
                    $con = new mysqli("localhost", "root", "", "companies");
                    if ($result = $con->query($query1)) {
                        while ($row = $result->fetch_assoc()) {
                            $query2="SELECT * FROM `cdb_contact_person`,`cdb_cno_name` WHERE `cdb_contact_person`.`CNo`=`cdb_cno_name`.`CNo` AND `cdb_cno_name`.`CNo`=".$row["CNo"];
                            echo '<div class="my-4 bg-gray-200 rounded ml-20 mr-20 p-2"><table width="100%" style="vertical-align:text-top;">'.
                '<tr style="vertical-align:text-top;">
                    <td width="13%">Company ID</td><td width="1%">:</td><td width="19%" class="bg-blue-200 bg-white border flex p-1 shadow-outline rounded w-12">'.$row["CNo"].'</td>
                    <td width="13%">Company Name</td><td width="1%">:</td><td width="19%">'.$row["Name_of_the_Company"].'</td>
                    <td width="13%">Contact Number</td><td width="1%">:</td><td width="19%">'.$row["Contact_No"].'</td>
                </tr>' .
                '<tr style="vertical-align:text-top;">
                    <td>Category</td><td width>:</td><td>'.$row["Type_of_Organization"].'</td>
                    <td>Employee Strength</td><td>:</td><td>'.$row["Employee_Strength"].'</td>
                    <td>Origin</td><td>:</td><td>'.$row["Origin"].'</td>
                </tr> '.
                '<tr style="vertical-align:text-top;">
                    <td>Location</td><td>:</td><td>'.$row["Loc"].'</td>
                    <td>Sub Location</td><td>:</td><td>'.$row["Sub_Location"].'</td>
                    <td>Business Park</td><td>:</td><td>'.$row["Business_Park_Name"].'</td>
                </tr>'.
                '<tr style="vertical-align:text-top;">
                    <td>Company Address</td><td>:</td><td colspan="7">'.$row["Company_Address"].'</td>
                </tr> '.
                '<tr style="vertical-align:text-top;">
                    <td>Website</td><td>:</td><td colspan="7"><a class="text-blue-500 hover:text-blue-800" href="'.$row["Website"].'">'.$row["Website"].'</a></td>
                </tr> '.
                '<tr style="vertical-align:center;">                    
                    <td><img src="'.$row["Logo"].'" alt="LOGO" width="100" height="100"/></td>
                    <td colspan="8">
                        <table width="100%" style="border">
                            <tr>
                                <td  style="border: 1px solid #718096;">Person Name</td>
                                <td  style="border: 1px solid #718096;">Designation</td>
                                <td  style="border: 1px solid #718096;">Phone Number</td>
                                <td  style="border: 1px solid #718096;">Email ID</td>
                            </tr>';

                             if ($result2 = $con->query($query2)) {
                                while ($row2 = $result2->fetch_assoc()) {
                            echo '
                            <tr>
                                <td  style="border: 1px solid #718096;">'.$row2["Contact_Person_Name"].'</td>
                                <td  style="border: 1px solid #718096;">'.$row2["Contact_Person_Designation"].'</td>
                                <td  style="border: 1px solid #718096;">'.$row2["Contact_Person_Phone_No"].'</td>
                                <td  style="border: 1px solid #718096;">'.$row2["Contact_Person_Email_ID"].'</td>
                            </tr>';
                            }
                        }
                        echo '
                        </table>
                    </td>
                </tr> '.
                '<tr style="vertical-align:text-top;">
                    <td>Remarks</td><td>:</td><td colspan="7">'.$row["Remarks"].'</td>
                </tr>'.
                "<td><button class='bg-red-500 p-1 w-1/3 rounded'><a href=\"deleterecord.php?id=".$row['CNo']."\">Delete</a></button>".
                "<button class='bg-green-500 p-1 ml-2  w-1/3 rounded'><a href=\"edit.php?id=".$row['CNo']."\">Edit</a></button></td>".
                '</table></div>';
                    }
                    $result->free();
                }
                    ?>
            </div>
    </div>
</body>
<script>
    var i;
    var b="<span class='ml-2 text-white p-2 my-2'>Sort By Company Name ></span>";
    var url="";
    for(i=0;i<26;i++){
        b+="<a href='search.php?let="+String.fromCharCode(65+i)+"'><button class='ml-2 text-white p-2 hover:bg-red-400 my-2'>"+String.fromCharCode(65+i)+"</button></a>";
    }
    document.getElementById("Sort").innerHTML=b;

    var details="";
</script>
<script>
    var i;
    var b="";
    var let="<?php echo $_GET['let'];?>";
    var num="<?php echo $row_cnt;?>";
    for(i=1;i<num/100+1;i++){
         b+="<a href='search.php?let="+let+"&page="+i+"'><button class='text-white hover:bg-red-400 p-1  mr-2'>"+i+"</button></a>";
    }
    b+="&emsp;";
    document.getElementById("pagination").innerHTML=b;
    var details="";
</script>
<?php require 'footer.php'?>
</html>
