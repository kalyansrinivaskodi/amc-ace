
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


// Confirm status change
document.getElementById("confirmStatusChange").addEventListener("click", function() {
    var remarks = document.getElementById("remarksInput").value;
    if (remarks.trim() !== "") {
        // If remarks are provided, submit the form to update the status
        document.getElementById("remarks").value = remarks;
        document.getElementById("statusForm").submit();
    } else {
        alert("Remarks cannot be empty.");
    }
});

// script.js

function openModal(issueId, issueName, issueDescription) {
    // Populate the placeholders with issue details
    document.getElementById('issueIdPlaceholder').innerText = issueId;
    document.getElementById('issueNamePlaceholder').innerText = issueName;
    document.getElementById('issueDescriptionPlaceholder').innerText = issueDescription;

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
                alert("Error occurred while updating status. Please try again.");
            }
        }
    };
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("issueId=" + issueId + "&remarks=" + remarks);
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


function toggleDivisionQuarterField() {
    var divisionOrQuarter = document.querySelector('input[name="division_or_quarter"]:checked').value;
    var divisionField = document.getElementById("divisionField");
    var quarterField = document.getElementById("quarterField");

    if (divisionOrQuarter === "division") {
        divisionField.style.display = "block";
        quarterField.style.display = "none";
    } else if (divisionOrQuarter === "quarter") {
        divisionField.style.display = "none";
        quarterField.style.display = "block";
    }
}

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
    // Fetch issue details using AJAX
    $.ajax({
        url: 'fetch_issue_details.php', // Replace 'fetch_issue_details.php' with the actual URL to fetch issue details
        type: 'POST',
        data: { issueId: issueId },
        dataType: 'json',
        success: function(response) {
            // Open a new window for printing
            var printWindow = window.open('', '_blank');
            
            // Construct the HTML content for printing
            var htmlContent = '<h2>Issue Details</h2>';
            htmlContent += '<p><strong>Complaint id:</strong> ' + response.id + '</p>';
            htmlContent += '<p><strong>Complaint Name:</strong> ' + response.name + '</p>';
            htmlContent += '<p><strong>Designation:</strong> ' + response.designation + '</p>';
            htmlContent += '<p><strong>Department:</strong> ' + response.department + '</p>';
            htmlContent += '<p><strong>Place of Complaint:</strong> ' + response.department_or_qtr_no + '</p>';
            htmlContent += '<p><strong>Internal No:</strong> ' + response.internalno + '</p>';
            htmlContent += '<p><strong>Phone:</strong> ' + response.phone + '</p>';
            htmlContent += '<p><strong>Email:</strong> ' + response.email + '</p>';
            htmlContent += '<p><strong>Description:</strong> ' + response.description + '</p>';
            htmlContent += '<p><strong>Assigned To:</strong> ' + response.assigned_to + '</p>';
            htmlContent += '<p><strong>Issue Created At:</strong> ' + response.created_at + '</p>';
            htmlContent += '<p><strong>Resolved Date:</strong> ' + response.resolved_date + '</p>';
            htmlContent += '<p><strong>Materials Used:</strong> ' + response.materials_used + '</p>';
            htmlContent += '<p><strong>Details of the Work:</strong> ' + response.details_of_work + '</p>';
            
            // Write the HTML content to the print window
            printWindow.document.write(htmlContent);
            
            // Close the document for printing
            printWindow.document.close();
            
            // Print the window
            printWindow.print();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
