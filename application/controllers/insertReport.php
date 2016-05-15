<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    $maDoAn = $_POST['maDoAn'];
    $dotTienDo = $_POST['dotTienDo'];
    $tenDeTai = $_POST['tenDeTai'];
    $ngayDaThucHienBanDau = $_POST['ngayDaThucHienBanDau'];
    $ngayDaThucHienKetThuc = $_POST['ngayDaThucHienKetThuc'];
    $daThucHien = $_POST['daThucHien'];
    $ngaySeThucHienBanDau = $_POST['ngaySeThucHienBanDau'];
    $ngaySeThucHienKetThuc = $_POST['ngaySeThucHienKetThuc'];
    $seThucHien = $_POST['seThucHien'];
    $ngayDaThucHien = $ngayDaThucHienBanDau."-".$ngayDaThucHienKetThuc;
    $ngaySeThucHien = $ngaySeThucHienBanDau."-".$ngaySeThucHienKetThuc;
    $maSV = session_get('maUser');
    $kt = insert_report($maDoAn,$maSV,$dotTienDo,$ngayDaThucHien,$daThucHien,$ngaySeThucHien,$seThucHien);
    $maSV = addslashes($maSV);
    $maDoAn = addslashes($maDoAn);
    if($dotTienDo==1){
        $sql = "UPDATE NhomDA SET tienDoDot1=1 where maSV='{$maSV}' and maDoAn='{$maDoAn}'";
        $kt1 = db_execute($sql);
        if(empty($kt1)){
            echo "insert tienDoDot 1 thất bại";
        }
    }else{
        $sql = "UPDATE NhomDA SET tienDoDot2=1 where maSV='{$maSV}' and maDoAn='{$maDoAn}'";
        $kt1 = db_execute($sql);
        if(empty($kt1)){
            echo "insert tienDoDot 1 thất bại";
        }
    }
    if(empty($kt)){
        echo "Nộp báo cáo thất bại";
    }else{
        redirect(base_url('application/views/viewListProjectSV.php'));
    }
    
    
    
?>