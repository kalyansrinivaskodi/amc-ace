<?php include 'header.php' ?>
<!-- Your page content goes here -->

<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   $con = mysqli_connect($servername, $username, $password,$db);
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
        <input type="number" id="priority" name="priority" min="1" max="10"><br><br>
        <label for="typeofservice">Type of Service:</label><br>
        <select id="typeofservice" name="typeofservice">
            <option value="IT">IT</option>
            <option value="CED" selected>CED</option> <!-- Add selected and disabled attributes to freeze -->
            <option value="EMD">EMD</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php include 'footer.php' ?>
