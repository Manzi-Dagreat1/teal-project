<?php
session_start();
include_once "../config.php";

if (isset($_SESSION['admin_uni_id'])) {
    // Perform necessary database updates
    $save_yes_no_invoice = mysqli_query($con, "UPDATE `inv_record` SET `Save` = 'AUTO_SAVE'");
    $delete_it = mysqli_query($con, "DELETE FROM `inv_record` WHERE `ChoseSave` = 'DontSave' AND `Inv_Id` != '1'");
    $delete_unsaved_report_data = mysqli_query($con, "DELETE FROM `report_data` WHERE `ChoseSave` = 'DontSave'");

    // Destroy session
    session_destroy();
    session_unset();

    // Output JavaScript to clear localStorage and redirect
    echo "<script>
        localStorage.removeItem('selectedYear'); // Clear the stored year
        window.location.href = '../../../default/login.php'; // Redirect to login page
    </script>";
    exit();
} else {
    header("Location: ../../../default/login.php");
    exit();
}
