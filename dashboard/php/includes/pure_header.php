<?php
session_start();
include "php/config.php";

if (!isset($_SESSION['user_uni_id'])) {
    echo "<script>alert('You must login first.')</script>";
    echo "<script>window.location.href = '../default/login.php'</script>";
} else {
    $selectuser = mysqli_query($con, "SELECT * FROM `users` WHERE `Unique_id` = {$_SESSION['user_uni_id']}");
    $user = mysqli_fetch_assoc($selectuser);
    $unid = $user['Unique_id'];
    $role = $user['Role'];
    $fname = $user['FirstName'];
    $names = $user['FirstName'] . ' ' . $user['LastName'];
}
$user_uniqueid = $user['UserId'];
if ($user['Access'] == 'Revoked' || $user['Access'] != 'Granted') {
    echo "<script>window.location.href = '../default/php/notify.php'</script>";
}

if ($user['isDeleted'] == 'Deleted') {
    echo "<script>window.location.href = '../default/php/notify.php'</script>";
}
