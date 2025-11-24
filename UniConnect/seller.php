<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<?php

if (!isset($_SESSION['user'])) {
    $_SESSION['flash_msg'] = "You must login to access that page.";
    header("Location: index.php?page=login");
    exit;
}

// Handle profile picture upload
if (isset($_POST['upload']) && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    if ($file['error'] === 0) {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];
        if (in_array($ext, $allowed)) {
            if (!is_dir('uploads')) mkdir('uploads', 0755, true);
            $filename = uniqid() . '.' . $ext;
            $target = 'uploads/' . $filename;
            if (move_uploaded_file($file['tmp_name'], $target)) {
                $_SESSION['user_image'] = $target;
                $success = "Profile picture uploaded!";
            } else $error = "Failed to upload.";
        } else $error = "Only JPG, PNG, GIF allowed.";
    } else $error = "Upload error.";
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="seller.css" />
  </head>
  <body>
    <header>
      <div class="menu-icon" id="menuToggle">☰</div>
      <h1>Seller Dashboard</h1>
    </header>

    <aside id="sidebar" class="hidden">
      <nav>
        <ul>
          <li id="dash">
            <img src="statistics.gif" alt="dashboard" />Home
          </li>
          <li id="add"><img src="add1.gif" alt="add" />Add Product</li>
          <li id="mess"><img src="message2.gif" alt="message" />Messages</li>
          <li id="noti"><img src="noti.gif" alt="bell" />Notifications</li>
          <li id="set"><img src="settings2.gif" alt="settings" />Settings</li>
        </ul>
      </nav>
    </aside>

    <main>
      <!-- 🧾 DASHBOARD START -->
      <section class="dashboard">
        <!-- 🔹 Profile Summary -->
        <div class="profile-summary">
          <img src="profile.png" alt="Profile Picture" class="profile-pic" />
          <div class="profile-info">
            <?php 
            echo "<h2>" . htmlspecialchars($_SESSION['user']) . "</h2>";
            ?>
            <p>Student Seller</p>
          </div>
        </div>
        <h2>Upload Profile Picture</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="profile_pic" accept="image/*" required>
    <button type="submit" name="upload">Upload Profile Picture</button>
</form>

<?php if (isset($success)) echo "<p style='color:green'>$success</p>"; ?>
<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<?php if (!empty($_SESSION['user_image'])): ?>
    <img src="<?= htmlspecialchars($_SESSION['user_image']) ?>" alt="Profile Picture" width="100">
<?php endif; ?>

        <!-- 🔹 Product & Order Count -->
        <div class="count-section">
          <div class="card product-card">
            <h3>Products</h3>
            <p>12</p>
          </div>
          <div class="card order-card" id="order">
            <h3>Orders</h3>
            <p>4</p>
          </div>
        </div>

        <!-- 🔹 Analytics -->
        <div class="analytics">
          <h3>Analytics</h3>
          <p>
            Coming soon: charts and sales data
            <!-- 🧾 DASHBOARD END -->
            appear here.
          </p>
        </div>
      </section>
    </main>
    <script src="seller.js"></script>
  </body>
</html>
