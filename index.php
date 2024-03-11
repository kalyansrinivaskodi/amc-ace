<?php include 'header.php' ?>






<div class="banner-wrap  clearfix">
      <div class="banner-page">
        <!--<img src="images/computer-image1.jpeg">
        <img src="images/hardware-repair.jpg">-->
      </div>
    </div>
    <div class="container-wrap ">
      <div class="container-page center-page row">
        <div class="register col-md-4">
          <a href="registration_form.php">
            <img src="images/register.png">
          </a>
          <div class="text1">
            <h4>Register </h4>
            <p>Register Your hardware, software and network related queries here</p>
          </div>
        </div>
        <div class="register col-md-4">
          <a class="link1 " href="complaint_status.php">
            <img src="images/status.jpg">
          </a>
          <div class="text1">
            <h4>Complaint Status</h4>
            <p>Check your registered complaint status </p>
          </div>
        </div>
        <div class="register col-md-4">
          <a class="link1 " href="login.php">
            <img src="images/login.png">
          </a>
          <div class="text1">
            <h4> Login</h4>
            <p>AMC engineers can login to check the registered complaints</p>
          </div>
        </div>
      </div>
    </div>
   <!--- featured support services-->
   <div class="service-wrap clearfix" id="services">
     <div class="service-page center-page">
     <h4 class="service-info">IT AMC Support Services </h4>
       <div class="image1 hvr" id="services">
         <img src="images/Desktop.jpeg">
         <span class="wrapper-title">
                <h4 class="title-text">Desktop</h4>
              </span> 
       </div>
       <div class="image1 hvr">
         <img src="images/laptop.jpeg">
             <span class="wrapper-title">
                <h4 class="title-text">Laptop</h4>
              </span>                              
       </div>
       <div class="image1 hvr">
         <img src="images/printer123.jpg">
         <span class="wrapper-title">
                <h4 class="title-text">Printer</h4>
              </span> 
       </div>
       <div class="image1 hvr">
         <img src="images/network.jpeg">
         <span class="wrapper-title">
                <h4 class="title-text">Network</h4>
              </span> 
       </div>
       <div class="image1 hvr">
         <img src="images/software123.jpg">
         <span class="wrapper-title">
                <h4 class="title-text">Software</h4>
              </span> 
       </div>
       <div class="image1 hvr">
         <img src="images/peripheral345.jpg">
         <span class="wrapper-title">
                <h4 class="title-text">Peripherals</h4>
              </span> 
       </div>
     </div>
   </div>

<!--- Engineers contact info brought from database-->

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
	// mysql_select_db('amcdb');
	$sql="SELECT Fullname,mobile FROM userdatabase WHERE priority = 1";
	$records=mysqli_query($con, $sql) or die('error getting data');
?>

    <div class="contact-wrap clearfix" id="contact">
      <div class="contact-page center-page">
        <h4>IT AMC Engineers Contact Details</h4> 
        <div class="tel">
          <img src="images/telephone.png">
        <span>Help Desk: 2531</span>  
        </div>      
        <table class="table table-bordered table-hover display-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Mobile Number</th>
            </tr>
          </thead>
		  <tbody>
		  <?php
				while ($emp=mysqli_fetch_array($records, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>".$emp['Fullname']."</td>";
					echo "<td>".$emp['mobile']."</td>";
					echo "</tr>";
				}
			?>
          </tbody>
        </table>
      </div>
    </div>
	<br>
	<br>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap1.js"></script>





<?php include 'footer.php' ?>