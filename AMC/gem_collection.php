<?php
$servername = "localhost";
$username = "root";
$password = "2502";
$db="gem";
$con = mysqli_connect($servername, $username, $password,$db);
?>

<!DOCTYPE html>
<html>

<head>
<title>Register Complaint</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  

<script src="js/register.js"></script>

</head>

<body>
<h2>Procurement done in GEM & Non- GeM</h2>

<form  method="POST" action="gem_db.php">    
Name of work: <input type="text" name="work" placeholder="Enter Name of work here..."><br>

Division/Unit: <input type="text" name="div" placeholder="Enter Division/Unit here..."><br>
Items_Procured_Under_GeM: <input type="number" name="iunderg" placeholder="Items_Procured_Under_GeM"><br>
Items_Procured_Outside_GeM: <input type="number" name="ioutsideg" placeholder="Enter Division/Unit here..."><br>
Cummilative: <input type="number" name="cummilative" placeholder="Enter Division/Unit here..."><br>

<button type="submit" value="Submit">Submit</button>
</form>
</body>
</html>