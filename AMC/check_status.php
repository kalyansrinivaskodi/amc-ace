
<?php
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

if (isset($_POST['id'])){
//3.1.1 Assigning posted values to variables.
$MyId = $_POST['id'];
//3.1.2 Checking the values are existing in the database or not
mysql_select_db('amcdb');
$query = "SELECT * FROM `usercomplaint` WHERE id='$MyId' ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	// ID exists in database
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Complaint Number.";
// Page will be sent back
header('Refresh:0; url=complaint_status.php');
echo "<script type='text/javascript'>alert('$fmsg');</script>";
exit();
}
}
else{
// if they try to open this page before complaint_status.php, it will be directed to complaint_status.php
header('Location: complaint_status.php');
exit();
}
?>
<style><?php include 'css/bootstrap.css'; ?></style>
<style><?php include 'css/style1.css'; ?></style>
<?php include 'header.php'; ?>
<html>
	<head>
		<title></title>
		<style type="text/css">
		h4.display-page{
			text-align: center;
				text-transform: uppercase;
				color:#b30000;
		}
		.logout-btn{
			float: right;
			margin: 10px;
		}
		.logout-btn a{
			text-decoration: none;
			color: #fff;
			font-size:18px;
		}

		</style>
	</head>
	<body>
		<br>
		<br>
		<br>
		<h4 class="display-page">Details of your complaint</h4>
		<table width="600" border="1" cellpadding="1" cellspacing="1"class="table  table-bordered table-hover" >
			<thead>
			<tr>
				<th>Complaint Number</th>
				<th>Name</th>
				<th>Designation</th>
				<th>Department</th>
				<th>Complaint Details</th>
				<th>Complaint Date and Time</th>
				<th>Status</th>
				<th>Completed Date and Time</th>
				<th>Recieved_By</th>
				<th>Remarks</th>
				
				
			<tr>
			</thead>		
			<?php
				while ($emp=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					# code...
					echo "<tr>";
					echo "<td>".$emp['id']."</td>";
					echo "<td>".$emp['name']."</td>";
					echo "<td>".$emp['designation']."</td>";
					echo "<td>".$emp['dept_name']."</td>";
					echo "<td>".$emp['complaint']."</td>";
					echo "<td>".date("d-m-Y H:i:s", strtotime($emp['in_dt']))."</td>";
					echo "<td>".$emp['status']."</td>";
					if (strcmp($emp['at_dt'],'0000-00-00 00:00:00')){
						echo "<td>".date("d-m-Y H:i:s", strtotime($emp['at_dt']))."</td>";
					}
					else{
						echo "<td>Not Yet Completed</td>";
					}
					echo "<td>".$emp['Recieved_by']."</td>";
					echo "<td>".$emp['Remarks']."";
					if ($emp['reopened'] == 1){
						echo "(Reopened by Admin)";
					}
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>