<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['id_address'])){
        $id_address = $_GET['id_address'];
        $username = $_GET['username'];
        // echo $username;


        //Xoa dia chi vao CSDL
        $sql_del_address = "DELETE FROM diachikh WHERE MaDC=$id_address";
        $query_del_address = mysqli_query($conn, $sql_del_address);
        header("location: ./../../index.php?page_layout=profile&username=$username");
    }
?>