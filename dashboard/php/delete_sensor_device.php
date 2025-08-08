<?php
session_start();
require_once "config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Device ID is required']);
    exit();
}

$id = intval($_POST['id']);

$sql = "DELETE FROM sensor_devices WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Device deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $con->error]);
}

$stmt->close();
$con->close();
?>
