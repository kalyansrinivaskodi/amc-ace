

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