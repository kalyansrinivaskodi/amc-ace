
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
	mysql_select_db('amcdb');
	$sql="SELECT Fullname, username, password FROM userdatabase WHERE priority = 1";
	$records=mysqli_query($con, $sql) or die('error getting data');
?>
<html>
	<head>	
	<script src="js/print.js"></script>
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
		<h4 class="display-page">EDIT / DELETE Engineer Details</h4>
		<form action='save.php' method="post">
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
			<tr>
				<th>Username</th>
				<th>Fullname</th>
				<th>Password</th>
				<th>Delete</th>
			<tr>
			</thead>		
			<?php
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td><input  name='username[]' placeholder='UserName' class='form-control' id='username' type='text' value='".$emp['username']."' readonly></td>";
					echo "<td><input  name='Fullname[]' placeholder='FullName' class='form-control' id='fullname' type='text' value='".$emp['Fullname']."'></td>";
					echo "<td><input  name='password[]' placeholder='Password' class='form-control' id='password' type='password' value='".$emp['password']."'></td>";
					echo "<td><button><a href='delete.php?pid=".$emp['username']."'>Delete</a></button></td>";
					echo "</tr>";
				}
				echo "<input type='submit' class='btn btn-warning logout-btn' name='update' value='UPDATE'/>";
			?>
		</table>
		</form>
	</body>
</html>