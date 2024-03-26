<?php include 'header.php' ?>

<?php
// Check if the user is logged in
if (!isset($_SESSION["emdusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Initialize the message variable
$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if issue ID and worker are set
    if (isset($_POST["issueId"]) && isset($_POST["worker"])) {
        $issueId = $_POST["issueId"];
        $worker = $_POST["worker"];

        // Perform necessary validation on issue ID and worker

        // Insert into database or update existing record with the assigned worker
        $servername = "localhost";
        $username = "root";
        $password = "2502";
        $dbname = "emddb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to update issue with assigned worker
        $sql = "UPDATE usercomplaintsemd SET assigned_to = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $worker, $issueId);

        // Execute the statement
        if ($stmt->execute()) {
            // Issue assigned successfully
            $message = "Issue assigned to worker successfully. Redirecting to pending issues page...";
        } else {
            // Error occurred while assigning issue
            $message = "Error assigning issue to worker";
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        // Issue ID or worker not set
        $message = "Issue ID or worker not provided";
    }
} else {
    // Redirect to the main page if accessed directly without form submission
    header("Location: index.php");
    exit();
}
?>

<div class="message-container">
    <p><?php echo $message; ?></p>
</div>

<?php include 'footer.php' ?>

<!-- Redirect back to pending issues page after countdown -->
<div id="countdown" style="font-size: 24px;"></div>

<script>
// Countdown timer
var count = 3;
var countdownElement = document.getElementById('countdown');
var countdownInterval = setInterval(function() {
    count--;
    countdownElement.innerHTML = count;
    if (count <= 0) {
        clearInterval(countdownInterval);
        window.location.href = 'get_pending_issues.php?status=Pending';
    }
}, 1000);
</script>
