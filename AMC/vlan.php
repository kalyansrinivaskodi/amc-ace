
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
            <a class="link1 " href="index.php">Home </a>
            <a class="link1 " href="registration_form.php">Register</a></li>
            <a class="link1 " href="complaint_status.php"> Complaint Status</a>
            <a class="link1 " href="#"> Login</a>
              
        </div>
      </header>

    <?php 

      $query = "SELECT * FROM vlan";


      echo '<table border="2" cellspacing="2" cellpadding="2"> 
            <tr> 
                <td> <font face="Arial">Sl_No</font> </td> 
                <td> <font face="Arial">Department</font> </td> 
                <td> <font face="Arial">VLAN_ID</font> </td> 
                <td> <font face="Arial">VLAN_Name</font> </td> 
                <td> <font face="Arial">Management_IP</font> </td> 
		<td> <font face="Arial">CISCO_4900_interfaces</font> </td> 
		<td> <font face="Arial">Switch_Name</font> </td> 
     		<td> <font face="Arial">Switch_Make_Model</font> </td> 
		<td> <font face="Arial">Username</font> </td> 
		<td> <font face="Arial">S_N</font> </td> 
		<td> <font face="Arial">firmware</font> </td> 
            </tr>';

      if ($result = $con->query($query)) {
          while ($row = $result->fetch_assoc()) {
              $field1name = $row["Sl_No"];
              $field2name = $row["Department"];
              $field3name = $row["VLAN_ID"];
              $field4name = $row["VLAN_Name"];
              $field5name = $row["Management_IP"]; 
	      $field6name = $row["CISCO_4900_interfaces"]; 
	      $field7name = $row["Switch_Name"]; 
	      $field8name = $row["Switch_Make_Model"]; 
	      $field9name = $row["Username"];
              $field10name = $row["S_N"]; 
	      $field11name = $row["firmware"]; 


              echo '<tr> 
                        <td>'.$field1name.'</td> 
                        <td>'.$field2name.'</td> 
                        <td>'.$field3name.'</td> 
                        <td>'.$field4name.'</td> 
                        <td>'.$field5name.'</td> 
			<td>'.$field6name.'</td>
			<td>'.$field7name.'</td>
			<td>'.$field8name.'</td>
			<td>'.$field9name.'</td>
			<td>'.$field10name.'</td>
			<td>'.$field11name.'</td>
                    </tr>';
          }
          $result->free();
      } 
    ?>
	</body>
</html>