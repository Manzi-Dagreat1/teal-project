<?php
include "php/config.php";
include "php/includes/pure_header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data Dashboard - Gas Station System</title>
    
    <!-- Meta tags -->
    <meta name="theme-color" content="#007bff">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <link rel="stylesheet" href="extensions/Jquery/jquery.dataTables.min.css">
    <link rel="icon" href="assets/images/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/modern-dashboard.css">
    <link rel="stylesheet" href="assets/css/main.css?v=1.8">
    <link rel="stylesheet" href="assets/css/ess.css?v=1.4">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --background-color: #f8fafc;
            --card-background: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
        }

        .dashboard-content {
            padding: 2rem;
            background-color: var(--background-color);
            min-height: 100vh;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--card-background);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.15);
        }

        .data-table-container {
            background: var(--card-background);
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(to right, #f8fafc, #f1f5f9);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #f8fafc;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
        }

        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .data-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-normal {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .refresh-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .refresh-btn:hover {
            background: #1d4ed8;
        }

        .coordinates-display {
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
        }

        /* Ensure proper spacing with sidebar */
        .contents {
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .contents {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="body-contents-wrapper">
        <!-- Include Navbar -->
        <?php include('components/navbar.php'); ?>

        <!-- Include Sidebar -->
        <div class="asideBarBacDrop"></div>

        <!-- Main Content -->
        <div class="contents">
            <!-- Include Header -->
            <?php include('php/includes/header.php'); ?>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="page-header">
                    <h1><i class="fas fa-chart-line"></i> Sensor Data Dashboard</h1>
                    <p class="mb-0">Real-time environmental monitoring data with vehicle tracking</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Total Records</h6>
                                <h3 class="mb-0" id="totalRecords">-</h3>
                            </div>
                            <i class="fas fa-database fa-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Active Vehicles</h6>
                                <h3 class="mb-0" id="activeVehicles">-</h3>
                            </div>
                            <i class="fas fa-truck fa-2x text-success"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Latest Reading</h6>
                                <h3 class="mb-0" id="latestReading">-</h3>
                            </div>
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Avg Temperature</h6>
                                <h3 class="mb-0" id="avgTemperature">-</h3>
                            </div>
                            <i class="fas fa-thermometer-half fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>

                <div class="data-table-container">
                    <div class="table-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-table"></i> Sensor Readings</h5>
                        <button class="refresh-btn" onclick="loadData()">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover data-table" id="sensorTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vehicle ID</th>
                                    <th>Temperature</th>
                                    <th>Humidity</th>
                                    <th>Ammonia</th>
                                    <th>CO2</th>
                                    <th>Dust</th>
                                    <th>Coordinates</th>
                                    <th>Timestamp</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="sensorTableBody">
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <div class="loading-spinner"></div>
                                        Loading data...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Include Footer -->
            <?php include('php/includes/footer.php'); ?>
        </div>
    </div>

    <div class="default-back-drop deactivate slashClose"></div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/opt_modal.js"></script>
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="extensions/Jquery/jquery.dataTables.min.js"></script>

    <script>
        function loadData() {
            $.ajax({
                url: 'php/get_sensor_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Handle both direct array and object with data property
                    let data = [];
                    if (Array.isArray(response)) {
                        data = response;
                    } else if (response && response.data && Array.isArray(response.data)) {
                        data = response.data;
                    } else {
                        console.error('Invalid data format received:', response);
                        data = [];
                    }
                    
                    updateStats(data);
                    populateTable(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading data:', error);
                    $('#sensorTableBody').html('<tr><td colspan="10" class="text-center text-danger">Error loading data</td></tr>');
                }
            });
        }

        function updateStats(data) {
            if (!Array.isArray(data)) {
                data = [];
            }
            
            $('#totalRecords').text(data.length);
            
            const uniqueVehicles = [...new Set(data.map(item => item.vehicle_id || ''))];
            $('#activeVehicles').text(uniqueVehicles.length);
            
            if (data.length > 0) {
                const latest = data[0];
                $('#latestReading').text(new Date(latest.timestamp).toLocaleString());
                
                const avgTemp = (data.reduce((sum, item) => sum + parseFloat(item.temperature || 0), 0) / data.length).toFixed(1);
                $('#avgTemperature').text(avgTemp + '°C');
            } else {
                $('#latestReading').text('No data');
                $('#avgTemperature').text('0.0°C');
            }
        }

        function populateTable(data) {
            if (!Array.isArray(data)) {
                data = [];
            }
            
            const tbody = $('#sensorTableBody');
            tbody.empty();

            if (data.length === 0) {
                tbody.html('<tr><td colspan="10" class="text-center">No sensor data available</td></tr>');
                return;
            }

            data.forEach(item => {
                const status = getStatus(item);
                const coordinates = (item.latitude && item.longitude) 
                    ? parseFloat(item.latitude).toFixed(4) + ', ' + parseFloat(item.longitude).toFixed(4)
                    : 'N/A';
                
                const row = 
                    '<tr>' +
                        '<td>' + (item.id || '-') + '</td>' +
                        '<td><strong>' + (item.vehicle_id || '-') + '</strong></td>' +
                        '<td>' + (item.temperature || '0') + '°C</td>' +
                        '<td>' + (item.humidity || '0') + '%</td>' +
                        '<td>' + (item.ammonia || '0') + ' ppm</td>' +
                        '<td>' + (item.co2 || '0') + ' ppm</td>' +
                        '<td>' + (item.dust || '0') + ' μg/m³</td>' +
                        '<td class="coordinates-display">' + coordinates + '</td>' +
                        '<td>' + new Date(item.timestamp || new Date()).toLocaleString() + '</td>' +
                        '<td><span class="status-badge ' + status.class + '">' + status.text + '</span></td>' +
                    '</tr>';
                tbody.append(row);
            });

            // Initialize DataTable
            if ($.fn.DataTable.isDataTable('#sensorTable')) {
                $('#sensorTable').DataTable().destroy();
            }

            $('#sensorTable').DataTable({
                responsive: true,
                order: [[8, 'desc']],
                pageLength: 25,
                language: {
                    search: "Search records:",
                    lengthMenu: "Show _MENU_ records per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        }

        function getStatus(item) {
            if (item.temperature > 30 || item.ammonia > 50 || item.co2 > 1000) {
                return { class: 'status-danger', text: 'Critical' };
            } else if (item.temperature > 25 || item.ammonia > 25 || item.co2 > 800) {
                return { class: 'status-warning', text: 'Warning' };
            } else {
                return { class: 'status-normal', text: 'Normal' };
            }
        }

        // Load data on page load
        $(document).ready(function() {
            loadData();
        });

        // Auto-refresh every 30 seconds
        setInterval(loadData, 30000);
    </script>
</body>
</html>
