<?php
include('../../includes/config.php');
include('../../includes/auth.php');
include('../../includes/workshops.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../auth/login.php");
    exit();
}

// Handle workshop deletion
if (isset($_GET['delete'])) {
    delete_workshop($_GET['delete']);
    $_SESSION['success'] = "Workshop deleted successfully";
    header("Location: workshops.php");
    exit();
}

$workshops = get_all_workshops();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Workshops | Virlanie Foundation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <?php include('../../pages/components/header.php'); ?>
    
    <div class="admin-container">
        <?php include('../../pages/components/sidebar.php'); ?>
        
        <main class="admin-content">
            <div class="page-header">
                <h1>Manage Workshops</h1>
                <a href="manage_workshop.php" class="btn btn-primary">Add New Workshop</a>
            </div>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($workshops as $workshop): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($workshop['title']); ?></td>
                            <td><?php echo date('M d, Y', strtotime($workshop['date'])); ?></td>
                            <td><?php echo htmlspecialchars($workshop['location']); ?></td>
                            <td><?php echo $workshop['capacity']; ?></td>
                            <td><?php echo $workshop['registered']; ?></td>
                            <td>
                                <a href="manage_workshop.php?id=<?php echo $workshop['id']; ?>" class="btn btn-sm btn-edit">Edit</a>
                                <a href="workshops.php?delete=<?php echo $workshop['id']; ?>" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this workshop?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <?php include('../../pages/components/footer.php'); ?>
    <script src="../../assets/js/admin.js"></script>
</body>
</html>