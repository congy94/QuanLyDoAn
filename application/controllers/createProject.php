<?php
    include_once('libs/database.php');
    include_once('libs/session.php');
    include_once('libs/helper.php');
    include_once('PHPExcel.php');
    
    $maDoAn = $_POST['maDoAn'];
    $tenDoAn = $_POST['tenDoAn'];
    $maNhomDA = $_POST['maNhomDA'];
    $ngayBatDau = $_POST['thoiGianBatDau'];
    $ngayKetThuc = $_POST['thoiGianKetThuc'];
    $baoCaoTienDo1 = $_POST['tienDoDot1'];
    $baoCaoTienDo1 = $_POST['tienDoDot2'];
    $tiendo1 = format_date($baoCaoTienDo1);
    $tiendo2 = format_date($baoCaoTienDo2);
    $ngayBatDau = format_date($ngayBatDau);
    $ngayKetThuc = format_date($ngayKetThuc);
    $listGVHD = session_get('dsGVHD');
    $user = session_get('maUser');
    $listCapBacGV = array();
    for($i=0;$i<count($listGVHD);$i++){
        array_push($listCapBacGV,get_GV($listGVHD[$i])['maCapBac']);
    }
    $tongCB = 0;
    for($i=0;$i<count($listCapBacGV);$i++){
        if($listCapBacGV[$i]==1){
            $tongCB+=1;
        }else if($listCapBacGV[$i]==2){
            $tongCB+=0.8;
        }else if($listCapBacGV[$i]==3){
            $tongCB+=0.6;
        }else{
            $tongCB+=0.4;
        }
    }
    if($maDoAn!=""){
        if(empty($listGVHD)){
            echo "Chưa chọn danh sách giảng viên";
        }
    
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['danhsachSV']))
        {  
            // Nếu file upload không bị lỗi,
            // Tức là thuộc tính error > 0
            if ($_FILES['danhsachSV']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['danhsachSV']['tmp_name'], 'upload/'.$_FILES['danhsachSV']['name']);
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
        $filename = 'upload/'.$_FILES['danhsachSV']['name'];
        $inputFileType = PHPExcel_IOFactory::identify($filename);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
         
        $objReader->setReadDataOnly(true);
         
        /**  Load $inputFileName to a PHPExcel Object  **/
        $objPHPExcel = $objReader->load("$filename");
         
        $total_sheets=$objPHPExcel->getSheetCount();
         
        $allSheetName=$objPHPExcel->getSheetNames();
        $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $arraydata = array();
        for ($row = 2; $row <= $highestRow;++$row)
        {
            for ($col = 0; $col <$highestColumnIndex;++$col)
            {
                $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                if($col==4){
                    $value = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow($col, $row)->getValue()));
                }
                $arraydata[$row-2][$col]=$value;
            }
        }
        //insert đồ án vào cơ sở dữ liệu
        $kt =insert_Project($maDoAn,$tenDoAn,$ngayBatDau,$ngayKetThuc);
        if(empty($kt)){
           echo "Không thể tạo được đồ án có thể đồ án đã tồn tại";
        }else{
                //insert sinh vien vào csdl
                for($i=0;$i<count($arraydata);$i++){
                   $kq=insert_SV($arraydata[$i][0],$arraydata[$i][1],$arraydata[$i][2],$arraydata[$i][3],$arraydata[$i][4],$arraydata[$i][5],$arraydata[$i][6],$arraydata[$i][7]);
                   
                }
            //Insert vào nhóm đồ án.
                $soLuongSVTB = floor(count($arraydata)/$tongCB);
                //echo $gioiHan;
                for($j=0;$j<count($listCapBacGV);$j++){
                       if($j==0){
                           $gioiHanDau = 0;
                           $gioiHanCuoi = $soLuongSVTB*get_CB_GV($listCapBacGV[0])['danhGia'];
                       }
                       if($j==count($listCapBacGV)-1){
                             for($i=$gioiHanDau;$i<count($arraydata);$i++){
                                $kq = insert_nhomDA($maNhomDA,$maDoAn,$arraydata[$i][0],$listGVHD[$j],$tiendo1,$tiendo2);
                                
                            }
                        }else{
                            $gioiHanCuoi = $gioiHanDau+$soLuongSVTB * get_CB_GV($listCapBacGV[$j])['danhGia'];
                            for($i=$gioiHanDau;$i<$gioiHanCuoi;$i++){
                            $kq = insert_nhomDA($maNhomDA,$maDoAn,$arraydata[$i][0],$listGVHD[$j],$tiendo1,$tiendo2);
                            }
                        }
                        $gioiHanDau = $gioiHanCuoi;
                    }
                    
                    
        }
        $now = getdate();
        $date = $now['year']."-".$now['mon']."-".$now['mday'];
        $tieuDe = "Admin đã tạo đồ án ".$tenDoAn;
        $noiDung = $tenDoAn." sẽ được thực hiện từ: ".$ngayBatDau." đến: ".$ngayKetThuc;
        $insertThongBao = insert_Notice($user,$date,$tieuDe,$noiDung);
        session_delete('dsGVHD');
        redirect(base_url('application/views/viewListProject.php'));
    }
    else{
            session_delete('dsGVHD');
            echo "Chưa nhập mã đồ án";
        }
       
    
?>