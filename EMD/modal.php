<?php
// Fetch workers from the database
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

// Query to fetch workers
$sql = "SELECT * FROM emdworkers";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues</title>
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>

<!-- Button to open the modal -->
<!-- <button id="statusModalBtn">Change Status</button> -->

<!-- Modal HTML structure -->
<div id="statusModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2><u>emd Action Report</u></h2>
        
        <p><strong>Createdat:</strong><span id="issueCreatedAt"></span> </p>
        <p><strong>Complaint ID:</strong> <span id="issueIdPlaceholder"></span></p>
        <p><strong>Name:</strong> <span id="issueNamePlaceholder"></span></p>
        
        <p><strong>Description of the complaint:</strong> <span id="issueDescriptionPlaceholder"></span></p>
        
        <p><strong>Material Used for the Work:</strong></p>
        <input type="hidden" id="issueIdInput" value="">
        <input type="text" id="material_usedInput" placeholder="Material Used..">

        <p><strong>Details of the Work:</strong></p>
        <input type="hidden" id="issueIdInput" value="">
        <input type="text" id="remarksInput" placeholder="Details of the work.." >

        <button id="confirmStatusChange">Change Status to Completed</button>
    </div>
</div>






<div id="assignWorkerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Assign Worker</h2>
        <form id="assignWorkerForm" action="assign_worker.php" method="post">
            <input type="hidden" id="assignWorkerIssueId" name="issueId">
            <label for="worker">Select Worker:</label>

            <select id="worker" name="worker">
                <option value="">Select Worker</option>
                <?php
                // Populate dropdown with workers fetched from database
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["workername"] . "'>" . $row["workername"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No workers found</option>";
                }
                ?>
            </select><br><br>
                <!-- Populate with workers from database using PHP -->
                <!-- Example: <option value="1">Worker 1</option> -->

            <input type="submit" value="Assign to Worker">
        </form>
    </div>
</div>

<!-- Include your script files -->
<script src="js/script.js"></script>
<!-- <script src="script1.js"></script> -->
</body>
</html>
