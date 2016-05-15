<?php
    include_once('header.php');
    $gvhd = array();
    $gvhd = get_list_GVHD();
    $giangVienHD = array();
    for($i=0;$i<count($gvhd);$i++){
        if(!empty($_POST['maGiangVien'.$i])){
            array_push($giangVienHD,$_POST['maGiangVien'.$i]);
        }
    }
    session_set('dsGVHD',$giangVienHD);
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Chọn danh sách giarng viên hướng dẫn</h4>
      </div>
      <form action"" method="post">
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Tên GV</th>
                <th>Câp bậc</th>
                <th>Chọn</th>
            </tr>
            <?php for($i=0;$i<count($gvhd);$i++){?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $gvhd[$i]['hoTen']; ?></td>
                <td><?php echo get_CB_GV($gvhd[$i]['maCapBac'])['tenCapBac']; ?></td>
                <td><input type="checkbox" name="<?php echo 'maGiangVien'.$i;?>" value="<?php echo $gvhd[$i]['maGV'];?>"></td></td>
            </tr>
            <?php } ?>
            
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <div class="container">
     <h3 style="color:#e74c3c;">Tạo một đồ án mới</h3>
     <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <form action="<?php echo base_url('application/controllers/createProject.php'); ?>" style="margin-bottom: 20px;" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Chọn danh sách giảng viên hướng dẫn:</label>
                <br/>
                <input type="button" class="btn" data-toggle="modal" data-target="#myModal" value="Chọn giảng viên">
            </div>
            <div class="form-group">
                <label>Mã đồ án:</label>
                <input type="text" class="form-control" name="maDoAn" placeholder="Mã đồ án">
            </div>
            <div class="form-group">
                <label>Mã nhóm đồ án:</label>
                <input type="text" class="form-control" name="maNhomDA" placeholder="Mã đồ án">
            </div>
            <div class="form-group">
                <label>Tên đồ án:</label>
                <input type="text" class="form-control" name="tenDoAn" placeholder="Tên đồ án">
            </div>
            <div class="form-group">
                <label>Thời gian bắt đầu:</label>
                <input type="date" class="form-control" name="thoiGianBatDau" placeholder="2016-03-11">
            </div>
            <div class="form-group">
                <label>Thời gian kết thúc:</label>
                <input type="date" class="form-control" name="thoiGianKetThuc" placeholder="2016-06-11">
            </div>
            <div class="form-group">
                <label>Ngày báo cáo tiến độ đợt 1:</label>
                <input type="date" class="form-control" name="tienDoDot1" placeholder="2016-03-11">
            </div>
            <div class="form-group">
                <label>Ngày báo cáo tiến độ đợt 2:</label>
                <input type="date" class="form-control" name="tienDoDot2" placeholder="2016-06-11">
            </div>
            <div class="form-group">
                <label>Upload file sinh viên:</label>
                <input type="file" name="danhsachSV">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Tạo mới</button>
        </form>
        </div>
     </div>
    
<?php
    include_once('footer.php');
?>