
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
    echo "</div>";
    echo "<br>";
    echo "<button class='btn btn-warning logout-btn'>";
	echo "<a  href='logout.php'>Logout</a>";
	echo"</button>";
    }
    else{
    echo "user not logged in";
	}   
	unset($_SESSION['x1']);
	unset($_SESSION['x2']);
	unset($_SESSION['x3']);
	unset($_SESSION['x4']);
	unset($_SESSION['x5']);
	unset($_SESSION['x6']);
	unset($_SESSION['x7']);
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
      #fromerror,#toerror{
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
      <form class=" form-horizontal form-page" action="generated_penalty_report.php" onsubmit="return validateReportOnSubmit()" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Penalty Report</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">From</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="date" name="from" class="form-control" id="from">
            </div>
          </div>
        </div>
        <span id="fromerror"></span> 
        
		<div class="form-group">
          <label class="col-md-4 control-label">To</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <input type="date" name="to" class="form-control" id="to">
            </div>
          </div>
        </div>
        <span id="toerror"></span>
       
        
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
  
  <div class="form-group">
          <label class="col-md-4 control-label">Complaint Category</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="compcat" id="compcat" class="form-control selectpicker" style="height:auto;" placeholder="Complaint Category">
					<option value="select">All categories of complaints</option>
					<?php 
						$sql = mysqli_query($con, "SELECT complaintcategory FROM complaint");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['complaintcategory'].' "> '.$row['complaintcategory'].' </option>';
						}
					?>
				</select>
            </div>
          </div>
        </div>
		
	<div class="form-group">
          <label class="col-md-4 control-label">Status</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="status" id="status" class="form-control selectpicker" style="height:auto;" placeholder="Status">
					<option value="select">Both Pending and Completed</option>
					<option value="Pending">Pending</option>
					<option value="Completed">Completed</option>
          <option value="standby">Stand By </option>
				</select>
            </div>
          </div>
    </div>
	
	<div class="form-group">
          <label class="col-md-4 control-label">Preventive Maintenance</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="pm" id="pm" class="form-control selectpicker" style="height:auto;" placeholder="Status">
					<option value="done">Done</option>
					<option value="not_done">Not Done</option>
				</select>
            </div>
          </div>
    </div>
	
	<div class="form-group">
          <label class="col-md-4 control-label">No. of days of Absent of RE's</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<input type="number" name="no_of_absent_days" id="no_of_absent_days" min="0"></input>
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