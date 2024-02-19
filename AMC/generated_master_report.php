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
if(!isset($_SESSION['login_success']))
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
	
	
	$department=$_POST['department'];
	$assetcat=$_POST['assetcat'];
	$proccat=$_POST['proccat'];
	$oscat=$_POST['oscat'];
	
	$heading = "Report of all ";
	$temp1 ="";
	$temp2 ="";
	
	$selected=mysql_select_db('amcdb',$con);
	$sql="SELECT * FROM master_asset_list WHERE Asset_Id >= 1 ";
    if ($department != "select") {
		$sql2=" AND Department LIKE '".$department."'";
		$sql = $sql . $sql2; 
		//$temp1 = "for ".$department." department ";
    }
	if ($assetcat != "select") {
		if($assetcat=="All Printers)
		{
			$sql3=" AND asset_category LIKE'Ink Jet / Desk Jet Printer' OR 'Dot Matrix Printer';
		}

		$sql3=" AND asset_category LIKE '".$assetcat."'";
		$sql = $sql . $sql3; 
		//$temp2 = "for asset category ".$assetcat."";
    }
	if ($proccat != "select") {
		$sql3=" AND os LIKE '".$proccat."'";
		$sql = $sql . $sql3; 
		//$temp2 = "for asset category ".$proccat."";
    }
	if ($oscat != "select") {
		$sql3=" AND processor LIKE '".$oscat."'";
		$sql = $sql . $sql3; 
		$temp2 = "for asset category ".$oscat."";
    }

	//$heading = $heading." complaints ";
	//$heading = $heading.$temp1;
	//$heading = $heading.$temp2;
	//$heading = $heading."from ".$from1." to ".$to1." ";
	
	$sql5=" ORDER BY Department ASC, asset_category ASC";
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
		<button style="margin-left:50px;" onclick="location.href='master_report.php';">Back</button>
		<h4 class="display-page">Report</h4>
		<button class='btn btn-warning logout-btn' onclick='printDiv()'>Print</button>
		<div id="printableTable">
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
			
			<tr>
				<th>SL.No</th>
				<th>AssetID</th>
				<th>Department</th>
				<th>Asset Category</th>
				<th>Username</th>
				<th>Serial No</th>
				<th>Make</th>
				<th>Model</th>
				<th>Warranty</th>
				<th>Ram Size</th>
				<th>Hard Disk</th>
				<th>Processor</th>
				<th>OS</th>
				<th>Monitor Make</th>
				<th>Monitor Serial</th>
				
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
					echo "<td>".$emp['Asset_Id']."</td>";
					echo "<td>".$emp['Department']."</td>";
					echo "<td>".$emp['asset_category']."</td>";
					echo "<td>".$emp['username']."</td>";
					echo "<td>".$emp['serial_no']."</td>";
					echo "<td>".$emp['make']."</td>";
					echo "<td>".$emp['model']."</td>";
					echo "<td>".$emp['warranty']."</td>";
					echo "<td>".$emp['ram_size']."</td>";
					echo "<td>".$emp['hard_disk']."</td>";
					echo "<td>".$emp['os']."</td>";
					echo "<td>".$emp['processor']."</td>";
					echo "<td>".$emp['monitor_make']."</td>";
					echo "<td>".$emp['monitor_serial_no']."</td>";
					echo "</tr>";
					$sno = $sno + 1;
				}
			?>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
	</body>
</html>