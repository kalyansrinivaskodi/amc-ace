<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   // Create connection
   $con = mysqli_connect($servername, $username, $password,$db);
   if(!isset($_SESSION['login_success'])){
      header("location:login.php");
      die();
   }
   
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Welcome Page</title>
  
  
  	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style1.css">

</head>
  <body class="login-page-body">
  	<header class="headers fixed-top  clearfix">
    <div class="header-page row center-page">
      <div class="logo col-md-2">
        <a class="navbar-brand" href="#">AMC</a>
      </div>
      <div class="lists col-md-10">
        <a class="link1 " href="index.php">Home </a>
        <a class="link1 " href="registration_form.php">Register</a></li>
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="#"> Login</a>
          
    </div>
  </header>
  <div class='status-page'>
  <h4>A.M.C ENGINEERS LOGIN</h4>
  </div>
  <hr></hr>
  <div class='log-name'>
  <a class='logged-name'>
  <?php echo "Welcome " .$_SESSION['Fullname']. ""; ?>

  </a>
  <br>
  <button class='btn btn-warning logout-btn'>
  <a  href='logout.php'>Logout</a>
  </button>
  </div>
  <br>
  <br>
  <br>
  <?php
  $t = $_SESSION['priority'];
  if ($t > "1") {
    echo "<a class='pending' href='pending.php'>View Pending complaint page</a>";
	}
	else{
		echo "<a class='pending' href='pending.php'>View/Edit Pending complaint page</a>";
	}
  ?>
  <br>
  <a class='completed' href='completed.php'>View completed complaint page</a>
  <br>
  <a class='completed' href='master_report.php'>Master Asset Report</a>
	<br>
  <a class='completed' href='give_stand_by_data.php'>View Stand By complaint list</a>
	<br>

  <?php
  $t = $_SESSION['priority'];
  if ($t > "1") {

  echo "<a class='completed' href='registration_form_with_date.php'>Register AMC complaints with date</a>";
	echo "<br>";

  echo "<a class='completed' href='report.php'>Comlaint Report</a>";
	echo "<br>";
	echo "<a class='completed' href='penalty_report.php'>Penalty Report</a>";
	echo "<br>";
	echo "<a class='completed' href='standby.php'>Register Defective items sent to Workshop</a>";
	echo "<br>";
	echo "<a class='completed' href='view_pending_defective.php'>View Pending Defective items sent to Workshop</a>";
	echo "<br>";
  echo "<a class='completed' href='view_completed_defective.php'>View Completed Defective items sent to Workshop</a>";
	echo "<br>";
  
	
	}
	if ($t > "2") {
	echo "<a class='completed' href='add_master_asset_list.php'>Add Master Asset List</a>";
	echo "<br>";
	echo "<a class='completed' href='view_master_asset_list.php'>View Master Asset List</a>";
	echo "<br>";
	echo "<a class='completed' href='check_asset_status.php'>Edit/Delete Master Asset List</a>";
	echo "<br>";
	echo "<a class='completed' href='addengineers.php'>Add Engineers</a>";
	echo "<br>";
	echo "<a class='completed' href='editengineers.php'>Edit/Delete Engineers</a>";
	echo "<br>";
	echo "<a class='completed' href='edit_penalty_rates.php'>Edit Penalty Rates</a>";
	echo "<br>";
	echo "<a class='completed' href='add_holidays.php'>Add Holidays</a>";
	echo "<br>";
	echo "<a class='completed' href='vlan.php'>VLAN report</a>";
	}
  ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>