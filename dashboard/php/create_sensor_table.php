<?php
// Script to create the sensor_data table if it doesn't exist
include "config.php";

$sql = "CREATE TABLE IF NOT EXISTS sensor_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id VARCHAR(50) NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    ammonia DECIMAL(5,2) NOT NULL,
    co2 DECIMAL(6,2) NOT NULL,
    dust DECIMAL(6,2) NOT NULL,
    longitude DECIMAL(10,8) NOT NULL,
    latitude DECIMAL(10,8) NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if ($con->query($sql) === TRUE) {
    echo "Table 'sensor_data' created successfully or already exists";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>
