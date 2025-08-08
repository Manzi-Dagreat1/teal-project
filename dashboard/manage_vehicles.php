<?php
include "php/includes/pure_header.php";

// Fetch all vehicles from database
$sql = "SELECT * FROM vehicles ORDER BY created_at DESC";
$result = $con->query($sql);
$vehicles = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vehicles - Gas Station System</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .vehicle-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .vehicle-card:hover {
            transform: translateY(-5px);
        }
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .btn-modern {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .fuel-petrol { background-color: #ff6b6b; color: white; }
        .fuel-diesel { background-color: #4ecdc4; color: white; }
        .fuel-electric { background-color: #45b7d1; color: white; }
        .fuel-hybrid { background-color: #96ceb4; color: white; }
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
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1"><i class="fa-solid fa-car"></i> Vehicle Management</h2>
                        <p class="text-muted">Manage and monitor all registered vehicles</p>
                    </div>
                    <a href="add_new_vehicle.php" class="btn btn-primary btn-modern">
                        <i class="fa-solid fa-plus"></i> Add New Vehicle
                    </a>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-car fa-2x text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo count($vehicles); ?></h3>
                                    <p class="text-muted mb-0">Total Vehicles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-gas-pump fa-2x text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">
                                        <?php echo count(array_filter($vehicles, fn($v) => $v['fuel_type'] === 'Petrol')); ?>
                                    </h3>
                                    <p class="text-muted mb-0">Petrol Vehicles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-oil-can fa-2x text-warning"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">
                                        <?php echo count(array_filter($vehicles, fn($v) => $v['fuel_type'] === 'Diesel')); ?>
                                    </h3>
                                    <p class="text-muted mb-0">Diesel Vehicles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fa-solid fa-bolt fa-2x text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">
                                        <?php echo count(array_filter($vehicles, fn($v) => $v['fuel_type'] === 'Electric' || $v['fuel_type'] === 'Hybrid')); ?>
                                    </h3>
                                    <p class="text-muted mb-0">Electric/Hybrid</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vehicles Table -->
                <div class="table-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0"><i class="fa-solid fa-list"></i> Vehicle List</h4>
                        <div>
                            <button class="btn btn-success btn-modern" onclick="exportToExcel()">
                                <i class="fa-solid fa-file-excel"></i> Export Excel
                            </button>
                            <button class="btn btn-danger btn-modern" onclick="exportToPDF()">
                                <i class="fa-solid fa-file-pdf"></i> Export PDF
                            </button>
                        </div>
                    </div>

                    <?php if (empty($vehicles)): ?>
                        <div class="text-center py-5">
                            <i class="fa-solid fa-car fa-5x text-muted mb-3"></i>
                            <h4 class="text-muted">No vehicles found</h4>
                            <p class="text-muted">Add your first vehicle to get started</p>
                            <a href="add_new_vehicle.php" class="btn btn-primary btn-modern">
                                <i class="fa-solid fa-plus"></i> Add Vehicle
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table id="vehiclesTable" class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th><i class="fa-solid fa-hashtag"></i> #</th>
                                        <th><i class="fa-solid fa-id-card"></i> Registration</th>
                                        <th><i class="fa-solid fa-car"></i> Plate Number</th>
                                        <th><i class="fa-solid fa-gas-pump"></i> Fuel Type</th>
                                        <th><i class="fa-solid fa-truck"></i> Vehicle Type</th>
                                        <th><i class="fa-solid fa-calendar"></i> Added Date</th>
                                        <th><i class="fa-solid fa-cogs"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($vehicles as $index => $vehicle): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($vehicle['registration_no']); ?></strong>
                                            </td>
                                            <td><?php echo htmlspecialchars($vehicle['plate_number']); ?></td>
                                            <td>
                                                <span class="status-badge fuel-<?php echo strtolower($vehicle['fuel_type']); ?>">
                                                    <?php echo htmlspecialchars($vehicle['fuel_type']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <?php echo htmlspecialchars($vehicle['vehicle_type']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <?php echo date('M d, Y H:i', strtotime($vehicle['created_at'])); ?>
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-sm btn-warning btn-modern" 
                                                            onclick="editVehicle(<?php echo $vehicle['id']; ?>)">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger btn-modern" 
                                                            onclick="deleteVehicle(<?php echo $vehicle['id']; ?>)">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php include('php/includes/Rlinks.php'); ?>
            <?php include('php/includes/footer.php'); ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#vehiclesTable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        className: 'btn btn-success btn-modern',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fa-solid fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger btn-modern',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ],
                language: {
                    search: "<i class='fa-solid fa-search'></i> Search:",
                    lengthMenu: "Show _MENU_ vehicles per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ vehicles",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "<i class='fa-solid fa-chevron-right'></i>",
                        previous: "<i class='fa-solid fa-chevron-left'></i>"
                    }
                }
            });
        });

        function editVehicle(id) {
            window.location.href = 'edit_vehicle.php?id=' + id;
        }

        function deleteVehicle(id) {
            if (confirm('Are you sure you want to delete this vehicle? This action cannot be undone.')) {
                $.ajax({
                    url: 'php/delete_vehicle.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response.success) {
                            alert('Vehicle deleted successfully!');
                            location.reload();
                        } else {
                            alert('Error deleting vehicle: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error connecting to server. Please try again.');
                    }
                });
            }
        }

        function exportToExcel() {
            $('.buttons-excel').click();
        }

        function exportToPDF() {
            $('.buttons-pdf').click();
        }

        function importVehicles() {
            $('#importModal').modal('show');
        }

        function handleImport() {
            var fileInput = document.getElementById('importFile');
            var file = fileInput.files[0];
            
            if (!file) {
                alert('Please select a file to import.');
                return;
            }

            var formData = new FormData();
            formData.append('importFile', file);

            $.ajax({
                url: 'php/import_vehicles.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert('Vehicles imported successfully! ' + response.imported + ' vehicles added.');
                        location.reload();
                    } else {
                        alert('Error importing vehicles: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error connecting to server. Please try again.');
                }
            });
        }
    </script>
</body>
</html>
