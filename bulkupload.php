<?php
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on local server)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "companies"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        // show error message
        $message = 'Invalid file type, please use .CSV file!';
        echo $message;
    } else {

        move_uploaded_file($_FILES["file"]["tmp_name"], "/var/www/my_domain/CompanyDatabase/files/" . $_FILES['file']['name']);

       $file = "/var/www/my_domain/CompanyDatabase/files/" . $_FILES['file']['name'];

        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE cdb
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY '\n'
         IGNORE 1 LINES
         (Name_of_the_Company, Origin, Type_of_Organization,Employee_Strength,Website,Company_Address,Contact_No,Loc,Sub_Location,Business_Park_Name,Contact_Person_Name,Contact_Person_Phone_No,Contact_Person_Email_ID,Remarks)
eof;
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
    $msg ="failed";
   }
   else
   $msg = "CSV file successfully imported!";
  }
     header('Location: index.php');
}
?>