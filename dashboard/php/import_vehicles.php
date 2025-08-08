<?php
include "config.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

try {
    if (!isset($_FILES['importFile'])) {
        echo json_encode(['success' => false, 'message' => 'No file uploaded']);
        exit;
    }

    $file = $_FILES['importFile'];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'File upload error']);
        exit;
    }

    $allowedTypes = ['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Invalid file type. Please upload CSV or Excel file']);
        exit;
    }

    $imported = 0;
    $errors = [];
    
    // Begin transaction
    $con->begin_transaction();
    
    if ($file['type'] === 'text/csv') {
        // Handle CSV import
        $handle = fopen($file['tmp_name'], 'r');
        if ($handle === false) {
            throw new Exception('Cannot open CSV file');
        }
        
        // Skip header row
        fgetcsv($handle);
        
        while (($data = fgetcsv($handle)) !== false) {
            if (count($data) >= 4) {
                $registration_no = trim($data[0]);
                $plate_number = trim($data[1]);
                $fuel_type = trim($data[2]);
                $vehicle_type = trim($data[3]);
                
                if (!empty($registration_no) && !empty($plate_number)) {
                    $stmt = $con->prepare("INSERT INTO vehicles (registration_no, plate_number, fuel_type, vehicle_type) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $registration_no, $plate_number, $fuel_type, $vehicle_type);
                    
                    if ($stmt->execute()) {
                        $imported++;
                    } else {
                        $errors[] = "Failed to import: $registration_no";
                    }
                    $stmt->close();
                }
            }
        }
        fclose($handle);
    }
    
    $con->commit();
    echo json_encode(['success' => true, 'imported' => $imported, 'errors' => $errors]);
    
} catch (Exception $e) {
    $con->rollback();
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
