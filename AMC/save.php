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
    $total = count($_POST['username']);
    $username_arr = $_POST['username'];
    $fullname_arr = $_POST['Fullname'];
	$password_arr = $_POST['password'];
	mysql_select_db('amcdb');
    for($i = 0; $i < $total; $i++){
        $username = $username_arr[$i];
		$fullname = $fullname_arr[$i];
		$password = $password_arr[$i];
		$sql="UPDATE userdatabase SET password='".$password."', Fullname='".$fullname."' WHERE username='".$username."'";
		$records=mysqli_query($con, $sql) or die('error getting data');
    }
	}
	header('Location: editengineers.php');
	exit();
?>