<?php include 'header.php' ?>
<!-- Your page content goes here -->

<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="emddb";
   $con = mysqli_connect($servername, $username, $password,$db);
?>
<form action="submit_complaint.php" method="post" onsubmit="return validateForm()">
    <center> <h2>EMD Complaint Form</h2> </center>  
    <label for="name">Name of the Complainant:<span style="color: red;">*</span></label>
    <input type="text" id="name" name="name" required>

    <label for="designation">Designation:<span style="color: red;">*</span></label>
    <input type="text" id="designation" name="designation" required>

    <!-- <label for="division">Division / Qtr No. & Type:</label>
    <input type="text" id="division" name="division" required> -->

    <label for="department">Department:<span style="color: red;">*</span></label>
        <select id="department" name="department" class="styled-select" >
            <!-- Add options for divisions -->
            <?php 
			$sql = mysqli_query($con, "SELECT dept_name FROM departments");
			while ($row = $sql->fetch_assoc()){
				echo '<option value="'.$row['dept_name'].'"> '.$row['dept_name'].' </option>';
			}
			?>
        </select>
        <br>
    <fieldset>
        <legend>(Place of complaint) Office / Colony:<span style="color: red;">*</span></legend>
        <label class="radio-inline">
            <input type="radio" id="division" name="division_or_quarter" value="division" onchange="toggleDivisionQuarterField()" required> Office
        </label>
        <label class="radio-inline">
            <input type="radio" id="quarter" name="division_or_quarter" value="quarter" onchange="toggleDivisionQuarterField()"> Colony
        </label>
    </fieldset><br>

    <div id="divisionField" style="display: none;">
        <label for="division">Division(place of complaint):<span style="color: red;">*</span></label>
        <select id="division" name="division" class="styled-select" >
            <!-- Add options for divisions -->
            <?php 
			$sql = mysqli_query($con, "SELECT dept_name FROM departments");
			while ($row = $sql->fetch_assoc()){
				echo '<option value=" '.$row['dept_name'].' "> '.$row['dept_name'].' </option>';
			}
			?>
        </select>
    </div>
    
    <div id="quarterField" style="display: none;">
        <label for="quarter">Quarter No.(place of complaint):<span style="color: red;">*</span></label>
        <input type="text" id="quarter" name="quarter" placeholder="Type Here...">

        
        <label for="type">Type:</label><span style="color: red;">*</span><br>
        <select id="type" name="type" required>
            <option value="Type1">Type 1</option>
            <option value="Type2">Type 2</option>
            <option value="Type3">Type 3</option>
            <option value="Type4">Type 4</option>
            <option value="Type5">Type 5</option>
            <option value="Dghouse">DG's House</option>
        </select>
    </div>

    <br>


    <label for="contact">Mobile Number:</label>
    <input type="tel" id="contact" name="contact" placeholder="Phone Number">
    
    <label for="internal">Internal Number:<span style="color: red;">*</span></label>
    <input type="internal" id="internal" name="internal" placeholder="Internal No." required>


    
    <label for="email">Email ID:<span style="color: red;">*</span></label>
    <input type="email" id="email" name="email" placeholder="Email Address" required>

    <label for="nature">Nature of the Complaint (Description):<span style="color: red;">*</span></label>
    <textarea id="nature" name="nature" required></textarea>
    
    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>


    <input type="submit" value="Submit">
</form>


<?php include 'footer.php' ?>