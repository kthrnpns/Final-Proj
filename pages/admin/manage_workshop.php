<?php
include('../../includes/config.php');
include('../../includes/auth.php');
include('../../includes/workshops.php');

if (!is_logged_in() || !is_admin()) {
    header("Location: ../auth/login.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $instructor = $_POST['instructor'];
    
    if ($id) {
        // Update existing workshop
        update_workshop($id, $title, $description, $date, $time, $location, $capacity, $instructor);
        $_SESSION['success'] = "Workshop updated successfully";
    } else {
        // Create new workshop
        create_workshop($title, $description, $date, $time, $location, $capacity, $instructor);
        $_SESSION['success'] = "Workshop created successfully";
    }
    
    header("Location: workshops.php");
    exit();
}

// Get workshop data if editing
$workshop = null;
if (isset($_GET['id'])) {
    $workshop = get_workshop_by_id($_GET['id']);
    if (!$workshop) {
        header("Location: workshops.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $workshop ? 'Edit' : 'Add'; ?> Workshop | Virlanie Foundation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../assets/css/admin.css" rel="stylesheet">
</head>
<body>
    <?php include('../../pages/components/header.php'); ?>
    
    <div class="admin-container">
        <?php include('../../pages/components/sidebar.php'); ?>
        
        <main class="admin-content">
            <h1><?php echo $workshop ? 'Edit' : 'Add New'; ?> Workshop</h1>
            
            <form action="manage_workshop.php" method="POST">
                <?php if ($workshop): ?>
                    <input type="hidden" name="id" value="<?php echo $workshop['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="title">Workshop Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $workshop ? htmlspecialchars($workshop['title']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5" required><?php echo $workshop ? htmlspecialchars($workshop['description']) : ''; ?></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" value="<?php echo $workshop ? $workshop['date'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="time" value="<?php echo $workshop ? $workshop['time'] : ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="<?php echo $workshop ? htmlspecialchars($workshop['location']) : ''; ?>" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" id="capacity" name="capacity" min="1" value="<?php echo $workshop ? $workshop['capacity'] : '20'; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="instructor">Instructor/Facilitator</label>
                        <input type="text" id="instructor" name="instructor" value="<?php echo $workshop ? htmlspecialchars($workshop['instructor']) : ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save Workshop</button>
                    <a href="workshops.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </main>
    </div>
    
    <?php include('../../pages/components/footer.php'); ?>
    <script src="../assets/js/admin.js"></script>
</body>
</html>