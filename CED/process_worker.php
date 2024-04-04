<?php include 'header.php' ?>
<?php
// Check if the user is logged in
if (!isset($_SESSION["cedusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
} ?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (you can add more validations as per your requirements)
    $cedusername=$_SESSION["cedusername"];
    
    $worker_name = $_POST["worker_name"];
    $worker_designation = $_POST["worker_designation"];
    $worker_category = $_POST["worker_category"];



    // Process the data as required (e.g., insert into database)
    // Assuming you have already established database connection
    $servername = "localhost";
    $username = "root";
    $password = "2502";
    $db = "ceddb";
    $con = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the worker data into the database
    $sql = "INSERT INTO cedworkers (workername,workerdesignation,workercategory,createdby) VALUES ('$worker_name','$worker_designation','$worker_category','$cedusername')";

    if (mysqli_query($con, $sql)) {
        echo "Worker added successfully";
    } else {
        echo "Error adding worker: " . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
    
} else {
    // Redirect to add_worker.php if accessed directly without form submission
    header("Location: add_worker.php");
    exit();
}
?>

<?php include 'footer.php' ?>

