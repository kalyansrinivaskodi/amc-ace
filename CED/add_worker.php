<?php include 'header.php'; ?>

<?php
// Check if the user is logged in
if (!isset($_SESSION["cedusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Assuming you have already established database connection in your header.php file

// No need to process the form here. Just display the form.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Worker</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>

<div class="container">
    <h2>Add Worker</h2>
    <form method="post" action="process_worker.php"> <!-- Update the form action -->
        <label for="worker_name">Worker Name:</label><br>
        <input type="text" id="worker_name" name="worker_name" required><br><br>

        <input type="submit" value="Add Worker">
    </form>
</div>

</body>
</html>

<?php include 'footer.php'; ?>
