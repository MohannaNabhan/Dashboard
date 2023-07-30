<?php
    

    if($_POST['promo-name'] != "" && $_POST['promo-discount'] !=""  && @$_SESSION['autenticado']){
        $articles = new Articles();

        $limit = "";
        if($_POST['promo-limit'] <= 0){
            $limit = "";
        }else{
            $limit = $_POST['promo-limit'];
        }

        $articles->add_new_promo_code(strtolower($_POST['promo-name']),$_POST['promo-discount'], $limit);

        echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=3">';
    }else{
        echo '
        <html>
            <head>
                <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=3">
            </head>
        </html>
        ';
    } 