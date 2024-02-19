<?php  //Start the Session
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
?>
<?php include 'header.php'; ?>
<?php
$myId=$_GET['id'];
$_SESSION['MyId'] = $myId;
echo "<a  href='logout.php'>Logout</a>";
	//mysql_select_db('amcdb');
	$sql="SELECT Recieved_by, Remarks, LogNo FROM usercomplaint WHERE id='$myId'";
	$records=mysqli_query($con, $sql) or die('error getting data');
	$emp=mysqli_fetch_array($records, MYSQLI_ASSOC)
	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>STATUS ENTRY FORM</title>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
  
  .status-form{
  	
  	width: 35%;
  	padding: 15px;
  	margin:0 auto;
  	display: table;

  }
  .status-form .login-field{
  	width: 100%;
  	padding:5px;
  	border: 1px solid grey;
  	background-color: #fff;
  	border-radius: 2px;
  	margin:3px 0px;
  }
  

  </style>
</head>

<body>
  <body>
	<br>
	<br>
	<br>
			<div class="app-title">
				<h4 class="display-page">AMC ENGINEERS STATUS ENTRY FORM</h4>
				
			</div>
			<hr>
			<form method="POST" action="pending_status_changed.php" class="status-form">
						
					<?php

					echo "<div class='form-group'>";
					echo "<label class='col-md-6 control-label'>Engineer Name</label>"; 
					echo "<div class='col-md-6 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='name' value ='".$_SESSION["Fullname"]."' 
					placeholder='Engineer name'  required>";
					echo "</div></div></div>";


					echo "<div class='form-group'>";
					echo "<label class='col-md-6 control-label'>Serial Number</label>"; 
					echo "<div class='col-md-6 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='logNo' value ='".$emp['LogNo']."'
					placeholder='Call Report Serial Number'  required>";
					echo "</div></div></div>";

					
						
					echo "<div class='form-group' style='border'>";
					echo "<label class='col-md-6 control-label'>
					<input class='col-md-6 control-label' type='radio' id='completed' name='state' value='completed'> Completed </label>"; 					
					echo "</div>";

					echo "<div class='form-group'>";
					echo "<label class='col-md-6 control-label'>
					<input class='col-md-6 control-label' type='radio' id='standby' name='state' value='standby'> Stand By </label>";
					echo "</div>";


					echo "<div class='form-group'>";
					echo "<label class='col-md-6 control-label'>Enter Remarks</label>"; 
					echo "<div class='col-md-10 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<textarea rows='5' cols='30' class='login-field' name='remarks' placeholder='Enter Remarks.......'  required>".$emp['Remarks']."</textarea>";
					echo "</div></div></div>";
					?>
					
					<input id="button" type="submit" name="submit" value="submit" class="btn btn-primary  btn-block bt1">
				
			</form> 
		
</body>
  
  
</body>
</html>
