<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint Status</title>
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
  <h4>check status of your complaint</h4>
  <hr></hr>
  <form method="post" class="status-form" action="check_status.php">
  	<p>Please enter your complaint number</p>
  	<input type="text" class="login-field" name="id" placeholder="complaint number" id="complaint-id" >
  	<input id="button" class="status-btn" type="submit" name="submit" value="submit" >

  </form>
</div>

</body>
</html>