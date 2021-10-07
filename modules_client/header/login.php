<?php
    include './../../admin/modules_admin/config.php';
    session_start();
    if(isset($_POST['btn_login'])){
        $username_client = $_POST['username_client'];
        $password_client = $_POST['password_client'];

        $sql_get_password = "SELECT password FROM khachhang WHERE UserName='$username_client'";
        $query_get_password = mysqli_query($conn, $sql_get_password);
        $rows_get_password = mysqli_fetch_array($query_get_password);
        echo $rows_get_password['password'];

        if($rows_get_password['password'] == md5($password_client)){
            $_SESSION['login']=$username_client;
            header('location: ./../../index.php');
        } else {
            header('location: loginForm.php');
        }        
    }
?>