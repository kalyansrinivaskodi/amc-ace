

// When the user clicks anywhere outside of the modal, close it


// Confirm status change

// script.js


// Function to close the modal


// When the user clicks on Confirm button


// Close the modal when the user clicks on the close button
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
window.onclick = function(event) {
    var modal = document.getElementById('assignWorkerModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};
function validateForm() {
    // Name should not have any special characters other than . and ,
    var name = document.getElementById("name").value;
    var nameRegex = /^[a-zA-Z0-9.,\s]+$/;
    if (!nameRegex.test(name)) {
        alert("Name should not have special characters other than . and ,");
        return false;
    }

    // Designation should only be alphanumeric
    var designation = document.getElementById("designation").value;
    var designationRegex = /^[a-zA-Z0-9\s]+$/;
    if (!designationRegex.test(designation)) {
        alert("Designation should only be alphanumeric");
        return false;
    }

    // Phone number should be 10 digits
    var contact = document.getElementById("contact").value;
    if (contact.length !== 10 || isNaN(contact)) {
        alert("Phone number should be 10 digits");
        return false;
    }

    // Internal number should only be numbers
    var internal = document.getElementById("internal").value;
    var internalRegex = /^[0-9]+$/;
    if (!internalRegex.test(internal)) {
        alert("Internal number should only be numbers");
        return false;
    }

    return true; // Form is valid
}