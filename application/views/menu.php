<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="<?php echo base_url('application/views/public/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('application/views/public/css/style.css');?>" rel="stylesheet">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
<body>
<?php if($loaiTaiKhoan ==0){ ?>          
<button class="btn-menu">Thông báo</button>
<button class="btn-menu">Chương trình đào tạo</button>
<button class="btn-menu">Kế hoạch</button>
<button class="btn-menu">Hướng dẫn</button>
<?php } ?>
<?php //Cái này của sinh viên--> ?>
<?php if($loaiTaiKhoan ==1){ ?>          
<a href="<?php echo base_url('application/views/profileSV.php') ?>" class="btn-menu">Xem thông tin cá nhân</a>
<span class="dropdown">
<button class="btn-menu" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Xem danh sách đồ án
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo base_url('application/views/viewListProjectSV.php')?>">Đồ án đang thực hiện</a></li>
    <li><a href="<?php echo base_url('application/views/viewListProjectSV.php?action=complete')?>">Đồ án đã kết thúc</a></li>
  </ul>
</span>
<?php } ?>
<?php //Cái này của admin--> ?>
<?php if($loaiTaiKhoan ==2){ ?>
<a href="<?php echo base_url('application/views/profileGV.php') ?>" class="btn-menu">Xem thông tin cá nhân</a>
<span class="dropdown">
<button class="btn-menu" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Danh sách đồ án
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo base_url('application/views/viewListProject.php')?>">Đồ án đang thực hiện</a></li>
    <li><a href="<?php echo base_url('application/views/viewListProject.php?action=complete')?>">Đồ án đã kết thúc</a></li>
  </ul>
</span>
<span class="dropdown">
<button class="btn-menu" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Giảng viên hướng dẩn
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo base_url('application/views/insertGVHD.php')?>">Thêm GVHD mới.</a></li>
    <li><a href="<?php echo base_url('application/views/listGVHD.php')?>">Xem danh sách GVHD.</a></li>
  </ul>
</span>
<a href="<?php echo base_url('application/views/createProject.php') ?>" class="btn-menu">Tạo đồ án mới</a>
<a href="<?php echo base_url('application/views/postNotice.php') ?>" class="btn-menu">Đăng thông báo</a>
<?php } ?>
<?php //Cái này của GVHD--> ?>
<?php if($loaiTaiKhoan ==3){ ?>          
<a href="<?php echo base_url('application/views/profileGV.php') ?>" class="btn-menu">Xem thông tin cá nhân</a>
<span class="dropdown">
<button class="btn-menu" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Xem danh sách đồ án
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo base_url('application/views/viewListProjectGVHD.php')?>">Đồ án đang thực hiện</a></li>
    <li><a href="<?php echo base_url('application/views/viewListProjectGVHD.php?action=complete')?>">Đồ án đã kết thúc</a></li>
  </ul>
</span>
<a href="<?php echo base_url('application/views/postNotice.php') ?>" class="btn-menu">Đăng thông báo</a>
<?php } ?>

<script src="<?php echo base_url('application/views/public/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('application/views/public/js/jquery-1.12.3.js')?>"></script>
</body>
</html>