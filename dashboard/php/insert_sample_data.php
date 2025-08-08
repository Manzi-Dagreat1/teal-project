<?php
// Sample data insertion API for dashboard/all_data.php
// This script inserts sample sensor data into the database

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Include database configuration
include "config.php";

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!$input || !isset($input['temperature']) || !isset($input['humidity']) || !isset($input['ammonia']) || !isset($input['co2']) || !isset($input['dust'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input data']);
    exit();
}

// Sanitize input
$temperature = floatval($input['temperature']);
$humidity = floatval($input['humidity']);
$ammonia = floatval($input['ammonia']);
$co2 = floatval($input['co2']);
$dust = floatval($input['dust']);

// Insert sample data
try {
    $stmt = $con->prepare("INSERT INTO sensor_data (temperature, humidity, ammonia, co2, dust, timestamp) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ddddd", $temperature, $humidity, $ammonia, $co2, $dust);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data inserted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to insert data']);
    }
    
    $stmt->close();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

$con->close();
?>
