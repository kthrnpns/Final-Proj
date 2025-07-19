<?php
include('../../includes/config.php');
include('../../includes/auth.php');
include('../../includes/workshops.php');

// Check if user is logged in and is admin
if (!is_logged_in() || !is_admin()) {
    header("Location: ../auth/login.php");
    exit();
}

// Get stats for dashboard
$workshop_count = get_workshop_count();
$participant_count = get_participant_count();
$upcoming_workshops = get_upcoming_workshops(5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Virlanie Foundation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <?php include('../../pages/components/header.php'); ?>
    
    <div class="admin-container">
        <?php include('../../pages/components/sidebar.php'); ?>
        
        <main class="admin-content">
            <h1>Admin Dashboard</h1>
            
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total Workshops</h3>
                    <p><?php echo $workshop_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Total Participants</h3>
                    <p><?php echo $participant_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Upcoming Workshops</h3>
                    <p><?php echo count($upcoming_workshops); ?></p>
                </div>
            </div>
            
            <section class="upcoming-workshops">
                <h2>Upcoming Workshops</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Participants</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($upcoming_workshops as $workshop): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($workshop['title']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($workshop['date'])); ?></td>
                            <td><?php echo $workshop['participant_count']; ?></td>
                            <td>
                                <a href="manage_workshop.php?id=<?php echo $workshop['id']; ?>" class="btn btn-sm btn-edit">Edit</a>
                                <a href="#" class="btn btn-sm btn-view">View</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    
    <?php include('../../pages/components/footer.php'); ?>
    <script src="../../assets/js/admin.js"></script>
</body>
</html>