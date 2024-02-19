// Example of handling form submissions asynchronously using AJAX
document.addEventListener("DOMContentLoaded", function() {
    // Assuming there's a form with id "myForm" to handle
    var myForm = document.getElementById("myForm");

    myForm.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Serialize form data into a URL-encoded string
        var formData = new FormData(myForm);

        // Perform an AJAX request to submit form data
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "submitForm.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle successful form submission
                    console.log("Form submitted successfully!");
                } else {
                    // Handle form submission errors
                    console.error("Error submitting form: " + xhr.status);
                }
            }
        };
        xhr.send(formData);
    });
});
