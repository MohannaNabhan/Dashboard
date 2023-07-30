<?php
echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.APP_NAME.' | Dashboard</title>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="shortcut icon" type="image/x-icon" href="./img/Logo_color.png">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <body>
    <div id="back-dark"></div>
    <div id="alert"></div>
    <div id="window-pop-dark"></div>
    <div id="window-pop">
        <div class="window-pop-title-back">
            <i class="window-pop-icon fad fa-window"></i>
            <h1 class="window-pop-title"></h1>
            <i class="window-pop-btn-close fal fa-times"></i>
        </div>
        <div class="window-pop-items-back">
        </div>
    </div>
    <script>const BASE_URL = "'.BASE_URL.'"</script>
';






