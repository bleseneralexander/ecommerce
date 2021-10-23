<?php
    include './../../admin/modules_admin/config.php'; 
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];
        $username = $_GET['username'];

        $sql_get_MSKH = "SELECT MSKH FROM khachhang WHERE UserName = '$username'";
        $query_get_MSKH = mysqli_query($conn, $sql_get_MSKH);
        $row_get_MSKH = mysqli_fetch_array($query_get_MSKH);
        $MSKH = $row_get_MSKH['MSKH'];


        $sql = "DELETE FROM giohang WHERE MSHH=$MSHH AND MSKH = $MSKH";
        $query = mysqli_query($conn, $sql);
        header("location: ./../../index.php?page_layout=cart&username=$username");
    }

?>