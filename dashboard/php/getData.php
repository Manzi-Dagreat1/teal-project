<?php
header("Access-Control-Allow-Origin: *"); // Allow frontend to access this API
header("Content-Type: application/json");

include "includes/pure_header_in_php.php";
 
// Fetch all spectrometer data entries for chart
$sql = "SELECT temperature, humidity, ammonia, co2, dust, created_at as timestamp FROM spectrometer_data ORDER BY id ASC";
$result = $con->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Output JSON
echo json_encode($data);
$con->close();
?>
