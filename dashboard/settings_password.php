<?php
include "php/includes/pure_header.php";

if (isset($_POST['changepassword'])) {
    $uid = mysqli_real_escape_string($con, $_POST['uid']);
    $currentpass = mysqli_real_escape_string($con, $_POST['currentpass']);
    $pass1 = $user['Password'];
    $newpass = mysqli_real_escape_string($con, $_POST['newpass']);
    $confirmnewpass = mysqli_real_escape_string($con, $_POST['confirmnewpass']);


    // Concatenate data into a single string
    $ch = time();
    // Generate a long hash (SHA-256)
    // $longHash = hash('sha256', $dataToHash);
    $ch_confirm = base64_encode(hash('sha256', $ch, true));

    // Function to detect weak passwords
    function isWeakPassword($password)
    {
        // Check if password is too short
        if (strlen($password) < 4) {
            return "Password is too short. Minimum length is 4 characters.";
        }

        // Check if password is numeric and sequential
        if (is_numeric($password)) {
            $isSequential = true;
            for ($i = 0; $i < strlen($password) - 1; $i++) {
                if ((int)$password[$i + 1] !== (int)$password[$i] + 1) {
                    $isSequential = false;
                    break;
                }
            }
            if ($isSequential) {
                return "Password is weak: Numeric sequence detected.";
            }
        }

        // Check if password is alphabetic and sequential
        if (ctype_alpha($password)) {
            $isSequential = true;
            $password = strtolower($password); // Normalize to lowercase
            for ($i = 0; $i < strlen($password) - 1; $i++) {
                if (ord($password[$i + 1]) !== ord($password[$i]) + 1) {
                    $isSequential = false;
                    break;
                }
            }
            if ($isSequential) {
                return "Password is weak: Alphabetic sequence detected.";
            }
        }

        // Check if password is letters only
        if (ctype_alpha($password)) {
            return "Password is weak: Contains letters only.";
        }

        // If no weaknesses are detected
        return false;
    }

    // Check current password
    if (password_verify($currentpass, $pass1)) {
        // Check if new passwords match
        if ($newpass != $confirmnewpass) {
            header("Location: settings_password.php?update_password=$ch_confirm&msg=Password doesn't match.&user_confirm=1");
        } else {
            // Check for weak passwords
            $weakPasswordMessage = isWeakPassword($newpass);
            if ($weakPasswordMessage) {
                header("Location: settings_password.php?update_password=$ch_confirm&msg=$weakPasswordMessage&user_confirm=1");
            } else {
                // Proceed with password change
                $hpass = password_hash($newpass, PASSWORD_DEFAULT);
                $update = mysqli_query($con, "UPDATE `users` SET `Password` = '$hpass' WHERE `UserId` = '$uid'");

                if ($update) {
                    $user_names = $user['FirstName'] . ' ' . $user['LastName'];
                    $me_action = "$user_names changed his/her password to the new one.";
                    $export_to_metrics = mysqli_query($con, "INSERT INTO `metrics`(`UserId`,`Me_Action`) VALUES ('$user_uniqueid','$me_action')");
                    // header("Location: settings_password.php?update_password=$ch_confirm&msg=Password Changed Successfully.&gpp=true&user_confirm=1");

                    $update_user_password_status = mysqli_query($con, "UPDATE `users` SET `PasswordDetection` = '1'
                    WHERE `UserId` = '$uid'");

                    echo "<script>alert('Password Changed Successfully! Login again to confirm!')</script>";
                    echo "<script>window.location.href = 'php/extras/logout.php'</script>";
                } else {
                    header("Location: settings_password.php?update_password=$ch_confirm&msg=Something went wrong in changing password.&user_confirm=1");
                }
            }
        }
    } else {
        header("Location: settings_password.php?update_password=$ch_confirm&msg=Sorry, Incorrect Current Password. Try Again.&user_confirm=1");
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
                        <a href="settings.php"><i class="fa-solid fa-user"></i> Profile</a>
                        <a href="#already" class="active"><i class="fa-solid fa-lock"></i> Password</a>
                    </div>
                </div>
                <?php
                if (isset($_GET['msg'])) {
                ?>
                    <div class="alert alert-<?= isset($_GET['gpp']) ? 'primary' : 'danger'; ?> alert-dismissible fade show mt-3" role="alert"
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

                <div class="form-content-wrapper passwordForm">
                    <div class="normalHeader">
                        <h5>Change Password</h5>
                    </div>
                    <div class="cover-content">
                        <div id="cover-loader">
                            <div id="cover-spinner"></div>
                        </div>
                        <form action="settings_password.php" method="post" autocomplete="off">
                            <input type="hidden" name="uid" value="<?= $user['UserId']; ?>">
                            <div class="field">
                                <label>Current Password:</label>
                                <input type="password" name="currentpass" placeholder="Current password..."
                                    class="form-control" required>
                            </div>
                            <div class="field">
                                <label>New Password:</label>
                                <input type="password" name="newpass" placeholder="New password..." class="form-control"
                                    required>
                            </div>
                            <div class="field">
                                <label>Confirm New Password:</label>
                                <input type="password" name="confirmnewpass" placeholder="Confirm new password..."
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary formSubmitBtn"
                                name="changepassword">Change</button>
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