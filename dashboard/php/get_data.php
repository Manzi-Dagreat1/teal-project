<?php
header("Access-Control-Allow-Origin: *"); // Allow frontend to access this API
header("Content-Type: application/json");

include "includes/pure_header_in_php.php";


try {
    // Get the latest readings for the new columns
    $query = "SELECT temperature, humidity, ammonia, co2, dust, created_at FROM spectrometer_data ORDER BY id DESC LIMIT 1";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = [
            'temperature' => $row['temperature'],
            'humidity' => $row['humidity'],
            'ammonia' => $row['ammonia'],
            'co2' => $row['co2'],
            'dust' => $row['dust'],
            'timestamp' => $row['created_at']
        ];
        echo json_encode($response);
    } else {
      
        throw new Exception("No data found or query failed: " . $con->error);
    }
    
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

// Close connection
$con->close();