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
if(!isset($_SESSION['login_success']))
{
  	// not logged in
    header('Location: login.php');
    exit();
}
?>
<style><?php include 'css/bootstrap.css'; ?></style>
<style><?php include 'css/style1.css'; ?></style>

<?php
  if($_SESSION['login_success']==true){ 
  	echo "<br>
  <br>
  ";
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
	#mysql_select_db('amcdb');
	$sql="SELECT * FROM usercomplaint WHERE Status LIKE 'completed' ORDER BY id DESC;";
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
        <a class="link1 " class="active" href="index.php">Home </a>
        <a class="link1 " href="registration_form.php">Register</a></li>
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
    </div>
  </header>
  <br>
  <button style="margin-left:50px;" onclick="location.href='welcome.php';">Back</button>
  	<h4 class="display-page clearfix">Completed Complaint Details</h4>
	<button class='btn btn-warning logout-btn' onclick='printDiv()'>Print</button>
		<div id="printableTable">
		<table border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
				<tr>
					<th>S.No</th>
					<th>Complaint No.</th>
					<th>Name</th>
					<th>Designation</th>
					<th>Department</th>
					<th>Complaint Details</th>
					<th>Complaint Date and Time</th>
					<th>Recieved_By</th>
					<th>Recieved Date and Time</th>
					<th>Remarks</th>
					<th>Status</th>	
				<tr>
			</thead>		
			<?php
				$sno = 1;
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					# code...
					echo "<tr>";
					echo "<td>".$sno."</td>";
					echo "<td>".$emp['id']."</td>";
					echo "<td>".$emp['name']."</td>";
					echo "<td>".$emp['designation']."</td>";
					echo "<td>".$emp['dept_name']."</td>";
					echo "<td>".$emp['complaint']."</td>";
					echo "<td>".date("d-m-Y H:i:s", strtotime($emp['in_dt']))."</td>";
					echo "<td>".$emp['Recieved_by']."</td>";
					echo "<td>".date("d-m-Y H:i:s", strtotime($emp['at_dt']))."</td>";
					echo "<td>".$emp['Remarks']."</td>";
					echo "<td>";
					$t = $_SESSION['priority'];
					if ($t > "1") {
					    echo "<a href='change_completed_status.php?id=$emp[id]'>";
						echo "completed</a>";
					}
					else{
						echo "completed";
					}
					echo "</td>";
					echo "</tr>";
					$sno = $sno + 1;
				}
			?>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
	</body>
</html>
