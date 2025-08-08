<?php
include "php/includes/pure_header.php";
if('addVehicle')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
        Contents and all features developed in this system.
        Prepared and developed by @Prince Parfait - +(250) 7 9205 4846
        Email Address: ganzaparfait7@gmail.com
     -->

    <link rel="stylesheet" href="extensions/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="extensions/bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <link rel="icon" href="assets/images/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- 
        *****************************************************************

            ___________________________

                All Assets from assets/folder/to/in/this/file...
            ___________________________

        *****************************************************************
      -->
    <title>Gas Station - System</title>
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
                            <h4><i class="fa-solid fa-user"></i> Add New vehicle</h4>
                            <small class="text-muted">This vehicle will be added in the system. Once added.</small>
                        </div>
                        <div>
                            <a href="manage_users.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-table"></i></a>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET['msg'])) {
                    ?>
                        <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert" onclick="this.style.display = 'none'">
                            <strong>Users!</strong>
                            <?= $_GET['msg']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else {
                        echo "";
                    }
                    ?>
                    <div class="cover-content">
                        <div id="cover-loader">
                            <div id="cover-spinner"></div>
                        </div>
                        <form action="add_vehicle.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Registration no:</label>
                                        <input type="text" name="Reg_no" placeholder="Registration no..." class="form-control borderColor" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>plate Number</label>
                                        <input type="text" name="plateNumber" placeholder="plate Number..." class="form-control borderColor" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>fuel type:</label>
                                        <select name="f_type" class="form-control borderColor" required>
                                            <option value="Petrol" selected hidden>Petrol</option>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>vehicle type:</label>
                                        <select name="v-type" class="form-control borderColor" required>
                                            <option value="Car" selected hidden>Male</option>
                                            <option value="Car">Car</option>
                                            <option value="Motorcycle">Motorcycle</option>
                                            <option value="Truck">Truck</option>
                                            <option value="bus">bus</option>
                                        </select>
                                    </div>
                                </div>
                             </div>   
                            <button type="submit" class="btn btn-outline-primary formSubmitBtn" name="addVehicle">ADD</button>
                        </form>
                    </div>
                </div>

                <?php include('php/includes/Rlinks.php'); ?>
                <?php include('php/includes/footer.php'); ?>
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>

</html>