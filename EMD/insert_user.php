<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database


    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "amcdb"; // Replace with your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO emduserdatabase (username, password, fullname, designation, priority, typeofservice)
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

    echo "New record inserted successfully";

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
