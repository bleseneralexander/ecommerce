<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['btn_signin'])){
        $name_client = $_GET['name_client'];
        $phoneNumber_client = $_GET['phoneNumber_client'];
        $username_client = $_GET['username_client'];
        $password_client = md5($_GET['password_client']);

        // echo $name_client;
        // echo $phoneNumber_client;
        // echo $username_client;
        // echo $password_client;

        $sql_add = "INSERT INTO khachhang (HoTenKH, SoDienThoai, UserName, password) 
            VALUES ('$name_client', '$phoneNumber_client', '$username_client','$password_client')";

        $query = mysqli_query($conn, $sql_add);
        header("location: ./../../index.php");
        
    }
?>