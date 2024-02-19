<?php include 'header.php' ?>
<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "2502";
$db="amcdb";

$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO usercomplaintsced (name, designation, department, phone, email, description) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $designation, $division, $contact, $email, $nature);

// Set parameters and execute
$name = $_POST['name'];
$designation = $_POST['designation'];
$division = $_POST['division'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$nature = $_POST['nature'];

$stmt->execute();
$last_id = $conn->insert_id;    
echo "<h1><center>Complaint submitted successfully<br>";
echo "<b>Your CED complaint number: " . $last_id."</b><br></center></h1>";

$stmt->close();
$conn->close();
?>

<?php include 'footer.php' ?>