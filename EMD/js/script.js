document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // You can add form submission logic here
        alert('Form submitted!'); // Replace this with your actual submission logic
    });
});