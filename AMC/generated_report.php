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
	
	$from=$_POST['from'];
	$from1=date("d-m-Y", strtotime($from));
	$to=$_POST['to'];
	$to1=date("d-m-Y", strtotime($to));
	$department=$_POST['department'];
	$compcat=$_POST['compcat'];
	$status=$_POST['status'];
	
	$heading = "Report of all ";
	$temp1 ="";
	$temp2 ="";
	
	mysql_select_db('amcdb');
	$sql="SELECT * FROM usercomplaint WHERE in_dt >= '".$from."' AND in_dt <= '".$to."'";
    if ($department != "select") {
		$sql2=" AND dept_name LIKE '".$department."'";
		$sql = $sql . $sql2; 
		$temp1 = "for ".$department." department ";
    }
	if ($compcat != "select") {
		$sql3=" AND complaintcategory LIKE '".$compcat."'";
		$sql = $sql . $sql3; 
		$temp2 = "for complaint category ".$compcat."";
    }
	if ($status != "select") {
		$sql4=" AND status LIKE '".$status."'";
		$sql = $sql . $sql4; 
		$heading = $heading.$status;
    }
	$heading = $heading." complaints ";
	$heading = $heading.$temp1;
	$heading = $heading.$temp2;
	$heading = $heading."from ".$from1." to ".$to1." ";
	
	$sql5=" ORDER BY id DESC";
	$sql = $sql . $sql5; 
	
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
        <a class="navbar-brand" href="index.php">AMC</a>
      </div>
      <div class="lists col-md-10">
        <a class="link1 " href="index.php">Home </a>
        <a class="link1 " href="registration_form.php">Register</a></li>
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
    </div>
  </header>
  <br>
		<button style="margin-left:50px;" onclick="location.href='report.php';">Back</button>
		<h4 class="display-page">Report</h4>
		<button class='btn btn-warning logout-btn' onclick='printDiv()'>Print</button>
		<div id="printableTable">
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
			<tr>
				<th colspan=14><?php echo "<center>".$heading."</center>";?></th>
			</tr>
			<tr>
				<th>S.No</th>
				<th>Complaint No</th>
				<th>Name</th>
				<th>Designation</th>
				<th>Department</th>
				<th>Complaint Date and Time</th>
				<th>Complaint Category</th>
				<th>Complaint Details</th>
				<th>Complaint Attended Date and Time</th>
				<th>Attended By</th>
				<th>Remarks</th>
				<th>Status</th>
				<th>Log Report No</th>
				
			<tr>
			</thead>		
			<?php
				$sno = 1;
				$at_dt_zero="";
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					# code...
					
					if(!isset ($emp['at_dt'])){
						$at_dt_zero = "";
					}
					else {
						
						$at_dt_zero = date("d-m-Y H:i:s", strtotime($emp['at_dt']));
						
						if($at_dt_zero == '01-01-1970 01:00:00') {
							$at_dt_zero = "";
						}
					}
					
					echo "<tr>";
					echo "<td>".$sno."</td>";
					echo "<td>".$emp['id']."</td>";
					echo "<td>".$emp['name']."</td>";
					echo "<td>".$emp['designation']."</td>";
					echo "<td>".$emp['dept_name']."</td>";
					echo "<td>".date("d-m-Y H:i:s", strtotime($emp['in_dt']))."</td>";
					echo "<td>".$emp['complaintcategory']."</td>";
					echo "<td>".$emp['complaint']."</td>";
					echo "<td>".$at_dt_zero."</td>";
					echo "<td>".$emp['Recieved_by']."</td>";
					echo "<td>".$emp['Remarks']."</td>";
					echo "<td>".$emp['status']."</td>";
					echo "<td>".$emp['LogNo']."</td>";
					echo "</tr>";
					$sno = $sno + 1;
				}
			?>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
	</body>
</html>