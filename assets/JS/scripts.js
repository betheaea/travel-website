//Initiates darkmode toggle
function darkMode() {
  var element = document.body;
  element.classList.toggle("darkmode");

  // Save user theme preference to localStorage
if (element.classList.contains("darkmode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
}

// Load theme preference on page load
document.addEventListener("DOMContentLoaded", function() {
  const savedTheme = localStorage.getItem("theme");

  if (savedTheme === "dark") {
    document.body.classList.add("darkmode");
  }
});

//Sets icon functionality for navbar
function navIcon() {
  var x = document.getElementById("myResnav");
  if (x.className === "resnav") {
    x.className += " responsive";
  } else {
    x.className = "resnav";
  }
}