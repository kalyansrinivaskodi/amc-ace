<?php include 'header.php'; ?>



<?php
$servername = "localhost";
$username = "root";
$password = "2502";
$db = "amcdb";
$con = mysqli_connect($servername, $username, $password, $db);
?>

<?php
// Check if the user is logged in
if (!isset($_SESSION["cedusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}


// Get the form data
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];
$status = $_POST['status'];
$department = $_POST['division'];
$complaintCategory = $_POST['complaintCategory'];

// Construct the SQL query
$sql = "SELECT * FROM usercomplaintsced WHERE status=? AND department=? AND dorq=?";

// Append date range conditions if provided
if (!empty($fromDate) && !empty($toDate)) {
    $sql .= " AND DATE(created_at) >= ? AND DATE(created_at) <= ?";
} elseif (!empty($fromDate)) {
    $sql .= " AND DATE(created_at) >= ?";
} elseif (!empty($toDate)) {
    $sql .= " AND DATE(created_at) <= ?";
}

// Execute the query
$stmt = mysqli_prepare($con, $sql);
if (!$stmt) {
    die('Error: ' . mysqli_error($con));
}

// Bind parameters
if (!empty($fromDate) && !empty($toDate)) {
    mysqli_stmt_bind_param($stmt, "sssss", $status, $department, $complaintCategory, $fromDate, $toDate);
} elseif (!empty($fromDate)) {
    mysqli_stmt_bind_param($stmt, "ssss", $status, $department, $complaintCategory, $fromDate);
} elseif (!empty($toDate)) {
    mysqli_stmt_bind_param($stmt, "ssss", $status, $department, $complaintCategory, $toDate);
} else {
    mysqli_stmt_bind_param($stmt, "sss", $status, $department, $complaintCategory);
}
// echo "SELECT * FROM usercomplaintsced WHERE status=$status AND department=$department AND dorq=$complaintCategory AND DATE(created_at) >= $fromDate AND DATE(created_at) <= $toDate";
// Execute statement

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Fetch issues into an array
$issues = [];
while ($row = mysqli_fetch_assoc($result)) {
    $issues[] = $row;
}

// Close statement
mysqli_stmt_close($stmt);
?>

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
            <th>Complaint Category</th>
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
                <td><?php echo $complaintCategory; ?></td>
                <!-- Add more columns as needed -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
