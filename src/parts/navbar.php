<?php
if(@$_SESSION['autenticado']){


    $worker = "";
    $session = new Session();
    @$login = $session->get_worker($_SESSION['email']);
    if(@$login->user_rank > 0){
        $worker ='
        <a href="'.BASE_URL.'?p=Workers" class="btn-nav" style="margin-top: 300px;">
            <i style="left: 17px;" class="fad fa-user-hard-hat"></i>
            <h1>Workers</h1>
            <div class="decoration"></div>
            <div class="btn-nav-extend">
                <h2>Workers</h2>
            </div>
        </a>';
    }



    echo '
        <div id="extranav"><i class="fad fa-angle-left"></i></div>
        <nav id="navbar-back">
            <div id="nav-status">
                <h1>'.APP_NAME.'</h1>
                <i class="fad fa-angle-right"></i>
            </div>
            <a href="'.BASE_URL.'?p=Home" class="btn-nav">
                <i class="fad fa-home-alt"></i>
                <h1>Home</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Home</h2>
                </div>
            </a>
            <a href="'.BASE_URL.'?p=Articles" class="btn-nav" style="margin-top: 50px;">
                <i style="left: 18px;" class="fad fa-shopping-bag"></i>
                <h1>Articles</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Articles</h2>
                </div>
            </a>
            <a href="'.BASE_URL.'?p=Payments" class="btn-nav" style="margin-top: 100px;">
                <i style="left: 20px;" class="fad fa-receipt"></i>
                <h1>Payments</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Payments</h2>
                </div>
            </a>
            <a href="'.BASE_URL.'?p=Users" class="btn-nav" style="margin-top: 150px;">
                <i style="left: 18px;" class="fad fa-user-astronaut"></i>
                <h1>Users</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Users</h2>
                </div>
            </a>
            <a href="'.BASE_URL.'?p=Stadistic" class="btn-nav" style="margin-top: 200px;">
                <i style="left: 20px;"  class="fad fa-map-marker-alt"></i>
                <h1>Stadistic</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Stadistic</h2>
                </div>
            </a>
            <a href="'.BASE_URL.'?p=Email" class="btn-nav" style="margin-top: 250px; !important">
                <i style="left: 17px;"  class="fad fa-at"></i>
                <h1>Email</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Email</h2>
                </div>
            </a>
            '.$worker.'
            
            <a href="'.BASE_URL.'?p=session/logout" class="btn-nav" style="top: calc(100% - 45px);">
                <i style="left: 18px;" class="fad fa-power-off"></i>
                <h1>Logout</h1>
                <div class="decoration"></div>
                <div class="btn-nav-extend">
                    <h2>Logout</h2>
                </div>
            </a>
        </nav>
    ';
}