<div class="footer-contents">
    <p>Copyright &copy; 2025 - <?= date('Y') ?>IOT-BASED POULTRY COOP - All rights reserved.</p>
</div>

<?php
if (isset($_SESSION['wepassak'])) {
    $password_value = $_SESSION['wepassak'];
    if ($password_value == '0' && !isset($_GET['update_password'])) {
        // Concatenate data into a single string
        $ch = time();

        // Generate a long hash (SHA-256)
        // $longHash = hash('sha256', $dataToHash);
        $ch_confirm = base64_encode(hash('sha256', $ch, true));
?>
        <div class="modal-warning">
            <img src="assets/images/danger_sign.jpg" alt="Danger sign">
            <p>
                <strong>Security Alert: Weak Password<br>Detected!</strong>
            </p>
            <p>Please change your password immediately to protect your account.</p>
            <a href="settings_password.php?update_password=<?= $ch_confirm; ?>&user_confirm=1" class="btn btn-outline-danger">Update Now</a>

        </div>
        <div class="backDropM"></div>
<?php
    }
}

?>