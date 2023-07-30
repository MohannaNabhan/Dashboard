<?php
  
  if($_POST['article-id'] != ""   && @$_SESSION['autenticado']){
    $articles = new Articles();

    $e = $articles->get_article_by_id($_POST['article-id']);
    file_exists($e->article_img) ? unlink($e->article_img) : "";
    $articles->delete_article($_POST['article-id']);

    echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=1">';
}else{
    echo '
    <html>
        <head>
            <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Articles&v=1">
        </head>
    </html>
    ';
} 
