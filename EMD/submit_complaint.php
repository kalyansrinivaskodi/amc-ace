<?php include 'header.php' ?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = "2502"; // Replace with your database password
    $dbname = "amcdb"; // Replace with your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO usercomplaintsemd (name, department, phone, email, description)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $department, $phone, $email, $description);

    // Set parameters and execute
    $name = $_POST["name"];
    $department = $_POST["department"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $stmt->execute();
    
    $last_id = $conn->insert_id;    

    echo "<h1><center>Complaint submitted successfully<br>";
    
    echo "<b>Your EMD complaint number: " . $last_id."</b><br></center></h1>";

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<?php include 'footer.php' ?>