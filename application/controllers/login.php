<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username)||empty($password)){
        redirect(base_url("index.php"));
    }else{
        $sv = check_user_login($username,$password);
        if($sv==0){
            redirect(base_url("index.php"));
        }
        else{
            session_set('maUser',$username);
            session_set('loaiTaiKhoan',$sv);
            redirect(base_url('application/views/home.php'));
        }
        
    }
?>