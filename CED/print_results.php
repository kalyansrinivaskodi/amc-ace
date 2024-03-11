<?php include 'header.php'; ?>

<?php
// Get status and department from form submission
$status = $_POST['status'];
$department = $_POST['division'];

?>
<table>
            <thead>
                <tr>
                    <th>Complaint id</th>                
                    <th>Complaint Name</th>
                    <th>Designation</th>
                    <th>Department</th>                    
                    <th>(Place of complaint)division or quarter no</th>
                    <th>Internal No</th>
                    <th>Phone No</th>
                    <th>Email ID</th>
                    <th>Description</th>   
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issues as $issue): ?>
                    <tr>
                        <td><?php echo $issue['id']; ?></td>
                        <td><?php echo $issue['name']; ?></td>                    
                        <td><?php echo $issue['designation']; ?></td>
                        <td><?php echo $issue['department']; ?></td>  
                        <td><?php echo $issue['department_or_qtr_no']; ?></td>  
                        <td><?php echo $issue['internalno']; ?></td>                      
                        <td><?php echo $issue['phone']; ?></td>
                        <td><?php echo $issue['email']; ?></td>
                        <td><?php echo $issue['description']; ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        

// Here, you can fetch and display data based on the selected status and department from the database


<?php include 'footer.php'; ?>
