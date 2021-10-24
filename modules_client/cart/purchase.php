<?php
    include './../../admin/modules_admin/config.php'; 
    if(isset($_GET['username'])){
        $username = $_GET['username'];

        //Lay MSKH
        $sql_get_MSKH = "SELECT MSKH FROM khachhang WHERE UserName = '$username'";
        $query_get_MSKH = mysqli_query($conn, $sql_get_MSKH);
        $row_get_MSKH = mysqli_fetch_array($query_get_MSKH);
        $MSKH = $row_get_MSKH['MSKH'];
        echo $MSKH.'---';

        //Ngay Dat hang
        $today = date('Y-m-j');

        //Lay MaDiaChi
        $MaDiaChi = $_GET['MaDiaChi'];

        //Them du lieu vao bang dathang
        $sql_add_dathang = "INSERT INTO dathang (MSKH, NgayDH, TrangThaiDH, MaDC) VALUES ($MSKH,'$today','Chưa duyệt', $MaDiaChi)";
        $query_add_dathang = mysqli_query($conn, $sql_add_dathang);

        //Lay SoDonHang vua them
        //Sẽ xảy ra Bug: Trong trường hợp nếu trong 1 ngày mà 1 khách hàng đặt hàng đến 2 hay nhiều lần thì sẽ ko chọn được MaDonHang nào hợp lệ. 
        //Cach fix: Thêm thời gian đặt hàng vào CSDL. CHọn thời gian max == thời gian gần nhất
        $sql_get_SoDH = "SELECT SoDonDH FROM dathang WHERE NgayDH='$today' AND MSKH=$MSKH";
        $query_get_SoDH = mysqli_query($conn, $sql_get_SoDH);
        $row_get_SoDonHang = mysqli_fetch_array($query_get_SoDH);
        $SoDonHang = $row_get_SoDonHang['SoDonDH'];

        //Target: Chuyen thong tin san pham tu bang GioHang sang bang ChiTietDatHang
        //Lay du lieu tu bang GioHang
        $sql_get_giohang = "SELECT * FROM giohang WHERE MSKH=$MSKH";
        $query_get_giohang = mysqli_query($conn, $sql_get_giohang);
        while($row_get_giohang = mysqli_fetch_array($query_get_giohang)){
            $MaGioHang = $row_get_giohang['MaGioHang'];
            $MSHH = $row_get_giohang['MSHH'];
            $SoLuong = $row_get_giohang['SoLuong'];
            $Size = $row_get_giohang['Size'];
            $GiaDatHang = $row_get_giohang['GiaDatHang'];
            $GiamGia = $row_get_giohang['GiamGia'];
            $TongTien = $row_get_giohang['TongTien'];
            // echo $MaGioHang.'---';
            // echo $MSHH.'---';
            // echo $SoLuong.'---';
            // echo $Size.'---';
            // echo $GiaDatHang.'---';
            // echo $GiamGia.'---';
            // echo $TongTien.'---';

            // Them du lieu vao bang chitietdathang
            $sql_add_dathang = "INSERT INTO chitietdathang(SoDonDH, MSHH, Size, SoLuong, GiaDatHang, GiamGia, TongTien) 
                                VALUES ($SoDonHang,$MSHH,'$Size',$SoLuong,$GiaDatHang,$GiamGia,$TongTien)";
            $query_add_dathang = mysqli_query($conn, $sql_add_dathang);

            //Xoa du lieu o bang giohang
            $sql_delete_giohang="DELETE FROM giohang WHERE MaGioHang=$MaGioHang";
            $query_delete_giohang = mysqli_query($conn, $sql_delete_giohang);
        }
        
        header("location: ./../../index.php?page_layout=order&username=$username");
    }

?>