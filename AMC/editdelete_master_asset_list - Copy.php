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
<style><?php include 'css/bootstrap.css'; ?></style>
<style><?php include 'css/style1.css'; ?></style>

<br>
<br>
<?php

if (isset($_POST['id'])){
//3.1.1 Assigning posted values to variables.
$MyId = $_POST['id'];
//3.1.2 Checking the values are existing in the database or not
mysql_select_db('amcdb');
$query = "SELECT * FROM `master_asset_list` WHERE Asset_Id='$MyId' ";
$records=mysqli_query($con, $query) or die('error getting data');

$count = mysqli_num_rows($records);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	// ID exists in database
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Asset ID";
// Page will be sent back
header('Refresh: 0; url=check_asset_status.php');
echo "<script type='text/javascript'>alert('$fmsg');</script>";
exit();
}
}
else{
// if they try to open this page before complaint_status.php, it will be directed to complaint_status.php
header('Location: check_asset_status.php');
exit();
}
?>

<html>
	<head>	
	<script src="js/print.js"></script>
	<script src="js/master_asset.js"></script>

<style>
#success_message{ display: none;}
.display-page{
        text-align: center;
        text-transform: uppercase;
        color:#b30000;
      }
      #unerror,#dserror,#deperror,#emerror,#pherror,#compcaterror,#snerror,#merror, #mderror, #werror, #ramerror, #hderror, #prerror, #oserror, #mmerror, #mserror, #comperror{
  margin:0 auto;
  display: table;
}
#register-btn{
  width: 100%;
}
</style>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 1px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
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
		<button style="margin-left:50px;" onclick="location.href='welcome.php';">Back</button>
	<br>
  <!--  action="online-complaint.php"  -->
  <div class="container-wrap clearfix">
    <div class="container-page center-page">
      <form class="form-horizontal form-page" action="master.php" onSubmit="return validateFormOnSubmit()" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Edit / Delete Asset Details</legend>

		<form action='save_asset.php' method="post">
		<div id="printableTable">
		
