<?php
session_start();
include "config.php";

if (!isset($_SESSION['log_uni_id'])) {
    header("Location: ../login.php");
}
$sql = mysqli_query($con, "SELECT * FROM `users` WHERE `Unique_id` = {$_SESSION['log_uni_id']}");
$row = mysqli_fetch_assoc($sql);
$row_role = strtolower($row['Role']);
$is_valid_role = ($row_role == 'admin' || $row_role == 'user');

if ($is_valid_role && $row['Access'] == 'Granted') {
    $_SESSION['user_uni_id'] = $row['Unique_id'];
    header("Location: ../../dashboard/");
    exit();
} elseif ($row['Access'] != 'Granted') {
    // Access is denied, redirect to a notification page
    header("Location: notify.php");
    exit();
} else {
    // Invalid role or other issue, redirect to an error page
    echo "<script>window.location.href = '../error.php'</script>";
}
