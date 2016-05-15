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
        <h3 style="color:#ea6153;">Thêm GVHD</h3>
        <div class="container">
        <form class="form-group" action="<?php echo base_url('application/controllers/insertGVHD.php'); ?>" method="post">
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Mã GV:</label>
                   <input class="col-sm-4 form-control" type="text" name="maGV" value="">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Họ và tên:</label>
                   <input class="col-sm-4 form-control" type="text" name="hoTen" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Ngày sinh:</label>
                   <input class="col-sm-4 form-control" type="date" name="ngaySinh" value="">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Trình độ:</label>
                   <select name="maCapBac" class="form-control">
                    <option value="1">Giáo sư</option>
                    <option value="2">Phó giáo sư</option>
                    <option value="3">Tiến sĩ</option>
                    <option value="4">Thạc sĩ</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Số điện thoại:</label>
                   <input class="col-sm-4 form-control" type="text" name="soDienThoai" value="">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Dịa chỉ:</label>
                   <input class="col-sm-4 form-control" type="text" name="diaChi" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                   <label class="col-sm-4">Email:</label>
                   <input class="col-sm-4 form-control" type="text" name="email" value="">
                </div>
                <div class="form-group col-sm-5">
                   <label class="col-sm-4">Giới tính:</label>
                    <select name="gioiTinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                  </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
        </div>
    </div>
    
   <?php include_once('footer.php') ?>
