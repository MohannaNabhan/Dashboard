<?php

if($_POST['category-id'] != "" && $_POST['category-name'] != ""  && @$_SESSION['autenticado']){
    $articles = new Articles();

    $articles->edit_category($_POST['category-id'],strtolower($_POST['category-name']));

    echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=2">';
}else{
    echo '
    <html>
        <head>
            <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=2">
        </head>
    </html>
    ';
} 
