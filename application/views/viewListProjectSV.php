<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
     
    include_once('header.php');
    $doAn = array();
    $now = getdate();
    $date = $now['year']."-".$now['mon']."-".$now['mday'];
    $maSV = session_get('maUser');
    $listMaDA = get_project_sv($maSV);
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
                <th>Giảng viên HD</Th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Thao tác</th>
            </tr>
            <?php for($i=0;$i<count($listMaDA);$i++){
                $maDoAn = $listMaDA[$i]['maDoAn'];
                $maNhomDoAn=$listMaDA[$i]['maNhomDA'];
                $maDoAn = addslashes($maDoAn);
                $date = addslashes($date);
                if(!$check=="complete"){
                    $sql1 = "SELECT * FROM DoAn where maDoAn='{$maDoAn}'  and thoiGianKetThuc >='{$date}'";
                }else{
                    $sql1 = "SELECT * FROM DoAn where maDoAn='{$maDoAn}'  and thoiGianKetThuc < '{$date}'";
                }
                $listDA = db_get_row($sql1);
                $nhomDA =  get_group_project($maDoAn,$maSV);
                $gv = get_GV($nhomDA['maGV']);
                if(!empty($listDA)){
                ?>
                <tr>
                <td><?php echo $listDA['maDoAn'].".".$maNhomDoAn;?></td>
                <td><?php echo $listDA['tenDoAn'];?></td>
                <td><?php if(!empty($gv)){ echo $gv['hoTen'];}echo "" ?></td>
                <td><?php echo $listDA['thoiGianBatDau'];?></td>
                <td><?php echo $listDA['thoiGianKetThuc'];?></td>
                <td>
                    <?php if(strtotime($date)==strtotime($nhomDA['ngayBaoCaoTienDoDot1'])){ ?>
                         <a href="report.php?maDoAn=<?php echo $listDA['maDoAn'];?>&dotTienDo=<?php echo 1;?>">Báo cáo tiến độ đợt 1</a>
                        <?php
                        }
                        else if(strtotime($date)==strtotime($nhomDA['ngayBaoCaoTienDoDot2'])){?>
                         <a href="report.php?maDoAn=<?php echo $listDA['maDoAn']."&dotTienDo=1";?>">Báo cáo tiến độ đợt 2</a>
                        <?php
                        }
                        else{ echo "Chưa phải thời gian nộp báo cáo";
                        
                        } ?>
                </td>
            </tr>
            <?php } }?>
            
        </table>
        </div>
        </div>
    </div>

<?php
    include_once('footer.php');
?>