<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_POST['btn_signin'])){
        $name_client = $_POST['name_client'];
        $phoneNumber_client = $_POST['phoneNumber_client'];
        $username_client = $_POST['username_client'];
        $password_client = md5($_POST['password_client']);

        // echo $name_client;
        // echo $phoneNumber_client;
        // echo $username_client;
        // echo $password_client;

        $sql_add = "INSERT INTO khachhang (HoTenKH, SoDienThoai, UserName, password) 
            VALUES ('$name_client', '$phoneNumber_client', '$username_client','$password_client')";

        $query = mysqli_query($conn, $sql_add);
        header("location: ./loginForm.php");
        
    }
?>