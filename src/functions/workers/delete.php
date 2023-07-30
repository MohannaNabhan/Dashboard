<?php
  
@$session = new Session();
@$login = $session->get_worker($_SESSION['email']);

if($login->user_rank > 0 && $_POST['worker-id'] != "" && @$_SESSION['autenticado']){
    $worker = new workers();
    $worker->delete_worker($_POST['worker-id']);

    echo '<meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Workers">';
}else{
    echo '
    <html>
        <head>
            <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Workers">
        </head>
    </html>
    ';
} 
