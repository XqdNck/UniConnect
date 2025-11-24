
function toggleDropdown() {
    var dropdown = document.getElementById("dropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

// Optional: close dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.matches('.user-btn, .user-img, .user-placeholder')) {
        var dropdown = document.getElementById("dropdown");
        if (dropdown) dropdown.style.display = "none";
    }
}
