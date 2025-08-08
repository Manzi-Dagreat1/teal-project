<?php
session_start();
require_once "config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

// Validate required fields
$required = ['sensor_id', 'serial_number', 'vehicle_reg_no'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => "$field is required"]);
        exit();
    }
}

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

// Check if sensor_id or serial_number already exists
$check_sql = "SELECT id FROM sensor_devices WHERE sensor_id = ? OR serial_number = ?";
$stmt = $con->prepare($check_sql);
$stmt->bind_param("ss", $sensor_id, $serial_number);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Sensor ID or Serial Number already exists']);
    exit();
}

// Insert new device
$sql = "INSERT INTO sensor_devices (sensor_id, serial_number, vehicle_reg_no, device_name, device_type, status, installation_date, last_calibration, location, notes) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssssss", $sensor_id, $serial_number, $vehicle_reg_no, $device_name, $device_type, $status, $installation_date, $last_calibration, $location, $notes);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Device added successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $con->error]);
}

$stmt->close();
$con->close();
?>
