<?php include 'header.php'; ?>
<?php
   $servername = "localhost";
   $username = "root";
   $password = "2502";
   $db="amcdb";
   $con = mysqli_connect($servername, $username, $password,$db);
?>
<center>
<h2>Select the following selections:</h2>
</center>
<form action="print_results.php" method="POST">
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="Pending">Pending</option>
        <option value="Completed">Completed</option>
    </select><br><br>
    
    <label for="division">Department:</label>
    <select id="division" name="division" class="styled-select" >
            <!-- Add options for divisions -->
            <?php 
			$sql = mysqli_query($con, "SELECT dept_name FROM departments");
			while ($row = $sql->fetch_assoc()){
				echo '<option value=" '.$row['dept_name'].' "> '.$row['dept_name'].' </option>';
			}
			?>
    </select><br><br>
    
    <input type="submit" value="Print" >
</form>

<?php include 'footer.php'; ?>
