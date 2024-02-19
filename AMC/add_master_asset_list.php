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
<title>Add Master Asset List</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style1.css">  

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
      <form class="form-horizontal form-page" action="master.php" onSubmit="return validateFormOnSubmit()" method="post" name="form1" id="contact_form" >
      <fieldset>
        <!-- Form Name -->
        <legend class="display-page">Add Master Asset List</legend>

<table>
<tr>
		<td width="50%" style="text-align:left">
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
	<span id="deperror"></span>
	</td>
	<td>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">User Name</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="usernames" placeholder="Your Name" class="form-control" onKeyUp="validateName()" id="usernames" type="text" style="height:auto; width:auto">
            </div>
          </div>
        </div>
        <span id="unerror"></span>
       </td> </tr>
	  <tr> 
      <td>
	            <!-- Text input-->
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
        <span id="dserror"></span>
       </td>
	   <td> 
	<div class="form-group">
          <label class="col-md-4 control-label">Serial No</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="serialno" placeholder="Serial No" class="form-control" onKeyUp="validateSerial()"  id="serialno"  type="text" style="height:auto; width:auto;">
            </div>
          </div>
        </div>
        <span id="snerror"></span>	
	</td></tr>
	<tr><td>
	<div class="form-group">
          <label class="col-md-4 control-label">Make</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="make" placeholder="Make" class="form-control" onKeyUp="validateMake()" id="make" type="text" style="width:auto; height:auto">
            </div>
          </div>
        </div>
        <span id="merror"></span>
		</td>
		<td>
		<div class="form-group">
          <label class="col-md-4 control-label">Model</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input  name="model" placeholder="model" class="form-control" onKeyUp="validateModel()" id="model" type="text" style="width:auto; height:auto">
            </div>
          </div>
        </div>
        <span id="mderror"></span>
	</td>
	<tr>
	<td>
        <!-- Select Basic -->
  
  <!-- Warranty-->
  <div class="form-group">
          <label class="col-md-4 control-label">Warranty</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="warranty" id="warranty" class="form-control selectpicker" onChange="validateWarranty()"  style="height:auto; width:auto" placeholder="Warranty">
					<option value="select">Select Warranty</option>
					<!-- Complaint Category drop down from database-->
					<option value="Yes">Yes</option>;
					<option value="No">No</option>;
					
				</select>
            </div>
          </div>
   </div>
   <span id="werror"></span>
   </td>
   <td>     
  <div class="form-group">
          <label class="col-md-4 control-label">RAM Size</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
			
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			  <select name="ramsize" id="ramsize" class="form-control selectpicker" onChange="validateRamsize()"  style="height:auto; width:auto" placeholder="RAM Size">
					<option value="select">Select RAM Size</option>
					<!-- Complaint Category drop down from database-->
					<?php 
						$sql = mysqli_query($con, "SELECT ram_size FROM ramsize");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['ram_size'].' "> '.$row['ram_size'].' </option>';
						}
					?>
				</select>
             
            </div>
          </div>
  </div>
  <span id="ramerror"></span>
   </td></tr>
   
   <tr><td>
<div class="form-group">
          <label class="col-md-4 control-label">Harddisk Capacity</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			  <select name="harddisk" id="harddisk" class="form-control selectpicker" onChange="validateHarddisk()"  style="height:auto; width:auto" placeholder="RAM Size">
					<option value="select">Select Hard Disk</option>
					<!-- Complaint Category drop down from database-->
					<?php 
						$sql = mysqli_query($con, "SELECT hard_disk FROM harddisk");
						while ($row = $sql->fetch_assoc()){
							echo '<option value=" '.$row['hard_disk'].' "> '.$row['hard_disk'].' </option>';
						}
					?>
				</select>
              
            </div>
			
          </div>
  </div> 
   <span id="hderror"></span>  
 </td>
 <td>
<div class="form-group">
          <label class="col-md-4 control-label">Processor</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
			  <select name="processor" id="processor" class="form-control selectpicker" onChange="validateProcessor()" placeholder="Select your Processor" style="height:auto; width:auto" >
					<option value="select">Select Processor</option>
					<!-- Complaint Category drop down from database-->
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
  <span id="prerror"></span>  
  </td></tr>
  <tr><td>
  
  <div class="form-group">
          <label class="col-md-4 control-label">Operating System</label>  
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
				<select name="os" id="os" class="form-control selectpicker" onChange="validateOS()"  style="height:auto; width:auto" placeholder="Operating System">
					<option value="select">Select Operating System</option>
					<!-- Complaint Category drop down from database-->
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
       <span id="oserror"></span> 
  </td>
  <td>
  <div class="form-group">
          <label class="col-md-4 control-label">Monitor Make</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
              <input  name="mmake" placeholder="Monitor Make" class="form-control"  onKeyUp="validateMMake()" id="mmake" type="text" style="width:auto; height:auto" >
            </div>
          </div>
  </div> 
  <span id="mmerror"></span> 
  </td>
  </tr>
  <tr>
  <td>
  <div class="form-group">
          <label class="col-md-4 control-label">Monitor Serial Number</label>  
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
              <input  name="mserialno" placeholder="Monitor Serial Number" class="form-control" onKeyUp="validateMSerialNo()" id="mserialno" type="text" style="width:auto; height:auto">
            </div>
          </div>
  </div> 
  <span id="mserror"></span> 
  </td>
  <td> </td></tr>
  <tr>
  <td colspan="2">
  
  <!-- Success message -->
  <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

  <!-- Button -->
  
  <div class="form-group">
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4">
      <button type="submit" class="btn btn-warning" id="register-btn" name="submit" value="submit">Add to Master List <span class="glyphicon glyphicon-send"></span></button>
    </div>
  </div>
</td>
</tr>
</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>