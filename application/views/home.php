<?php include_once('header.php') ?>
<h1>
<?php
    if($loaiTaiKhoan==1){
        
        redirect(base_url('application/views/profileSV.php'));
    }
    else if($loaiTaiKhoan==2){ 
      redirect(base_url('application/views/profileGV.php'));
    }
    else{ 
         redirect(base_url('application/views/profileGV.php'));
    }
    ?>
</h1>
<?php include_once('footer.php') ?>