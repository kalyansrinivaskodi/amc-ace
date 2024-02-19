// Example of loading content dynamically using AJAX
document.addEventListener("DOMContentLoaded", function() {
    // Assuming there's a button with id "loadButton" to trigger content loading
    var loadButton = document.getElementById("loadButton");

    loadButton.addEventListener("click", function() {
        // Perform an AJAX request to fetch additional content
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "additionalContent.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Update the DOM with the fetched content
                document.getElementById("additionalContent").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});
