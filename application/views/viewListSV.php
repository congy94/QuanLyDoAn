<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');     
    include_once('header.php');
    $maDA = $_GET['maDoAn'];
    $maNhomDA = $_GET['maNhomDA'];
    $maGV = $_GET['maGV'];
    $listSV = get_sv_project($maGV,$maNhomDA,$maDA);
?>
        <div class="container">
        <h3 style="color:#e74c3c;">Danh sách sinh viên đồ án </h3>
        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
        <table class="table table-bordered">
            <tr>
                <th>STT</th>
                <th>Mã số SV</th>
                <th>Họ tên SV</th>
                <th>Lớp</th>
                <th>Tiến độ đợt 1</th>
                <th>Tiến độ đợt 2</th>
                
            </tr>
            <?php for($i=0;$i<count($listSV);$i++){?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo $listSV[$i]['maSV'];?></td>
                <td><?php echo get_SV($listSV[$i]['maSV'])['hoTen'];?></td>
                <td><?php echo get_SV($listSV[$i]['maSV'])['lopSH'];?></td>
                <td><?php
                    if($listSV[$i]['tienDoDot1']==1){
                        echo '<a href="">Xác nhận</a>';
                    }else if($listSV[$i]['tienDoDot1']==2){
                        echo '<a href="">Đã xác nhận</a>';
                    }else{
                        echo "Chưa nộp báo cáo";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($listSV[$i]['tienDoDot2']==1){
                        echo '<a href="">Xác nhận</a>';
                    }else if($listSV[$i]['tienDoDot2']==2){
                        echo '<a href="">Đã xác nhận</a>';
                    }else{
                        echo "Chưa nộp báo cáo";
                    }
                ?>
                </td>
                
            </tr>
            <?php } ?>
            
        </table>
        </div>
        </div>
    </div>

<?php
    include_once('footer.php');
?>