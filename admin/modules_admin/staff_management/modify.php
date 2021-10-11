<?php
    include './../config.php';
    if(isset($_POST["btn_modify"])){
        $MSNV = $_POST["MSNV_modify"];
        $HoTenNV = $_POST["HoTenNV_modify"];
        $ChucVu = $_POST['ChucVu_modify'];
        $DiaChi = $_POST['DiaChi_modify'];
        $SoDienThoai = $_POST['SoDienThoai_modify'];


        $sql_modify = "UPDATE nhanvien SET HoTenNV='$HoTenNV', ChucVu='$ChucVu', DiaChi='$DiaChi', SoDienThoai='$SoDienThoai' WHERE MSNV='$MSNV'";
        $query_modify = mysqli_query($conn, $sql_modify);
        header("location: ./../content.php?page_layout=staff_management");
    }
?>
