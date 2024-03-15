<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "2502";
$dbname = "amcdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if issueId is set in POST request
if (isset($_POST["issueId"])) {
    $issueId = $_POST["issueId"];

    // Prepare SQL statement to fetch issue details
   // Prepare SQL statement to fetch issue details
    $sql = "SELECT * FROM usercomplaintsced WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $issueId); // "i" indicates that $issueId is an integer

    // Execute the statement
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();

    // Fetch issue details as associative array
    $issueDetails = $result->fetch_assoc();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Return issue details as JSON response
    header('Content-Type: application/json');
    echo json_encode($issueDetails);
} else {
    // IssueId not provided
    echo "IssueId not provided";
}
?>
