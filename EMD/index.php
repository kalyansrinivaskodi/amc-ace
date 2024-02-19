<?php include 'header.php' ?>
<!-- Your page content goes here -->


<form action="submit_complaint.php" id="contactForm" method="post">
    <center><h2>EMD Complaint filling form</h2></center>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Format: 10 digit mobile number" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>


<?php include 'footer.php' ?>