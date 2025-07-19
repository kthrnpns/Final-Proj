<?php
// config.php - Database configuration
// Require Composer's autoloader (uncomment before uploading to hosting site)
// require __DIR__ . '/../vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'virlanie_foundation');
define('DB_USER', 'root'); // or 'virlanie_user' if you created a user
define('DB_PASS', ''); // or the password you set

// Connect to database
try {
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME, 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Base URL
define('BASE_URL', 'http://localhost/virlanie-system');