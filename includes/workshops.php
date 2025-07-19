<?php
// workshops.php - Workshop related functions

function get_all_workshops() {
    global $db;
    
    $stmt = $db->query("
        SELECT w.*, COUNT(r.id) AS registered 
        FROM workshops w
        LEFT JOIN registrations r ON w.id = r.workshop_id
        GROUP BY w.id
        ORDER BY w.date ASC
    ");
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_workshop_by_id($id) {
    global $db;
    
    $stmt = $db->prepare("SELECT * FROM workshops WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function create_workshop($title, $description, $date, $time, $location, $capacity, $instructor) {
    global $db;
    
    $stmt = $db->prepare("
        INSERT INTO workshops (title, description, date, time, location, capacity, instructor)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    
    return $stmt->execute([$title, $description, $date, $time, $location, $capacity, $instructor]);
}

function update_workshop($id, $title, $description, $date, $time, $location, $capacity, $instructor) {
    global $db;
    
    $stmt = $db->prepare("
        UPDATE workshops 
        SET title = ?, description = ?, date = ?, time = ?, location = ?, capacity = ?, instructor = ?
        WHERE id = ?
    ");
    
    return $stmt->execute([$title, $description, $date, $time, $location, $capacity, $instructor, $id]);
}

function delete_workshop($id) {
    global $db;
    
    $stmt = $db->prepare("DELETE FROM workshops WHERE id = ?");
    return $stmt->execute([$id]);
}

function get_upcoming_workshops($limit = 5) {
    global $db;
    
    // Ensure $limit is an integer to prevent SQL injection
    $limit = (int)$limit;
    $stmt = $db->query("
        SELECT w.*, COUNT(r.id) AS participant_count 
        FROM workshops w
        LEFT JOIN registrations r ON w.id = r.workshop_id
        WHERE w.date >= CURDATE()
        GROUP BY w.id
        ORDER BY w.date ASC
        LIMIT $limit
    ");
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_workshop_count() {
    global $db;
    
    $stmt = $db->query("SELECT COUNT(*) AS count FROM workshops");
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}

function get_participant_count() {
    global $db;
    
    $stmt = $db->query("SELECT COUNT(DISTINCT user_id) AS count FROM registrations");
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}