<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    
    $maSV = $_POST['maSV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $lopSH = $_POST['lopSH'];
    $soDienThoai = $_POST['soDienThoai'];
    $diaChi = $_POST['diaChi'];
    $email = $_POST['email'];
    $date = date_create($ngaySinh);
    $ngaySinh = date_format($date,"Y-m-d");
    
    $kt = update_full_SV($maSV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$gioiTinh,$lopSH);
    if(empty($kt)){
        echo "update thất bại";
    }else{
        redirect(base_url('application/views/profileSV.php'));
    }
?>