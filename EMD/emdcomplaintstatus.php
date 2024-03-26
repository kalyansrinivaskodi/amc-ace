<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complaints</title>
    
</head>
<body>
    <h2>User Complaints</h2>
    <form action="" method="post">
        <label for="id">Enter emd Complaint ID:</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Submit">
    </form>

    <?php
    // Assuming you're using PHP to interact with your SQL database
    // You need to replace placeholders with actual database connection details
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

    // Check if form is submitted and ID is provided
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];

        // SQL query to fetch data based on provided ID
        $sql = "SELECT * FROM usercomplaintsemd WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<center><table>";
            echo "<tr><th>ID</th><th>Status</th><th>Complainant Name</th><th>Assigned To</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["status"]."</td><td>".$row["name"]."</td><td>".$row["assigned_to"]."</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "No complaints found for the provided ID.";
        }
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
<?php include 'footer.php' ?>