<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
     
    include_once('header.php');
    $doAn = array();
    $now = getdate();
    $date = $now['year']."-".$now['mon']."-".$now['mday'];
     isset($_GET['action'])?$check=$_GET['action']:$check="";
     if(!$check=="complete"){
        $doAn = get_project($date);
     }else{
        $doAn = get_project_complete($date);
     }
?>
    <div class="container">
        <h3 style="color:#e74c3c;">Danh sách đồ án</h3>
        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Mã đồ án</th>
                <th>Tên Dồ án</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Thao tác</th>
            </tr>
            <?php for($i=0;$i<count($doAn);$i++){?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo $doAn[$i]['maDoAn'];?></td>
                <td><?php echo $doAn[$i]['tenDoAn'];?></td>
                <td><?php echo $doAn[$i]['thoiGianBatDau'];?></td>
                <td><?php echo $doAn[$i]['thoiGianKetThuc'];?></td>
                <td><a href="viewListNhomDA.php?maDoAn=<?php echo $doAn[$i]['maDoAn'];?>&tenDoAn=<?php echo $doAn[$i]['tenDoAn'];?>">Xem</a></td>
            </tr>
            <?php } ?>
            
        </table>
        </div>
        </div>
    </div>

<?php
    include_once('footer.php');
?>