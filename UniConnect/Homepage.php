<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniConnect - UNIBEN Marketplace</title>
    <link rel="stylesheet" href="Homepage.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body>
  

    <!-- Navbar -->
    <!-- <nav class="navbar">
      <div class="logo">UniConnect</div>
      <div class="nav-links">
        <a href="index.php?page=Browse" class="buy-button">BUY</a>
        <a href="index.php?page=dashboard" class="sell-button">SELL</a>
        <a href="index.php?page=login" class="login-button">LOGIN</a>
      </div>
    </nav> -->
    
 <nav aria-label="Global" class = "navbar"class="flex items-center justify-between p-6 lg:px-8" >
      <div class="flex lg:flex-1">
  
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="index.php?page=Browse" class="buy-button" class="text-sm/6 font-semibold text-white">BUY</a>
        <a href="index.php?page=dashboard" class="sell-button" class="text-sm/6 font-semibold text-white">SELL</a>
        <a href="#" class="buy-button" class="text-sm/6 font-semibold text-white">Marketplace</a>
        <a href="#"  class="buy-button" class="text-sm/6 font-semibold text-white">Company</a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="" class="text-sm/6 font-semibold text-white"><?php
if (isset($_SESSION['user'])): ?> 
  


    <div class="user-menu">
            <button class="user-btn" onclick="toggleDropdown()">
                <?php if (!empty($_SESSION['user_image'])): ?>
                    <img src="<?= htmlspecialchars($_SESSION['user_image']) ?>" alt="Profile" class="user-img">
                <?php else: ?>
                    <div class="user-placeholder"><?= strtoupper($_SESSION['user'][0]) ?></div>
                <?php endif; ?>
            </button>
            <div id="dropdown" class="dropdown-content">
                <a href="index.php?page=dashboard">Dashboard</a>
                <a href="index.php?page=logout">Sign Out</a>
            </div>
        </div>
<?php else: ?>
    <!-- Not logged in -->
        <a href="index.php?page=login" class="login-button">Login</a>
    <?php endif; ?> <span aria-hidden="true"></span></a>
      </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero">
      <h1>UNIBEN's Trusted Marketplace</h1>
      <p>Buy, sell, and trade textbooks, gadgets, and services safely.</p>
      <div class="search-bar">
        <input type="text" placeholder="Search for textbooks, electronics..." />
        <button>Search</button>
      </div>
    </section>

    <!-- Categories -->
    <section class="categories">
      <h2>Popular Categories</h2>
      <div class="category-grid">
        <div class="category-card">
          <span>📚</span>
          <h3>Textbooks</h3>
        </div>
        <div class="category-card">
          <span>📱</span>
          <h3>Electronics</h3>
        </div>
        <div class="category-card">
          <span>💼</span>
          <h3>Services</h3>
        </div>
      </div>
    </section>

    <!-- Trending Listings -->
    <section class="listings">
      <h2>Trending Listings</h2>
      <div class="listing-grid">
        <div class="listing-card">
          <img src="assets/placeholder-image.jpg" alt="ECO 101 Textbook" />
          <h3>ECO 101 Textbook</h3>
          <p>₦2,500 · Faculty of Social Sciences</p>
        </div>
        <div class="listing-card">
          <img src="iPhone X.jpg" alt="Used iPhone X" />
          <h3>Used iPhone X</h3>
          <p>₦85,000 · Faculty of Engineering</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <a href="#">Safety Tips</a>
      <a href="#">Contact</a>
      <a href="#">FAQ</a>
    </footer>
    <script src= "Homepage.js"></script>

  </body>
</html>
