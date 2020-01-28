// Smooth scrolling for only header links
var smoothScrollTargets = ["#aboutMe", "#myStory", "#myProjects"];

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (smoothScrollTargets.indexOf(this.hash) > -1) {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 
      800, 
      function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

// QRapp functions
function sendAddRequest() {
  var name = document.getElementById("newName").value;
  var URL = document.getElementById("newURL").value;
  window.location.href="../?QRapp&command=add&name="+name+"&URL="+URL;
}

function sendSetRequest(index) {
  window.location.href="../?QRapp&command=set&index="+index;
}

function sendDeleteRequest(index) {
  window.location.href="../?QRapp&command=delete&index="+index;
}