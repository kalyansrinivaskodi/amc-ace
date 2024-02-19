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
#echo "Connected successfully <br>";
if(!isset($_SESSION['admin_login']))
{
   	// not logged in
    header('Location: login.php');
    exit();
}
	mysql_select_db('amcdb');
	$aid = $_REQUEST['pid'];
	$sql="DELETE FROM master_asset_list WHERE Asset_Id LIKE '".$_REQUEST['pid']."'";
	$records=mysqli_query($con, $sql) or die('error getting data');
	echo "<br>";
	echo "<br>";
	echo "<h1>";
	echo "<button style='margin-left:600px; margin-top:200px; color:red' class='btn btn-warning logout-btn'><a style='font:red; font-size:16px;' href='check_asset_status.php'>Asset ID ".$aid." DELETED Successfully</a></button>";
	echo "</h1>";
	//header('Location: check_asset_status.php');
	//exit();
?>