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
    mysqli_query($conn,'set names utf8'); 
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
//Get List Project  đang thực hiên
function get_project($date){
    $date = addslashes($date);
    $sql = "SELECT * FROM DoAn where thoiGianKetThuc >= '{$date}'";
    return db_get_list($sql);
}
//Get list project đã kết thúc
function get_project_complete($date){
    $date = addslashes($date);
    $sql = "SELECT * FROM DoAn where thoiGianKetThuc < '{$date}'";
    return db_get_list($sql);
    
}
//GET list GVHD
function get_list_GVHD(){
    $sql = "SELECT * FROM GiangVien where machucVu=2";
    return db_get_list($sql);
}
//get project sv 
function get_project_sv($maSV){
    $maSV = addslashes($maSV);
    $sql = "SELECT * FROM NhomDA where maSV ='{$maSV}'";
    return db_get_list($sql); 
}
//get NhomDA by maDoAn và maSV
function get_group_project($maDoAn,$maSV){
    $maSV = addslashes($maSV);
    $maDoAn = addslashes($maDoAn);
    $sql = "SELECT * FROM NhomDA where maDoAn = '{$maDoAn}' and maSV = '{$maSV}'";
    return db_get_row($sql);
}
//get project GVHD
function get_project_gvhd($maGV){
    $maSV = addslashes($maGV);
    $sql = "SELECT * FROM NhomDA where maGV ='{$maGV}'";
    return db_get_list($sql); 
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
//get thong bao
function get_Notice(){
    $sql = "SELECT ngayThongBao,tieuDeThongBao,noiDungThongBao FROM ThongBao";
    return db_get_list($sql);
}
//get list SV project
function get_sv_project($maGV,$maNhomDA,$maDA){
    $maGV = addslashes($maGV);
    $maNhomDA = addslashes($maNhomDA);
    $maDA = addslashes($maDA);
    $sql = "SELECT * FROM NhomDA where maGV = '{$maGV}' and maNhomDA = '{$maNhomDA}' and maDoAn = '{$maDA}'";
    return db_get_list($sql);
}
//get list NHOMDA BY maDA và maGV
function get_list_maGV_by_maDA($maDA){
    $maDA = addslashes($maDA);
    $sql = "SELECT  DISTINCT maGV,maNhomDA FROM NhomDA where maDoAn = '{$maDA}' ORDER BY maGV";
    return db_get_list($sql);
}
//get  project GVHD
function get_soluong_sv($maGV,$maDA){
    $maSV = addslashes($maGV);
    $maDA = addslashes($maDA);
    $sql = "SELECT * FROM NhomDA where maGV ='{$maGV}' and maDoAn = '{$maDA}'";
    return db_get_list($sql); 
}



    
?>