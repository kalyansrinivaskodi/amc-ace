<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   $con = mysqli_connect($servername, $username, $password,$db);
?>

<!DOCTYPE html>
<html>
<head>
<title>Register Complaint</title>
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
      #unerror,#dserror,#deperror,#emerror,#pherror,#compcaterror,#comperror{
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
        <a class="link1 " href="index.php">Home </a>
        <a class="link1 " href="#">Register</a></li>
        <a class="link1 " href="complaint_status.php"> Complaint Status</a>
        <a class="link1 " href="login.php"> Login</a>
          
    </div>
  </header>
  <br>
  <br>
  <br>
  <!--  action="online-complaint.php"  -->
  <div class="container-wrap clearfix">
    <div class="container-page center-page">
      <form class=" form-horizontal form-page" action="register.php" onsubmit="return validateFormOnSubmit()" method="post" 
      name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Register Complaint!</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Name</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="name" placeholder="Your Name" class="form-control" onKeyUp="validateName()" id="username" type="text">
            </div>
          </div>
        </div>
        <span id="unerror"></span>
        
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Designation</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<select name="designation" id="design" class="form-control selectpicker"  onchange="validateDesig()" style="height:auto;" placeholder="Designation">
					<option value="select">Select your designation</option>
					<!-- Designation drop down from database-->
					<?php 
						$sql = mysqli_query($con, "SELECT designation FROM designations");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['designation'].' "> '.$row['designation'].' </option>';
						}
					?>
				</select>
            </div>
          </div>
        </div>
        <span id="dserror"></span>
        
        <!-- Select Basic -->
  <div class="form-group"> 
    <label class="col-md-4 control-label">Department</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
		<select name="department" id="dept" class="form-control selectpicker"  onchange="validateDept()" style="height:auto;" placeholder="select">
			<option value="select">Select your department</option>
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
  <span id="deperror"></span>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label">E-Mail</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input name="email" placeholder="E-Mail Address" id="email" class="form-control"  type="text" onKeyUp="validateEmail()">
      </div>
    </div>
  </div>
  <span id="emerror"></span>
  <!-- Text input-->       
  <div class="form-group">
    <label class="col-md-4 control-label">Internal Phone or Mobile</label>  
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input name="phone" placeholder="(845)555-1212" id="phone" class="form-control" type="text" onKeyUp="validatePhone()" maxlength="10">
      </div>
    </div>
  </div>
  <span id="pherror"></span>
  
  <!-- complaint category-->
  <div class="form-group">
          <label class="col-md-4 control-label">Complaint Category</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
				<select name="compcat" id="compcat" class="form-control selectpicker"  onchange="validateCompCat()" style="height:auto;" placeholder="Complaint Category">
					<option value="select">Select category of your complaint</option>
					<!-- Complaint Category drop down from database-->
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
        <span id="compcaterror"></span>
  
  
  <!-- Text input-->  
  <div class="form-group">
    <label class="col-md-4 control-label">Complaint details</label>
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <textarea class="form-control" id="complaint" onKeyUp="validateCompdetails()" name="complaint" placeholder="complaint details"></textarea>
      </div>
    </div>
  </div>
  <span id="comperror"></span>
  <!-- Success message -->
  <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
      <button type="submit" class="btn btn-warning" id="register-btn" name="submit" value="submit">Register <span class="glyphicon glyphicon-send"></span></button>
    </div>
  </div>

</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>