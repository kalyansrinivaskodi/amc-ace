<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 10px; /* Rounded corners for the table */
            overflow: hidden; /* Hide overflow to prevent border-radius clipping */
        }

        th, td {
            border: 2px solid black;
            padding: 10px;
            text-align: left;
            border-radius: 8px; /* Rounded corners for table cells */
        }

        th {
            background-color: #f2f2f2;
        }

        /* Hover Effect */
        tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        /* Alternate Row Colors */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    <title>User Complaints</title>
    
</head>
<body>
    <h2>User Complaints</h2>
    <form action="" method="post">
        <label for="id">Enter EMD Complaint ID:</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Submit">
    </form>

    <?php
    // Assuming you're using PHP to interact with your SQL database
    // You need to replace placeholders with actual database connection details
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

    // Check if form is submitted and ID is provided
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];

        // SQL query to fetch data based on provided ID
        $sql = "SELECT * FROM usercomplaintsemd WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<center><table>";
            echo "<tr><th>ID</th><th>Status</th><th>Complainant Name</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["status"]."</td><td>".$row["name"]."</td></tr>";
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