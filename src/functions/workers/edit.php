<?php



@$session = new Session();
@$login = $session->get_worker($_SESSION['email']);
@$rank = $_POST['select-rank'] == "" ? 0 : $_POST['select-rank'];
 

if($login->user_rank >= 1 && $_POST['worker-id'] != "" && $rank != "" && $_POST['worker-name'] != "" && $_POST['worker-pass'] != ""  && @$_SESSION['autenticado']){
    $workers = new workers();
    if($login->user_rank > 0 && $rank < 1){
        $workers->edit_worker($_POST['worker-id'],$rank,$_POST['worker-name'],$_POST['worker-pass']);
    }else if($login->user_rank > 1 && $rank < 3){
        $workers->edit_worker($_POST['worker-id'],$rank,$_POST['worker-name'],$_POST['worker-pass']);
    }
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