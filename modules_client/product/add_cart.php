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
        $sql_check_cart_available = "SELECT * FROM giohang WHERE MSKH=$MSKH";
        $query_check_cart_available = mysqli_query($conn, $sql_check_cart_available);
        if(mysqli_num_rows($query_check_cart_available)>0){ //Gio hang ton tai
            //Mon hang da ton tai -> them vao -> tang so luong -> cap nhat lai so luong

            $sql_check_product = "SELECT * FROM giohang WHERE MSKH=$MSKH AND MSHH=$MSHH AND Size='$size'";
            $query_check_product = mysqli_query($conn, $sql_check_product);
            $row_get_SoLuongHangHoa = mysqli_fetch_array($query_check_product);
            $SoLuongHH_old = $row_get_SoLuongHangHoa['SoLuong']; //Lay soluong hang hien co trong gio hang
            // echo 'SoLuongtronggiohang'.$SoLuongHH_old;
            if(mysqli_num_rows($query_check_product)>0){
                //Update: so luong mon hang vao CSDL giohang
                $SoLuongHH_new = $SoLuongHH_old +  $SoLuong; //Cap nhat lai so luong moi them vao
                // echo 'SoLuongmoi'.$SoLuongHH_new;
                $sql_set_SoLuongHH_giohang = "UPDATE giohang SET SoLuong=$SoLuongHH_new WHERE MSKH = $MSKH AND MSHH = $MSHH AND Size='$size'";
                $query_set_SoLuongHH_giohang = mysqli_query($conn, $sql_set_SoLuongHH_giohang);
                echo 'Đã thêm vào giỏ hàng';
            } else {
                //Mon hang chua ton tai trong gio hang
                $row_check_cart_available = mysqli_fetch_array($query_check_cart_available);
                $MaGioHang = $row_check_cart_available['MaGioHang'];

                $sql_add_product = "INSERT INTO giohang (`MaGioHang`, `MSKH`, `MSHH`, `SoLuong`, `Size`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES ($MaGioHang,$MSKH,$MSHH,$SoLuong,'$size',$GiaDatHang,$GiamGia,$TongTien)";
                $query_add_product = mysqli_query($conn, $sql_add_product);
                echo 'Đã thêm vào giỏ hàng';
            }
        } else { 
            //Gio hang chua ton tai -> Them moi
            $sql_add_product = "INSERT INTO giohang (`MSKH`, `MSHH`, `SoLuong`, `Size`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES ($MSKH,$MSHH,$SoLuong,'$size',$GiaDatHang,$GiamGia,$TongTien)";
            $query_add_product = mysqli_query($conn, $sql_add_product);
            echo 'Đã thêm vào giỏ hàng';
        }
        
    }
?>