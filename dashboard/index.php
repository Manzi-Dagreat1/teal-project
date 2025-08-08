<?php
include "php/includes/pure_header.php";

// Fetch latest sensor data for dashboard
$latestData = null;
$query = "SELECT id, vehicle_id, temperature, humidity, ammonia, co2, dust, longitude, latitude, timestamp FROM sensor_data ORDER BY timestamp DESC LIMIT 1";
$result = $con->query($query);
if ($result && $result->num_rows > 0) {
    $latestData = $result->fetch_assoc();
}

// Fetch historical data for charts
$historicalData = [];
$query = "SELECT id, vehicle_id, temperature, humidity, ammonia, co2, dust, longitude, latitude, timestamp FROM sensor_data ORDER BY timestamp DESC LIMIT 50";
$result = $con->query($query);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $historicalData[] = $row;
    }
}

// Fetch vehicle statistics
$vehicleStats = [
    'total' => 0,
    'petrol' => 0,
    'diesel' => 0,
    'electric' => 0
];

$vehicleQuery = "SELECT fuel_type, COUNT(*) as count FROM vehicles GROUP BY fuel_type";
$result = $con->query($vehicleQuery);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicleStats['total'] += $row['count'];
        switch(strtolower($row['fuel_type'])) {
            case 'petrol':
                $vehicleStats['petrol'] = $row['count'];
                break;
            case 'diesel':
                $vehicleStats['diesel'] = $row['count'];
                break;
            case 'electric':
            case 'hybrid':
                $vehicleStats['electric'] += $row['count'];
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Station Dashboard - Real-time Monitoring</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #4ecdc4;
            --warning-color: #ff6b6b;
            --info-color: #45b7d1;
            --light-bg: #f8f9fa;
            --card-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: var(--card-shadow);
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
            border: none;
            margin-bottom: 1rem;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .sensor-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .sensor-card:hover {
            transform: translateY(-3px);
        }

        .sensor-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .sensor-label {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-online { background-color: #4ecdc4; }
        .status-offline { background-color: #ff6b6b; }

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
                <!-- Dashboard Header -->
                <div class="dashboard-header">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1><i class="fas fa-tachometer-alt"></i> Gas Station Dashboard</h1>
                                <p class="mb-0">Real-time environmental monitoring and vehicle management</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="status-indicator status-online"></div>
                                <span>System Online</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-primary text-white">
                                        <i class="fas fa-thermometer-half"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $latestData ? number_format($latestData['temperature'], 1) : '--'; ?>°C
                                        </h3>
                                        <p class="text-muted mb-0">Temperature</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-info text-white">
                                        <i class="fas fa-tint"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $latestData ? number_format($latestData['humidity'], 1) : '--'; ?>%
                                        </h3>
                                        <p class="text-muted mb-0">Humidity</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-warning text-white">
                                        <i class="fas fa-cloud"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $latestData ? number_format($latestData['ammonia'], 1) : '--'; ?> ppm
                                        </h3>
                                        <p class="text-muted mb-0">Ammonia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-success text-white">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $vehicleStats['total']; ?>
                                        </h3>
                                        <p class="text-muted mb-0">Total Vehicles</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-danger text-white">
                                        <i class="fas fa-smog"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $latestData ? number_format($latestData['co2'], 1) : '--'; ?> ppm
                                        </h3>
                                        <p class="text-muted mb-0">CO₂ Levels</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-secondary text-white">
                                        <i class="fas fa-dust"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $latestData ? number_format($latestData['dust'], 1) : '--'; ?> µg/m³
                                        </h3>
                                        <p class="text-muted mb-0">Dust Level</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-primary text-white">
                                        <i class="fas fa-gas-pump"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $vehicleStats['petrol']; ?>
                                        </h3>
                                        <p class="text-muted mb-0">Petrol Vehicles</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-card">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-info text-white">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="mb-0">
                                            <?php echo $vehicleStats['electric']; ?>
                                        </h3>
                                        <p class="text-muted mb-0">Electric/Hybrid</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Real-time Sensor Data -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="chart-container">
                                <h4 class="mb-3"><i class="fas fa-chart-line"></i> Sensor Data Trends</h4>
                                <canvas id="sensorChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="chart-container">
                                <h4 class="mb-3"><i class="fas fa-chart-bar"></i> Latest Readings</h4>
                                <canvas id="latestSensorChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="container-fluid mt-4">
                    <div class="chart-container">
                        <h4 class="mb-3"><i class="fas fa-table"></i> Recent Sensor Data</h4>
                        <div class="table-responsive">
                            <table id="sensorDataTable" class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Time</th>
                                        <th>Vehicle reg no</th>
                                        <th>Temperature (°C)</th>
                                        <th>Humidity (%)</th>
                                        <th>Ammonia (ppm)</th>
                                        <th>CO₂ (ppm)</th>
                                        <th>Dust (µg/m³)</th>
                                        <th>Coordinates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($historicalData as $data): ?>
                                    <tr>
                                        <td><?php echo date('M d, Y H:i', strtotime($data['timestamp'])); ?></td>
                                        <td><?php echo $data['vehicle_id']; ?></td>
                                        <td><?php echo number_format($data['temperature'], 1); ?></td>
                                        <td><?php echo number_format($data['humidity'], 1); ?></td>
                                        <td><?php echo number_format($data['ammonia'], 1); ?></td>
                                        <td><?php echo number_format($data['co2'], 1); ?></td>
                                        <td><?php echo number_format($data['dust'], 1); ?></td>
                                        <td><?php echo $data['longitude']. "-" .$data['latitude']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php include('php/includes/Rlinks.php'); ?>
                <?php include('php/includes/footer.php'); ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="extensions/Jquery/jquery.js"></script>
    <script src="extensions/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        console.log(<?php echo json_encode(array_reverse(array_column($historicalData, 'timestamp')))?>);
        // Initialize DataTable
        $(document).ready(function() {
            $('#sensorDataTable').DataTable({
                responsive: true,
                order: [[0, 'desc']],
                pageLength: 10,
                language: {
                    search: "<i class='fas fa-search'></i> Search:",
                    lengthMenu: "Show _MENU_ records per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ records"
                }
            });
        });

        // Sensor Chart Configuration
        const sensorCtx = document.getElementById('sensorChart').getContext('2d');
        const sensorChart = new Chart(sensorCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_reverse(array_column($historicalData, 'timestamp'))); ?>,
                datasets: [
                    {
                        label: 'Temperature (°C)',
                        data: <?php echo json_encode(array_reverse(array_column($historicalData, 'temperature'))); ?>,
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Humidity (%)',
                        data: <?php echo json_encode(array_reverse(array_column($historicalData, 'humidity'))); ?>,
                        borderColor: '#4ecdc4',
                        backgroundColor: 'rgba(78, 205, 196, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Ammonia (ppm)',
                        data: <?php echo json_encode(array_reverse(array_column($historicalData, 'ammonia'))); ?>,
                        borderColor: '#ff6b6b',
                        backgroundColor: 'rgba(255, 107, 107, 0.1)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Latest Sensor Chart
        const latestCtx = document.getElementById('latestSensorChart').getContext('2d');
        const latestChart = new Chart(latestCtx, {
            type: 'bar',
            data: {
                labels: ['Temperature', 'Humidity', 'Ammonia', 'CO₂', 'Dust'],
                datasets: [{
                    label: 'Latest Readings',
                    data: [
                        <?php echo $latestData ? $latestData['temperature'] : 0; ?>,
                        <?php echo $latestData ? $latestData['humidity'] : 0; ?>,
                        <?php echo $latestData ? $latestData['ammonia'] : 0; ?>,
                        <?php echo $latestData ? $latestData['co2'] : 0; ?>,
                        <?php echo $latestData ? $latestData['dust'] : 0; ?>
                    ],
                    backgroundColor: [
                        '#667eea', '#4ecdc4', '#ff6b6b', '#45b7d1', '#96ceb4'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Auto-refresh data every 30 seconds
        setInterval(function() {
            location.reload();
        }, 30000);
    </script>
</body>
