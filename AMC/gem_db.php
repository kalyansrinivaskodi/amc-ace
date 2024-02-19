<?php
$servername = "localhost";
$username = "root";
$password = "2502";
$db="gem";
$con = mysqli_connect($servername, $username, $password,$db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!(isset($_POST['work']))){
// if they directly try to open register.php before registering complaint then it will be redirected back to form page
header('Location: gem_collection.php');
exit();
}
$work=$_POST['work'];
$div=$_POST['div'];
$iunderg=$_POST['iunderg'];
$ioutsideg=$_POST['ioutsideg'];
$cummilative=$_POST['cummilative'];

$sql ="INSERT INTO collection (division_unit,items_under_gem,items_outside_gem,cummilaive,name_of_work) 
VALUES ('$div','$iunderg','$ioutsideg','$cummilative','$work')";
if ($con->query($sql) === TRUE) {
    echo "Please check the database.";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
