<?php
require 'includes/config.php';
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    echo "Database connection successful!";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}