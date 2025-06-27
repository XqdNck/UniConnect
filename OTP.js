// Initialize Firebase
const firebaseConfig = {
  apiKey: "AIzaSyC1okEPgEn0LsU33vKriCU6N9UF3fUL_7U",
  authDomain: "uniconnect-de4b0.firebaseapp.com",
  projectId: "uniconnect-de4b0",
  storageBucket: "uniconnect-de4b0.appspot.com",
  messagingSenderId: "604272266036",
  appId: "1:604272266036:web:c71e428255610bed587361",
  measurementId: "G-ZERK80RWFW"
};
firebase.initializeApp(firebaseConfig);

// Check credentials IMMEDIATELY on page load
const email = localStorage.getItem('pendingEmail');
const password = localStorage.getItem('pendingPassword');

if (!email || !password) {
  // Use replace() to prevent back navigation
  window.location.replace("Signup.html");
} else {
  document.getElementById('user-email').textContent = email;
}

// OTP Input Handling
const otpDigits = document.querySelectorAll('.otp-digit');
otpDigits.forEach((digit, index) => {
  digit.addEventListener('input', (e) => {
    if (e.target.value.length === 1 && index < 5) {
      otpDigits[index + 1].focus();
    }
  });

  digit.addEventListener('keydown', (e) => {
    if (e.key === 'Backspace' && !e.target.value && index > 0) {
      otpDigits[index - 1].focus();
    }
  });
});

// Verification Function
const verifyUser = async () => {
  try {
    const userCredential = await firebase.auth().signInWithEmailAndPassword(email, password);
    await userCredential.user.reload(); // Refresh verification status
    
    if (userCredential.user.emailVerified) {
      localStorage.removeItem('pendingEmail');
      localStorage.removeItem('pendingPassword');
      window.location.replace("Homepage.html");
    } else {
      throw new Error("Email not verified yet");
    }
  } catch (error) {
    document.getElementById('otp-error').textContent = error.message;
    console.error("Verification error:", error);
  }
};

// Form Submission
document.getElementById('otp-form').addEventListener('submit', async (e) => {
  e.preventDefault();
  const otp = Array.from(otpDigits).map(d => d.value).join('');
  
  if (otp.length === 6) {
    // DEMO: Accept any 6-digit code
    await verifyUser();
  } else {
    document.getElementById('otp-error').textContent = "Please enter a 6-digit code";
  }
});

// Resend Email
document.getElementById('resend-btn').addEventListener('click', async (e) => {
  e.preventDefault();
  try {
    await firebase.auth().sendSignInLinkToEmail(email, {
      url: window.location.href,
      handleCodeInApp: true
    });
    alert("New verification email sent!");
  } catch (error) {
    document.getElementById('otp-error').textContent = "Failed to resend: " + error.message;
  }
});