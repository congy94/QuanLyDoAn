<?php
if (!defined('IN_SITE')) die ('The request not found');
// Hàm thiết lập là đã đăng nhập
function set_logged($username){
    session_set('ss_user_token',$username);
}
// Hàm thiết lập đăng xuất
function set_logout(){
    session_delete('ss_user_token');
}
 
// Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
}
// Lấy username người dùng hiện tại
function get_current_username(){
    $user  = is_logged();
    return isset($user['hoTen']) ? $user['hoTen'] : '';
}
?>