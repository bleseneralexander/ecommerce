<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['MSHH'])){
        $username = $_GET['username'];
        $MSHH = $_GET['MSHH'];
        $SoLuong = $_GET['SoLuong'];
        $size = $_GET['size'];
        $GiaDatHang = $_GET['GiaDatHang'];
        $GiamGia = (double) $_GET['GiamGia']/100;
        $GiaSauGiam = $_GET['GiaSauGiam'];
        $TongTien = $GiaSauGiam * $SoLuong;
        
        // echo $username;
        // echo 'MSHH: '.$MSHH;
        // echo 'SoLuong: '.$SoLuong;
        // echo 'size: '.$size;
        // echo 'GiaDatHang: '.$GiaDatHang;
        // echo 'GiamGia: '.$GiamGia;
        // echo 'TongTien: '.$TongTien;

        //Lay MSKH tu username cua KH
        $sql_get_idClient = "SELECT MSKH FROM `khachhang` WHERE UserName='$username'";
        $query_get_idClient = mysqli_query($conn, $sql_get_idClient);
        $row_get_idClient = mysqli_fetch_array($query_get_idClient);
        $MSKH = $row_get_idClient['MSKH'];

        //Kiem tra gio hang ton tai
        $sql_check_cart_available = "SELECT * FROM `giohang` WHERE MSKH=$MSKH";
        $query_check_cart_available = mysqli_query($conn, $sql_check_cart_available);
        if(mysqli_num_rows($query_check_cart_available)>0){
            $row_check_cart_available = mysqli_fetch_array($query_check_cart_available);
            $MaGioHang = $row_check_cart_available['MaGioHang'];
            
            $sql_add_product = "INSERT INTO giohang (`MaGioHang`, `MSKH`, `MSHH`, `SoLuong`, `Size`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES ($MaGioHang,$MSKH,$MSHH,$SoLuong,'$size',$GiaDatHang,$GiamGia,$TongTien)";
            $query_add_product = mysqli_query($conn, $sql_add_product);
            echo 'Đã thêm vào giỏ hàng';
            
        } else {
            $sql_add_product = "INSERT INTO giohang (`MSKH`, `MSHH`, `SoLuong`, `Size`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES ($MSKH,$MSHH,$SoLuong,'$size',$GiaDatHang,$GiamGia,$TongTien)";
            $query_add_product = mysqli_query($conn, $sql_add_product);
            echo 'Đã thêm vào giỏ hàng';
        }
        
    }
?>