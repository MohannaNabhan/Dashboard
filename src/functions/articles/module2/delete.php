<?php
  
  if($_POST['category-id'] != ""  && @$_SESSION['autenticado']){
    $articles = new Articles();

    $articles->delete_category($_POST['category-id']);

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
