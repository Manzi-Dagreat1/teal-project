<?php
// Include database configuration
include "config.php";

// Set headers for JSON response
header('Content-Type: application/json');

try {
    // Query to fetch sensor data with vehicle information
    $sql = "SELECT 
        id,
        vehicle_id,
        temperature,
        humidity,
        ammonia,
        co2,
        dust,
        longitude,
        latitude,
        timestamp
    FROM sensor_data 
    ORDER BY timestamp DESC 
    LIMIT 1000";

    $result = $con->query($sql);

    if ($result) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        echo json_encode([
            'success' => true,
            'data' => $data,
            'count' => count($data)
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => $con->error
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

$con->close();
?>
