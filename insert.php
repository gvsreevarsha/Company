<?php require 'header.php'?>
<?php
$link = mysqli_connect("localhost", "root", "", "companies");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['NameCompany']))
{
$NameCompany = mysqli_real_escape_string($link, $_REQUEST['NameCompany']);
$Logo = mysqli_real_escape_string($link, $_REQUEST['Logo']);
$COLLEGE = mysqli_real_escape_string($link, $_REQUEST['COLLEGE']);
$Origin = mysqli_real_escape_string($link, $_REQUEST['Origin']);
$TypeOrgan = mysqli_real_escape_string($link, $_REQUEST['TypeOrgan']);
$Employeestrength = mysqli_real_escape_string($link, $_REQUEST['Employeestrength']);
$Website = mysqli_real_escape_string($link, $_REQUEST['Website']);
$ContactNo = mysqli_real_escape_string($link, $_REQUEST['ContactNo']);
$CompanyAddress = mysqli_real_escape_string($link, $_REQUEST['CompanyAddress']);
$Location = mysqli_real_escape_string($link, $_REQUEST['Location']);
$SubLocation = mysqli_real_escape_string($link, $_REQUEST['SubLocation']);
$BusinessParkName = mysqli_real_escape_string($link, $_REQUEST['BusinessParkName']);
$ContactPersonName = mysqli_real_escape_string($link, $_REQUEST['ContactPersonName']);
$ContactPersonDesignation = mysqli_real_escape_string($link, $_REQUEST['ContactPersonDesignation']);
$ContactPhoneNo = mysqli_real_escape_string($link, $_REQUEST['ContactPhoneNo']);
$ContactPersonEmailID = mysqli_real_escape_string($link, $_REQUEST['ContactPersonEmailID']);
$Remarks = mysqli_real_escape_string($link, $_REQUEST['Remarks']);
$sql="SELECT * FROM `cdb_cno_name` WHERE `Name_of_the_Company`='".$NameCompany."'";
if($result=mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result)==0)
    {
        $sql2="INSERT INTO `cdb_cno_name`( `Name_of_the_Company`) VALUES ('$NameCompany')";
        mysqli_query($link, $sql2);
        $sql2="SELECT * FROM `cdb_cno_name` WHERE `Name_of_the_Company`='".$NameCompany."'";
        $result2=mysqli_query($link, $sql2);
        $row2=mysqli_fetch_assoc($result2);
        $sql3="INSERT INTO `cdb_company_data`(`CNo`, `Logo`, `COLLEGE`, `Origin`, `Type_of_Organization`, `Employee_Strength`, `Website`, `Company_Address`, `Contact_No`, `Loc`, `Sub_Location`, `Business_Park_Name`, `Remarks`) VALUES (".$row2["CNo"].",'$Logo','$COLLEGE','$Origin','$TypeOrgan','$Employeestrength','$Website','$CompanyAddress','$ContactNo','$Location','$SubLocation','$BusinessParkName','$Remarks')";
        mysqli_query($link, $sql3);
        $sql4="INSERT INTO `cdb_contact_person`(`CNo`, `Contact_Person_Name`, `Contact_Person_Designation`, `Contact_Person_Phone_No`, `Contact_Person_Email_ID`) VALUES (".$row2["CNo"].",'$ContactPersonName','$ContactPersonDesignation','$ContactPhoneNo','$ContactPersonEmailID')";
    }
    else
    {
        $sql2="SELECT * FROM `cdb_cno_name` WHERE `Name_of_the_Company`='".$NameCompany."'";
        $result2=mysqli_query($link, $sql2);
        $row2=mysqli_fetch_assoc($result2);
        $sql4="INSERT INTO `cdb_contact_person`(`CNo`, `Contact_Person_Name`, `Contact_Person_Designation`, `Contact_Person_Phone_No`, `Contact_Person_Email_ID`) VALUES (".$row2["CNo"].",'$ContactPersonName','$ContactPersonDesignation','$ContactPhoneNo','$ContactPersonEmailID')";
    }
}
if(mysqli_query($link, $sql4)){
    echo '<div class="flex justify-center p-2 border rounded text-2xl">Records added successfully.</div>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 
// Close connection
mysqli_close($link);
?>
<body class="bg-gradient-to-r from-teal-400 to-blue-500">
<form  method="post" action="insert.php">
<div class="p-1 h-50 border rounded my-10 mx-10">
<div class="flex flex-wrap justify-center">
    <p>
        <input type="text" name="NameCompany" id="NameCompany"  class="border-2 p-1 ml-2 mr-2 my-2 rounded" placeHolder="Company Name"/>
    </p>
    <p>
        <input type="text" name="Logo" id="Logo"  class="border-2 p-1 ml-2 mr-2 my-2 rounded" placeHolder="Logo link"/>
    </p>
    <p>
        <input type="text" name="COLLEGE" id="COLLEGE"  class="border-2 p-1 ml-2 mr-2 my-2 rounded" placeHolder="COLLEGE"/>
    </p>
    <p>
        <input type="text" name="Origin" id="Origin" class="border-2 p-1 rounded ml-2 my-2 mr-2" placeHolder="Origin">
    </p>
    <p>
        <input type="text" name="TypeOrgan" id="TypeOrgan" class="border-2 p-1 rounded ml-2 my-2 mr-2" placeHolder="Type of Organization">
    </p>
    <p>
        <input type="text" name="Employeestrength" id="Employeestrength" class="border-2 p-1 ml-2 my-2  mr-2 rounded" placeHolder="Strength">
    </p>
    <p>
        <input type="text" name="Website" id="Website" class="border-2 p-1 rounded ml-2 mr-2 my-2 " placeHolder="URL">
    </p>
    <p>
        <input type="text" name="CompanyAddress" id="CompanyAddress" class="border-2 p-1 ml-2 my-2 mr-2 rounded" placeHolder="Company Address">
    </p>
    <p>
        <input type="text" name="ContactNo" id="ContactNo" class="border-2 p-1 rounded ml-2 my-2 mr-2 " placeHolder="Contact No">
    </p>
    <p>
        <input type="text" name="Location" id="Location" class="border-2 p-1 rounded  my-2  mr-2" placeHolder="Location">
    </p>
    <p>
        <input type="text" name="SubLocation" id="SubLocation" class="border-2 p-1 rounded my-2 ml-2 mr-2" placeHolder="SubLocation">
    </p>
    <p>
        <input type="text" name="BusinessParkName" id="BusinessParkName" class="border-2 p-1 my-2 rounded ml-2 mr-2" placeHolder="Business Park Name">
    </p>
    <p>
        <input type="text" name="ContactPersonName" id="ContactPersonName" class="border-2 p-1 my-2  rounded ml-2 mr-2" placeHolder="Contact Person Name">
    </p>
    <p>
        <input type="text" name="ContactPersonDesignation" id="ContactPersonDesignation" class="border-2 p-1 my-2  rounded ml-2 mr-2" placeHolder="Contact Person Designation">
    </p>
    <p>
        <input type="text" name="ContactPhoneNo" id="ContactPhoneNo" class="border-2 p-1 rounded ml-2 my-2  mr-2" placeHolder="Contact Phone no">
    </p>
    <p>
        <input type="text" name="ContactPersonEmailID" id="ContactPersonEmailID" class="border-2 my-2  p-1 rounded ml-2 mr-2" placeHolder="Contact Person EmailID">
    </p> 
    <p>
        <input type="text" name="Remarks" id="Remarks" class="border-2 p-1 ml-2 mr-2  rounded my-2" class="Remarks" placeHolder="Remarks ">
    </p> 
    </div>
    <div class="flex flex-wrap justify-center">
        <input type="submit"  class="flex flex-wrap justify-center rounded border p-2 ml-4 sm:my-2 bg-red-400" value="Submit">
    </div>
</div>
</form>
<form  action="bulkupload.php" method="post" enctype="multipart/form-data">
<div class="p-1 h-50 border rounded my-10 mx-10">
<div class="flex flex-wrap justify-center">
    <p>
        <a href="#">Download the format</a>&emsp;
        <input type="file" name="insertdata" id="insertdata"  class="border-2 p-1 ml-2 mr-2 my-2 rounded"/>
    </p>
    </div>
    <div class="flex flex-wrap justify-center">
        <input type="submit"  class="flex flex-wrap justify-center rounded border p-2 ml-4 sm:my-2 bg-red-400" value="Submit">
    </div>
</div>
</form>
</body>
</html>
<?php require 'footer.php'?>