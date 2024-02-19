
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
	if (isset($_POST['holiday'])){
      
      $holiday = $_POST['holiday'];
	  $weekend = date('w', strtotime($holiday));
	  if(($weekend == 0) || ($weekend == 6)){
		$str = 1;
	  }
	  else{
		$str = 0;
	  }
      
      $query ="INSERT INTO closed_holidays (holiday,weekend) VALUES ('$holiday','$str')";
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
    }
	mysql_select_db('amcdb');
	$sql="SELECT holiday,weekend FROM closed_holidays";
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
		<h4 class="display-page">Add Holidays</h4>
		<form action='add_holidays.php' method="post">
		
		<div class="form-group">
          <label class="col-md-4 control-label">Date</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="date" name="holiday" class="form-control" id="holiday">
            </div>
          </div>
        </div>
		
		<div class="form-group">
		<label class="col-md-4 control-label"></label>
		<div class="col-md-4">
		<button type="submit" class="btn btn-warning" id="register-btn" name="submitTwo" value="submit">Add</button>
		</div>
		</div>
		</form>
		<table  border="1" cellpadding="10" cellspacing="1"class="center-page" >
			<thead>
			<tr>
				<th>Holidays</th>
				<th>Weekend</th>
				<th>Delete</th>
			<tr>
			</thead>		
			<?php
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>".$emp['holiday']."</td>";
					if($emp['weekend']){
						echo "<td>Yes</td>";
					}
					else{
						echo "<td>No</td>";
					}
					echo "<td><button><a href='delete_holiday.php?pid=".$emp['holiday']."'>Delete</a></button></td>";
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>