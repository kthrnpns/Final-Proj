<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' | ' : ''; ?>Virlanie Foundation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/assets/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo BASE_URL; ?>/assets/images/virlanie-logo.png" alt="Virlanie Foundation">
                </a>
            </div>
            
            <?php if (is_logged_in()): ?>
            <nav class="user-nav">
                <span>Welcome, <?php echo $_SESSION['name']; ?></span>
                <a href="<?php echo BASE_URL; ?>/auth/logout.php">Logout</a>
            </nav>
            <?php endif; ?>
        </div>
    </header>