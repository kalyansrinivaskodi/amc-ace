<?php
session_start();
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
if(!isset($_SESSION['admin_login']))
{
   	// not logged in
    header('Location: login.php');
    exit();
}
	if(isset($_POST['update'])){
    $Asset_Id = $_POST['Asset_Id'];
    $Department = $_POST['Department'];
    $asset_category = $_POST['asset_category'];
	$username = $_POST['username'];
	$serial_no = $_POST['serial_no'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$warranty = $_POST['warranty'];
	$ram_size = $_POST['ram_size'];
	$hard_disk = $_POST['hard_disk'];
	$os = $_POST['os'];
	$processor = $_POST['processor'];
	$monitor_make = $_POST['monitor_make'];
	$monitor_serial_no = $_POST['monitor_serial_no'];
		
	$msg="Asset Successfully Updated";
	$msg1="Asset Not Updated. Please Check";
	mysql_select_db('amcdb');
	
		$sql="UPDATE master_asset_list SET username='".$username."', serial_no='".$serial_no."', make='".$make."', model='".$model."', warranty='".$warranty."', ram_size='".$ram_size."', hard_disk='".$hard_disk."', os='".$os."', processor='".$processor."', monitor_make='".$monitor_make."', monitor_serial_no='".$monitor_serial_no."' WHERE Asset_Id='".$Asset_Id."'";
		
		$records=mysqli_query($con, $sql) or die('error getting data');
		
	}
	header('Location: check_asset_status.php');
	exit();
?>