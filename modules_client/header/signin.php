<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['HoTenKH'])){
        $HoTenKH = $_GET['HoTenKH'];
        $SoDienThoai = $_GET['SoDienThoai'];
        $UserName = $_GET['UserName'];
        $password = md5($_GET['password']);

        // echo 'ok';
        // echo $HoTenKH;
        // echo $SoDienThoai;
        // echo $UserName;
        // echo $password;

        $sql_add = "INSERT INTO khachhang (HoTenKH, SoDienThoai, UserName, password) 
            VALUES ('$HoTenKH', '$SoDienThoai', '$UserName','$password')";

        $query = mysqli_query($conn, $sql_add);

        if($query){
            echo 'True'; // Dang ky thanh cong
        } else {
            echo 'False'; // Dang ky that bai
        }
        
        
    }
?>