// Add this JavaScript code to your existing scripts or script.js file
window.onscroll = function() {fixNavbarOnScroll()};

var navbar = document.getElementsByTagName("nav")[0];
var sticky = navbar.offsetTop;

function fixNavbarOnScroll() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("fixed-navbar");
  } else {
    navbar.classList.remove("fixed-navbar");
  }
}
