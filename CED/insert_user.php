<?php
session_start();

// Check if the form is submitted and if it has already been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['form_submitted'])) {
    // Set session variable to indicate form submission
    $_SESSION['form_submitted'] = true;

    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = "2502"; // Replace with your database password
    $dbname = "amcdb"; // Replace with your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO ceduserdatabase (username, password, fullname, designation, priority, typeofservice)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $username, $password, $fullname, $designation, $priority, $typeofservice);

    // Set parameters and execute
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
    $fullname = $_POST["fullname"];
    $designation = $_POST["designation"];
    $priority = $_POST["priority"];
    $typeofservice = $_POST["typeofservice"];
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page to prevent form resubmission
    header("Location: success.php");
    exit();
}

// Clear the session variable after the form is submitted
unset($_SESSION['form_submitted']);
?>
