<?php
session_start();
require_once "config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

// Validate required fields
$required = ['id', 'sensor_id', 'serial_number', 'vehicle_reg_no'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => "$field is required"]);
        exit();
    }
}

$id = intval($_POST['id']);
$sensor_id = $_POST['sensor_id'];
$serial_number = $_POST['serial_number'];
$vehicle_reg_no = $_POST['vehicle_reg_no'];
$device_name = $_POST['device_name'] ?? '';
$device_type = $_POST['device_type'] ?? '';
$status = $_POST['status'] ?? 'active';
$installation_date = $_POST['installation_date'] ?? null;
$last_calibration = $_POST['last_calibration'] ?? null;
$location = $_POST['location'] ?? '';
$notes = $_POST['notes'] ?? '';

// Check if another device has the same sensor_id or serial_number (excluding current device)
$check_sql = "SELECT id FROM sensor_devices WHERE (sensor_id = ? OR serial_number = ?) AND id != ?";
$stmt = $con->prepare($check_sql);
$stmt->bind_param("ssi", $sensor_id, $serial_number, $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Sensor ID or Serial Number already exists']);
    exit();
}

// Update device
$sql = "UPDATE sensor_devices SET 
        sensor_id = ?, 
        serial_number = ?, 
        vehicle_reg_no = ?, 
        device_name = ?, 
        device_type = ?, 
        status = ?, 
        installation_date = ?, 
        last_calibration = ?, 
        location = ?, 
        notes = ?,
        updated_at = NOW()
        WHERE id = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssssssi", $sensor_id, $serial_number, $vehicle_reg_no, $device_name, $device_type, $status, $installation_date, $last_calibration, $location, $notes, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Device updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $con->error]);
}

$stmt->close();
$con->close();
?>
