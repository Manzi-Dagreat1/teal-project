<?php
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
?>
<div class="top-header-contents">
    <div class="left-top-header-contents sub-header-contentes n-flex-content">
        <i class="fa-solid fa-bars-staggered toggleAsidebar"></i>
        <span class="closeAside">
            <i class="fa-solid fa-bars"></i>
        </span>
    </div>
    <a href="index.php" class="companyTitle">
       IOT-BASED POULTRY COOP
    </a>
    <div class="right-top-header-contents sub-header-contentes">
        <?php
        $profile = 'php/userimages/' . $user['Profile'] . '';
        $default_image_url = '<img src="php/defaultavatar/avatar.png" alt="avatar">';


        if ($user['Profile'] == '') {
            echo $default_image_url;
        } elseif (file_exists($profile)) {
            echo '<a href="' . $profile . '" target="_blank"><img src="' . $profile . '" alt="profile"></a>';
        } else {
            echo $default_image_url;
        }
        ?>
        <p>
            <a href="settings.php" class="text-dark" style="text-decoration: none;">
                <span class="userTitle text-primary"><?= ucfirst($role); ?>, </span> <?= $fname; ?>
            </a>
        </p>
    </div>
</div>
<div id="loader" style="display: none;">
    <div class="spinner"></div>
    <p style="display: none;" id="notificationTextLoader"></p>
</div>

<div id="notificationBox" class="notification-box">
    <div class="notification-icon" id="notificationIcon">
        <i class="fa-solid fa-check-circle"></i>
    </div>
    <p id="notificationText"></p>
</div>
<div id="notificatioBackDrop"></div>