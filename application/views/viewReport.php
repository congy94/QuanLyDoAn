<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
     
    include_once('header.php');
	$maDoAn = $_GET['maDoAn'];
    $maSV = $_GET['maSV'];
	$dotTienDo = $_GET['dotTienDo'];
    
?>
<form action="<?php echo base_url('application/controllers/insertReport.php')?>" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">Tên đề tài:</label>
    <input type="text" class="form-control " name="tenDeTai" placeholder="Tên đề tài...">
    </div>
 <div class="row">
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Từ ngày</label>
    <input type="date" class="form-control" name="ngayDaThucHienBanDau">
    </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputPassword1">Đến ngày</label>
    <input type="date" class="form-control" name="ngayDaThucHienKetThuc">
  </div>
  </div>
  <div class="form-group">
  <label for="comment">Nội dung đã thực hiện:</label>
  <textarea class="form-control" rows="5" name="daThucHien"></textarea>
</div>
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="exampleInputEmail1">Từ ngày</label>
    <input type="date" class="form-control " name="ngaySeThucHienBanDau" placeholder="Email">
    </div>
  <div class="form-group col-sm-6">
    <label for="exampleInputPassword1">Đến ngày</label>
    <input type="date" class="form-control" name="ngaySeThucHienKetThuc" placeholder="Password">
  </div>
  </div>
  <div class="form-group">
  <label for="comment">Nội dung sẽ thực hiện:</label>
  <textarea class="form-control" rows="5" name="seThucHien"></textarea>
</div>
   <div class="row" style="text-align: center; margin-bottom:10px;">
	<input type="hidden" name="maDoAn" value="<?php echo $maDoAn;?>">
	<input type="hidden" name="dotTienDo" value="<?php echo $dotTienDo;?>">
    <input type="submit" class="btn btn-success btn-lg" value="Nộp báo cáo"/>
	</div>
</form>
<?php
    include_once('footer.php');
?>