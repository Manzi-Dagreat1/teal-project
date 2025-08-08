<?php
include "php/includes/pure_header.php";

$selectusers = mysqli_query($con, "SELECT * FROM users
WHERE `isDeleted` = 'notDeleted' AND UserId != 17
ORDER BY Role ASC
");

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
    <link rel="stylesheet" href="extensions/Jquery/jquery.dataTables.min.css">
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
                <div class="table-container">
                    <div class="table-header-contents">
                        <!-- <div class="search-record-container">
                            <div class="uuu">
                                <input type="search" name="search" id="searchInput"
                                    placeholder="Search..." class="form-control">
                                <i class="fa-solid fa-search faSearch"></i>
                            </div>
                        </div> -->
                        <h4>Manage Users</h4>
                        <div class="right-table-content">
                            <a href="adduser.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> New User</a>
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

                    <div class="pure-table">
                        <table class="table table-hover pureTable" id="myTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>#</th>
                                    <th class="table-plus">Names/Profile</th>
                                    <th>PhoneNumber</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Gender</th>
                                    <th>Access</th>
                                    <th>DateCreated</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $c = 1;
                                // $selectusers = mysqli_query($con, "SELECT * FROM users WHERE `isDeleted` = 'notDeleted' AND `Role` != 'admin'");
                                if (mysqli_num_rows($selectusers) > 0) {
                                    while ($row = mysqli_fetch_assoc($selectusers)) {
                                        $usernames = $row['FirstName'] . ' ' . $row['LastName'];
                                        $u_id = $row['UserId'];

                                        if ($row['Role'] == 'admin') {
                                            $urlprofile = 'php/userimages/' . $row['Profile'] . '';
                                        } else {
                                            $urlprofile = '../user/php/userimages/' . $row['Profile'] . '';
                                        }

                                        $sql = mysqli_query($con, "SELECT * FROM `users` WHERE `UserId` = '$u_id'");
                                        $sql_row = mysqli_fetch_assoc($sql);
                                        $role_u_admin = strtolower($sql_row['Role']);
                                ?>
                                        <tr style="<?= ($role_u_admin == 'admin') ? 'border-left: 3px solid #0000ff;' : ''; ?>" title="<?= (mysqli_num_rows($sql) > 0) ? 'Admin' : 'User'; ?>">
                                            <td>
                                                <?= $c++; ?>
                                            </td>
                                            <td>
                                                <div class="name-avatar d-flex align-items-center">
                                                    <div class="avatar mr-2 flex-shrink-0">
                                                        <?php
                                                        if ($row['Profile'] == 'NoProfile') {
                                                        ?>
                                                            <img src="php/defaultavatar/avatar.png" class="border-radius-100 shadow"
                                                                width="40" height="40" alt="" />
                                                        <?php
                                                        } elseif (!file_exists($urlprofile)) {
                                                        ?>
                                                            <img src="php/defaultavatar/avatar.png" class="border-radius-100 shadow"
                                                                width="40" height="40" alt="" />
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?= $urlprofile; ?>" target="_blank">
                                                                <img src="<?= $urlprofile; ?>" class="shadow" width="40" height="40"
                                                                    alt="" />
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="txt">
                                                        <div class="weight-500">
                                                            <?= $usernames; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $row['PhoneNumber']; ?>
                                            </td>
                                            <td>
                                                <?= $row['Email']; ?>
                                            </td>
                                            <td>
                                                <?= ucfirst($row['Role']); ?>
                                            </td>
                                            <td>
                                                <?= ucfirst($row['Gender']); ?>
                                            </td>
                                            <?php
                                            if ($row['Access'] == 'Granted') {
                                            ?>
                                                <td>
                                                    <span class="statusBtn statusBtnBlue" data-color="#265ed7">Granted</span>
                                                </td>
                                            <?php
                                            } elseif ($row['Access'] == 'Revoked') {
                                            ?>
                                                <td>
                                                    <span class="statusBtn statusBtnRed" data-color="#ff0000">Revoked</span>
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td>
                                                    <a href="#unknown" onclick="alert('Unknown Access.')" data-color="#ff0000"><i
                                                            class="fa-solid fa-circle" aria-hidden="true"></i></a>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <td>
                                                <?= $row['DateCreated']; ?>
                                            </td>
                                            <?php
                                            if ($row['Role'] == 'admin') {
                                            ?>
                                                <td class="text-center pr-4">-</td>
                                            <?php
                                            } else {
                                            ?>
                                                <td>
                                                    <div class="table-actions" style="display: flex;">
                                                        <?php
                                                        if ($row['Access'] == 'Granted') {
                                                        ?>
                                                            <a href="php/access.php?access=<?= $row['UserId']; ?>"
                                                                onclick="return confirm('Are you sure to revoke access on this user.')"
                                                                class="btn btn-info btn-sm mr-1"><i class="fa-solid fa-times"
                                                                    title="Revoke Access"></i></a>
                                                        <?php
                                                        } elseif ($row['Access'] == 'Revoked') {
                                                        ?>
                                                            <a onclick="return confirm('You are going to grant access on this user.')"
                                                                href="php/access.php?access=<?= $row['UserId']; ?>"
                                                                class="btn btn-success btn-sm mr-1"><i class="fa-solid fa-check"
                                                                    title="Grant Access" aria-hidden="true"></i></a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="#unknown" onclick="alert('Unknown Access.')"
                                                                class="btn btn-info btn-sm"><i class="icon-copy fa fa-circle"></i></a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a href="updateuser.php?uid=<?= $row['UserId']; ?>"
                                                            class="btn btn-primary btn-sm mr-1"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="return confirm('Are you sure to delete this user in the system.')"
                                                            href="php/deleteuser.php?uid=<?= $row['UserId']; ?>"
                                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    $msg[] = "No users available";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div id="outputMessage" class="text-center"></div>
                        <?php
                        if (isset($msg)) {
                            foreach ($msg as $printmsg) {
                        ?>
                                <p class="text-center">
                                    <?php echo $printmsg; ?>
                                </p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <?php include('php/includes/Rlinks.php'); ?>

                <?php include('php/includes/footer.php'); ?>
            </div>

        </div>
    </div>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/searchTable.js"></script>
    <!-- jQuery -->
    <script src="extensions/Jquery/jquery.js"></script>
    <!-- DataTables JavaScript -->
    <script src="extensions/Jquery/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true, // Enable pagination
                "searching": true, // Enable search/filter box
                "ordering": true, // Enable sorting
                "lengthMenu": [15, 25, 50, 100], // Options for rows per page dropdown
                "info": true // Show table information (e.g., "Showing 1 to 10 of 50 entries")
            });
        });
    </script>
</body>

</html>