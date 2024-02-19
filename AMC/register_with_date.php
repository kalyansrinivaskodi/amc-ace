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
if(!(isset($_POST['name']))){
// if they directly try to open register.php before registering complaint then it will be redirected back to form page
header('Location: registration_form.php');
exit();
}
$name=$_POST['name'];
$designation=$_POST['designation'];
$department=$_POST['department'];
$email=$_POST['email'];
$in_dt=$_POST['in_dt'];
$phone=$_POST['phone'];
$compcat=$_POST['compcat'];
$complaint=$_POST['complaint'];

$sql ="INSERT INTO usercomplaint (name,designation,dept_name,email,in_dt,phone,complaintcategory,complaint,status) 
VALUES ('$name','$designation','$department','$email','$in_dt','$phone','$compcat','$complaint','pending')";
if ($con->query($sql) === TRUE) {
	//The below statement is used to disallow user to reload register.php after submitting the form
	echo "<script>history.pushState({}, '', '')</script>";
	
    $last_id = $con->insert_id;
    echo "<br><br><br>";
    echo "<div class='register_success'>";
    echo "<b>Thank you for your complaint registration </b><br>";
    echo "<b>Your complaint number: " . $last_id."</b><br>";
    echo "<b>We will contact you soon</b>";
    echo "</div>";
	echo "<br><br><br>";
	
	// To bring Engineer details from database
	$sql="SELECT Fullname,mobile FROM userdatabase WHERE priority = 1";
	$records=mysqli_query($con, $sql) or die('error getting data');
	
    echo "<div class='contact-wrap clearfix' id='contact'>";
    echo "<div class='contact-page center-page'>";
    echo "<h4>AMC Engineers Contact Details</h4>"; 
    echo "<div class='tel'>";
    echo "<img src='images/telephone.png'>";
    echo "<span>Help Desk: 2531</span>";  
    echo "</div>";      
    echo "<table class='table table-bordered table-hover display-table'>";
    echo "<thead>
            <tr>
              <th>Name</th>
              <th>Mobile Number</th>
            </tr>
          </thead>
		  <tbody>";
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>".$emp['Fullname']."</td>";
					echo "<td>".$emp['mobile']."</td>";
					echo "</tr>";
				}
    echo "</tbody>
        </table>
      </div>
    </div>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
