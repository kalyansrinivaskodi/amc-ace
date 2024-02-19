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
if (isset($_POST['id'])){

	$MyId = $_POST['id'];

	//mysql_select_db('amcdb');
	$query = "SELECT * FROM `master_asset_list` WHERE Asset_Id='$MyId' ";
	$records=mysqli_query($con, $query) or die('error getting data');
	$count = mysqli_num_rows($records);

	if ($count == 1){
	}else{
		$fmsg = "Invalid Asset ID. Please try again!";
		echo "<script type='text/javascript'>alert('$fmsg');</script>";
		header("Location: check_asset_status.php");
		exit();
	}
}else{

		header('Location: check_asset_status.php');
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
	
?>

<html>
	<head>	
	<script src="js/print.js"></script>
	<script src="js/master_asset.js"></script>
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
		<button style="margin-left:50px;" onclick="location.href='check_asset_status.php';">Back</button>
	<br>
  <!--  action="online-complaint.php"  -->
  <div class="container-wrap clearfix">
    <div class="container-page center-page">
       <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Edit / Delete Asset Details</legend>
		<form action='save_asset.php' method="post">
		<div id="printableTable">
		
		
		<table  border="2" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>
				
			<?php
				
				
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					# code...
					echo "<tr>";
					echo "<th>AssetID</th>";
					echo "<td><input  name='Asset_Id' placeholder='Asset_Id' class='form-control' id='Asset_Id' style='width:auto; height:auto' type='text' value='".$emp['Asset_Id']."' readonly></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Department</th>";
					echo "<td><input  name='Department' placeholder='Department' class='form-control' id='Department' style='width:auto; height:auto' type='text' value='".$emp['Department']."' readonly></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Asset Category</th>";
					echo "<td><input  name='asset_category' placeholder='asset_category' class='form-control' id='asset_category' style='width:auto; height:auto' type='text' value='".$emp['asset_category']."' readonly></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>User Name</th>";
					echo "<td><input  name='username' placeholder='UserName' class='form-control' id='username' style='width:auto; height:auto' type='text' value='".$emp['username']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Serial No</th>";
					echo "<td><input  name='serial_no' placeholder='serial_no' class='form-control' id='serial_no' style='width:auto; height:auto' type='text' value='".$emp['serial_no']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Make</th>";
					echo "<td><input  name='make' placeholder='make' class='form-control' id='make' style='width:auto; height:auto' type='text' value='".$emp['make']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Model</th>";
					echo "<td><input  name='model' placeholder='model' class='form-control' id='model' style='width:auto; height:auto' type='text' value='".$emp['model']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Warranty</th>";
					echo "<td><input  name='warranty' placeholder='warranty' class='form-control' id='warranty' style='width:auto; height:auto' type='text' value='".$emp['warranty']."'></td>";
					echo "</tr>";
					
					
					echo "<tr>";
					echo "<th>RAM Size</th>";
					echo "<td><input  name='ram_size' placeholder='ram_size' class='form-control' id='ram_size' style='width:auto; height:auto' type='text' value='".$emp['ram_size']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Hard Disk</th>";
					echo "<td><input  name='hard_disk' placeholder='hard_disk' class='form-control' id='hard_disk' style='width:auto; height:auto' type='text' value='".$emp['hard_disk']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Processor</th>";
					echo "<td><input  name='os' placeholder='os' class='form-control' id='os' style='width:auto; height:auto' type='text' value='".$emp['os']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Operating System</th>";
					echo "<td><input  name='processor' placeholder='processor' class='form-control' id='processor' style='width:auto; height:auto' type='text' value='".$emp['processor']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Monitor Make</th>";
					echo "<td><input  name='monitor_make' placeholder='monitor_make' class='form-control' id='monitor_make' style='width:auto; height:auto' type='text' value='".$emp['monitor_make']."'></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th>Monitor Serial No</th>";
					echo "<td><input  name='monitor_serial_no' placeholder='monitor_serial_no' class='form-control' id='monitor_serial_no' style='width:auto; height:auto' type='text' value='".$emp['monitor_serial_no']."'></td>";
					echo "</tr>";
					
					echo "<button class='btn btn-warning logout-btn'><a href='delete_asset.php?pid=".$emp['Asset_Id']."'>DELETE</a></button>";
					
					
				}
				echo "<input type='submit' class='btn btn-warning logout-btn' name='update' value='UPDATE'/>";
				echo "<br><br>";
				
			?>
			</thead>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
		</form>
	</body>
</html>