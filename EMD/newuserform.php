<?php include 'header.php' ?>
<!-- Your page content goes here -->

<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="emddb";
   $con = mysqli_connect($servername, $username, $password,$db);

   if (!isset($_SESSION["emdusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
    }

    // Check if the session variable emdusername is set
    if(isset($_SESSION['emdusername'])) {
        // Fetch priority from the database based on the emdusername
        $emdusername = $_SESSION['emdusername'];
        
        $userPriority = $_SESSION["priority"]; // Assuming priority is stored in session    

    } 

    // Generate options for priority dropdown
    $priorityOptions = "";
    for ($i = $userPriority - 1; $i >= 1; $i--) {
        $priorityOptions .= "<option value='$i'>$i</option>";
    }
?>  

<center><h2>User Registration Form</h2></center>
    <form action="insert_user.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="designation">Designation:</label><br>
        <input type="text" id="designation" name="designation"><br><br>

        <label for="priority">Priority:</label><br>
        <select id="priority" name="priority">
            <?php echo $priorityOptions; ?>
        </select><br><br>
        
        <label for="typeofservice">Type of Service:</label><br>
        <select id="typeofservice" name="typeofservice">
            <option value="IT">IT</option>
            <option value="CED">CED</option> <!-- Add selected and disabled attributes to freeze -->
            <option value="EMD" selected>EMD</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>

<?php include 'footer.php' ?>
