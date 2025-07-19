<div class="sidebar">
    <div class="sidebar-brand">
        <img src="<?php echo BASE_URL; ?>/assets/images/virlanie-logo-sm.png" alt="Virlanie Foundation">
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="<?php echo BASE_URL; ?>/pages/admin/dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/pages/admin/workshops.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'workshops.php' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-alt"></i> Workshops
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/pages/admin/participants.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'participants.php' ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> Participants
            </a>
        </li>
        <?php if (is_admin()): ?>
        <li>
            <a href="<?php echo BASE_URL; ?>/pages/admin/users.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>">
                <i class="fas fa-user-cog"></i> User Management
            </a>
        </li>
        <?php endif; ?>
    </ul>
</div>