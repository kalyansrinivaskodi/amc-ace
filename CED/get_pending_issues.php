<?php include 'header.php'; ?>

<?php include 'modal.php'; ?>
<?php

// Check if the user is logged in
if (!isset($_SESSION["cedusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the username from the session
$username = $_SESSION["cedusername"];

// Check if the status parameter is set in the URL
if (isset($_GET['status'])) {
    $status = $_GET['status'];

    // Function to fetch issues from the database based on status
    function getIssuesByStatus($username, $status) {
        // Connect to the database
        $servername = "localhost";
        $username_db = "root";
        $password_db = "2502";
        $dbname = "amcdb";
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Prepare SQL statement to fetch issues
        $sql = "SELECT * FROM usercomplaintsced where status='".$status."'";
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
    // Get issues for the user based on status
    $issues = getIssuesByStatus($username, $status);
} else {
    // Redirect back to dashboard if status parameter is not set
    header("Location: dashboard.php");
    exit();
}
?>

<div class="issues-container">
    <center>
        <h2><?php echo ucfirst($status); ?> Issues</h2>
        <table>
            <thead>
                <tr>
                    <th>Complaint id</th>                
                    <th>Complaint Name</th>
                    <th>Designation</th>
                    <th>Department</th>                    
                    <th>(Place of complaint)division or quarter no</th>
                    <th>Internal No</th>
                    <th>Phone No</th>
                    <th>Email ID</th>
                    <th>Description</th>                
                    <th>Change Status</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issues as $issue): ?>
                    <tr>
                        <td><?php echo $issue['id']; ?></td>
                        <td><?php echo $issue['name']; ?></td>                    
                        <td><?php echo $issue['designation']; ?></td>
                        <td><?php echo $issue['department']; ?></td>  
                        <td><?php echo $issue['department_or_qtr_no']; ?></td>  
                        <td><?php echo $issue['internalno']; ?></td>                      
                        <td><?php echo $issue['phone']; ?></td>
                        <td><?php echo $issue['email']; ?></td>
                        <td><?php echo $issue['description']; ?></td>
                        <td>
                            <?php if ($status === 'Pending'): ?>
                                <button onclick="openModal(<?php echo $issue['id']; ?>,'<?php echo $issue['name']; ?>','<?php echo $issue['description']; ?>')">Change Status</button>
                            <?php endif; ?>
                        </td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</div>

<!-- Modal HTML structure -->

<script src="script.js"></script>

<?php include 'footer.php'; ?>
