<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        //Lay so don hang
        $SoDonHang = $_GET['id'];
        // echo $SoDonHang;

        //Lay MSNV
        $username = $_GET['usernameAdmin'];
        // echo $username;


        //Lay MSHH vua them vao CSDL
        $sql_get_MSHH = "SELECT * FROM `dathang` WHERE SoDonDH = $SoDonHang";
        $query_get_MSHH = mysqli_query($conn, $sql_get_MSHH);
        $rows_get_MSHH = mysqli_fetch_array($query_get_MSHH);

        // Bắt buộc phải có biến chuyển dữ liệu mới cho vào INSERT
        $id_proudct = $rows_get_MSHH['TrangThaiDH'];    
        // echo $id_proudct;



        $sql_get_MSNV = "SELECT * FROM nhanvien WHERE UserName = '$username'";
        $query_get_MSNV = mysqli_query($conn, $sql_get_MSNV);
        $rows_get_MSNV = mysqli_fetch_array($query_get_MSNV);

        // Bắt buộc phải có biến chuyển dữ liệu mới cho vào INSERT
        $MSNV = $rows_get_MSNV['TrangThaiDH'];    
        // echo $MSNV;
        






        $today = date('Y-m-j');
        $NgayGH = strtotime ( '+3 day' , strtotime ( $today ) ) ;
        $NgayGH = date ( 'Y-m-j' , $NgayGH );

        // Trang thai don hang
        // 1 -> chua duyet
        // 2 -> da duyet
        // 3 -> da giao
        // 4 -> da huy
        $status = $_GET['status'];
        echo $status;
        $sql_update_order = "";
        if($status == 4){
            $sql_update_order = "UPDATE dathang SET MSNV = $MSNV, TrangThaiDH='Đã hủy' WHERE SoDonDH=$SoDonHang";
        } else if ($status == 2){
            $sql_update_order = "UPDATE dathang SET MSNV = $MSNV, TrangThaiDH='Đã duyệt', NgayGH= '$NgayGH' WHERE SoDonDH=$SoDonHang";
        } else if ($status == 3){
            $sql_update_order = "UPDATE dathang SET TrangThaiDH='Đã giao' WHERE SoDonDH=$SoDonHang";
        } else{
            echo 'Vui lòng chọn lại';
        }
        $query_update_order = mysqli_query($conn, $sql_update_order);

    }

?>