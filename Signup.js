// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Toggle Password Visibility for both fields
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
});

// Form Submission
document.getElementById('signupForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Get all values
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorElement = document.getElementById('errorMessage');
    errorElement.textContent = '';

    try {
        // Validations
        if (!firstName || !lastName) throw new Error('First and last name are required');
        if (!email.endsWith('@uniben.edu')) throw new Error('Please use your UNIBEN email');
        if (password.length < 6) throw new Error('Password must be at least 6 characters');
        if (password !== confirmPassword) throw new Error('Passwords do not match');

        // Create user
        const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
        
        // Store user data (for OTP page)
        sessionStorage.setItem('pendingUser', JSON.stringify({
            firstName,
            lastName,
            middleName: document.getElementById('middleName').value,
            email
        }));
        
        // Send verification
        await userCredential.user.sendEmailVerification();
        window.location.href = "OTP.html";
        
    } catch (error) {
        errorElement.textContent = error.message;
        console.error('Signup error:', error);
    }
});