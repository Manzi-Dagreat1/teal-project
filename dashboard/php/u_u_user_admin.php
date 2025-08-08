<?php
include "includes/pure_header_in_php.php";

$userid = $_GET["uid"];
$check = mysqli_query($con, "SELECT * FROM `users` WHERE `UserId` = '$userid'");
$checkrow = mysqli_fetch_assoc($check);
$r_names = $checkrow['FirstName'] . ' ' . $checkrow['LastName'];

if (strtolower($checkrow['Role']) == 'admin') {
    $rest_to_normal_user = mysqli_query($con, "UPDATE `users` SET `Role` = 'user' WHERE `UserId` = '$userid'");
    if ($rest_to_normal_user) {
        echo "<script>window.location.href = '../manage_users.php?msg=Access Reset successfully on ($r_names) as User in the system.'</script>";
    } else {
        echo "<script>window.location.href = '../manage_users.php?msg=This operation can not be done. Please try again later!'</script>";
    }
} elseif (strtolower($checkrow['Role']) == 'user') {
    $make_a_user_as_admin = mysqli_query($con, "UPDATE `users` SET `Role` = 'admin' WHERE `UserId` = '$userid'");
    if ($make_a_user_as_admin) {
        echo "<script>window.location.href = '../manage_users.php?msg=Full Access granted successfully on ($r_names) as Admin in the system.'</script>";
    } else {
        echo "<script>window.location.href = '../manage_users.php?msg=This operation can not be done. Please try again later!'</script>";
    }
} else {
    echo "<script>window.location.href = '../manage_users.php?msg=This operation can not be done. Please try again later aaa!'</script>";
}
