<?php


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];
  
    $session = new Session();
    $login = $session->get_worker($email);
    
    if(is_object($login) && $login->user_pass == $pass){
        $_SESSION['autenticado'] = true;
        $_SESSION['email'] = $login->user_email;
        $_SESSION['password'] = $login->user_pass;
        $session->save_info_worker($login->user_id,$_SERVER['REMOTE_ADDR']);
        echo '
            <html>
                <head>
                    <meta http-equiv="REFRESH" content="0;url='.BASE_URL.'?p=Home">
                </head>
            </html>
        ';
    }else{
        $error = '
            <div class="aler-custom">
                <h4><i class="fad fa-engine-warning"></i> Email y/o password Incorrect</h1>
            </div>
        ';
    }
     
  }


echo '
    <link rel="stylesheet" href="./css/login.css">
    <section id="pl-1" class="container">
        <div class="login-back">
            <div class="colum-a">
                <img src="./img/Logo_color.png">
                <h1>'.APP_NAME.'</h1>
                <div class="line"></div>
            </div>
            <div class="colum-b">
                <h1>DashBoard -> Login</h1>
                <form id="window-pop-form" method="POST">
                    <div class="input-box">
                        <i class="fas fa-user"></i>
                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-box" style="margin-top: 60px;">
                        <i class="fas fa-key-skeleton"></i>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <button>Login</button>
                </form>
               '.$error.'
            </div>
        </div>
    </section>
';