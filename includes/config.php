<?php
// config.php - Database configuration
// Require Composer's autoloader (uncomment before uploading to hosting site)
// require __DIR__ . '/../vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
// $dotenv->load();

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
define('DB_HOST', $_ENV['DB_HOST'] ?? '127.0.0.1'); // Changed from 'localhost' to '127.0.0.1'
define('DB_NAME', $_ENV['DB_NAME'] ?? 'virlanie_foundation');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? ''); // Empty password for XAMPP default

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
define('BASE_URL', $_ENV['BASE_URL'] ?? 'http://localhost/virlanie-foundation-system');