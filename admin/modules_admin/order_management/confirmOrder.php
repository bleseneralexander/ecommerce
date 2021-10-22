<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        //Lay so don hang
        $SoDonHang = $_GET['id'];
        // echo $SoDonHang;

        //Lay MSNV
        $username = $_GET['id_admin'];
        // echo $username;

        //Lay trang thai
        $status_update = $_GET['status_update'];
        // echo $status_update;

        $sql_get_MSNV = "SELECT MSNV FROM `nhanvien` WHERE UserName = '$username'";
        $query_get_MSNV = mysqli_query($conn, $sql_get_MSNV);
        $rows_get_MSNV = mysqli_fetch_array($query_get_MSNV);
        $MSNV = $rows_get_MSNV['MSNV'];
        // echo $MSNV;
  




        $today = date('Y-m-j');
        $NgayGH = strtotime ( '+3 day' , strtotime ( $today ) ) ;
        $NgayGH = date ( 'Y-m-j' , $NgayGH );

        // Trang thai don hang
        $sql_update_order = '';
        if($status_update == 'Đã hủy'){
            $sql_update_order = "UPDATE dathang SET MSNV = $MSNV, TrangThaiDH='Đã hủy' WHERE SoDonDH=$SoDonHang";
        } else if ($status_update == 'Đã duyệt'){
            $sql_update_order = "UPDATE dathang SET MSNV = $MSNV, TrangThaiDH='Đã duyệt', NgayGH= '$NgayGH' WHERE SoDonDH=$SoDonHang";
        } else if ($status_update == 'Đã giao'){
            $sql_update_order = "UPDATE dathang SET TrangThaiDH='Đã giao' WHERE SoDonDH=$SoDonHang";
        } else{
            echo '<script>Vui lòng chọn lại</script>';
        }
        $query_update_order = mysqli_query($conn, $sql_update_order);

        if($sql_update_order){
            header("location: ./../../index.php?page_layout=order_detail&id=$SoDonHang");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }

    }

?>