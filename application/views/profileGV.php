<?php   include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    $maso = session_get('maUser');
    $giangVien = get_GV($maso);
    $trinhdo = get_CB_GV($giangVien['maCapBac']);
    header('Content-Type: text/html; charset=utf-8');
    include_once('header.php');
    ?>

    <div class="container">
        <h3 style="color:#ea6153;">Thông tin cá nhân</h3>
        <div class="container">
        <form class="form-group" action="<?php echo base_url('application/controllers/editProfile.php'); ?>" method="post">
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Mã GV:</label>
                   <input class="col-sm-4 form-control" type="text" name="maGV" readonly value="<?php echo $giangVien['maGV'];?>">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Họ và tên:</label>
                   <input class="col-sm-4 form-control" type="text" name="hoTen" value="<?php echo $giangVien['hoTen'];?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Ngày sinh:</label>
                   <input class="col-sm-4 form-control" type="date" name="ngaySinh" value="<?php echo $giangVien['ngaySinh'];?>">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Trình độ:</label>
                   <input class="col-sm-4 form-control" type="text" name="trinhDo" readonly value="<?php echo $trinhdo['tenCapBac'];?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Số điện thoại:</label>
                   <input class="col-sm-4 form-control" type="text" name="soDienThoai" value="<?php echo $giangVien['soDienThoai'];?>">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Dịa chỉ:</label>
                   <input class="col-sm-4 form-control" type="text" name="diaChi" value="<?php echo $giangVien['diaChi'];?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Email:</label>
                   <input class="col-sm-4 form-control" type="text" name="email" value="<?php echo $giangVien['email'];?>">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Giới tính:</label>
                   <select name="gioiTinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
        </form>
        </div>
         <h3 style="color:#ea6153;">Thay đổi mật khẩu</h3>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
     <form style="margin-bottom: 20px;" class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">Mật khẩu cũ:</label>
                <input type="password" class="form-control" name="oldPassword">
            </div>
             <div class="form-group">
                <label for="exampleInputName2">Mật khẩu mới:</label>
                <input type="password" class="form-control" name="newPassword">
            </div>
              <div class="form-group">
                <label for="exampleInputName2">Xác thực mật khẩu mới:</label>
                <input type="password" class="form-control" name="oldPassword">
            </div>
                  <button type="submit" class="btn btn-danger">Lưu mật khẩu</button>
            </form>
     </div>
   <?php include_once('footer.php') ?>
