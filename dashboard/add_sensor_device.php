<?php
include "php/includes/pure_header.php";
//require_once "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Sensor Device - Teal Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="extensions/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="extensions/fontawesome/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/modern-dashboard.css" rel="stylesheet">
    
    <style>
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
</head>
<body>
    <?php include "sidebar.php"; ?>
    <?php include "components/navbar.php"; ?>

    <div class="container-fluid mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Add New Sensor Device</h5>
                    </div>
                    <div class="card-body">
                        <form id="addSensorDeviceForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sensor ID *</label>
                                        <input type="text" class="form-control" name="sensor_id" required>
                                        <small class="form-text text-muted">Unique identifier for the sensor</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Serial Number *</label>
                                        <input type="text" class="form-control" name="serial_number" required>
                                        <small class="form-text text-muted">Device serial number</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Vehicle Registration *</label>
                                        <select class="form-select" name="vehicle_reg_no" required>
                                            <option value="">Select Vehicle</option>
                                            <?php
                                            $vehicle_sql = "SELECT registration_no FROM vehicles ORDER BY registration_no";
                                            $vehicle_result = $con->query($vehicle_sql);
                                            if ($vehicle_result->num_rows > 0) {
                                                while($vehicle = $vehicle_result->fetch_assoc()) {
                                                    echo "<option value='".$vehicle['registration_no']."'>".$vehicle['registration_no']."</option>";
                                                }
                                            } else {
                                                echo "<option value=''>No vehicles found</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Device Name</label>
                                        <input type="text" class="form-control" name="device_name" placeholder="e.g., Temperature Sensor #1">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Device Type</label>
                                        <select class="form-select" name="device_type">
                                            <option value="Temperature">Temperature</option>
                                            <option value="Humidity">Humidity</option>
                                            <option value="Gas">Gas</option>
                                            <option value="Multi-Sensor">Multi-Sensor</option>
                                            <option value="GPS">GPS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="maintenance">Maintenance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Installation Date</label>
                                        <input type="date" class="form-control" name="installation_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Calibration</label>
                                        <input type="date" class="form-control" name="last_calibration">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Battery Level (%)</label>
                                        <input type="number" class="form-control" name="battery_level" min="0" max="100" value="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" placeholder="e.g., Front Dashboard">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Additional information about the device..."></textarea>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="manage_sensor_devices.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Add Device
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('#addSensorDeviceForm').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: 'php/save_sensor_device.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if(response.success) {
                        alert('Device added successfully!');
                        window.location.href = 'manage_sensor_devices.php';
                    } else {
                        alert('Error: ' + (response.message || 'Failed to add device'));
                    }
                },
                error: function() {
                    alert('An error occurred while adding the device');
                }
            });
        });
    });
    </script>
</body>
</html>
