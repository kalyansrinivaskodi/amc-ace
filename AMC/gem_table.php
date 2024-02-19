<?php
$servername = "localhost";
$username = "root";
$password = "2502";
$db="gem";
$con = mysqli_connect($servername, $username, $password,$db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * from collection";

?>