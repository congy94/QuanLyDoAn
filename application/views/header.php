<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    $maso = session_get('maUser');
    $loaiTaiKhoan = session_get("loaiTaiKhoan");
    if($loaiTaiKhoan==1){
        $name = get_SV($maso);
    }else{
        $name = get_GV($maso);
    }
    
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý đồ án</title>
    <link href="<?php echo base_url('application/views/public/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('application/views/public/css/style.css');?>" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
  <body>
    <div class="container">
        <div id="header">
            <div class="row">
                <div class="col-sm-7">
                    <h4 style="padding-left:10px; color: #ffffff;">Quản lý đồ án-Khoa CNTT</h4>
                </div>
                <?php if(!$maso){ ?>
                <div class="col-sm-5" style="padding-top:7px;">
                    <form action="application/controllers/login.php" method="post">
                        <input type="text" name="username" placeholder="Mã số"/>
                        <input type="password" name="password" placeholder="******"/>
                        <input type="submit" value="Đăng nhập"/>
                    </form>
                </div>
                <?php } else{?>
                <div class="col-sm-5" style="padding-top:7px;">
                  <div class="row">
                    <div class="col-sm-5"></div>
                  <span style="color:#ffffff;"><?php echo $name['hoTen']." (".$maso.")";?></span>
                  <button onclick="location.href='http://localhost/QuanLyDoAn/application/controllers/logout.php'">Đăng xuất</button>
                  </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div id="menu">
           <?php include_once('menu.php') ?>
        </div>
        <div id="content">