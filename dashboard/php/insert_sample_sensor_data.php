<?php
// Include database configuration
include "config.php";

// Sample vehicle IDs
$vehicles = ['TRK001', 'TRK002', 'VAN003', 'BUS004', 'CAR005'];

// Sample coordinates around a central point (you can adjust these)
$baseLat = 40.7128;
$baseLng = -74.0060;

// Generate sample data
$sampleData = [];
for ($i = 0; $i < 50; $i++) {
    $vehicleId = $vehicles[array_rand($vehicles)];
    $temperature = rand(180, 350) / 10; // 18.0 to 35.0°C
    $humidity = rand(300, 800) / 10; // 30.0 to 80.0%
    $ammonia = rand(5, 100) / 10; // 0.5 to 10.0 ppm
    $co2 = rand(300, 1500); // 300 to 1500 ppm
    $dust = rand(10, 100); // 10 to 100 μg/m³
    
    // Random coordinates within ~10km radius
    $lat = $baseLat + (rand(-100, 100) / 1000);
    $lng = $baseLng + (rand(-100, 100) / 1000);
    
    $timestamp = date('Y-m-d H:i:s', strtotime("-$i hours"));
    
    $sql = "INSERT INTO sensor_data (vehicle_id, temperature, humidity, ammonia, co2, dust, longitude, latitude, timestamp) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sddddddds", $vehicleId, $temperature, $humidity, $ammonia, $co2, $dust, $lng, $lat, $timestamp);
    $stmt->execute();
}

echo "Sample sensor data inserted successfully!";

$con->close();
?>
