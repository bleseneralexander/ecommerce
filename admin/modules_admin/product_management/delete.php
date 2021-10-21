<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM hanghoa WHERE MSHH = $id";
    $query = mysqli_query($conn, $sql);
    header("location: ./../../index.php?page_layout=product_management");
?>