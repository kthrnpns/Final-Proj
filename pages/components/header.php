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
                <a href="<?php echo BASE_URL; ?>/pages/auth/logout.php">Logout</a>
            </nav>
        <?php endif; ?>
    </div>
</header>