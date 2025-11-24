<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Only process form if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use 'username' here to match the HTML input name="username"
    $login_input = trim($_POST['username']); 
    $password_input = trim($_POST['password']);

    $found = false;

    // Check if users array exists and if this specific user exists
    // We check directly by key (since we saved it that way in Signup.php)
    if (isset($_SESSION['users']) && isset($_SESSION['users'][$login_input])) {
        
        $stored_user = $_SESSION['users'][$login_input];

        // Verify the password
        if (password_verify($password_input, $stored_user['password'])) {
            // Password is correct!
            $_SESSION['user'] = $login_input; // Save session
            $_SESSION['fullname'] = $stored_user['fullname']; // Optional: save name too
            
            // Redirect to dashboard
            header("Location: index.php"); 
            exit;
        }
    }

    // If we reach here, login failed
    $error = "Invalid username/email or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | UniConnect</title>
    <link rel="stylesheet" href="Login.css" />
  </head>
  <body>
    <?php
    if (isset($_GET['msg'])){
      echo "<p style = 'color:red; text-align:center;'>" .htmlspecialchars($_GET['msg']) . "</p>";
    }
    ?>
    <div class="auth-container">
      <div class="auth-card">
        <h1>LOG<span>i</span>N</h1>
        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

        <form method="POST" action="" id="login-form">
          <input type="email" name="username" placeholder="Username or Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit">Login</button>
        </form>
        <p class="auth-footer">
          Don't have an account? <a href="Signup.php">Sign up</a>
        </p>
      </div>
    </div>
  </body>
</html>