<?php
// Check if issueId and remarks are set
if (isset($_POST['issueId']) && isset($_POST['remarks'])) {
    $issueId = $_POST['issueId'];
    $remarks = $_POST['remarks'];

    // Connect to the database (modify database connection details as needed)
    $servername = "localhost";
    $username = "root";
    $password = "2502";
    $dbname = "amcdb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to update status and remarks
    $stmt = $conn->prepare("UPDATE usercomplaintsced SET status='Completed', remarks=? WHERE id=?");
    $stmt->bind_param("si", $remarks, $issueId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Status updated successfully
        echo "Success";
    } else {
        // Error occurred while updating status
        echo "Error";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
