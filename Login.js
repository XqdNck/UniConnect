document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Demo credentials check (frontend-only)
    if (email === "johndoe@gmail.com" && password === "password") {
        // Create demo user object
        const demoUser = {
            firstName: "John",
            middleName: "Micheal",
            lastName: "Doe",
            email: "johndoe@gmail.com"
        };
        
        // Store demo data temporarily (for dashboard display)
        sessionStorage.setItem("currentUser", JSON.stringify(demoUser));
        
        // Redirect to dashboard
        window.location.href = "Dashboard.html";
    } 
    else {
        // Show error for non-demo logins (since no backend yet)
        document.getElementById("errorMessage").textContent = 
            "Invalid credentials. Use demo: johndoe@gmail.com / password";
    }
});