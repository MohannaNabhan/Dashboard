<?php



$session = new Session();
$login = $session->get_worker($_SESSION['email']);
$workers = new Workers();
echo '
    <script>const rank_user = '.$login->user_rank.';</script>
    <link rel="stylesheet" href="./css/workers.css">
    <i id="add-new-worker" class="fad fa-plus view-data"><h1 class="Window-pop-module" hidden>Add New Worker</h1></i>
    <section id="pl-1" class="container">
';

foreach ( $workers->get_all_workers() as $items){
    $rank = "";
    if($items->user_rank == 0){
        $rank = "WORKER";
    }else if($items->user_rank == 1){
        $rank = "ADMIN";
    }else if($items->user_rank == 2){
        $rank = "OPERATOR";
    }else{
        $rank = "UNDEFINED";
    }
    if($login->user_rank >= 1 && $items->user_rank < 1){
        echo '
            <div class="worker-info-back view-data">
                <h1 class="worker-id" hidden>'.$items->user_id.'</h1>   
                <h1 class="worker-email" hidden>'.$items->user_email.'</h1>    
                <h1 class="worker-pass" hidden>'.$items->user_pass.'</h1>     
                <h1 class="worker-rank" hidden>'.$items->user_rank.'</h1>   
                <h1 class="Window-pop-module" hidden>View Worker</h1>          
                <i class="fad fa-user-tie"></i>
                <h1>'.$items->user_email.'<span>'.$rank.'</span></h1>
            </div>
        ';
    }else if($login->user_rank >= 2 && $items->user_rank <= 1){
        echo '
            <div class="worker-info-back view-data">
                <h1 class="worker-id" hidden>'.$items->user_id.'</h1>   
                <h1 class="worker-email" hidden>'.$items->user_email.'</h1>    
                <h1 class="worker-pass" hidden>'.$items->user_pass.'</h1>     
                <h1 class="worker-rank" hidden>'.$items->user_rank.'</h1>   
                <h1 class="Window-pop-module" hidden>View Worker</h1>          
                <i class="fad fa-user-tie"></i>
                <h1>'.$items->user_email.'<span>'.$rank.'</span></h1>
            </div>
        ';
    }
}
echo '
    </section>
';
