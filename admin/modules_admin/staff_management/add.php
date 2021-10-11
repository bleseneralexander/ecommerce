<?php
    include './../config.php';
    if(isset($_POST["btn_submit"])){
        $HoTenNV = $_POST["HoTenNV"];
        $ChucVu = $_POST['ChucVu'];
        $DiaChi = $_POST['DiaChi'];
        $SoDienThoai = $_POST['SoDienThoai'];

        // echo $HoTenNV;
        // echo $ChucVu;
        // echo $DiaChi;
        // echo $SoDienThoai;

        $sql_add = "INSERT INTO `nhanvien`(`HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) 
            VALUES ('$HoTenNV','$ChucVu','$DiaChi','$SoDienThoai')";

        $query = mysqli_query($conn, $sql_add);
        header("location: ./../content.php?page_layout=staff_management");
    }
?>