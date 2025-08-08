<?php
// Script to create the sensor_devices table
include "config.php";

$sql = "CREATE TABLE IF NOT EXISTS sensor_devices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id VARCHAR(50) NOT NULL UNIQUE,
    serial_number VARCHAR(50) NOT NULL UNIQUE,
    vehicle_reg_no VARCHAR(20) NOT NULL,
    device_name VARCHAR(100),
    device_type VARCHAR(50),
    status ENUM('active', 'inactive', 'maintenance') DEFAULT 'active',
    installation_date DATE,
    last_calibration DATE,
    battery_level INT DEFAULT 100,
    location VARCHAR(255),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_reg_no) REFERENCES vehicles(registration_no) ON DELETE CASCADE
)";

if ($con->query($sql) === TRUE) {
    echo "Table 'sensor_devices' created successfully or already exists";
} else {
    echo "Error creating table: " . $con->error;
}

$con->close();
?>
