
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
?>
<html>
	<head>	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  
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
      <form class=" form-horizontal form-page" action="add_standby.php" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Register Defective Items sent to Workshop</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Complaint Number</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="text" class="login-field" name="complaintid" placeholder="complaint number" id="complaintid" required>
            </div>
          </div>
        </div>
        <span id="fromerror"></span> 
 
 
 
  <div class="form-group">
          <label class="col-md-4 control-label">User Name</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="usernames" placeholder="User Name" class="form-control" onKeyUp="validateName()" id="usernames" type="text" style="height:auto; width:auto">
            </div>
          </div>
  </div>
 
 <div class="form-group"> 
    <label class="col-md-4 control-label">Department</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
		<select name="department" id="department" class="form-control selectpicker" onChange="validateDept()" style="height:auto; width:auto" placeholder="select" >
			<option value="select" >Select department</option>
			<!-- Department drop down from database-->
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
          <label class="col-md-4 control-label">Asset Category</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="category" id="category" class="form-control selectpicker" onChange="validateCat()" style="height:auto; width:auto;" placeholder="category">
					<option value="select">Select your asset category</option>
					<!-- Designation drop down from database-->
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
    <label class="col-md-4 control-label">Engineer Name</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
		<select name="engineer" id="engineer" class="form-control selectpicker" style="height:auto;" placeholder="select">
			<?php 
			$sql = mysqli_query($con, "SELECT Fullname FROM userdatabase WHERE priority = 1");
			while ($row = $sql->fetch_assoc()){
				echo '<option value=" '.$row['Fullname'].' "> '.$row['Fullname'].' </option>';
			}
			?>
		</select>
      </div>
    </div>
  </div>
  
  <div class="form-group">
          <label class="col-md-4 control-label">Date of Carrying Material</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
             
			  <input type="date" name="date" class="form-control" id="date" required>
            </div>
          </div>
		</div>
  <span id="toerror"></span>
  
  <div class="form-group">
          <label class="col-md-4 control-label">Gate Pass Number</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="text" class="login-field" name="gate_pass_no" placeholder="gate pass number" id="gate_pass_no" required>
            </div>
          </div>
        </div>
  
	<div class="form-group">
          <label class="col-md-4 control-label">Returnable ?</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<select name="returnable" id="returnable" class="form-control selectpicker" style="height:auto;" placeholder="Returnable ?">
					<option value="1">Returnable</option>
					<option value="0">Non Returnable</option>
				</select>
            </div>
          </div>
    </div>
	
	<center><legend>Item Details</legend></center>
	
	<div class="form-group">
          <label class="col-md-4 control-label">Description of material</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="text" class="login-field" name="description" placeholder="Description" id="description" required>
            </div>
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-md-4 control-label">Model/Make/Serial No</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			  <input type="text" class="login-field" name="serial" placeholder="Madel/Make/Serial No" id="serial" required>
            </div>
          </div>
        </div>
		
		<div class="form-group">
          <label class="col-md-4 control-label">Quantity</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
				<input type="number" name="quantity" id="quantity" min="0" required></input>
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