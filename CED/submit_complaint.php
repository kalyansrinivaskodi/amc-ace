<?php include 'header.php' ?>
<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "2502";
$db="ceddb";

$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO usercomplaintsced (name, designation, department, dorq, department_or_qtr_no, phone, internalno, email, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $name, $designation,$department, $divisionOrQuarter,  $division, $contact, $internal, $email, $nature);

// Set parameters and execute
$name = $_POST['name'];
$designation = $_POST['designation'];
// $division = $_POST['division'];
$department=$_POST['department'];

$divisionOrQuarter = $_POST['division_or_quarter'];

if ($divisionOrQuarter === 'division') {
    $division = $_POST['division'];
} elseif ($divisionOrQuarter === 'quarter') {
    $division = null; // Make sure division is null if quarter is selected
    $division = $_POST['quarter'];
}

$contact = $_POST['contact'];
$internal = $_POST['internal'];
$email = $_POST['email'];
$nature = $_POST['nature'];

$stmt->execute();
$last_id = $conn->insert_id;    
echo "<h1><center>Complaint submitted successfully<br>";
echo "<b>Your CED complaint number: " . $last_id."</b><br></center></h1>";

$stmt->close();
$conn->close();
?>

<?php
// Verify CAPTCHA
$captcha_response = $_POST['g-recaptcha-response'];
$secret_key = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha_response");
$response_keys = json_decode($response, true);
if (intval($response_keys["success"]) !== 1) {
    // CAPTCHA verification failed
    die('CAPTCHA verification failed.');
}
// CAPTCHA verification successful, proceed with form processing
?>


<?php include 'footer.php' ?>
