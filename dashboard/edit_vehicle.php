<?php
include "php/includes/pure_header.php";

// Fetch vehicle details for editing
$vehicle_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($vehicle_id <= 0) {
    header("Location: manage_vehicles.php");
    exit;
}

$sql = "SELECT * FROM vehicles WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $vehicle_id);
$stmt->execute();
$result = $stmt->get_result();
$vehicle = $result->fetch_assoc();

if (!$vehicle) {
    header("Location: manage_vehicles.php");
    exit;
}

// Handle form submission for updating vehicle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registration_no = trim($_POST['registration_no']);
    $plate_number = trim($_POST['plate_number']);
    $fuel_type = trim($_POST['fuel_type']);
    $vehicle_type = trim($_POST['vehicle_type']);
    
    if (!empty($registration_no) && !empty($plate_number)) {
        $update_sql = "UPDATE vehicles SET 
                      registration_no = ?, 
                      plate_number = ?, 
                      fuel_type = ?, 
                      vehicle_type = ?, 
                      updated_at = NOW() 
                      WHERE id = ?";
        
        $update_stmt = $con->prepare($update_sql);
        $update_stmt->bind_param("ssssi", $registration_no, $plate_number, $fuel_type, $vehicle_type, $vehicle_id);
        
        if ($update_stmt->execute()) {
            $_SESSION['success'] = "Vehicle updated successfully!";
            header("Location: manage_vehicles.php");
            exit;
        } else {
            $error = "Error updating vehicle: " . $con->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle - Gas Station System</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .edit-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }
        .form-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        .form-header {
            border-bottom: 2px solid #667eea;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .btn-modern {
            border-radius: 25px;
            padding: 10px 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="body-contents-wrapper">
        <!-- Sidebar -->
        <?php include('components/navbar.php'); ?>
        <div class="asideBarBacDrop"></div>

        <!-- Main Content -->
        <div class="contents">
            <?php include('php/includes/header.php'); ?>

            <div class="cont-container">
                <div class="edit-container">
                    <div class="form-section">
                        <div class="form-header">
                            <h2><i class="fa-solid fa-edit"></i> Edit Vehicle</h2>
                            <p class="text-muted">Update vehicle information</p>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="POST" action="edit_vehicle.php?id=<?php echo $vehicle_id; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="registration_no" class="form-label">Registration Number *</label>
                                    <input type="text" class="form-control" id="registration_no" name="registration_no" 
                                           value="<?php echo htmlspecialchars($vehicle['registration_no']); ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="plate_number" class="form-label">Plate Number *</label>
                                    <input type="text" class="form-control" id="plate_number" name="plate_number" 
                                           value="<?php echo htmlspecialchars($vehicle['plate_number']); ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fuel_type" class="form-label">Fuel Type *</label>
                                    <select class="form-select" id="fuel_type" name="fuel_type" required>
                                        <option value="Petrol" <?php echo $vehicle['fuel_type'] == 'Petrol' ? 'selected' : ''; ?>>Petrol</option>
                                        <option value="Diesel" <?php echo $vehicle['fuel_type'] == 'Diesel' ? 'selected' : ''; ?>>Diesel</option>
                                        <option value="Electric" <?php echo $vehicle['fuel_type'] == 'Electric' ? 'selected' : ''; ?>>Electric</option>
                                        <option value="Hybrid" <?php echo $vehicle['fuel_type'] == 'Hybrid' ? 'selected' : ''; ?>>Hybrid</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="vehicle_type" class="form-label">Vehicle Type *</label>
                                    <select class="form-select" id="vehicle_type" name="vehicle_type" required>
                                        <option value="Car" <?php echo $vehicle['vehicle_type'] == 'Car' ? 'selected' : ''; ?>>Car</option>
                                        <option value="Truck" <?php echo $vehicle['vehicle_type'] == 'Truck' ? 'selected' : ''; ?>>Truck</option>
                                        <option value="SUV" <?php echo $vehicle['vehicle_type'] == 'SUV' ? 'selected' : ''; ?>>SUV</option>
                                        <option value="Van" <?php echo $vehicle['vehicle_type'] == 'Van' ? 'selected' : ''; ?>>Van</option>
                                        <option value="Motorcycle" <?php echo $vehicle['vehicle_type'] == 'Motorcycle' ? 'selected' : ''; ?>>Motorcycle</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Additional fields can be added here when table structure is updated -->

                            <div class="d-flex justify-content-between">
                                <a href="manage_vehicles.php" class="btn btn-secondary btn-modern">
                                    <i class="fa-solid fa-arrow-left"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-modern">
                                    <i class="fa-solid fa-save"></i> Update Vehicle
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include('php/includes/Rlinks.php'); ?>
            <?php include('php/includes/footer.php'); ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Form validation
            $('form').on('submit', function(e) {
                let isValid = true;
                let requiredFields = ['registration_no', 'plate_number', 'fuel_type', 'vehicle_type'];
                
                requiredFields.forEach(function(field) {
                    if (!$('#' + field).val()) {
                        $('#' + field).addClass('is-invalid');
                        isValid = false;
                    } else {
                        $('#' + field).removeClass('is-invalid');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
</body>
</html>
<?php
$stmt->close();
$con->close();
?>
