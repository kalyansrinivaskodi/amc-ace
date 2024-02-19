<?php
include 'header.php'; 
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
//if(!(isset($_POST['submit']))){
// if they directly try to open register.php before registering complaint then it will be redirected back to form page
//header('Location: standby.php');
//exit();
//}

$complaint=(int)$_POST['complaintid'];
$usernames=$_POST['usernames'];
$department=$_POST['department'];
$category=$_POST['category'];
$engineer=$_POST['engineer'];
$date1=$_POST['date'];
$gate_pass_no=$_POST['gate_pass_no'];
$returnable=$_POST['returnable'];
$description=$_POST['description'];
$serial=$_POST['serial'];
$quantity=$_POST['quantity'];
$status='pending';
if($returnable==='returnable')
{
    $status='pending';
}
else
{
    $status = 'completed';
}



$sql ="INSERT INTO defective_items (complaint_id,username, dept_name,complaintcategory,engineer,out_date,gate_pass_number,returnable,description,serial_no,quantity,status) 
VALUES ($complaint,'$usernames','$department','$category','$engineer','$date1','$gate_pass_no',$returnable,'$description','$serial','$quantity','$status')";
if ($con->query($sql) === TRUE) {
	//The below statement is used to disallow user to reload register.php after submitting the form
	echo "<script>history.pushState({}, '', '')</script>";
	
    $last_id = $con->insert_id;
    echo "<br><br><br>";
    echo "<div class='register_success'>";
    echo "<b>The defective item sent to workshop has been added Successfully </b><br>";
    echo "<b>Your Material Item ID is: " . $last_id."</b><br>";
    echo "<b>Do you want to add more Defective Items</b>";
	echo "<a href=" . "standby.php" . " >Click Here </a>";
    echo "</div>";
	echo "<br><br><br>";
   
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
