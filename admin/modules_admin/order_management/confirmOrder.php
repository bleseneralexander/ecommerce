<?php
    include './../config.php';  
    // if(isset($_GET['id'])){
    //     $id = $_GET['id'];

    //     echo $id;
    //     echo $_GET['usernameAdmin'];
        
    //     $today = date("Y-m-d");
    //     echo $today;

    //     echo 
        

    //     $sql_get_nameKH="SELECT k.HoTenKH, k.SoDienThoai, k.SoFax, a.DiaChi, d.NgayDH, d.NgayGH, d.TrangThaiDH
    //             FROM  khachhang k JOIN dathang d ON d.MSKH=k.MSKH
    //                 JOIN diachikh a ON a.MSKH=k.MSKH
    //             WHERE d.SoDonDH=$id";
    // }
    if(isset($_POST["btn_submit"])){
        $status_order = $_POST["status_order"];

        echo $status_order;
    }
?>