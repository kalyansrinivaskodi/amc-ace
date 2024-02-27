<?php include 'header.php' ?>
<!-- Your page content goes here -->


<form action="submit_complaint.php" method="post">
    <h2>Complaint Form</h2>
    <label for="name">Name of the Complainant:</label>
    <input type="text" id="name" name="name" required>

    <label for="designation">Designation:</label>
    <input type="text" id="designation" name="designation" required>

    <!-- <label for="division">Division / Qtr No. & Type:</label>
    <input type="text" id="division" name="division" required> -->

    
    <fieldset>
        <legend>Division / Quarter No. & Type:</legend>
        <label class="radio-inline">
            <input type="radio" id="division" name="division_or_quarter" value="division" onchange="toggleDivisionQuarterField()" required> Division
        </label>
        <label class="radio-inline">
            <input type="radio" id="quarter" name="division_or_quarter" value="quarter" onchange="toggleDivisionQuarterField()"> Quarter
        </label>
    </fieldset>

    <div id="divisionField" style="display: none;">
        <label for="division">Division:</label>
        <select id="division" name="division" class="styled-select" >
            <!-- Add options for divisions -->
            <option value="division1">Division 1</option>
            <option value="division2">Division 2</option>
            <option value="division3">Division 3</option>
        </select>
    </div>
    
    <div id="quarterField" style="display: none;">
        <label for="quarter">Quarter No. & Type:</label>
        <input type="text" id="quarter" name="quarter">
    </div>



    <label for="contact">Contact Details:</label>
    <input type="tel" id="contact" name="contact" placeholder="Phone Number" required>
    
    <label for="internal">Internal Number:</label>
    <input type="internal" id="internal" name="internal" placeholder="Internal No." required>


    
    <label for="email">Email ID:</label>
    <input type="email" id="email" name="email" placeholder="Email Address" required>

    <label for="nature">Nature of the Complaint (Description):</label>
    <textarea id="nature" name="nature" required></textarea>

    <input type="submit" value="Submit">
</form>


<?php include 'footer.php' ?>