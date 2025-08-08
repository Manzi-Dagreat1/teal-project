<?php
include "php/includes/pure_header.php";

if (isset($_POST['updateuser'])) {
    $userid = mysqli_real_escape_string($con, $_POST["userid"]);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $names = $fname . ' ' . $lname;
        $updateuser = mysqli_query($con, "UPDATE `users` SET `FirstName`='$fname',`LastName`='$lname',`PhoneNumber`='$phone',`Email`='$email',`Role`='$role',
            `Gender`='$gender' WHERE `UserId` = '$userid'");

        if ($updateuser) {
            echo "<script>alert('($names) updated successfully in the system.')</script>";
            echo "<script>window.location.href = 'manage_users.php'</script>";
        } else {
            echo "<script>alert('Something went wrong in updating ($names) user in the system.')</script>";
            echo "<script>window.location.href = 'manage_users.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid email address.')</script>";
        echo "<script>window.location.href = 'manage_users.php'</script>";
    }
}

$userid = $_GET['uid'];
$getuid = mysqli_query($con, "SELECT * FROM `users` WHERE `UserId` = '$userid' AND `isDeleted` != 'Deleted'");
$getuid_row = mysqli_fetch_assoc($getuid);

if (!mysqli_num_rows($getuid) > 0) {
    header("Location: manage_users.php?msg=Sorry, Invalid request traffic!");
}

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
        <div class="asideBar">
         
           <?php include('components/navbar.php'); ?>

        </div>
        <div class="asideBarBacDrop"></div>

        <div class="contents">
            <?php include('php/includes/header.php'); ?>

            <div class="cont-container">
                <div class="form-content-wrapper">
                    <div class="form-header-content">
                        <div class="left-content mb-2">
                            <h4><i class="fa-solid fa-user"></i> Update User Details</h4>
                            <small class="text-muted">Carefully to update user details, 'Cause changes will be
                                changed.</small>
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
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <span class="text-muted pb-3">(<?= $getuid_row['FirstName'] . ' ' . $getuid_row['LastName']; ?> password will automatically be set to the default
                                        one(1234) Password). Do it, If asked as support only.</span>
                                </div>
                                <a href="php/u_u_password.php?uid=<?= $getuid_row['UserId']; ?>" class="btn btn-primary" style="width: 100%;" onclick="return confirm('Are you sure to reset user password to the default one.')">Reset User Password</a>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <span class="text-muted pb-3">Mark (<?= $getuid_row['FirstName'] . ' ' . $getuid_row['LastName']; ?>) as <?= $getuid_row['Role'] == 'admin' ? 'User' : 'Admin'; ?>. Once proceeded/done this user will be having all access without any restriction.</span>
                                </div>
                                <a href="php/u_u_user_admin.php?uid=<?= $getuid_row['UserId']; ?>" class="btn btn-success" style="width: 100%;" onclick="return confirm('Are you sure to continue this action.')">Mark (<?= $getuid_row['FirstName'] . ' ' . $getuid_row['LastName']; ?>) as <?= $getuid_row['Role'] == 'admin' ? 'User' : 'Admin'; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="cover-content">
                        <div id="cover-loader">
                            <div id="cover-spinner"></div>
                        </div>
                        <form action="updateuser.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <input type="hidden" name="userid" value="<?= $getuid_row['UserId']; ?>">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>First Name:</label>
                                        <input class="form-control" type="text" name="fname"
                                            value="<?= $getuid_row['FirstName']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Last Name:</label>
                                        <input class="form-control" type="text" name="lname"
                                            value="<?= $getuid_row['LastName']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Gender:</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="<?= $getuid_row['Gender']; ?>" hidden selected>
                                                <?= ucfirst($getuid_row['Gender']); ?>
                                            </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>PhoneNumber:</label>
                                        <input class="form-control" type="text" name="phone" maxlength="10"
                                            value="<?= $getuid_row['PhoneNumber']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Role:</label>
                                        <select name="role" class="form-control" required>
                                            <option value="<?= $getuid_row['Role']; ?>" hidden selected>
                                                <?= ucfirst($getuid_row['Role']); ?>
                                            </option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Email:</label>
                                        <input class="form-control" type="email" name="email"
                                            value="<?= $getuid_row['Email']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary formSubmitBtn"
                                name="updateuser">UPDATE</button>
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