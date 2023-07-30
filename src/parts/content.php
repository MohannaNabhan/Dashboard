<?php
    if(@$_SESSION['autenticado']){
        @$session = new session();   
        @$get_worker = $session->get_worker($_SESSION['email']);
        if(is_object($get_worker)){
            if($get_worker->user_pass != $_SESSION['password']){
                @$_SESSION['autenticado'] = false;
                @$_SESSION['email'] = "";
                @$_SESSION['password'] = "";
            }
        }else{
            @$_SESSION['autenticado'] = false;
            @$_SESSION['email'] = "";
            @$_SESSION['password'] = "";
        }
    }

    @$page = strtolower($_GET['p']);
    if($page){
        $path = ROOT.'src'.DS."pages".DS.$page.".php";
        $path2 = ROOT.'src'.DS."functions".DS.$page.".php";

        if(file_exists($path) && @$_SESSION['autenticado']){
            include($path);
        }else if(file_exists($path2)){
            include($path2);
        }else if(@$_SESSION['autenticado']){
            include ROOT.'src'.DS.'pages'.DS.'home.php';
        }else{
            include ROOT.'src'.DS.'pages'.DS.'login.php';
        }
    }else if(@$_SESSION['autenticado']){
        include ROOT.'src'.DS.'pages'.DS.'home.php';
    }else{
        include ROOT.'src'.DS.'pages'.DS.'login.php';
    }





    