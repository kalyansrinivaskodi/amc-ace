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
<?php include 'header.php'; ?>
<?php
$myId=$_GET['id'];
$_SESSION['MyId'] = $myId;
echo "<a  href='logout.php'>Logout</a>";
	$sql="SELECT gate_pass_number, complaint_id, username, dept_name, complaintcategory, 
	out_date, remarks FROM defective_items WHERE id='$myId'";
	$records=mysqli_query($con, $sql) or die('error getting data');
	$emp=mysqli_fetch_array($records, MYSQLI_ASSOC)
	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>STATUS ENTRY FORM</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  
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
				<h4 class="display-page">Defective Item Entry Form</h4>
				
			</div>
			<hr>
			<form method="POST" action="defective_status_changed.php" class="status-form">
						
					<?php
					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>Gate Pass Number</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='gatepassnumber' value ='".$emp['gate_pass_number']."' 
					placeholder='Gate Pass Number'  required>";
				
					echo "</div></div></div>";
					echo "<br>";
					
					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>Complaint Id</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='complaintid' value ='".$emp['complaint_id']."
					' placeholder='User Complaint Number'  required>";
					echo "</div></div></div>";
					echo "<br>";

					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>User Name</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='username' value ='".$emp['username']."
					' placeholder='User Name'  required>";
					echo "</div></div></div>";
					

					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>Deoartment Name</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='dept' value ='".$emp['dept_name']."
					' placeholder='Department'  required>";
					echo "</div></div></div>";
					

					echo "<div class='form-group'>";
					echo "<label class='col-md-6 control-label'>Complaint Category</label>"; 
					echo "<div class='col-md-6 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='category' value ='".$emp['complaintcategory']."
					' placeholder='Category'  required>";
					echo "</div></div></div>";
					

					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>Out Date</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='text' class='login-field' name='outdate' value ='".$emp['out_date']."
					' placeholder='Out Date'  required>";
					echo "</div></div></div>";

					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>In Date</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<input type='date' name='inDate' class='form-control' id='inDate' required>";
					echo "</div></div></div>";
					

					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label'>Remarks</label>"; 
					echo "<div class='col-md-8 inputGroupContainer'>";
					echo "<div class='input-group'>";
					echo "<textarea rows='5' cols='30' class='login-field' name='remarks' placeholder='Enter Remarks.......'  required>"
					.$emp['remarks']."</textarea>";
					echo "</div></div></div>";
					
					?>
					
					<input id="button" type="submit" name="submit" value="Mark as Completed" class="btn btn-primary  btn-block bt1">
				
			</form> 
		
</body>
  
  
</body>
</html>
