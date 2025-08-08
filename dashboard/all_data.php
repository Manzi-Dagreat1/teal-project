<?php
include "php/includes/pure_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Sensor Data Export</title>
    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css?v=1.8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.7.0/jspdf.plugin.autotable.min.js"></script>
        <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="extensions/bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
</head>

<body>
    <div class="body-contents-wrapper">
        <?php include('components/navbar.php'); ?>
        <div class="asideBarBacDrop"></div>
        <div class="contents">
            <?php include('php/includes/header.php'); ?>
            <div class="cont-container"> 
                <div class="form-content-wrapper">
                    <div class="form-header-content">
                        <div class="left-content mb-2">
                            <h4><i class="fa-solid fa-table"></i> Export All Data</h4>
                        </div>
                    </div>
                    <h2>All Sensor Data</h2>
                    <div class="mb-3">
                        <button class="btn btn-success" onclick="exportExcel()">Export to Excel</button>
                        <button class="btn btn-danger" onclick="exportPDF()">Export to PDF</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="allDataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Temperature (°C)</th>
                                    <th>Humidity (%)</th>
                                    <th>Ammonia (ppm)</th>
                                    <th>CO₂ (ppm)</th>
                                    <th>Dust (µg/m³)</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody id="allDataBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <script>
                // Fetch all data from getData.php
                async function loadAllData() {
                    const response = await fetch('php/getData.php');
                    const data = await response.json();
                    const tbody = document.getElementById('allDataBody');
                    tbody.innerHTML = '';
                    data.forEach((row, idx) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                <td>${idx + 1}</td>
                <td>${row.temperature ?? ''}</td>
                <td>${row.humidity ?? ''}</td>
                <td>${row.ammonia ?? ''}</td>
                <td>${row.co2 ?? ''}</td>
                <td>${row.dust ?? ''}</td>
                <td>${row.timestamp ?? ''}</td>
            `;
                        tbody.appendChild(tr);
                    });
                }
                loadAllData();

                // Export to Excel
                function exportExcel() {
                    const table = document.getElementById('allDataTable');
                    const wb = XLSX.utils.table_to_book(table, {
                        sheet: "All Data"
                    });
                    XLSX.writeFile(wb, 'all_sensor_data.xlsx');
                }

                // Export to PDF
                function exportPDF() {
                    const {
                        jsPDF
                    } = window.jspdf;
                    const doc = new jsPDF();
                    doc.autoTable({
                        html: '#allDataTable',
                        theme: 'grid',
                        headStyles: {
                            fillColor: [41, 128, 185]
                        },
                        margin: {
                            top: 20
                        }
                    });
                    doc.save('all_sensor_data.pdf');
                }
            </script>
</body>

</html>