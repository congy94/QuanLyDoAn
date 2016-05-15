<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    
    $maGV = $_POST['maGV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $soDienThoai = $_POST['soDienThoai'];
    $diaChi = $_POST['diaChi'];
    $email = $_POST['email'];
    $date = date_create($ngaySinh);
    $ngaySinh = date_format($date,"Y-m-d");
    
    $kt = update_GV($maGV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$gioiTinh);
    if(empty($kt)){
        echo "Update thất cmn bại";
    }else{
        redirect(base_url('application/views/profileGV.php'));
    }
    
?>