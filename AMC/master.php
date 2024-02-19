<?php
include 'header.php'; 
$servername = "localhost";
$username = "root";
$password = "2502";
$db="amcdb";
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!(isset($_POST['submit']))){
// if they directly try to open register.php before registering complaint then it will be redirected back to form page
header('Location: add_master_asset_list.php');
exit();
}

$dept=$_POST['department'];
$usernames=$_POST['usernames'];
$category=$_POST['category'];
$serialno=$_POST['serialno'];
$make=$_POST['make'];
$model=$_POST['model'];
$warranty=$_POST['warranty'];
$ramsize=$_POST['ramsize'];
$harddisk=$_POST['harddisk'];
$processor=$_POST['processor'];
$os=$_POST['os'];
$mmake=$_POST['mmake'];
$mserialno=$_POST['mserialno'];

$sql ="INSERT INTO master_asset_list (Department,username,asset_category,serial_no,make,model,warranty,ram_size,hard_disk,os,processor,monitor_make,monitor_serial_no) 
VALUES ('$dept','$usernames','$category','$serialno','$make','$model','$warranty','$ramsize','$harddisk','$processor','$os','$mmake','$mserialno')";
if ($con->query($sql) === TRUE) {
	//The below statement is used to disallow user to reload register.php after submitting the form
	echo "<script>history.pushState({}, '', '')</script>";
	
    $last_id = $con->insert_id;
    echo "<br><br><br>";
    echo "<div class='register_success'>";
    echo "<b>The Asset has been added Successfully </b><br>";
    echo "<b>Your Asset ID is: " . $last_id."</b><br>";
    echo "<b>Do you want to add more asset</b>";
	echo "<a href=" . "add_master_asset_list.php" . " >Click Here </a>";
    echo "</div>";
	echo "<br><br><br>";
   
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
