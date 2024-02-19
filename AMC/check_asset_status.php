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
?>
<style><?php include 'css/bootstrap.css'; ?></style>
<style><?php include 'css/style1.css'; ?></style>

<br>
<br>
<?php
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
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit / Delete Asset Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style1.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header class="headers fixed-top  clearfix">
    <div class="header-page row center-page">
      <div class="logo col-md-2">
        <a class="navbar-brand" href="#">AMC</a>
      </div>
      <div class="lists col-md-10">
        <a class="link1 " href="index.php">Home </a>
        <a class="link1 " href="registration_form.php">Register</a></li>
        <a class="link1 " href="#"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
          
    </div>
  </header>
  <br>
  <br>
  <br>
<div class="status-page container">
  <h4>EDIT / DELETE Asset Details</h4>
  <hr></hr>
  <form method="post" class="status-form" action="editdelete_master_asset_list.php">
  	<p>Please Enter the Asset ID</p>
  	<input type="text" class="login-field" name="id" placeholder="Asset ID" id="asset-id" >
  	<input id="button" class="status-btn" type="submit" name="submit" value="submit" >

  </form>
</div>

</body>
</html>