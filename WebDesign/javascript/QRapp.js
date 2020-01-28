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