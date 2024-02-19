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
	if (!isset($_SESSION['x1']))
	{
		$_SESSION['x1']=$_POST['from'];
		$_SESSION['x2']=$_POST['to'];
		$_SESSION['x3']=$_POST['department'];
		$_SESSION['x4']=$_POST['compcat'];
		$_SESSION['x5']=$_POST['status'];
		$_SESSION['x6']=$_POST['pm'];
		$_SESSION['x7']=$_POST['no_of_absent_days'];
	}
	
	$from=$_SESSION['x1'];
	$to=$_SESSION['x2'];
	$department=$_SESSION['x3'];
	$compcat=$_SESSION['x4'];
	$status=$_SESSION['x5'];
	$pm=$_SESSION['x6'];
	$no_of_absent_days=$_SESSION['x7'];
	
	$heading = "Penalty Report of all ";
	$temp1 ="";
	$temp2 ="";
	
	
	$sql =	"SELECT * FROM usercomplaint WHERE (
				(in_dt < '".$from."' AND at_dt > '".$from."') 
			 	OR 
			 	(in_dt >= '".$from."' AND in_dt <= '".$to."')
				) AND penalty_calculated = 0";

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
	$heading = $heading."from ".date("d-m-Y", strtotime($from))." to ".date("d-m-Y", strtotime($to))." ";
	
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
		<button style="margin-left:50px;" onclick="location.href='penalty_report.php';">Back</button>
		<h4 class="display-page">Penalty Report</h4>
		<button class='btn btn-warning logout-btn' onclick='printDiv()'>Print</button>
		<div id="printableTable">
		<table  border="1" cellpadding="1" cellspacing="1"class="table table-bordered table-hover center-page" >
			<thead>

				<tr>
					<?php
						$t = $_SESSION['priority'];
						if ($t > "2") {
							echo "<th colspan=13><center>".$heading."</center></th>";
						}
						else{
							echo "<th colspan=12><center>".$heading."</center></th>";
						}
					?>
				</tr>

				<tr>
					<th>S.No</th>
					<th>Complaint No</th>
					<th>Name</th>
					<th>Designation</th>
					<th>Department</th>
					<th>Complaint Details</th>
					<th>Complaint Category</th>
					<th>Complaint Date and Time</th>
					<th>Stand By Date and Time</th>
					<th>Recieved By</th>
					<th>Completed Date and Time</th>
					<th>Penalty Days</th>
					<th>Penalty Amount</th>
					<?php
					if ($t > "2") {
							echo "<th>Delete</th>";
					}
					?>
									
				<tr>
			</thead>
					
			<?php

				$sno = 1;
				$total = 0;
				$from_time = strtotime($from);
				$to_time = strtotime($to);
				
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					
					//Penalty Calculation
					//For counting nonpenalty days from database

					$com = trim($emp['complaintcategory']);

					$sql_temp = "select if(one_day=0,1,0)
										+if(two_days=0,1,0)
										+if(three_days=0,1,0)+if(four_days=0,1,0)
										+if(five_days=0,1,0)
										+if(six_days=0,1,0)
										+if(seven_days=0,1,0)
										+if(eight_days=0,1,0)
										+if(nine_days=0,1,0)
										+if(ten_days=0,1,0)
										+if(greater_than_ten_days=0,1,0)
								as `count` from complaint WHERE complaintcategory LIKE '".$com."'";
					
					$records_temp = mysqli_query($con, $sql_temp) or die('error getting data');

					$emp_temp=mysqli_fetch_array($records_temp, MYSQLI_ASSOC);

					$no_of_non_penalty_days = (int) $emp_temp['count'];
					
					$in_dt_time = strtotime($emp['in_dt']); 
					$at_dt_time = strtotime($emp['at_dt']);		

						if( $in_dt_time < $from_time){
							// if complaint_in_date < from_date in report then penalty should count from 'from_date'
							$start_date = $from;
						}
						else{
							// if complaint_in_date > from_date in report then penalty should count from 'complaint_in_date'
							$start_date = $emp['in_dt'];
						}

						
							if (strcmp($emp['at_dt'],'0000-00-00 00:00:00')){
								
								if( $at_dt_time < $to_time){
									// if complaint is closed before to_date in report,then penalty should count until complaint_at_date
									$to_date = $emp['at_dt'];
								}

								else{
									// if complaint is closed after to_date in report,then penalty should count until to_date in report
									$to_date = $to;
								}
							}
							else{
								// if complaint is closed on to date,then penalty should count until to_date in report
								$to_date = $to;	
							}
						
					
					// total no. of days
					$datediff = strtotime($to_date) - strtotime($start_date);
					$days = round($datediff / (60 * 60 * 24)) + 1;
					
					// calculating no. of weekends in between
					$no_of_weekends = 0;
					if($days > 7){
						$no_of_weeks = (int) ($days/7);
						$no_of_weekends = $no_of_weeks * 2;
					}
					else{
						$in_dayofweek = date('w', strtotime($start_date));
						$at_dayofweek = date('w', strtotime($to_date));
						while($in_dayofweek != $at_dayofweek){
							if(($in_dayofweek == 0) || ($in_dayofweek == 6)){
								$no_of_weekends = $no_of_weekends + 1;
							}
							if($in_dayofweek == 6){
								$in_dayofweek = 0;
							}
							else{
								$in_dayofweek = $in_dayofweek + 1;
							}
						}
					}
					
					// calculating no. of holidays which is not weekend in between
					$query = "SELECT * FROM closed_holidays WHERE 
								holiday >= '".$start_date."' 
							  	AND holiday <= '".$to_date."' 
								AND weekend = 0";

					$result = mysqli_query($con, $query) or die(mysqli_error($con));
					$no_of_holidays = mysqli_num_rows($result);
					
					// removing holidays and weekends from total no of days
					$days = $days - $no_of_weekends - $no_of_holidays;
					
					switch ($days) {
						case "0":
								$row = "one_day";
								break;
						case "1":
								$row = "one_day";
								break;
						case "2":
								$row = "two_days";
								break;
						case "3":
								$row = "three_days";
								break;
						case "4":
								$row = "four_days";
								break;
						case "5":
								$row = "five_days";
								break;
						case "6":
								$row = "six_days";
								break;
						case "7":
								$row = "seven_days";
								break;
						case "8":
								$row = "eight_days";
								break;
						case "9":
								$row = "nine_days";
								break;
						case "10":
								$row = "ten_days";
								break;
						default:
								$row = "greater_than_ten_days";
					}
					
					//removing nonpenalty days from no of days
					$days = $days - $no_of_non_penalty_days;
					if($days <= 0){
						// if days becomes less than or equal to zero then no penalty, so no need to show that complaint in report
						continue;
					}

						
					if (strcmp($emp['Stand_By_Date'],'0000-00-00 00:00:00')){
						echo "<tr style='color: #fff; background: black;' class='penaltytabledatarow'>";
							echo "<td>".$sno."</td>";
							echo "<td>".$emp['id']."</td>";
							echo "<td>".$emp['name']."</td>";
							echo "<td>".$emp['designation']."</td>";
							echo "<td>".$emp['dept_name']."</td>";
							echo "<td>".$emp['complaint']."</td>";
							echo "<td>".$emp['complaintcategory']."</td>";
							echo "<td>".date("d-m-Y H:i:s", strtotime($emp['in_dt']))."</td>";
							if (strcmp($emp['Stand_By_Date'],'0000-00-00 00:00:00')){
								echo "<td>".date("d-m-Y H:i:s", strtotime($emp['Stand_By_Date']))."</td>";
							}
							else{
								echo "<td>No Stand By</td>";
							}
							echo "<td>".$emp['Recieved_by']."</td>";
							
							if (strcmp($emp['at_dt'],'0000-00-00 00:00:00')){
								echo "<td>".date("d-m-Y H:i:s", strtotime($emp['at_dt']))."</td>";
							}
							else{
								echo "<td>Not Yet Completed</td>";
							}
							echo "<td>".$days."</td>";
						
							// finding penalty amount for that complaint category for that no of days
							$sql1="SELECT ".$row." FROM complaint WHERE complaintcategory Like '".trim($emp['complaintcategory'])."'";
							$records1=mysqli_query($con, $sql1) or die('errrror getting data');
							$result = mysqli_fetch_assoc($records1);
							
							//calculating penalty amount for this complaint
							$penaltyamount = (int) $days * (int) $result[$row];
							
							
							echo "<td>".$penaltyamount."</td>";
						
							//Delete option for Superadmin
							if ($t > "2") {
								echo "<td><button><a href='delete_penalty.php?pid=".$emp['id']."'>Delete</a></button></td>";
							}
						
						
							//calculating penalty amount for all complaints
							$total = $total + $penaltyamount;
							$sno = $sno + 1;
						echo "</tr>";
					}
					else{
						echo "<tr class='penaltytabledatarow'>";
							echo "<td>".$sno."</td>";
							echo "<td>".$emp['id']."</td>";
							echo "<td>".$emp['name']."</td>";
							echo "<td>".$emp['designation']."</td>";
							echo "<td>".$emp['dept_name']."</td>";
							echo "<td>".$emp['complaint']."</td>";
							echo "<td>".$emp['complaintcategory']."</td>";
							echo "<td>".date("d-m-Y H:i:s", strtotime($emp['in_dt']))."</td>";
							if (strcmp($emp['Stand_By_Date'],'0000-00-00 00:00:00')){
								echo "<td>".date("d-m-Y H:i:s", strtotime($emp['Stand_By_Date']))."</td>";
							}
							else{
								echo "<td>No Stand By</td>";
							}
							echo "<td>".$emp['Recieved_by']."</td>";
							
							if (strcmp($emp['at_dt'],'0000-00-00 00:00:00')){
								echo "<td>".date("d-m-Y H:i:s", strtotime($emp['at_dt']))."</td>";
							}
							else{
								echo "<td>Not Yet Completed</td>";
							}
							echo "<td>".$days."</td>";
						
							// finding penalty amount for that complaint category for that no of days
							$sql1="SELECT ".$row." FROM complaint WHERE complaintcategory Like '".trim($emp['complaintcategory'])."'";
							$records1=mysqli_query($con, $sql1) or die('errrror getting data');
							$result = mysqli_fetch_assoc($records1);
							
							//calculating penalty amount for this complaint
							$penaltyamount = (int) $days * (int) $result[$row];
							
							
							echo "<td>".$penaltyamount."</td>";
						
							//Delete option for Superadmin
							if ($t > "2") {
								echo "<td><button><a href='delete_penalty.php?pid=".$emp['id']."'>Delete</a></button></td>";
							}
						
						
							//calculating penalty amount for all complaints
							$total = $total + $penaltyamount;
							$sno = $sno + 1;
						echo "</tr>";
					}
				}
				echo "<tr><td colspan=12>Total Penalty Amount: ".$total."</td></tr>";				
				if(!strcmp($pm,"not_done")){
					$sql_pm="SELECT * FROM penalties WHERE penalty_for LIKE 'preventive_maintenance'";
					$records_pm=mysqli_query($con, $sql_pm) or die('errrror getting data');
					$result_pm = mysqli_fetch_assoc($records_pm);
					$pm_penalty = $result_pm['penalty_amount'];
					echo "<tr><td colspan=12>Penalty for Preventive Maintenance: ".$pm_penalty."</td></tr>";
					$total = $total + $pm_penalty;
				}
			?>
		</table>
		<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
		</div>
	</body>
</html>