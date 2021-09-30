<?php
    include './../config.php';
    if(isset($_POST["btn_submit"])){
        $TenHH = $_POST["TenHH"];
        $TenLoaiHang = $_POST['TenLoaiHang'];
        $QuyCach = $_POST['QuyCach'];
        $Gia = $_POST['Gia'];
        $SoLuong = $_POST['SoLuong'];
        $TenAnh = $_FILES['TenAnh']['name'];

        // echo $TenHH.'<br/>';
        // echo $TenLoaiHang.'<br/>';
        // echo $QuyCach.'<br/>';
        // echo $Gia.'<br/>';
        // echo $SoLuong.'<br/>';
        // echo $product_image;
        
        
        $sql_add_product = "INSERT INTO `hanghoa`(`TenHH`, `QuyCach`, `Gia`, `SoLuongHang`,`MaLoaiHang`) 
            VALUES ('$TenHH','$QuyCach',$Gia,$SoLuong,$TenLoaiHang)";
        $query_add_product = mysqli_query($conn, $sql_add_product);


        //Lay MSHH vua them vao CSDL
        $sql_get_MSHH = "SELECT MSHH FROM `hanghoa` WHERE TenHH='$TenHH'";
        $query_get_MSHH = mysqli_query($conn, $sql_get_MSHH);
        $rows_get_MSHH = mysqli_fetch_array($query_get_MSHH);

        // Bắt buộc phải có biến chuyển dữ liệu mới cho vào INSERT
        $id_proudct = $rows_get_MSHH['MSHH']; 

        //Them hinhanh vao CSDL
        $sql_add_img_product = "INSERT INTO `hinhhanghoa`(`TenHinh`, `MSHH`) VALUES ('$TenAnh', $id_proudct)";
        $query_add_img_product = mysqli_query($conn, $sql_add_img_product);

        if($sql_add_img_product && $sql_add_product){
            header("location: ./../content.php?page_layout=product_management");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
        
    }
?>