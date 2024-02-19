<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>
<body>
    <h2>User Registration Form</h2>
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
        <input type="text" id="typeofservice" name="typeofservice"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
