<?php
include "includes/pure_header_in_php.php";
$getuid = $_GET['uid'];
$deleteuser = mysqli_query($con, "UPDATE `users` SET `isDeleted` = 'Deleted' WHERE `UserId` = '$getuid'");

if ($deleteuser) {
    echo "<script>alert('User deleted successfully in the system!')</script>";
    echo "<script>window.location.href = '../manage_users.php'</script>";
} else {
    echo "<script>alert('Sorry, something went wrong in deleting user in the system!')</script>";
    echo "<script>window.location.href = '../manage_users.php'</script>";
}

?>