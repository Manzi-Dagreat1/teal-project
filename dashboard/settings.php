<?php
include "php/includes/pure_header.php";

if (isset($_POST['changeprofile'])) {
    $uid = mysqli_real_escape_string($con, $_POST['uid']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phone']);


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $update = mysqli_query($con, "UPDATE `users` SET `FirstName`='$fname',`LastName`='$lname',`PhoneNumber`='$phonenumber',`Email`='$email',
		`Gender`='$gender' WHERE `UserId`='$uid'");
        if ($update) {
            $user_names = $user['FirstName'] . ' ' . $user['LastName'];
            $me_action = "$user_names - $role changed his/her profile.";
            $export_to_metrics = mysqli_query($con, "INSERT INTO `metrics`(`UserId`,`Me_Action`) VALUES ('$user_uniqueid','$me_action')");

            header('Location: settings.php?msg=Your profile has been Changed successfully!');
        } else {
            header('Location: settings.php?msg=Sorry! Something went wrong in changing your profile.' . mysqli_error($con));
        }

        if (isset($_FILES['image'])) {
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $img_explode = explode('.', $file_name);
            $img_extension = strtolower(end($img_explode));

            $extensions = ['png', 'jpeg', 'jpg', 'gif'];

            if (in_array($img_extension, $extensions) === true) {
                $time = time();
                $new_file_name = $time . $file_name;

                if (move_uploaded_file($tmp_name, 'php/userimages/' . $new_file_name)) {
                    $update_user_info = mysqli_query($con, "UPDATE `users` SET `FirstName`='$fname',`LastName`='$lname',`PhoneNumber`='$phonenumber',`Email`='$email',
					`Gender`='$gender',`Profile`='$new_file_name' WHERE `UserId`='$uid'");
                } else {
                    header('Location: settings.php?msg=Something Went wrong!');
                }
            }
        }
    } else {
        header('Location: settings.php?msg=' . $email . ' - This email is invalid!');
    }
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
    <?php include('components/navbar.php'); ?>

        <div class="asideBarBacDrop"></div>

        <div class="contents">
            <?php include('php/includes/header.php'); ?>

            <div class="cont-container">
                <header class="header-content">
                    Manage Profile / <span>Password</span>
                </header>

                <div class="pro-settings">
                    <div class="pro-header-links">
                        <a href="#already" class="active"><i class="fa-solid fa-user"></i> Profile</a>
                        <a href="settings_password.php"><i class="fa-solid fa-lock"></i> Password</a>
                    </div>
                </div>

                <div class="form-content-wrapper">
                    <div class="form-header-content">
                        <div class="left-content mb-2">
                            <h4><i class="fa-solid fa-user"></i> Profile Details</h4>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['msg'])) {
                    ?>
                        <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert"
                            onclick="this.style.display = 'none'">
                            <strong>Profile Changing!</strong>
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
                        <form action="settings.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <input type="hidden" name="uid" value="<?= $user['UserId']; ?>">
                                    <div class="field">
                                        <label>First Name:</label>
                                        <input class="form-control" type="text" name="fname"
                                            value="<?= $user['FirstName']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Last Name:</label>
                                        <input class="form-control" type="text" name="lname"
                                            value="<?= $user['LastName']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Gender:</label>
                                        <select name="gender" class="form-control color-picker" id="gender">
                                            <option value="<?= $user['Gender']; ?>" hidden>
                                                <?= ucfirst($user['Gender']); ?>
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>PhoneNumber:</label>
                                        <input class="form-control" type="text" name="phone" maxlength="10"
                                            value="<?= $user['PhoneNumber']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <input class="form-control" type="email" name="email" value="<?= $user['Email']; ?>"
                                    required>
                            </div>
                            <div class="field">
                                <label>Profile(<span class="text-muted">If wish to change</span>):</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-primary formSubmitBtn"
                                name="changeprofile">Save</button>
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