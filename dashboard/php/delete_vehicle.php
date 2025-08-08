<?php
include "config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid vehicle ID']);
    exit;
}

try {
    // Begin transaction
    $con->begin_transaction();
    
    // Delete the vehicle
    $stmt = $con->prepare("DELETE FROM vehicles WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $con->commit();
        echo json_encode(['success' => true, 'message' => 'Vehicle deleted successfully']);
    } else {
        $con->rollback();
        echo json_encode(['success' => false, 'message' => 'Failed to delete vehicle']);
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    $con->rollback();
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
