
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  
  <script src="js/register.js"></script>
	<style>
#success_message{ display: none;}
.display-page{
        text-align: center;
        text-transform: uppercase;
        color:#b30000;
      }
      #unerror,#dserror,#deperror,#emerror,#pherror,#comperror{
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
        <a class="link1 " href="#">Home </a>
        <a class="link1 " href="registration_form.php">Register</a></li>
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
          
    </div>
  </header>
  <br>
  <button style="margin-left:50px;" onclick="location.href='welcome.php';">Back</button>
		<div class="container-wrap clearfix">
    <div class="container-page center-page">
      <form class=" form-horizontal form-page" action="generated_master_report.php" onsubmit="return validateReportOnSubmit()" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Report</legend>
         
        
        <!-- Select Basic -->
  <div class="form-group"> 
    <label class="col-md-4 control-label">Department</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
		<select name="department" id="dept" class="form-control selectpicker" style="height:auto;" placeholder="select">
			<option value="select">All departments</option>
			<?php 
			$sql = mysqli_query($con, "SELECT dept_name FROM departments");
			while ($row = $sql->fetch_assoc()){
				echo '<option value=" '.$row['dept_name'].' "> '.$row['dept_name'].' </option>';
			}
			?>
		</select>
      </div>
    </div>
  </div>
  <!-- <span id="deperror"></span> -->
  
  <div class="form-group">
          <label class="col-md-4 control-label">Asset Category</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="assetcat" id="assetcat" class="form-control selectpicker" style="height:auto;" placeholder="Asset Category">
					<option value="select">All categories of Assets</option>
					<?php 
						$sql = mysqli_query($con, "SELECT asset_category FROM asset_category");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['asset_category'].' "> '.$row['asset_category'].' </option>';
						}
					?>
				</select>
            </div>
          </div>
        </div>
		
	 <div class="form-group">
          <label class="col-md-4 control-label">Processor</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="proccat" id="proccat" class="form-control selectpicker" style="height:auto;" placeholder="Processor Category">
					<option value="select">All Types of Processor</option>
					<?php 
						$sql = mysqli_query($con, "SELECT processor FROM processor");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['processor'].' "> '.$row['processor'].' </option>';
						}
					?>
				</select>
            </div>
          </div>
        </div>	
		
			
	 <div class="form-group">
          <label class="col-md-4 control-label">Operating System</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="oscat" id="oscat" class="form-control selectpicker" style="height:auto;" placeholder="Operating System">
					<option value="select">All Types of OS</option>
					<?php 
						$sql = mysqli_query($con, "SELECT os FROM operating_system");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['os'].' "> '.$row['os'].' </option>';
						}
					?>
				</select>
            </div>
          </div>
        </div>	
		
	
		
  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
      <button type="submit" class="btn btn-warning" id="register-btn" name="submitTwo" value="submit">Submit</button>
    </div>
  </div>

</fieldset>
</form>
</div>
</div>
</body>
</html>