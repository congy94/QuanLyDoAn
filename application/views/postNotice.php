<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    include_once('header.php');
?>
		<form action="<?php echo base_url('application/controllers/postNotice.php')?>" method="post" style="margin-bottom: 20px;" >
            <div class="form-group">
                   <label class="col-sm-4">Tiêu đề thông báo:</label>
                   <input class="col-sm-4 form-control" type="text" name="tieuDe" value="">
            </div>
            <div class="form-group">
				 <label class="col-sm-4">Nội dung thông báo:</label>
				<textarea class="form-control" name="noiDung" id="editor" rows="5" cols="50">Nội dung thông báo</textarea>
            </div>
            <div class="row" style="text-align: center;">
            <input type="submit" class="btn btn-success btn-lg" value="Đăng thông báo"/>
			</div>
           
		</form>
	
<?php
    include_once('footer.php');
?>