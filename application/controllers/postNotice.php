<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    $maGV = session_get('maUser');
    $tieuDe = $_POST['tieuDe'];
    $noiDung = $_POST['noiDung'];
    $now = getdate();
    $date = $now['year']."-".$now['mon']."-".$now['mday'];
    $kq = insert_Notice($maGV,$date,$tieuDe,$noiDung);
    if(empty($kq)){
        echo "Đăng thất bại";
    }else{
        redirect(base_url());
    }
?>