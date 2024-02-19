<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues</title>
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>

<!-- Button to open the modal -->
<!-- <button id="statusModalBtn">Change Status</button> -->

<!-- Modal HTML structure -->
<div id="statusModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Change Status to Completed</h2>
        <p><strong>ID:</strong> <span id="issueIdPlaceholder"></span></p>
        <p><strong>Name:</strong> <span id="issueNamePlaceholder"></span></p>
        <p><strong>Description:</strong> <span id="issueDescriptionPlaceholder"></span></p>
        <input type="hidden" id="issueIdInput" value="">
        <input type="text" id="remarksInput" placeholder="Details of Work Carried...">
        <button id="confirmStatusChange">Change Status to Completed</button>
    </div>
</div>

<!-- Include your script files -->
<script src="script.js"></script>
<!-- <script src="script1.js"></script> -->
</body>
</html>
