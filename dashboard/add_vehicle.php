<?php
// dashboard/add_vehicle.php - Vehicle insertion script
include "php/includes/pure_header.php";

if (isset($_POST['addVehicle'])) {
    // Sanitize input data
    $reg_no = mysqli_real_escape_string($con, $_POST['Reg_no']);
    $plate_number = mysqli_real_escape_string($con, $_POST['plateNumber']);
    $fuel_type = mysqli_real_escape_string($con, $_POST['f_type']);
    $vehicle_type = mysqli_real_escape_string($con, $_POST['v-type']);
    
    // Check if registration or plate number already exists
    $check_sql = "SELECT * FROM vehicles WHERE registration_no = ? OR plate_number = ?";
    $check_stmt = $con->prepare($check_sql);
    $check_stmt->bind_param("ss", $reg_no, $plate_number);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        header("Location: add_new_vehicle.php?msg=Vehicle with this registration or plate number already exists");
        exit();
    }
    
    // Insert into database
    $sql = "INSERT INTO vehicles (registration_no, plate_number, fuel_type, vehicle_type) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $reg_no, $plate_number, $fuel_type, $vehicle_type);
    
    if ($stmt->execute()) {
        header("Location: add_new_vehicle.php?msg=Vehicle added successfully");
    } else {
        header("Location: add_new_vehicle.php?msg=Error adding vehicle: " . $con->error);
    }
    $stmt->close();
    $check_stmt->close();
} else {
    header("Location: add_new_vehicle.php?msg=Invalid request");
}
?>
