<?php
include "includes/pure_header_in_php.php";

$getuserid = $_GET['access'];
$check = mysqli_query($con, "SELECT * FROM `users` WHERE `UserId` = '$getuserid'");
$checkrow = mysqli_fetch_assoc($check);

$names = $checkrow['FirstName'] . ' ' . $checkrow['LastName'];
$role = ucfirst($checkrow['Role']);

if ($checkrow['Access'] == 'Granted') {
    $revoke_access = mysqli_query($con, "UPDATE `users` SET `Access` = 'Revoked' WHERE `UserId` = '$getuserid'");
    if ($revoke_access) {
        echo "<script>alert('Access revoked successfully on ($names - $role) in the system.')</script>";
        echo "<script>window.location.href = '../manage_users.php'</script>";
    } else {
        echo "<script>alert('Something went wrong on revoking access on ($names - $role) in the system.')</script>";
        echo "<script>window.location.href = '../manage_users.php'</script>";
    }
} elseif ($checkrow['Access'] == 'Revoked') {
    $grant_access = mysqli_query($con, "UPDATE `users` SET `Access` = 'Granted' WHERE `UserId` = '$getuserid'");
    if ($grant_access) {
        echo "<script>alert('Access granted successfully on ($names - $role) in the system.')</script>";
        echo "<script>window.location.href = '../manage_users.php'</script>";
    } else {
        echo "<script>alert('Something went wrong on granting access on ($names - $role) in the system.')</script>";
        echo "<script>window.location.href = '../manage_users.php'</script>";
    }
}

?>