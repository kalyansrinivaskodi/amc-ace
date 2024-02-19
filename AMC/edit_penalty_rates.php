
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
	$sql="SELECT * FROM complaint";
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
		<h4 class="display-page">EDIT Penalty Rates</h4>
		<form action='save_penalty_rates.php' method="post">
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
			<tr>
				<th>Complaint Category</th>
				<th>One Day</th>
				<th>Two Days</th>
				<th>Three Days</th>
				<th>Four Days</th>
				<th>Five Days</th>
				<th>Six Days</th>
				<th>Seven Days</th>
				<th>Eight Days</th>
				<th>Nine Days</th>
				<th>Ten Days</th>
				<th>Greater Than Ten Days</th>
			<tr>
			</thead>		
			<?php
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td><input  name='complaintcategory[]' class='form-control' id='complaintcategory' type='hidden' value='".$emp['complaintcategory']."'>".$emp['complaintcategory']."</td>";
					echo "<td><input  name='one_day[]' class='form-control' id='one_day' type='text' value='".$emp['one_day']."'></td>";
					echo "<td><input  name='two_days[]' class='form-control' id='two_days' type='text' value='".$emp['two_days']."'></td>";
					echo "<td><input  name='three_days[]' class='form-control' id='three_days' type='text' value='".$emp['three_days']."'></td>";
					echo "<td><input  name='four_days[]' class='form-control' id='four_days' type='text' value='".$emp['four_days']."'></td>";
					echo "<td><input  name='five_days[]' class='form-control' id='five_days' type='text' value='".$emp['five_days']."'></td>";
					echo "<td><input  name='six_days[]' class='form-control' id='six_days' type='text' value='".$emp['six_days']."'></td>";
					echo "<td><input  name='seven_days[]' class='form-control' id='seven_days' type='text' value='".$emp['seven_days']."'></td>";
					echo "<td><input  name='eight_days[]' class='form-control' id='eight_days' type='text' value='".$emp['eight_days']."'></td>";
					echo "<td><input  name='nine_days[]' class='form-control' id='nine_days' type='text' value='".$emp['nine_days']."'></td>";
					echo "<td><input  name='ten_days[]' class='form-control' id='ten_days' type='text' value='".$emp['ten_days']."'></td>";
					echo "<td><input  name='greater_than_ten_days[]' class='form-control' id='greater_than_ten_days' type='text' value='".$emp['greater_than_ten_days']."'></td>";
					echo "</tr>";
				}
				echo "<input type='submit' class='btn btn-warning logout-btn' name='update' value='UPDATE'/>";
			?>
		</table>
		</form>
	</body>
</html>