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

if($_SESSION['login_success']==true){ 
    echo "<div class='user-name'>";
    echo $_SESSION["Fullname"];
    echo "</div>";
    echo "<br>";
    echo "<button class='btn btn-warning logout-btn'>";
	echo "<a  href='logout.php'>Logout</a>";
	echo"</button>";
    }
    else{
    echo "user not logged in";
	}   

$name=$_POST['name'];
$LogNo=$_POST['logNo'];
$complaint=$_POST['remarks'];
$myId = $_SESSION['MyId'];

$sql = "UPDATE usercomplaint SET Recieved_by='$name', Remarks='$complaint', LogNo='$LogNo', status='completed',at_dt=now() WHERE id='$myId'";


if ($con->query($sql) === TRUE) {
	$con->close();
	header('Location: give_stand_by_data.php');
	exit();
}
?>
