<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    include_once('header.php');
    
    $maDA = $_GET['maDoAn'];
    $tenDoAn = $_GET['tenDoAn'];
    $listMaGV =get_list_maGV_by_maDA($maDA)
    
?>
<div class="container">
        <h3 style="color:#e74c3c;">Danh sách đồ án</h3>
        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Mã nhóm Dồ án</th>
                <th>Tên đồ án </th>
                <th>Tên giảng viên hướng dẫn</th>
                <th>Số lượng sinh viên</th>
                <th>Thao tác</th>
            </tr>
            <?php for($i=0;$i<count($listMaGV);$i++){?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo $maDA;?></td>
                <td><?php echo $tenDoAn;?></td>
                <td><?php echo get_GV($listMaGV[$i]['maGV'])['hoTen'];?></td>
                <td><?php echo count(get_soluong_sv($listMaGV[$i]['maGV'],$maDA));?></td>
                <td><a href="viewListSV.php?maDoAn=<?php echo $maDA."&maNhomDA=".$listMaGV[$i]['maNhomDA']."&maGV=".$listMaGV[$i]['maGV'];?>">Xem chi tiết</a></td>
            </tr>
            <?php } ?>
            
        </table>
        </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>