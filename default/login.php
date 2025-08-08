<?php
session_start();
$_SESSION['user_uni_id'] = 198442649;
echo $_SESSION['user_uni_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#007bff">
 
    <link rel="manifest" href="../manifest.json">
    <link rel="stylesheet" href="extensions/fontawesome/css/all.css">
    <link rel="icon" href="assets/images/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/login.css?v=1.3">
 
    <title>IOT-BASED POULTRY COOP ENVIRONMENTAL MONITORING SYSTEM FOR RURAL RWANDA</title>
</head>

<body id="imgBody">

    <div class="warning-container"></div>

    <div class="inner-container">
        <!-- <div class="header-contents">
            <div class="leftSide">
                <p> Log In to the System </p>
            </div>
            <div class="rightSide">
                <div class="coverIcon" onclick="window.location.reload()" title="Reload current page">
                    <i class="fa-solid fa-refresh"></i>
                </div>
            </div>
        </div> -->


        <form action="#" class="form">
            <div class="form-header">
                <img src="./assets/images/site-logo.png" width="150" alt="">
                <!-- <i class="fa-solid fa-gas-pump representIcon"></i> -->
                <p class="loginText">IOT-BASED POULTRY COOP ENVIRONMENTAL MONITORING SYSTEM</p>
            </div>


            <div class="concatenateContainers">
                <div class="sub-error"></div>
                <div class="error-msg"></div>
                <div class="inner-cont">
                    <div class="text-inputs">
                        <div class="field">
                            <input type="text" name="uname_phone" id="phoneoremail" class="inp" placeholder="Phone/Email" value="<?php if (isset($_COOKIE['PhoneNumber/Email'])) {
                                                                                                                                        echo $_COOKIE['PhoneNumber/Email'];
                                                                                                                                    } ?>">
                            <i class="fa-regular fa-user inputIcon"></i>
                        </div>
                        <div class="field">
                            <input type="password" name="password" id="password" class="inp" placeholder="Password" value="<?php if (isset($_COOKIE['Password'])) {
                                                                                                                                echo "********";
                                                                                                                            } ?>">
                            <i class="fa-solid fa-key inputIcon"></i>
                            <i class="fa-solid fa-eye viewPassword"></i>
                        </div>
                        <div>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" <?php if (isset($_COOKIE['PhoneNumber/Email'])) {
                                                                                ?> checked <?php
                                                                                        } ?> name="rememberme"> <span style="color: #444;">Remember me</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="loginBtn">LOGIN</button>
                    <button type="button" >Forgot
                        Password</button>
                </div>
            </div>


        </form>
    </div>

    <script src="javascript/login.js"></script>
    <script src="javascript/password-hide-show.js"></script>
    <script>
        function forgotPassword() {
            alert('For more help, You can see support on this number:\n +(250) 792 054 846')
        }
    </script>
</body>

</html>