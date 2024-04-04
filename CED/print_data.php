<?php include 'header.php'; ?>
<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="ceddb";
   $con = mysqli_connect($servername, $username, $password,$db);
?>
<center>
<h2>Select the following selections:</h2>
</center>
<form action="print_results.php" method="POST" class="form-container">


    <div class="form-group">
        <label for="fromDate">From Date:</label>
        <input type="date" id="fromDate" name="fromDate">
    </div><br>
    
    <div class="form-group">
        <label for="toDate">To Date:</label>
        <input type="date" id="toDate" name="toDate">
    </div><br>
    
    <div class="form-group">    
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Both">Both</option> <!-- Option for both pending and completed statuses -->
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
    </div><br>
    
    
    <div class="form-group">
        <label for="complaintCategory">Complaint Category:</label>
        <select id="complaintCategory" name="complaintCategory" onchange="toggleDepartmentDropdown()">
            <option value="BothQuarterDivision">Both Campus/Colony</option> <!-- Option for both quarter and division -->
            <option value="division">Campus</option>
            <option value="quarter">Colony</option>
            <!-- Add more options for complaint categories -->
        </select>
    </div><br>

    <div class="form-group" id="divisionFormGroup" style="display: none;">
        <label for="division">Department:</label>
        <select id="division" name="division" class="styled-select" >
            <option value="AllDepartments">All Departments</option> <!-- Option for all departments -->
            <!-- Add options for divisions -->
            <?php 
            $sql = mysqli_query($con, "SELECT dept_name FROM departments");
            while ($row = $sql->fetch_assoc()){
                echo '<option value="'.$row['dept_name'].'">'.$row['dept_name'].'</option>';
            }
            ?>
        </select>
    </div><br>
    
    <input type="submit" value="Print">
</form>

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-group {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .form-group label {
        margin-right: 10px;
    }
</style>

<?php include 'footer.php'; ?>
