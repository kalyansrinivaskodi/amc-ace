<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or any other appropriate page after logout
header("Location: index.php"); // Change "index.php" to your home page URL
exit();
?>