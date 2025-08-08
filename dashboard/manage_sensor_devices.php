<?php
include "php/includes/pure_header.php";
//require_once "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sensor Devices - Teal Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="extensions/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="extensions/fontawesome/css/all.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="extensions/Jquery/jquery.dataTables.min.css" rel="stylesheet">
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
        .status-active {
            color: #28a745;
            font-weight: bold;
        }
        .status-inactive {
            color: #dc3545;
            font-weight: bold;
        }
        .status-maintenance {
            color: #ffc107;
            font-weight: bold;
        }
        .battery-high { color: #28a745; }
        .battery-medium { color: #ffc107; }
        .battery-low { color: #dc3545; }
    </style>
</head>
<body>
    <?php include "sidebar.php"; ?>
    <?php include "components/navbar.php"; ?>

    <div class="container-fluid mt-5 pt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-microchip"></i> Sensor Devices Management</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeviceModal">
                            <i class="fas fa-plus"></i> <a href="./add_sensor_device.php">Add New Device</a>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="sensorDevicesTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sensor ID</th>
                                        <th>Serial Number</th>
                                        <th>Vehicle Reg</th>
                                        <th>Device Name</th>
                                        <th>Status</th>
                                        <th>Battery</th>
                                        <th>Installation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM sensor_devices ORDER BY created_at DESC";
                                    $result = $con->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $statusClass = 'status-' . $row['status'];
                                            $batteryClass = $row['battery_level'] > 70 ? 'battery-high' : 
                                                           ($row['battery_level'] > 30 ? 'battery-medium' : 'battery-low');
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['sensor_id']; ?></td>
                                        <td><?php echo $row['serial_number']; ?></td>
                                        <td><?php echo $row['vehicle_reg_no']; ?></td>
                                        <td><?php echo $row['device_name']; ?></td>
                                        <td><span class="<?php echo $statusClass; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                                        <td>
                                            <i class="fas fa-battery-full <?php echo $batteryClass; ?>"></i>
                                            <?php echo $row['battery_level']; ?>%
                                        </td>
                                        <td><?php echo $row['installation_date']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" onclick="editDevice(<?php echo $row['id']; ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" onclick="deleteDevice(<?php echo $row['id']; ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='9' class='text-center'>No sensor devices found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Device Modal -->
    <div class="modal fade" id="addDeviceModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Sensor Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addDeviceForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sensor ID *</label>
                                    <input type="text" class="form-control" name="sensor_id" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Serial Number *</label>
                                    <input type="text" class="form-control" name="serial_number" required>
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
                                        $vehicle_sql = "SELECT registration_number FROM vehicles ORDER BY registration_number";
                                        $vehicle_result = $con->query($vehicle_sql);
                                        while($vehicle = $vehicle_result->fetch_assoc()) {
                                            echo "<option value='".$vehicle['registration_number']."'>".$vehicle['registration_number']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Device Name</label>
                                    <input type="text" class="form-control" name="device_name">
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
                                        <option value="active">Active</option>
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
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="e.g., Front Dashboard">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Device</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="extensions/Jquery/jquery.dataTables.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('#sensorDevicesTable').DataTable({
            responsive: true,
            order: [[0, 'desc']],
            pageLength: 10
        });
    });

    // Add Device Form Submission
    $('#addDeviceForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'php/save_sensor_device.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    toastr.success('Device added successfully!');
                    $('#addDeviceModal').modal('hide');
                    location.reload();
                } else {
                    toastr.error(response.message || 'Error adding device');
                }
            }
        });
    });

    function editDevice(id) {
        // Redirect to edit page or open edit modal
        window.location.href = 'edit_sensor_device.php?id=' + id;
    }

    function deleteDevice(id) {
        if(confirm('Are you sure you want to delete this device?')) {
            $.ajax({
                url: 'php/delete_sensor_device.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    if(response.success) {
                        toastr.success('Device deleted successfully!');
                        location.reload();
                    } else {
                        toastr.error('Error deleting device');
                    }
                }
            });
        }
    }
    </script>
</body>
</html>
