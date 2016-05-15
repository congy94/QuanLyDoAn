<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
     
    include_once('header.php');
    $gvhd = array();
    $gvhd = get_list_GVHD();
    
?>
    <div class="container">
        <h3 style="color:#e74c3c;">Danh sách GVHD</h3>
        <div class="row">
        <div class="col-sm-11">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Mã GV</th>
                <th>Tên GV</th>
                <th>Câp bậc</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</div>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
            <?php for($i=0;$i<count($gvhd);$i++){?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $gvhd[$i]['maGV']; ?></td>
                <td><?php echo $gvhd[$i]['hoTen']; ?></td>
                <td><?php echo get_CB_GV($gvhd[$i]['maCapBac'])['tenCapBac']; ?></td>
                <td><?php echo $gvhd[$i]['gioiTinh']; ?></td>
                <td><?php echo $gvhd[$i]['ngaySinh']; ?></td>
                <td><?php echo $gvhd[$i]['diaChi']; ?></td>
                <td><?php echo $gvhd[$i]['soDienThoai']; ?></td>
                <td><?php echo $gvhd[$i]['email']; ?></td>
                <td><a href="editGVHD.php?maGV=<?php echo $gvhd[$i]['maGV'];?>">Chỉnh sửa</a></td>
            </tr>
            <?php } ?>
            
        </table>
        </div>
      </div>

<?php
    include_once('footer.php');
?>