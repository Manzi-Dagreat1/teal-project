<?php
include "php/includes/pure_header.php";

if (isset($_POST['addnewuser'])) {
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $checkemail = mysqli_query($con, "SELECT * FROM `users` WHERE `Email` = '$email' AND `isDeleted` = 'notDeleted'");
        $rowemail = mysqli_fetch_assoc($checkemail);
        $emailnames = $rowemail['FirstName'] . ' ' . $rowemail['LastName'];
        $emailrole = $rowemail['Role'];

        $checkphoneIfExist = mysqli_query($con, "SELECT * FROM `users` WHERE `PhoneNumber` = '$phone' AND `isDeleted` != 'Deleted'");
        $rowphone = mysqli_fetch_assoc($checkphoneIfExist);

        $phonenames = $rowphone['FirstName'] . ' ' . $rowphone['LastName'];
        $phonerole = ucfirst($rowphone['Role']);

        if (mysqli_num_rows($checkemail) > 0) {
            header("Location: adduser.php?msg=$email - This email available and already taken by $emailnames($emailrole)");
        }
        if (mysqli_num_rows($checkphoneIfExist) > 0) {
            header("Location: adduser.php?msg=$phone - This phone number available and already taken by $phonenames($phonerole)");
        } elseif (empty($gender)) {
            header("Location: adduser.php?msg=No Gender selected.");
        } elseif (empty($role)) {
            header("Location: adduser.php?msg=No Role selected.");
        } else {
            $unique_id = rand(time(), 10000000); // creating unique_id for user added

            // End to count available users
            $access = 'Granted';
            $names = $fname . ' ' . $lname;

            if (empty($password)) {
                $password = 1234;
                $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            } else {
                if (strlen($password) < 4) {
                    header("Location: adduser.php?msg=Password is too short at least 4 digits");
                    $password = mysqli_real_escape_string($con, $_POST["password"]);
                    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
                }
            }

            $adduser = mysqli_query($con, "INSERT INTO `users`(`Unique_id`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Role`, `Password`, `Gender`, `Access`)
                VALUES ('$unique_id','$fname','$lname','$phone','$email','$role','$hash_pass','$gender','$access')");

            if ($adduser) {
                $searchuser = mysqli_query($con, "SELECT * FROM `users` WHERE `Unique_id` = '$unique_id'");
                $searchuser_row = mysqli_fetch_assoc($searchuser);
                $user_search_found_id = $searchuser_row['UserId'];

                $NewRecords = 'GrantedToAdd';
                $access_on_delete = 'RevokedDelete';
                $access_on_update = 'GrantedUpdate';

                $access_control = mysqli_query($con, "INSERT INTO `access_operations`(`UserId`, `NewRecords`, `Access_on_delete`, `Access_on_update`)
                VALUES ('$user_search_found_id','$NewRecords','$access_on_delete','$access_on_update')");

                header("Location: adduser.php?msg=$names added successfully in the system as ($role).");
            }
        }
    } else {
        echo "$email - This email is invalid";
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
                <div class="form-content-wrapper">
                    <div class="form-header-content">
                        <div class="left-content mb-2">
                            <h4><i class="fa-solid fa-user"></i> Add New User</h4>
                            <small class="text-muted">This user will be added in the system. Once added.</small>
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
                        <form action="adduser.php" method="post" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>First Name:</label>
                                        <input type="text" name="fname" placeholder="First Name..." class="form-control borderColor" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Last Name:</label>
                                        <input type="text" name="lname" placeholder="Last Name..." class="form-control borderColor" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Gender:</label>
                                        <select name="gender" class="form-control borderColor" required>
                                            <option value="Male" selected hidden>Male</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>PhoneNumber:</label>
                                        <input type="text" maxlength="10" name="phone" placeholder="+(250) 0798888888..." class="form-control borderColor" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Role:</label>
                                        <select name="role" class="form-control borderColor" required>
                                            <option value="user" selected hidden>User</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="field">
                                        <label>Password:<span class="text-muted">(Automatically generate default password
                                                for new user(1234) if left blank.)</span></label>
                                        <input type="password" name="password" placeholder="**********" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Email:</label>
                                <input type="email" name="email" placeholder="Email..." class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-outline-primary formSubmitBtn" name="addnewuser">ADD</button>
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