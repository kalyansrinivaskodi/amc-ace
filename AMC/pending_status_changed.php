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
$State=$_POST['state'];
$complaint=$_POST['remarks'];
$myId = $_SESSION['MyId'];

if($State=='standby')
{
echo "<p>hello inside standby</p>"	;
$sql = "UPDATE usercomplaint SET Recieved_by='$name', Remarks='$complaint', LogNo='$LogNo', status='$State',Stand_By_Date=now() WHERE id='$myId'";
}
else{
	$sql = "UPDATE usercomplaint SET Recieved_by='$name', Remarks='$complaint', LogNo='$LogNo', status='$State',at_dt=now() WHERE id='$myId'";
}
if ($con->query($sql) == TRUE) {
	$con->close();
	header('Location: pending.php');
	exit();
}
?>
