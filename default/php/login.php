<?php
session_start();
include "config.php";
$current_time = date('Y-m-d H:i:s');

if (isset($_POST["uname_phone"], $_POST["password"])) {
    $uname_phone = mysqli_real_escape_string($con, $_POST["uname_phone"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    if (empty($uname_phone) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All inputs are required']);
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM `users` WHERE isDeleted = 'notDeleted' AND (`PhoneNumber` = ? OR `Email` = ?)");
    mysqli_stmt_bind_param($stmt, "ss", $uname_phone, $uname_phone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if account is locked
        if (!empty($row['lock_until']) && $current_time < $row['lock_until']) {
            $timeRemaining = strtotime($row['lock_until']) - time();
            echo json_encode(['status' => 'locked', 'message' => 'Your account is locked.', 'time_remaining' => $timeRemaining]);
            exit;
        }

        if (password_verify($password, $row['Password'])) {
            // Successful login: reset failed attempts and lock_until
            $reset_stmt = mysqli_prepare($con, "UPDATE users SET `failed_attempts` = 0, `lock_until` = NULL WHERE UserId = ?");
            mysqli_stmt_bind_param($reset_stmt, "i", $row['UserId']);
            mysqli_stmt_execute($reset_stmt);

            if (isset($_POST['rememberme'])) {
                // Secure "Remember Me" should use tokens, not passwords.
                // For now, we only remember the username/email for convenience.
                setcookie('PhoneNumber/Email', $uname_phone, time() + (86400 * 30), "/"); // 30 days
            } else {
                // Expire cookie if "Remember Me" is not checked
                setcookie('PhoneNumber/Email', '', time() - 3600, "/");
            }

            $_SESSION['log_uni_id'] = $row['Unique_id'];
            $u_logged_in_id = $row['UserId'];

            function isWeakPassword($password)
            {
                // Check if the password is numeric and sequential (e.g., 1234, 5678)
                if (is_numeric($password)) {
                    $isSequential = true;
                    for ($i = 0; $i < strlen($password) - 1; $i++) {
                        if ((int)$password[$i + 1] !== (int)$password[$i] + 1) {
                            $isSequential = false;
                            break;
                        }
                    }
                    if ($isSequential) {
                        return true;
                    }
                }

                // Check if the password is alphabetic and sequential (e.g., abcd, xyz)
                if (ctype_alpha($password)) {
                    $isSequential = true;
                    $password = strtolower($password);
                    for ($i = 0; $i < strlen($password) - 1; $i++) {
                        if (ord($password[$i + 1]) !== ord($password[$i]) + 1) {
                            $isSequential = false;
                            break;
                        }
                    }
                    if ($isSequential) {
                        return true;
                    }
                }

                // Check if password is too short
                if (strlen($password) <= 4) {
                    return true;
                }

                return false;
            }

            if (isWeakPassword($password)) {
                $_SESSION['wepassak'] = '0';
                $update_stmt = mysqli_prepare($con, "UPDATE users SET PasswordDetection = '0' WHERE `UserId` = ?");
                mysqli_stmt_bind_param($update_stmt, "i", $u_logged_in_id);
                mysqli_stmt_execute($update_stmt);
            } else {
                $_SESSION['wepassak'] = '1';
            }
            echo json_encode(["status" => "success"]);
        } else {
            // Increment failed attempts
            $failed_attempts = $row['failed_attempts'] + 1;
            $user_id = $row['UserId'];

            if ($failed_attempts >= 3) {
                // Lock account for 15 minutes
                $lock_until = date('Y-m-d H:i:s', strtotime('+15 minutes'));
                $lock_stmt = mysqli_prepare($con, "UPDATE users SET failed_attempts = ?, lock_until = ? WHERE UserId = ?");
                mysqli_stmt_bind_param($lock_stmt, "isi", $failed_attempts, $lock_until, $user_id);
                mysqli_stmt_execute($lock_stmt);

                echo json_encode(['status' => 'error', 'message' => 'Your account is locked due to too many failed login attempts. Try again after 15 minutes.']);
            } else {
                // Update failed attempts
                $update_stmt = mysqli_prepare($con, "UPDATE users SET failed_attempts = ? WHERE UserId = ?");
                mysqli_stmt_bind_param($update_stmt, "ii", $failed_attempts, $user_id);
                mysqli_stmt_execute($update_stmt);
                $remaining_attempts = 3 - $failed_attempts;
                echo json_encode(['status' => 'error', 'message' => "Wrong password. You have $remaining_attempts login attempt(s) left."]);
            }
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect Phone number/Email']);
        exit;
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'All inputs are required']);
    exit;
}
