<?php include 'header.php'; ?>

<?php
// Check if the user is logged in
if (!isset($_SESSION["emdusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "2502";
$db = "emddb";
$con = mysqli_connect($servername, $username, $password, $db);

// Get form data
$fromDate = isset($_POST['fromDate']) ? $_POST['fromDate'] : null;
$toDate = isset($_POST['toDate']) ? $_POST['toDate'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$department = isset($_POST['division']) && $_POST['division'] !== 'AllDepartments' ? $_POST['division'] : null;
$complaintCategory = isset($_POST['complaintCategory']) && $_POST['complaintCategory'] !== 'BothQuarterDivision' ? $_POST['complaintCategory'] : null;

// Construct SQL query
$sql = "SELECT * FROM usercomplaintsemd WHERE 1=1";

// Append status condition if provided
if ($status && $status !== 'Both') {
    $sql .= " AND status=?";
}

// Append department condition if provided
if ($department) {
    $sql .= " AND department=?";
}

// Append complaint category condition if provided
if ($complaintCategory) {
    $sql .= " AND dorq=?";
}

// Append date range conditions if provided
if ($fromDate && $toDate) {
    $sql .= " AND DATE(created_at) >= ? AND DATE(created_at) <= ?";
} elseif ($fromDate) {
    $sql .= " AND DATE(created_at) >= ?";
} elseif ($toDate) {
    $sql .= " AND DATE(created_at) <= ?";
}

// Prepare statement
$stmt = mysqli_prepare($con, $sql);
if (!$stmt) {
    die('Error: ' . mysqli_error($con));
}

// Bind parameters
$paramTypes = '';
$params = [];
if ($status && $status !== 'Both') {
    $paramTypes .= 's';
    $params[] = $status;
}
if ($department) {
    $paramTypes .= 's';
    $params[] = $department;
}
if ($complaintCategory) {
    $paramTypes .= 's';
    $params[] = $complaintCategory;
}
if ($fromDate && $toDate) {
    $paramTypes .= 'ss';
    $params[] = $fromDate;
    $params[] = $toDate;
} elseif ($fromDate) {
    $paramTypes .= 's';
    $params[] = $fromDate;
} elseif ($toDate) {
    $paramTypes .= 's';
    $params[] = $toDate;
}

if ($paramTypes) {
    mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
}

// Execute statement
mysqli_stmt_execute($stmt);

// Get result
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
            <th>Complaint ID</th>
            <th>Complaint Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Complaint Category</th>
            <th>(Place of Complaint) Division or Quarter No.</th>
            <th>Internal No</th>
            <th>Phone No</th>
            <th>Email ID</th>
            <th>Description</th>
            <th>Status</th>
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
                <td><?php echo $issue['dorq']; ?></td>
                <td><?php echo $issue['department_or_qtr_no']; ?></td>
                <td><?php echo $issue['internalno']; ?></td>
                <td><?php echo $issue['phone']; ?></td>
                <td><?php echo $issue['email']; ?></td>
                <td><?php echo $issue['description']; ?></td>
                <td><?php echo $issue['status']; ?></td>
                <!-- Add more columns as needed -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
