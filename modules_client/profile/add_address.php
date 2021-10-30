<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET["btn_add_address"])){
        $UserName = $_GET["username"];
        $address_txt = $_GET["address_txt"];

        // echo $UserName;
        // echo $address_txt;

        //Lay MSKH
        $sql_get_MSKH = "SELECT MSKH FROM khachhang WHERE UserName='$UserName'";
        $query_get_MSKH = mysqli_query($conn, $sql_get_MSKH);
        $row_get_MSKH = mysqli_fetch_array($query_get_MSKH);
        $MSKH = $row_get_MSKH['MSKH'];

        //Them dia chi vao CSDL
        $sql_add_address = "INSERT INTO diachikh (DiaChi, MSKH) VALUES ('$address_txt',$MSKH)";
        $query_add_address = mysqli_query($conn, $sql_add_address);
        header("location: ./../../index.php?page_layout=profile&username=$UserName");
    }
?>