<?php
session_start();

// Turn on error reporting (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the page from URL, default to 'home'
$page = $_GET['page'] ?? 'home';

// List of pages that require login
$privatePages = ['dashboard', 'profile'];

// Redirect to login if user tries to access private page without being logged in
if (!isset($_SESSION['user']) && in_array($page, $privatePages)) {
    $message = urlencode("You must login to access that page");
    header("Location: index.php?page=login&msg=$message");
    exit;
}

// Router
switch ($page) {
    case 'signup':
        require 'signup.php';
        break;

    case 'login':
        require 'login.php';
        break;

    case 'logout':
        // Logout: destroy session and redirect to homepage
        session_destroy();
        header("Location: index.php");
        exit;
        break;

    case 'dashboard':
        require 'seller.php';
        break;

    case 'Browse':
        require 'Browse.php';
        break;

    case 'home':
    default:
        require 'Homepage.php';
        break;
}



