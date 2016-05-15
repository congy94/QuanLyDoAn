<?php
    include_once('libs/session.php');
    include_once('libs/helper.php');
    session_delete('maUser');
    session_delete('loaiTaiKhoan');
    redirect(base_url("index.php"));
    
?>