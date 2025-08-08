<?php
$url = $_SERVER['REQUEST_URI'];
?>
<div class="asideBar">
    <header class="asideHeader">
        <img src="assets/images/site-logo.png" alt="logo">
        <i class="fa-solid fa-times closeAsidebarBtn"></i>
    </header>

    <div class="sideLinks">
        <a href="./" class="<?= strpos($url, "index.php") ? "active" : "" ?>">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>
        <a href="all_data.php" class="<?= strpos($url, "all_data.php") ? "active" : "" ?>">
            <i class="fa-solid fa-table"></i>
            <span>All Data Export</span>
        </a>

        <a href="manage_users.php" class="<?= strpos($url, "manage_users.php") ? "active" : "" ?>">
            <i class="fa-solid fa-users"></i>
            <span>Users</span>
        </a>

        <a href="settings.php" class="<?= strpos($url, "settings.php") ? "active" : "" ?>">
            <i class="fa-solid fa-cogs"></i>
            <span>Settings</span>
        </a>
        <a href="php/extras/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</div>