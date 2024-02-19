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
	$sql="DELETE FROM userdatabase WHERE username LIKE '".$_REQUEST['pid']."'";
	$records=mysqli_query($con, $sql) or die('error getting data');
	header('Location: editengineers.php');
	exit();
?>