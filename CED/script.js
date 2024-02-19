
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
