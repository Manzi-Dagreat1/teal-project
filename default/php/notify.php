<?php
session_start();
echo "
<script>
    setTimeout(() => {
        window.location.href = '../login.php'
    }, 15000);
</script>
";
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon-32x32.png">
    <title>User Validation | Redirect...</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .re-container {
        margin-top: 70px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .re-container .c-text {
        width: 100%;
        max-width: 400px;
        background-color: transparent;
        border-radius: 10px;
        padding: 20px;
    }

    .re-container .c-header {
        color: #444;
        font-weight: 700;
        padding-block-end: 15px;
    }

    .re-container .c-txt {
        color: #444;
        padding-block-end: 20px;
    }

    .re-container a {
        border-top: 1px solid #ccc;
        padding: 10px 10px;
        width: 100%;
        background-color: transparent;
        font-weight: 700;
        outline: none;
        padding-top: 20px;
        font-size: 14px;
        text-decoration: none;
        color: #0000ff;
        border: none;
        cursor: pointer;
        transition: .3s ease;
    }
</style>

<body>
    <div class="re-container">
        <div class="c-text">
            <h2 class="c-header">User Notification</h2>
            <p class="c-txt">No longer have access to the system. <br> For more information, Reach us. </p>
            <p><b>+(250) 792 054 846</b></p><br>
            <a href="tel:0792054846">OK</a>
        </div>
    </div>

    <!-- Loader -->
    <div id="loader">
        <div class="spinner"></div>
    </div>

    <script>
        // Show loader for at least 3 seconds
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loader').style.display = 'none';
                document.getElementById('main-container').style.display = 'block';
            }, 500);
        });
    </script>
</body>

</html>