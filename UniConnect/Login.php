<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    // Collect form input safely
    $username_or_email = trim($_POST['username_or_email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Check if empty
    if (empty($username_or_email) || empty($password)) {
        $error = "Please fill all fields.";
    } else {

        // TODO: query database
        // Example:
        // $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        // ...

    }
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
      echo "<p style = 'color:red'>" .htmlspecialchars($_GET['msg']) . "</p>";
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
