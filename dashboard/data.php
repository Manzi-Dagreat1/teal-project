<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include "php/includes/pure_header.php";
 
// Check if required parameters are present
if (!isset($_GET['temperature']) || !isset($_GET['humidity']) || !isset($_GET['ammonia']) || !isset($_GET['co2']) || !isset($_GET['dust'])) {
    die(json_encode(['error' => 'Missing required parameters']));
}

$temperature = strval($_GET['temperature']);
$humidity = strval($_GET['humidity']);
$ammonia = strval($_GET['ammonia']);
$co2 = strval($_GET['co2']);
$dust = strval($_GET['dust']);

try {
    $sql = "INSERT INTO spectrometer_data (temperature, humidity, ammonia, co2, dust) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssss", $temperature, $humidity, $ammonia, $co2, $dust);
    $stmt->execute();
    $stmt->close();

    echo json_encode([
        'success' => true,
        'message' => 'Data saved successfully'
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}

$con->close();
?>
