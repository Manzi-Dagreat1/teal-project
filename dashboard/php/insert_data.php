<?php
// API endpoint to insert sensor data via GET parameters
// Usage: http://localhost/teal-project/dashboard/php/insert_data.php?temperature=25.5&humidity=65&ammonia=0.5&co2=400&dust=15

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Include database configuration
include "config.php";

// Get parameters from GET request
$vehicle_id = isset($_GET['vehicle_id']) ? $_GET['vehicle_id'] : null;
$temperature = isset($_GET['temperature']) ? floatval($_GET['temperature']) : null;
$humidity = isset($_GET['humidity']) ? floatval($_GET['humidity']) : null;
$longitude = isset($_GET['longitude']) ? floatval($_GET['longitude']) : null;
$latitude = isset($_GET['latitude']) ? floatval($_GET['latitude']) : null;
$ammonia = isset($_GET['ammonia']) ? floatval($_GET['ammonia']) : null;
$co2 = isset($_GET['co2']) ? floatval($_GET['co2']) : null;
$dust = isset($_GET['dust']) ? floatval($_GET['dust']) : null;

// Validate input
if ($vehicle_id === null || $temperature === null || $humidity === null || $ammonia === null || $co2 === null || $dust === null || $longitude === null || $latitude === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameters', 'required' => ['vehicle_id', 'temperature', 'humidity', 'ammonia', 'co2', 'dust', 'longitude', 'latitude']]);
    exit();
}

// Validate ranges
if ($temperature < -50 || $temperature > 100) {
    echo json_encode(['error' => 'Temperature must be between -50 and 100']);
    exit();
}
if ($humidity < 0 || $humidity > 100) {
    echo json_encode(['error' => 'Humidity must be between 0 and 100']);
    exit();
}
if ($ammonia < 0 || $ammonia > 100) {
    echo json_encode(['error' => 'Ammonia must be between 0 and 100']);
    exit();
}
if ($co2 < 0 || $co2 > 10000) {
    echo json_encode(['error' => 'CO2 must be between 0 and 10000']);
    exit();
}
if ($dust < 0 || $dust > 1000) {
    echo json_encode(['error' => 'Dust must be between 0 and 1000']);
    exit();
}

// Insert data
try {
    $stmt = $con->prepare("INSERT INTO sensor_data (vehicle_id, temperature, humidity, ammonia, co2, dust, longitude, latitude, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sddddddd", $vehicle_id, $temperature, $humidity, $ammonia, $co2, $dust, $longitude, $latitude);
    
    if ($stmt->execute()) {
        echo json_encode(array(
            'success' => true, 
            'message' => 'Data inserted successfully',
            'data' => array(
                'vehicle_id' => $vehicle_id,
                'temperature' => $temperature,
                'humidity' => $humidity,
                'ammonia' => $ammonia,
                'co2' => $co2,
                'dust' => $dust,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'timestamp' => date('Y-m-d H:i:s')
            )
        ));
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
