<?php
// dashboard/create_vehicles_table.php - Create vehicles table
include "./config.php";

$sql = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_no VARCHAR(50) NOT NULL UNIQUE,
    plate_number VARCHAR(50) NOT NULL UNIQUE,
    fuel_type VARCHAR(20) NOT NULL,
    vehicle_type VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($con->query($sql) === TRUE) {
    echo "Vehicles table created successfully";
} else {
    echo "Error creating vehicles table: " . $con->error;
}

$con->close();
?>
