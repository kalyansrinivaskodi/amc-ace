
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
<script><?php include 'js/register.js'; ?></script>

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
	//echo "<button class='btn btn-warning logout-btn' onclick='printDiv()'>Print</button>";
    // echo '<a href="logout.php"><span>Logout</span></a></li>'; table clearfix table-bordered table-hover tab-info center-page
	
	if (isset($_POST['username']) and isset($_POST['password'])){
      // username and password sent from form 
      
		$name=$_POST['name'];
		$username=$_POST['username'];
		$mobile=$_POST['mobile'];
		$password=$_POST['password'];

		mysql_select_db('amcdb');
	
		$sql="SELECT * FROM userdatabase WHERE username LIKE '".$username."'";
		$records=mysqli_query($con, $sql) or die('error getting data');
		$num_rows = mysqli_num_rows($records);
		
		if ($num_rows) {
			echo "This username has already been registered. Please choose another username.";
		} 
		else {
			mysql_select_db('amcdb');
			$sql="INSERT INTO userdatabase (username,password,Fullname,mobile,priority) VALUES ('$username','$password','$name','$mobile',1)";
			$records=mysqli_query($con, $sql) or die('errrrror getting data');
			echo "Successfully added a user";
		}	
	}
   }
   else{
		echo "user not logged in";
	}   
?>


<!DOCTYPE html>
<html>
<head>
<title>Add Engineer</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  

<script type="text/javascript" src="js/register.js"></script>

<style>
#success_message{ display: none;}
.display-page{
        text-align: center;
        text-transform: uppercase;
        color:#b30000;
      }
      #nameerror,#usernameerror,#mobileerror,#passworderror{
  margin:0 auto;
  display: table;
}
#register-btn{
  width: 100%;
}
</style>
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
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
          
    </div>
  </header>
  <br>
  <br>
  <br>
  <!--  action="online-complaint.php"  -->
  <div class="container-wrap clearfix">
    <div class="container-page center-page">
      <form class=" form-horizontal form-page" action="addengineers.php" onsubmit="return validateEngineerFormOnSubmit()" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Add an Engineer</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Name</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="name" placeholder="Your Name" class="form-control" onKeyUp="validateEngineerName()" id="name" type="text">
            </div>
          </div>
        </div>
        <span id="nameerror"></span>
		
		<div class="form-group">
          <label class="col-md-4 control-label">Username</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="username" placeholder="Your Username" class="form-control" onKeyUp="validateEngineerUsername()" id="username" type="text">
            </div>
          </div>
        </div>
        <span id="usernameerror"></span>
		
		<div class="form-group">
          <label class="col-md-4 control-label">Mobile Number</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="mobile" placeholder="Your Mobile Number" class="form-control" onKeyUp="validateEngineerMobile()" id="mobile" type="text">
            </div>
          </div>
        </div>
        <span id="mobileerror"></span>
		
		<div class="form-group">
          <label class="col-md-4 control-label">Password</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="password" placeholder="Your Password" class="form-control" onKeyUp="validateEngineerPassword()" id="password" type="password">
            </div>
          </div>
        </div>
        <span id="passworderror"></span>
        
  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
      <button type="submit" class="btn btn-warning" id="register-btn" name="submitTwo" value="submit">Register <span class="glyphicon glyphicon-send"></span></button>
    </div>
  </div>

</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>