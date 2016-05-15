<?php
    // Biến lưu trữ kết nối
$conn = null;
 
// Hàm kết nối
function db_connect(){
    global $conn;
    if (!$conn){
        $conn = mysqli_connect('localhost:3307', 'root', '', 'quanlydoandb') 
                or die ('Không thể kết nối CSDL');
        mysqli_set_charset($conn,'UTF-8');
     
    }
}
 
// Hàm ngắt kết nối
function db_close(){
    global $conn;
    if ($conn){
        mysqli_close($conn);
    }
}
 
// Hàm lấy danh sách, kết quả trả về danh sách các record trong một mảng
function db_get_list($sql){
    db_connect();
    global $conn;
    $data  = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}
 
// Hàm lấy chi tiết, dùng select theo ID vì nó trả về 1 record
function db_get_row($sql){
    db_connect();
    global $conn;
    mysqli_query($conn,'set names utf8'); 
    $result = mysqli_query($conn, $sql);
    $row = array();
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }    
    return $row;
}
 
// Hàm thực thi câu truy  vấn insert, update, delete
function db_execute($sql){
    db_connect();
    global $conn;
    mysqli_query($conn,'set names utf8'); 
    return mysqli_query($conn, $sql);
}
//Hàm get SinVien
function get_SV($maSo){
   $maSo = addslashes($maSo);
   $sql = "SELECT * FROM SinhVien where maSV = '{$maSo}'";
   return db_get_row($sql);
}
//Hàm get GiangVien
function get_GV($maSo){
    $maSo = addslashes($maSo);
    $sql = "SELECT * FROM GiangVien where maGV = '{$maSo}'";
    return db_get_row($sql);
}
//Get cap bac Giang Vien
function get_CB_GV($maCapBac){
    $maCapBac = addslashes($maCapBac);
    $sql = "SELECT * FROM CapBac where maCapBac = '{$maCapBac}'";
    return db_get_row($sql);
}
//Get danhGia bơi maCapBac
function get_HeSoCapBac($maCapBac){
    $maCapBac = addslashes($maCapBac);
    $sql = "SELCET danhGia FROM CapBac where maCapBac = '{$maCapBac}'";
    return db_get_row($sql);
}
//Hàm kiểm tra user đăng nhập
function check_user_login($maSo, $pass){
    $maSo = addslashes($maSo);
    $pass = addslashes($pass);
    $sql1 = "SELECT * FROM SinhVien where maSV = '{$maSo}' and maKhau = '{$pass}'";
    $sql2 = "SELECT * FROM GiangVien where maGV = '{$maSo}' and maKhau = '{$pass}'";
    if(!empty(db_get_row($sql1))){
        return 1;
    }
    else if(!empty(db_get_row($sql2))){
          $bien = db_get_row($sql2);
          if($bien['maChucVu']==1){
            return 2;
          }else{
            return 3;
          }
    }else{
        return 0;
    }
}
//function tao do an
function insert_Project($maDoAn,$tenDoAn,$ngayBatDau,$ngayKetThuc){
    $maDoAn = addslashes($maDoAn);
    $tenDoAn = addslashes($tenDoAn);
    $ngayBatDau = addslashes($ngayBatDau);
    $ngayKetThuc = addslashes($ngayKetThuc);
    $sql = "INSERT INTO DoAn values('{$maDoAn}','{$tenDoAn}','{$ngayBatDau}','{$ngayKetThuc}')";
    return db_execute($sql);
}
//function get List dồ án
function get_List_Project(){
    $sql = "SELECT * FROM DoAn";
    return db_get_list($sql);
}
//Update Giang Vien
function update_GV($maGV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$gioiTinh){
    $hoTen = addslashes($hoTen);
    $ngaySinh = addslashes($ngaySinh);
    $soDienThoai = addslashes($soDienThoai);
    $diaChi = addslashes($diaChi);
    $email = addslashes($email);
    $gioiTinh = addslashes($gioiTinh);
    $sql = "UPDATE GiangVien set hoTen= '{$hoTen}' ,ngaySinh= '{$ngaySinh}', soDienThoai = '{$soDienThoai}', diaChi='{$diaChi}', email='{$email}', gioiTinh='{$gioiTinh}' where maGV= '{$maGV}'";
    return db_execute($sql);
}
//Insert GiangVien
function insert_GV($maGV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$maCapBac,$gioiTinh){
    $maGV = addslashes($maGV);
    $hoTen = addslashes($hoTen);
    $ngaySinh = addslashes($ngaySinh);
    $soDienThoai = addslashes($soDienThoai);
    $diaChi = addslashes($diaChi);
    $email = addslashes($email);
    $gioiTinh = addslashes($gioiTinh);
    $maCapBac = addslashes($maCapBac);
    $sql = "INSERT INTO GiangVien values('{$maGV}','{$maGV}',2,$maCapBac,'{$hoTen}','{$gioiTinh}','{$ngaySinh}','{$diaChi}','{$soDienThoai}','{$email}')";
    return db_execute($sql);
}
//insert SinhVien
function insert_SV($maSV,$hoTen,$gioiTinh,$lopSH,$ngaySinh,$soDienThoai,$diaChi,$email){
    $maSV = addslashes($maSV);
    $hoTen = addslashes($hoTen);
    $gioiTinh = addslashes($gioiTinh);
    $lopSH = addslashes($lopSH);
    $ngaySinh = addslashes($ngaySinh);
    $soDienThoai = addslashes($soDienThoai);
    $diaChi = addslashes($diaChi);
    $email = addslashes($email);
    $sql = "INSERT INTO SinhVien values('{$maSV}','{$maSV}','{$hoTen}','{$gioiTinh}','{$lopSH}','{$ngaySinh}','{$soDienThoai}','{$diaChi}','{$email}')";
    return db_execute($sql);
}
//insert vào nhóm đồ án
function insert_nhomDA($maNhomDA,$maDA,$maSV,$maGV,$tienDo1,$tienDo2){
    $maNhomDA = addslashes($maNhomDA);
    $maDA = addslashes($maDA);
    $maSV = addslashes($maSV);
    $maGV = addslashes($maGV);
    $tienDo1 = addslashes($tienDo1);
    $tienDo2 = addslashes($tienDo2);
    $sql = "INSERT INTO NhomDA(maNhomDA,maDoAn,maSV,maGV,ngayBaoCaoTienDoDot1,ngayBaoCaoTienDoDot2) values('{$maNhomDA}','{$maDA}','{$maSV}','{$maGV}','{$tienDo1}','{$tienDo2}')";
    return db_execute($sql);
}
//Insert Thông báo.
function insert_Notice($maGV,$ngayThongBao,$tieuDe,$noiDung){
    $maGV = addslashes($maGV);
    $ngayThongBao = addslashes($ngayThongBao);
    $tieuDe = addslashes($tieuDe);
    $noiDung = addslashes($noiDung);
    $sql = "INSERT INTO ThongBao values('','{$maGV}','{$ngayThongBao}','{$tieuDe}','{$noiDung}')";
    return db_execute($sql);
    
}
//insert báo cáo tiến độ
function insert_report($maDoAn,$maSV,$dotTienDo,$ngayDaThucHien,$daThucHien,$ngaySeThucHien,$seThucHien){
    $maSV = addslashes($maSV);
    $maDoAn= addslashes($maDoAn);
    $dotTienDo = addslashes($dotTienDo);
    $ngaySeThucHien = addslashes($ngaySeThucHien);
    $daThucHien = addslashes($daThucHien);
    $ngaySeThucHien = addslashes($ngaySeThucHien);
    $seThucHien = addslashes($seThucHien);
    $sql = "INSERT INTO BaoCaoTienDo values('','{$maDoAn}','{$maSV}','{$dotTienDo}','{$ngayDaThucHien}','{$daThucHien}','{$ngaySeThucHien}','{$seThucHien}')";
    return db_execute($sql);  
    
}
//Update edit Giang Vien
function update_full_GV($maGV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$gioiTinh,$trinhDo){
    $hoTen = addslashes($hoTen);
    $ngaySinh = addslashes($ngaySinh);
    $soDienThoai = addslashes($soDienThoai);
    $diaChi = addslashes($diaChi);
    $email = addslashes($email);
    $trinhDo = addslashes($trinhDo);
    $gioiTinh = addslashes($gioiTinh);
    $sql = "UPDATE GiangVien set maCapBac={$trinhDo},hoTen= '{$hoTen}' ,ngaySinh= '{$ngaySinh}', soDienThoai = '{$soDienThoai}', diaChi='{$diaChi}', email='{$email}', gioiTinh='{$gioiTinh}' where maGV= '{$maGV}'";
    return db_execute($sql);
}
//Update edit Sinh vien
function update_full_SV($maSV,$hoTen,$ngaySinh,$soDienThoai,$diaChi,$email,$gioiTinh,$lopSH){
    $maSV = addslashes($maSV);
    $hoTen = addslashes($hoTen);
    $ngaySinh = addslashes($ngaySinh);
    $soDienThoai = addslashes($soDienThoai);
    $diaChi = addslashes($diaChi);
    $email = addslashes($email);
    $lopSH = addslashes($lopSH);
    $gioiTinh = addslashes($gioiTinh);
    $sql = "UPDATE SinhVien set lopSH='{$lopSH}',hoTen= '{$hoTen}' ,ngaySinh= '{$ngaySinh}', soDienThoai = '{$soDienThoai}', diaChi='{$diaChi}', email='{$email}', gioiTinh='{$gioiTinh}' where maSV= '{$maSV}'";
    return db_execute($sql);
}

?>