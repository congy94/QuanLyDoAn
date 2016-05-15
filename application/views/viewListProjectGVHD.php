<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
     
    include_once('header.php');
    $doAn = array();
    $now = getdate();
    $date = $now['year']."-".$now['mon']."-".$now['mday'];
    $maGV = session_get('maUser');
    $listMaDA = get_project_gvhd($maGV);
    isset($_GET['action'])?$check=$_GET['action']:$check="";
    
    
?>
    <div class="container">
        <h3 style="color:#e74c3c;">Danh sách đồ án</h3>
        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
        <table class="table table-bordered">
            <tr>
                <th>Mã nhóm DA</th>
                <th>Tên Dồ án</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Thao tác</th>
            </tr>
            
            <?php
                $testMaNhomDA = $listMaDA[0]['maNhomDA'];
                for($i=0;$i<count($listMaDA);$i++){
                $maDoAn = $listMaDA[$i]['maDoAn'];
                $maNhomDoAn=$listMaDA[$i]['maNhomDA'];
                $maDoAn = addslashes($maDoAn);
                $date = addslashes($date);
                if(!$check=="complete"){
                    $sql1 = "SELECT * FROM DoAn where maDoAn='{$maDoAn}'  and thoiGianKetThuc >= '{$date}'";
                }else{
                    $sql1 = "SELECT * FROM DoAn where maDoAn='{$maDoAn}'  and thoiGianKetThuc < '{$date}'";
                }
                $listDA = db_get_row($sql1);
                if(!empty($listDA)&&$i==0){
                ?>
                <tr>
                <td><?php echo $listDA['maDoAn'].".".$maNhomDoAn;?></td>
                <td><?php echo $listDA['tenDoAn'];?></td>
                <td><?php echo $listDA['thoiGianBatDau'];?></td>
                <td><?php echo $listDA['thoiGianKetThuc'];?></td>
                <td><a href="viewListSV.php?maDoAn=<?php echo $listDA['maDoAn']."&maNhomDA=".$maNhomDoAn."&maGV=".$maGV;?>">Xem chi tiết</a></td>
                 </tr>
            <?php }
                if(!empty($listDA)&&$i!=0&&$testMaNhomDA!=$listMaDA[$i]['maNhomDA']){ ?>
                <tr>
                <td><?php echo $listDA['maDoAn'].".".$maNhomDoAn;?></td>
                <td><?php echo $listDA['tenDoAn'];?></td>
                <td><?php echo $listDA['thoiGianBatDau'];?></td>
                <td><?php echo $listDA['thoiGianKetThuc'];?></td>
                <td><a href="viewListSV.php?maDoAn=<?php echo $listDA['maDoAn']."&maNhomDA=".$maNhomDoAn."&maGV=".$maGV;?>">Xem chi tiết</a></td>
            </tr>
            <?php $testMaNhomDA=$listMaDA[$i]['maNhomDA']; }} ?>
            
        </table>
        </div>
        </div>
    </div>

<?php
    include_once('footer.php');
?>