<table>
<tr>
		<td width="50%" style="text-align:left">
	<div class="form-group"> 
    //<label class="col-md-4 control-label">AssetID</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
		
			<!-- Department drop down from database-->
			<?php 
			
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
						echo "<label class=\"col-md-4 control-label\">AssetID</label>";
						echo "<div class='col-md-4 selectContainer'><div class='input-group'>";
						echo "<td><input  name='Asset_Id' placeholder='Asset_Id' class='form-control' style='height:auto; width:auto' id='Asset_Id' type='text' value='".$emp['Asset_Id']."' readonly></td></tr>";
						echo "</div></div>";
						
						echo "<label class='col-md-4 control-label'>Department</label>";
						echo "<div class='col-md-4 selectContainer'><div class='input-group'>";
						echo "<tr><td><input  name='Department' placeholder='Department' class='form-control' id='Department' style='height:auto; width:auto' type='text' value='".$emp['Department']."' readonly></td></tr>";
						echo "</div></div>";
						
						
						echo "<tr><td><input  name='asset_category' placeholder='asset_category' class='form-control' id='asset_category' type='text' value='".$emp['asset_category']."' readonly></td></tr>";
						echo "<td><input  name='username' placeholder='UserName' class='form-control' id='username' type='text' value='".$emp['username']."'></td>";
						echo "<td><input  name='serial_no' placeholder='serial_no' class='form-control' id='serial_no' type='text' value='".$emp['serial_no']."'></td>";
						echo "<td><input  name='make' placeholder='make' class='form-control' id='make' type='text' value='".$emp['make']."'></td>";
						echo "<td><input  name='model' placeholder='model' class='form-control' id='model' type='text' value='".$emp['model']."'></td>";
						echo "<td><input  name='warranty' placeholder='warranty' class='form-control' id='warranty' type='text' value='".$emp['warranty']."'></td>";
						echo "<td><input  name='ram_size' placeholder='ram_size' class='form-control' id='ram_size' type='text' value='".$emp['ram_size']."'></td>";
						echo "<td><input  name='hard_disk' placeholder='hard_disk' class='form-control' id='hard_disk' type='text' value='".$emp['hard_disk']."'></td>";
						echo "<td><input  name='os' placeholder='os' class='form-control' id='os' type='text' value='".$emp['os']."'></td>";
						echo "<td><input  name='processor' placeholder='processor' class='form-control' id='processor' type='text' value='".$emp['processor']."'></td>";
						echo "<td><input  name='monitor_make' placeholder='monitor_make' class='form-control' id='monitor_make' type='text' value='".$emp['monitor_make']."'></td>";
						echo "<td><input  name='monitor_serial_no' placeholder='monitor_serial_no' class='form-control' id='monitor_serial_no' type='text' value='".$emp['monitor_serial_no']."'></td>";
					
				}
			?>
		
      </div>
    </div>
  </div>
	<span id="deperror"></span>
	</td>
	<td>
        <!-- Text input-->
        <div class="form-group">
         // <label class="col-md-4 control-label">Department</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <?php 
			
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					
			       echo "<input  name='Department' placeholder='Department' class='form-control' id='Department' type='text' value='".$emp['Department']."' readonly>";
				}
				?>	
			 </div>
          </div>
        </div>
        <span id="unerror"></span>
       </td> </tr>
	   
	<tr>
		<td width="50%" style="text-align:left">
	<div class="form-group"> 
    <label class="col-md-4 control-label">Asset Category</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
		
			<!-- Department drop down from database-->
			<?php 
			
				echo "<td><input  name='asset_category' placeholder='asset_category' class='form-control' id='asset_category' type='text' value='".$emp['asset_category']."' readonly></td>";
					
			?>
		
      </div>
    </div>
  </div>
	<span id="deperror"></span>
	</td>
	<td>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Username</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <?php 
			
				//while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					
			     echo "<td><input  name='username' placeholder='UserName' class='form-control' id='username' type='text' value='".$emp['username']."'></td>";
				?>	
			 </div>
          </div>
        </div>
        <span id="unerror"></span>
       </td> </tr>
	   
	   
	   
	   
	   

	   
		
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>

			<tr>
				
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
				<th>Delete</th>
				
			<tr>
			</thead>		
			<?php
				
				
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					# code...
					echo "<tr>";
										
					echo "<td><input  name='Asset_Id' placeholder='Asset_Id' class='form-control' id='Asset_Id' type='text' value='".$emp['Asset_Id']."' readonly></td>";
					echo "<td><input  name='Department' placeholder='Department' class='form-control' id='Department' type='text' value='".$emp['Department']."' readonly></td>";
					echo "<td><input  name='asset_category' placeholder='asset_category' class='form-control' id='asset_category' type='text' value='".$emp['asset_category']."' readonly></td>";
					echo "<td><input  name='username' placeholder='UserName' class='form-control' id='username' type='text' value='".$emp['username']."'></td>";
					echo "<td><input  name='serial_no' placeholder='serial_no' class='form-control' id='serial_no' type='text' value='".$emp['serial_no']."'></td>";
					echo "<td><input  name='make' placeholder='make' class='form-control' id='make' type='text' value='".$emp['make']."'></td>";
					echo "<td><input  name='model' placeholder='model' class='form-control' id='model' type='text' value='".$emp['model']."'></td>";
					echo "<td><input  name='warranty' placeholder='warranty' class='form-control' id='warranty' type='text' value='".$emp['warranty']."'></td>";
					echo "<td><input  name='ram_size' placeholder='ram_size' class='form-control' id='ram_size' type='text' value='".$emp['ram_size']."'></td>";
					echo "<td><input  name='hard_disk' placeholder='hard_disk' class='form-control' id='hard_disk' type='text' value='".$emp['hard_disk']."'></td>";
					echo "<td><input  name='os' placeholder='os' class='form-control' id='os' type='text' value='".$emp['os']."'></td>";
					echo "<td><input  name='processor' placeholder='processor' class='form-control' id='processor' type='text' value='".$emp['processor']."'></td>";
					echo "<td><input  name='monitor_make' placeholder='monitor_make' class='form-control' id='monitor_make' type='text' value='".$emp['monitor_make']."'></td>";
					echo "<td><input  name='monitor_serial_no' placeholder='monitor_serial_no' class='form-control' id='monitor_serial_no' type='text' value='".$emp['monitor_serial_no']."'></td>";
					
					
					echo "<td><button><a href='delete_asset.php?pid=".$emp['Asset_Id']."'>Delete</a></button></td>";
					echo "</tr>";
					
					
				}
				echo "<input type='submit' class='btn btn-warning logout-btn' name='update' value='UPDATE'/>";
			?>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
		</form>
	</body>
</html>