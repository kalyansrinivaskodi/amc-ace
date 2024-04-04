<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>AMC</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style1.css">
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/cedstyles.css">
    

    <!-- Custom styles for this template -->
    
  </head>

  <body>
  <header>
        <h1>Central Power Research Institute - AMC Portal for IT, CED, EMD</h1>
    </header>

<nav>
    <ul>
        <li><a href="http://localhost:82/amc-ace">Home</a></li>
        <li>
            <a href="#">IT Complaints</a>
            <ul class="submenu">
                <li><a href="/amc-ace/amc/registration_form.php">Register</a></li>
                <li><a href="/amc-ace/amc/complaint_status.php">Complaint Status</a></li>
                <?php
                session_start(); // Starting the session                 
                if(isset($_SESSION["itusername"])) { ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout (<?php echo $_SESSION["itusername"]; ?>)</a></li>
                <?php } else { ?>
                    <li><a href="/amc-ace/ced/login.php">Login</a></li>
                <?php } ?>
            </ul>
        </li>
        <li>
            <a href="#">CED Complaints</a>
            <ul class="submenu">
                <li><a href="/amc-ace/ced">Register</a></li>
                <li><a href="/amc-ace/ced/cedcomplaintstatus.php">Complaint Status</a></li>
                <?php 
                if(isset($_SESSION["cedusername"])) { ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout (<?php echo $_SESSION["cedusername"]; ?>)</a></li>
                <?php } else { ?>
                    <li><a href="/amc-ace/ced/login.php">Login</a></li>
                <?php } ?>
            </ul>
        </li>
        <li>
            <a href="#">EMD Complaints</a>
            <ul class="submenu">
                <li><a href="/amc-ace/emd">Register</a></li>
                <li><a href="/amc-ace/emd/emdcomplaintstatus.php">Complaint Status</a></li>
                <?php 
                if(isset($_SESSION["emdusername"])) { ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout (<?php echo $_SESSION["emdusername"]; ?>)</a></li>
                <?php } else { ?>
                    <li><a href="/amc-ace/emd/login.php">Login</a></li>
                <?php } ?>
            </ul>
        </li>
    </ul>

</nav>
    
    <script src="js/headerscript.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>