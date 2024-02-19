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
include 'header.php'; 
if(!isset($_SESSION['admin_login']))
{
  	// not logged in
    header('Location: login.php');
    exit();
}

$name=$_POST['name'];
// echo "<p>".$name."</p>";

// $LogNo=$_POST['LogNo'];
$inDate=$_POST['inDate'];
$complaint=$_POST['remarks'];
$myId = $_SESSION['MyId'];

$sql = "UPDATE defective_items SET  Remarks='$complaint', status='completed', in_date='$inDate' WHERE id='$myId'";
echo "<p>user details updated successfully</p>";
if ($con->query($sql) === TRUE) {
	$con->close();
	header('Location: view_completed_defective.php');
	exit();
}
?>
