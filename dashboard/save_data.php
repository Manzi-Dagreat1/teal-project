<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include "php/includes/pure_header.php";
 
// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["label"]) || !isset($data["values"])) {
    die(json_encode(["error" => "Invalid input. Expected 'label' and 'values'."]));
}

$label = $con->real_escape_string($data["label"]);
$values = json_encode($data["values"]); // Convert array to JSON string

// Save data to database
$sql = "INSERT INTO spectrometer_data (label, `values`) VALUES ('$label', '$values')";
if ($con->query($sql) === TRUE) {
    echo json_encode(["success" => "Data saved successfully"]);
} else {
    echo json_encode(["error" => "Failed to save data: " . $con->error]);
}

$con->close();
?>
 