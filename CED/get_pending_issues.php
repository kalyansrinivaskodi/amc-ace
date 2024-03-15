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

$userPriority = $_SESSION["priority"]; // Assuming priority is stored in session

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

function getWorkers() {
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

    // Prepare SQL statement to fetch workers
    $sql = "SELECT * FROM cedworkers";
    $result = $conn->query($sql);

    // Fetch workers into an array
    $workers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $workers[] = $row;
        }
    }

    // Close connection
    $conn->close();

    return $workers;
}

// Get workers from the database
$workers = getWorkers();

?>
<div class="issues-container">
    <center>
        <h2><?php echo ucfirst($status); ?> Issues<button class="button" onclick="window.print();">Print Data</button>
        </h2>
        <table>
            <thead>
                <tr>
                    <th>Sl. No.</th> <!-- Added column for Serial Number -->
                    <th>Complaint id</th>                
                    <th>Complaint Name</th>
                    <th>Designation</th>
                    <th>Department</th>                    
                    <th>(Place of complaint)division or quarter no</th>
                    <th>Internal No</th>
                    <th>Phone No</th>
                    <th>Email ID</th>
                    <th>Description</th>                
                    <th>Created At</th> <!-- New column for Created At -->
                    <th>Change Status</th>
                    <?php if ($userPriority >= 2): ?>
                        <th>Assign Worker</th> <!-- Added column for Assign Worker button -->
                    <?php endif; ?>
                    <th>Assigned To</th> <!-- Added column for Assigned To -->
                    <th>Print</th> <!-- Added column for Print button -->
                </tr>
            </thead>
            <tbody>
                <?php $serialNumber = 1; ?>
                <?php foreach ($issues as $issue): ?>
                    <tr>
                        <td><?php echo $serialNumber; ?></td> <!-- Display Serial Number -->
                        <td><?php echo $issue['id']; ?></td>
                        <td><?php echo $issue['name']; ?></td>                    
                        <td><?php echo $issue['designation']; ?></td>
                        <td><?php echo $issue['department']; ?></td>  
                        <td><?php echo $issue['department_or_qtr_no']; ?></td>  
                        <td><?php echo $issue['internalno']; ?></td>                      
                        <td><?php echo $issue['phone']; ?></td>
                        <td><?php echo $issue['email']; ?></td>
                        <td><?php echo $issue['description']; ?></td>
                        <td><?php echo $issue['created_at']; ?></td> <!-- Display the Created At -->
                        <td>
                            <?php if ($status === 'Pending'): ?>
                                <button onclick="openModal(<?php echo $issue['id']; ?>,'<?php echo $issue['name']; ?>','<?php echo $issue['description']; ?>')">Change Status</button>
                            <?php endif; ?>
                        </td>
                        <?php if ($userPriority >= 2): ?>
                            <td>
                                <?php if ($status === 'Pending'): ?>
                                    <button onclick="assignWorker(<?php echo $issue['id']; ?>)">Assign to Worker</button>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                        <td><?php echo $issue['assigned_to']; ?></td> <!-- Display assigned_to data -->
                        <td>
                            <button onclick="printIssueDetails(<?php echo $issue['id']; ?>)">Print</button>
                        </td>
                    </tr>
                    <?php $serialNumber++; ?> <!-- Increment Serial Number -->
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</div>



<!-- Modal HTML structure -->

<script src="js/modalscript.js"></script>

<?php include 'footer.php'; ?>
