<?php
  
  if($_POST['promo-id'] != ""   && @$_SESSION['autenticado']){
    $articles = new Articles();

    $articles->delete_promo_code($_POST['promo-id']);

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
