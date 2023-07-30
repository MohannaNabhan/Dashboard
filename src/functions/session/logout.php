<?php

    $_SESSION['autenticado'] = false;
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";    
    echo '
        <html>
            <head>
                <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'">
            </head>
        </html>
    ';