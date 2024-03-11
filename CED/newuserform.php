<?php include 'header.php' ?>
<!-- Your page content goes here -->

<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   $con = mysqli_connect($servername, $username, $password,$db);

   if (!isset($_SESSION["cedusername"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
    }


   
    // Check if the session variable cedusername is set
    if(isset($_SESSION['cedusername'])) {
        // Fetch priority from the database based on the cedusername
        $cedusername = $_SESSION['cedusername'];
        $query = "SELECT priority FROM ceduserdatabase WHERE name = '$cedusername'";
        $result = mysqli_query($con, $query);

        // Check if the query executed successfully
        if($result) {
            // Fetch the priority value
            $row = mysqli_fetch_assoc($result);
            $priority = $row['priority'];
        } else {
            // Handle error if query execution fails
            $priority = "Error fetching priority";
        }
    } 


?>  

<center><h2>User Registration Form</h2>
</center>
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
        <input type="text" id="priority" name="priority" value="<?php echo $priority; ?>" readonly><br><br>
        
        <label for="typeofservice">Type of Service:</label><br>
        <select id="typeofservice" name="typeofservice">
            <option value="IT">IT</option>
            <option value="CED" selected>CED</option> <!-- Add selected and disabled attributes to freeze -->
            <option value="EMD">EMD</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php include 'footer.php' ?>
