<?php include 'header.php' ?>
<?php
// Check if the user is logged in
if (!isset($_SESSION["emdusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the username from the session
$username = $_SESSION["emdusername"];

$userPriority = $_SESSION["priority"]; // Assuming priority is stored in session


// Function to fetch issues from the database based on status
function getIssuesByStatus($username, $status) {
    // Connect to the database
    $servername = "localhost";
    $username_db = "root";
    $password_db = "2502";
    $dbname = "emddb";
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch issues
    $sql = "SELECT * FROM usercomplaintsemd where status='".$status."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch issues into an array
    $issues = [];
    while ($row = $result->fetch_assoc()) {
        $issues[] = $row;
    }

    // Close connection
    $stmt->close();
    $conn->close();

    return $issues;
}

// Get pending and completed issues for the user
$pendingIssues = getIssuesByStatus($username, 'Pending');
$completedIssues = getIssuesByStatus($username, 'Completed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>

<div class="dashboard-container">
    <br><h2>Welcome, <?php echo $username; ?>!</h2>
    
    <button class="button" onclick="location.href='get_pending_issues.php?status=Pending';">Pending Issues</button>
    
    <button class="button" onclick="location.href='get_completed_issues.php?status=Completed';">Completed Issues</button>
    
    <?php if($userPriority >= 2) { ?>
        <button class="button" onclick="location.href='newuserform.php';">Add User</button>
    <?php } ?>
    
    <?php if($userPriority >= 2) { ?>
    <button class="button" onclick="location.href='add_worker.php';">Add Worker</button>
    <?php } ?>
    
    <!-- Button for printing data -->
    <button class="button" onclick="location.href='print_data.php';">Reports</button>

    <!-- Add more content here for the dashboard -->
</div>

<link rel="stylesheet" href="css/dashboard-container.css">

</body>
</html>

<?php include 'footer.php' ?>
