<?php include 'header.php' ?>
<!-- Your page content goes here -->


<form action="submit_complaint.php" method="post">
    <h2>Complaint Form</h2>
    <label for="name">Name of the Complainant:</label>
    <input type="text" id="name" name="name" required>

    <label for="designation">Designation:</label>
    <input type="text" id="designation" name="designation" required>

    <label for="division">Division / Qtr No. & Type:</label>
    <input type="text" id="division" name="division" required>

    <label for="contact">Contact Details:</label>
    <input type="tel" id="contact" name="contact" placeholder="Phone Number" required>

    
    <label for="email">Email ID:</label>
    <input type="email" id="email" name="email" placeholder="Email Address" required>

    <label for="nature">Nature of the Complaint (Description):</label>
    <textarea id="nature" name="nature" required></textarea>

    <input type="submit" value="Submit">
</form>


<?php include 'footer.php' ?>