
<?php
// Hàm tạo URL
function base_url($uri = ''){
    return 'http://localhost/QuanLyDoAn/'.$uri;
}
 
// Hàm redirect
function redirect($url){
    header("Location:{$url}");
    exit();
}
 
// Hàm lấy value từ $_POST
function input_post($key){
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
 
// Hàm lấy value từ $_GET
function input_get($key){
    return isset($_GET[$key]) ? trim($_GET[$key]) : false;
}
 
// Hàm kiểm tra submit
function is_submit($key){
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}
 
// Hàm show error
function show_error($error, $key){
    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
}
//Ham format ngày insert database
function format_date($input){
    $date = date_create($input);
    return date_format($date,"Y-m-d");
}