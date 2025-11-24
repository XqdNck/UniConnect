<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Only process form if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']); // username or email
    $password = trim($_POST['password']);

    $found = false;
    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if (($user['username'] === $login || $user['email'] === $login) &&
                password_verify($password, $user['password'])) {
                // Save the username in session
                $_SESSION['user'] = $user['username'];
                $found = true;
                header("Location: index.php?page=dashboard");
                exit;
            }
        }
    }

    if (!$found) {
        $error = "Invalid username/email or password.";
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
