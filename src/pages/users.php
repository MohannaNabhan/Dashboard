<?php

@$users = new Users();
$user_unverified_ = 0;
$user_verified_ = 0;
foreach ( $users->get_all_users() as $items){
    if((int)$items->user_status > 0){
        $user_verified_ += 1;
    }else{
        $user_unverified_ += 1;
    }
}
echo '
    <link rel="stylesheet" href="./css/users.css">
    <section id="pl-1" class="container">
        <div class="search-bar-back">
            <i class="fad fa-search"><div class="line"></div></i>
            <input autocomplete="off" type="text" id="search-box" placeholder="Search User">
            <i id="delete-search" class="fad fa-times"><div class="line"></div></i>
        </div>
    </section>
    <section id="pl-2" class="container">
        <h1 class="userss-status-back" style="background-color: rgba(  212, 230, 241  , 0.6); border: solid 2px rgb(108, 143, 165,0.6);">ALL ['.count($users->get_all_users()).']</h1>
        <h1 class="userss-status-back" style="background-color: rgba( 217, 136, 128 , 0.4); border: solid 2px rgb( 217, 136, 128 ,0.6);">UNVERIFIED ['.$user_unverified_.']</h1>
        <h1 class="userss-status-back" style="background-color: rgb(88, 214, 141,0.4); border: solid 2px rgb(62, 155, 101,0.6);">VERIFIED ['.$user_verified_.']</h1>
    </section>
    <section id="pl-3" class="container">
';
foreach ( $users->get_all_users() as $items){
    $status =  "";
    if((int)$items->user_status > 0){
        $status =  "verified";
    }else{
        $status =  "unverified";
    }
    echo '
        <div class="users-item-back view-data">
            <h1 class="Window-pop-module" hidden>View User</h1>    
            <i class="users-item-icon fad fa-user-alt"></i>
               
            <h1 class="user-email" hidden>'.$items->user_email.'</h1>      
            <h1 class="user-name" hidden>'.$items->user_name.'</h1>      
            <h1 class="user-country" hidden>'.$items->user_country.'</h1>   
            <h1 class="user-state" hidden>'.$items->user_state.'</h1>      
            <h1 class="user-adress1" hidden>'.$items->user_adress1.'</h1>      
            <h1 class="user-adress2" hidden>'.$items->user_adress2.'</h1>      
            <h1 class="user-postalcode" hidden>'.$items->user_postalcode.'</h1>      
            <h1 class="user-phone" hidden>'.$items->user_phone.'</h1>      
            <h1 class="user-status" hidden>'.$items->user_status.'</h1>      
            <h1 class="user-join" hidden>'.$items->user_join.'</h1>         
            
            <h1 class="users-item-title">'.$items->user_email.'<span class="'.$status.'">'.strtoupper($status).'</span></h1>
            <h1 class="users-item-join">Joined: '.$items->user_join.'</h1>
        </div>
    ';
}// date("m-d-"."20y")

echo '
    </section>
    <script src="./js/users.js"></script>
';









