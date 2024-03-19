
// Get the modal
var modal = document.getElementById("statusModal");

// Get the button that opens the modal
var btn = document.getElementById("statusModalBtn");


// Get the close button
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks on the close button, close the modal
closeBtn.onclick = function() {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};




// script.js
function openModal(issueId, issueName, issueDescription, issueCreatedAt) {
    // Populate the placeholders with issue details
    document.getElementById('issueIdPlaceholder').innerText = issueId;
    document.getElementById('issueNamePlaceholder').innerText = issueName;
    document.getElementById('issueDescriptionPlaceholder').innerText = issueDescription;
    document.getElementById('issueCreatedAt').innerText = issueCreatedAt;

    // Set the issue ID in a hidden input field within the modal
    document.getElementById('issueIdInput').value = issueId;

    // Show the modal
    var modal = document.getElementById('statusModal');
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    var modal = document.getElementById('statusModal');
    modal.style.display = 'none';
}

// When the user clicks on Confirm button
document.getElementById("confirmStatusChange").addEventListener("click", function() {
    var issueId = document.getElementById("issueIdInput").value;    
    var material_used = document.getElementById("material_usedInput").value;
    var remarks = document.getElementById("remarksInput").value;

    // AJAX request to update the status in the database
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Status updated successfully
                alert("Status updated successfully!");
                closeModal(); // Close the modal
                location.reload(); // Reload the page to reflect changes
            } else {
                // Error occurred while updating status
                alert("error while uploading the status");
            }
        }
    };
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("issueId=" + issueId + "&material_used=" + material_used + "&remarks=" + remarks);
});

// Close the modal when the user clicks on the close button
document.getElementsByClassName("close")[0].addEventListener("click", function() {
    closeModal(); // Close the modal
});

// Close the modal when the user clicks anywhere outside of it
window.onclick = function(event) {
    var modal = document.getElementById('statusModal');
    if (event.target === modal) {
        closeModal(); // Close the modal
    }
};



function assignWorker(issueId) {
    // Open the modal for selecting a worker
    document.getElementById('assignWorkerModal').style.display = 'block';
    
    // Save the issue ID in a hidden input field within the modal
    document.getElementById('assignWorkerIssueId').value = issueId;
}

// When the user clicks on the close button in the modal, close the modal
document.getElementsByClassName("close")[1].addEventListener("click", function() {
    document.getElementById('assignWorkerModal').style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal = document.getElementById('assignWorkerModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

function printIssueDetails(issueId) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('POST', 'fetch_issue_details.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the callback function for when the request completes
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Log the response received from the server
            console.log(xhr.responseText);

            // Parse the JSON response
            var response = JSON.parse(xhr.responseText);

            // Open a new window for printing
            var printWindow = window.open('', '_blank');

            // Construct the HTML content for printing
            var htmlContent = '<u><h2>CED Complaint Issue Details</h2></u>';
            htmlContent += '<t><p><strong>Complaint id : </strong>' + response.id + '</p></td>';
            htmlContent += '<p><strong>Complaint Name : </strong> ' + response.name + '</p>';
            htmlContent += '<p><strong>Designation : </strong> ' + response.designation + '</p>';
            
            htmlContent += '<p><strong>Deparment : </strong> ' + response.department + '</p>';
            htmlContent += '<p><strong>Internal No : </strong> ' + response.internalno + '</p>';
            htmlContent += '<p><strong>Email ID : </strong> ' + response.email + '</p>';
            
            htmlContent += '<p><strong>Category Type : </strong> ' + response.dorq + '</p>';
            htmlContent += '<p><strong>Place of complaint : </strong> ' + response.department_or_q_no + '</p>';

            htmlContent += '<p><strong>Issue Raised at : </strong> ' + response.created_at + '</p>';

            htmlContent += '<p><strong>Complain Description : </strong> ' + response.description + '</p>';
            
            htmlContent += '<p><strong>Assigned To : </strong>' + response.assigned_to + '</p>'; // Assigned To
            htmlContent += '<p><strong>Material Used : </strong> .........................................................</p>';
            htmlContent +='<p></p>'; // Material Used
            htmlContent += '<p><strong>Details of Work : </strong> .....................................................</p><p></p>'; // Details of Work            
            htmlContent +='<p>.........................................................................</p>';
            htmlContent +='<p>Signature of the complainer(with date).........................................................................</p>';

            // Write the HTML content to the print window
            printWindow.document.write(htmlContent);

            // Close the document for printing
            printWindow.document.close();

            // Print the window
            printWindow.print();
        } else {
            console.error('Error: Request failed with status ' + xhr.status);
        }
    };

    // Define the callback function for when an error occurs
    xhr.onerror = function() {
        console.error('Error: Request failed');
    };

    // Send the AJAX request with the issueId parameter
    xhr.send('issueId=' + issueId);
}