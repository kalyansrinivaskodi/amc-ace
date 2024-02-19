<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   
   $con = mysqli_connect($servername, $username, $password,$db);
   
   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
	}

   if (isset($_POST['username']) and isset($_POST['password'])){
      // username and password sent from form 
      
      $username = $_POST['username'];
	  $password = $_POST['password'];
      
      $query = "SELECT * FROM `userdatabase` WHERE username='$username' and password='$password'";
	  
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
	  $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
			
		 $query1 = "SELECT Fullname, priority FROM `userdatabase`  WHERE username='$username' and password='$password'";
		 $result1 = mysqli_query($con, $query) or die(mysqli_error($con));
		 $emp=mysqli_fetch_array($result1, MYSQLI_ASSOC);
		 
		 // Session variables	
	     $_SESSION['login_success']=$result;
		 $_SESSION['username']=$username;
		 $_SESSION['Fullname']=$emp['Fullname'];
		 $_SESSION['priority']=$emp['priority'];
		 
		 $t = $_SESSION['priority'];
		if ($t > "1") {
			$_SESSION['admin_login']=$result;
		}
		else{
			$_SESSION['engineer_login']=$result;
		}
		if ($t > "2") {
			$_SESSION['super_admin_login']=$result;
		}
		 
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
		 echo "<script type='text/javascript'>alert('$error');</script>";
      }
   }
?>
<html >
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Login Form</title>
  
  
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
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
			<form method="POST" action="login.php">
				<div class="login-form">
					<div class="control-group">
						<input type="text" class="login-field" name="username" placeholder="username" id="login-name" required>
						<label class="login-field-icon fui-user" for="login-name" required></label>
					</div>

					<div class="control-group">
						<input type="password" class="login-field" name="password" placeholder="password" id="login-pass" required>
						<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>
					<input id="button" type="submit" name="submit" value="Log-In" class="btn btn-primary btn-large btn-block">
				</div>
			</form> 
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>