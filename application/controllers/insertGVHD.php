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
    $maCapBac = $_POST['maCapBac'];
    $date = date_create($ngaySinh);
    $ngaySinh = date_format($date,"Y-m-d");
    if($maGV==""||$hoTen==""){
        echo "Chưa nhập mã giảng viên hoặc tên giảng viên";
    }else{
        $kq=insert_GV($maGV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$maCapBac,$gioiTinh);    
        if(empty($kq)){
            echo "Lỗi insert có thể do trùng mã Giảng viên";
        }else{
            redirect(base_url('application/views/listGVHD.php'));
        }
    }
?>