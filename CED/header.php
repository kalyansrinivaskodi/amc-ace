<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMC-ACE</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-glyph.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  
    <link rel="stylesheet" href="css/cedstyles.css">
    
    
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
                <li><a href="/amc-ace/amc">Register</a></li>
                <li><a href="#">Complaint Status</a></li>
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
</body>
</html>
