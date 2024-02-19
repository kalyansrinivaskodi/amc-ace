

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

$name=$_POST['name'];
$LogNo=$_POST['logNo'];
$complaint=$_POST['remarks'];
$myId = $_SESSION['MyId'];

$sql = "UPDATE usercomplaint SET Recieved_by='$name', Remarks='$complaint', LogNo='$LogNo', status='pending',at_dt='0000-00-00 00:00:00',reopened=1 WHERE id='$myId'";

if ($con->query($sql) === TRUE) {
    $last_id = $con->insert_id;
    $con->close();
	header('Location: completed.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();


?>
