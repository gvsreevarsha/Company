<?php require 'header.php'?>
<?php
$s=$_REQUEST["id"];
$link = mysqli_connect("localhost", "root", "", "companies");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    $sql = "SELECT * FROM `cdb_cno_name` WHERE `CNo`=$s";
    $result=mysqli_query($link, $sql);
    $row=mysqli_fetch_assoc($result);
    $sql2 = "SELECT * FROM `cdb_company_data` WHERE `CNo`=$s";
    $result2=mysqli_query($link, $sql2);
    $row2=mysqli_fetch_assoc($result2);
    $sql3 = "SELECT * FROM `cdb_contact_person` WHERE `CNo`=$s";
    $result3=mysqli_query($link, $sql3);
    $row3=mysqli_fetch_assoc($result3);
  }
?>
<body class="bg-gradient-to-r from-teal-400 to-blue-500">
<form method="POST" action="edit.php?id=<?php echo $s?>">
<div class="p-1 h-50 border rounded my-10 mx-20">
<div>
    <p class="flex justify-between">
        <label for="NameCompany">Company Name:</label>
        <input type="text" name="NameCompany" id="NameCompany" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row["Name_of_the_Company"];?>">
    </p>
    <p class="flex justify-between">
        <label for="NameCompany">Logo Link:</label>
        <input type="text" name="Logo" id="Logo" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Logo"];?>">
    </p>
    <p class="flex justify-between">
        <label for="NameCompany">COLLEGE:</label>
        <input type="text" name="COLLEGE" id="COLLEGE" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["COLLEGE"];?>">
    </p>
    <p class="flex justify-between">
        <label for="Origin">Origin:</label>
        <input type="text" name="Origin" id="Origin" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Origin"];?>">
    </p>
    <p class="flex justify-between">
        <label for="TypeOrgan">Type of Organisation:</label>
        <input type="text" name="TypeOrgan" id="TypeOrgan" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Type_of_Organization"];?>">
    </p>
    <p class="flex justify-between">
        <label for="Employeestrength">Employee Strength:</label>
        <input type="text" name="Employeestrength" id="Employeestrength"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Employee_Strength"];?>">
    </p>
    <p class="flex justify-between">
        <label for="Website">Website:</label>
        <input type="text" name="Website" id="Website"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Website"];?>">
    </p>
    <p class="flex justify-between">
        <label for="CompanyAddress">Company Address:</label>
        <input type="text" name="CompanyAddress" id="CompanyAddress"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Company_Address"];?>">
    </p>
    <p class="flex justify-between">
        <label for="ContactNo">Contact Number:</label>
        <input type="text" name="ContactNo" id="ContactNo"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Contact_No"];?>">
    </p>
    <p class="flex justify-between">
        <label for="Location">Location:</label>
        <input type="text" name="Location" id="Location"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Loc"];?>">
    </p>
    <p class="flex justify-between">
        <label for="SubLocation">Sub Location:</label>
        <input type="text" name="SubLocation" id="SubLocation" class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Sub_Location"];?>">
    </p>
    <p class="flex justify-between">
        <label for="BusinessParkName">Business Park Name:</label>
        <input type="text" name="BusinessParkName" id="BusinessParkName"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Business_Park_Name"];?>">
    </p>
    <p class="flex justify-between">
        <label for="ContactPersonName">Contact Person Name:</label>
        <input type="text" name="ContactPersonName" id="ContactPersonName"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row3["Contact_Person_Name"];?>">
    </p>
    <p class="flex justify-between">
        <label for="ContactPersonName">Contact Person Designation:</label>
        <input type="text" name="ContactPersonDesignation" id="ContactPersonDesignation"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row3["Contact_Person_Designation"];?>">
    </p>
    <p class="flex justify-between">
        <label for="ContactPhoneNo">Contact Person Phone No:</label>
        <input type="text" name="ContactPhoneNo" id="ContactPhoneNo"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row3["Contact_Person_Phone_No"];?>">
    </p>
    <p class="flex justify-between">
        <label for="ContactPersonEmailID">Contact Person Email ID:</label>
        <input type="text" name="ContactPersonEmailID" id="ContactPersonEmailID"class="border-2 p-1 ml-2 mr-2 my-2 w-2/3 rounded" value="<?php echo $row3["Contact_Person_Email_ID"];?>">
    </p> 
    <p class="flex justify-between">
        <label for="Remarks">Remarks:</label>
        <input type="text" name="Remarks" id="Remarks"class="border-2 p-1 ml-2 mr-2 my-2 rounded w-2/3" value="<?php echo $row2["Remarks"];?>">
    </p>       
</div>
<div class="flex justify-center">
    <input type="submit" name="Submit"  class="flex flex-wrap justify-center rounded border p-2 ml-4 sm:my-2 bg-red-400"  value="Submit">
</div>
</div>
</form>
</body>
<?php
if(isset($_POST['Submit']))
{
    $sql1="UPDATE `cdb_cno_name` SET `Name_of_the_Company`='".$_POST["NameCompany"]."' WHERE CNo=".$s;
    $sql2="UPDATE `cdb_company_data` SET `Logo`='".$_POST["Logo"]."',`COLLEGE`='".$_POST["COLLEGE"]."',`Origin`='".$_POST["Origin"]."',`Type_of_Organization`='".$_POST["TypeOrgan"]."',`Employee_Strength`='".$_POST["Employeestrength"]."',`Website`='".$_POST["Website"]."',`Company_Address`='".$_POST["CompanyAddress"]."',`Contact_No`='".$_POST["ContactNo"]."',`Loc`='".$_POST["Location"]."',`Sub_Location`='".$_POST["SubLocation"]."',`Business_Park_Name`='".$_POST["BusinessParkName"]."',`Remarks`='".$_POST["Remarks"]."' WHERE CNo=".$s;
    $sql3="UPDATE `cdb_contact_person` SET `Contact_Person_Name`='".$_POST["ContactPersonName"]."',`Contact_Person_Designation`='".$_POST["ContactPersonDesignation"]."',`Contact_Person_Phone_No`='".$_POST["ContactPhoneNo"]."',`Contact_Person_Email_ID`='".$_POST["ContactPersonEmailID"]."' WHERE CNo=".$s;
    if(mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3))
    {
        echo "<div class='flex justify-center p-2 rounded text-2xl'>Records Updated Successfully</div>";
        echo "<script type='text/javascript'>location.href = 'edit.php?id=".$s."';</script>";
    }
    else
        echo "<div class='flex justify-center p-2 rounded text-2xl'>Couldnot be Updated</div>";
}
?>
<?php require 'footer.php'?>