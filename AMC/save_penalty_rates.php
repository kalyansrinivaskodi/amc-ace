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
if(!isset($_SESSION['admin_login']))
{
   	// not logged in
    header('Location: login.php');
    exit();
}
	if(isset($_POST['update'])){
    $total = count($_POST['complaintcategory']);
    $complaintcategory_arr = $_POST['complaintcategory'];
    $one_day_arr = $_POST['one_day'];
	$two_days_arr = $_POST['two_days'];
	$three_days_arr = $_POST['three_days'];
	$four_days_arr = $_POST['four_days'];
	$five_days_arr = $_POST['five_days'];
	$six_days_arr = $_POST['six_days'];
	$seven_days_arr = $_POST['seven_days'];
	$eight_days_arr = $_POST['eight_days'];
	$nine_days_arr = $_POST['nine_days'];
	$ten_days_arr = $_POST['ten_days'];
	$greater_than_ten_days_arr = $_POST['greater_than_ten_days'];
	mysql_select_db('amcdb');
    for($i = 0; $i < $total; $i++){
        $complaintcategory = $complaintcategory_arr[$i];
		$one_day = $one_day_arr[$i];
		$two_days = $two_days_arr[$i];
		$three_days = $three_days_arr[$i];
		$four_days = $four_days_arr[$i];
		$five_days = $five_days_arr[$i];
		$six_days = $six_days_arr[$i];
		$seven_days = $seven_days_arr[$i];
		$eight_days = $eight_days_arr[$i];
		$nine_days = $nine_days_arr[$i];
		$ten_days = $ten_days_arr[$i];
		$greater_than_ten_days = $greater_than_ten_days_arr[$i];
		$sql="UPDATE complaint SET one_day='".$one_day."', two_days='".$two_days."'
		, three_days='".$three_days."', four_days='".$four_days."', five_days='".$five_days."', six_days='".$six_days."'
		, seven_days='".$seven_days."', eight_days='".$eight_days."', nine_days='".$nine_days."', ten_days='".$ten_days."'
		, greater_than_ten_days='".$greater_than_ten_days."' WHERE complaintcategory='".$complaintcategory."'";
		$records=mysqli_query($con, $sql) or die('error getting data');
    }
	}
	header('Location: edit_penalty_rates.php');
	exit();
?>