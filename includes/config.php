<?php
// config.php - Database configuration

// Start session
// Replace line 5 (session_start()) with:
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'virlanie_foundation');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connect to database
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Base URL
define('BASE_URL', 'http://localhost/virlanie-foundation-system');