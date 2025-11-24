<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    // Check if all fields are filled
    if (empty($fullname) || empty($username) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Initialize users array if not already
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        // Check if username/email already exists
        if (isset($_SESSION['users'][$username])) {
            $error = "Username or email already taken.";
        } else {
            // Save user in session for demo purposes
            $_SESSION['users'][$username] = [
                'fullname' => $fullname,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $success = "Account created! You can now <a href='index.php?page=login'>login</a>.";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | UniConnect</title>
    <!-- Shared base styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Signup-specific styles -->
    <link rel="stylesheet" href="Signup.css" />
  </head>
  <body>
    <div class="signup-container">
      <div class="signup-card">
        <h1 class="signup-title">S<span>i</span>GNUP</h1>
        <?php
if (isset($error)) echo "<p class='error'>$error</p>";
if (isset($success)) echo "<p class='success'>$success</p>";
?>

        <form  method = "POST" action = "" class="signup-form">
          <input type="text"  name="fullname" placeholder="Full Name" required />
          <input type="email"  name="username" placeholder="Username or Email" required />
          <input type="password"  name="password" placeholder="Password" required />
          <input type="password"  name="confirm_password" placeholder="Confirm Password" required />
          <button type="submit" class="signup-button">Create Account</button>
        </form>
        <p class="signup-login-link">
          Already registered? <a href="Login.php">Log in</a>
        </p>
      </div>
    </div>
  </body>
</html>
