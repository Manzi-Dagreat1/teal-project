<?php
include "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data Display</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <link rel="stylesheet" href="extensions/Jquery/jquery.dataTables.min.css">
    
    <style>
        /* Sidebar Styles */
        .asideBar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            z-index: 1000;
            transition: transform 0.3s;
        }

        .asideHeader {
            padding: 1rem;
            background: #34495e;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .asideHeader img {
            width: 40px;
            height: 40px;
        }

        .closeAsidebarBtn {
            color: white;
            cursor: pointer;
            display: none;
        }

        .sideLinks {
            padding: 1rem 0;
        }

        .sideLinks a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #ecf0f1;
            text-decoration: none;
            transition: background 0.3s;
        }

        .sideLinks a:hover {
            background: #34495e;
            color: white;
        }

        .sideLinks i {
            margin-right: 0.5rem;
            width: 20px;
        }

        .sideLinks a.active {
            background: #3498db;
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
            background: #f8f9fa;
        }

        @media (max-width: 768px) {
            .asideBar {
                transform: translateX(-100%);
            }
            
            .asideBar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .closeAsidebarBtn {
                display: block;
            }
        }

        /* Dashboard Styles */
        .page-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .data-table-container {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid #dee2e6;
            background: #f8f9fa;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .status-normal { background: #d4edda; color: #155724; }
        .status-warning { background: #fff3cd; color: #856404; }
        .status-danger { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="asideBar">
        <header class="asideHeader">
            <img src="assets/images/logo.png" alt="Logo" style="width: 40px; height: 40px;">
            <i class="fas fa-times closeAsidebarBtn" onclick="toggleSidebar()"></i>
        </header>

        <?php include('components/navbar.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="page-header">
            <h1><i class="fas fa-chart-line"></i> Sensor Data Dashboard</h1>
            <p>Real-time environmental monitoring data with vehicle tracking</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Records</h6>
                        <h3 id="totalRecords">-</h3>
                    </div>
                    <i class="fas fa-database fa-2x text-primary"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Active Vehicles</h6>
                        <h3 id="activeVehicles">-</h3>
                    </div>
                    <i class="fas fa-truck fa-2x text-success"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Latest Reading</h6>
                        <h3 id="latestReading">-</h3>
                    </div>
                    <i class="fas fa-clock fa-2x text-warning"></i>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Avg Temperature</h6>
                        <h3 id="avgTemperature">-</h3>
                    </div>
                    <i class="fas fa-thermometer-half fa-2x text-danger"></i>
                </div>
            </div>
        </div>

        <div class="data-table-container">
            <div class="table-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-table"></i> Sensor Readings</h5>
                <button class="btn btn-primary" onclick="loadData()">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover" id="sensorTable">
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
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Loading data...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="extensions/Jquery/jquery.dataTables.min.js"></script>

    <script>
        function toggleSidebar() {
            document.querySelector('.asideBar').classList.toggle('active');
        }

        function loadData() {
            $.ajax({
                url: 'php/get_sensor_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
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
            $('#totalRecords').text(data.length);
            
            const uniqueVehicles = [...new Set(data.map(item => item.vehicle_id))];
            $('#activeVehicles').text(uniqueVehicles.length);
            
            if (data.length > 0) {
                const latest = data[0];
                $('#latestReading').text(new Date(latest.timestamp).toLocaleString());
                
                const avgTemp = (data.reduce((sum, item) => sum + parseFloat(item.temperature), 0) / data.length).toFixed(1);
                $('#avgTemperature').text(avgTemp + '°C');
            }
        }

        function populateTable(data) {
            const tbody = $('#sensorTableBody');
            tbody.empty();

            data.forEach(item => {
                const status = getStatus(item);
                const coordinates = parseFloat(item.latitude).toFixed(4) + ', ' + parseFloat(item.longitude).toFixed(4);
                
                const row = 
                    '<tr>' +
                        '<td>' + item.id + '</td>' +
                        '<td><strong>' + item.vehicle_id + '</strong></td>' +
                        '<td>' + item.temperature + '°C</td>' +
                        '<td>' + item.humidity + '%</td>' +
                        '<td>' + item.ammonia + ' ppm</td>' +
                        '<td>' + item.co2 + ' ppm</td>' +
                        '<td>' + item.dust + ' μg/m³</td>' +
                        '<td><small>' + coordinates + '</small></td>' +
                        '<td>' + new Date(item.timestamp).toLocaleString() + '</td>' +
                        '<td><span class="status-badge ' + status.class + '">' + status.text + '</span></td>' +
                    '</tr>';
                tbody.append(row);
            });

            if ($.fn.DataTable.isDataTable('#sensorTable')) {
                $('#sensorTable').DataTable().destroy();
            }

            $('#sensorTable').DataTable({
                responsive: true,
                order: [[8, 'desc']],
                pageLength: 25
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
