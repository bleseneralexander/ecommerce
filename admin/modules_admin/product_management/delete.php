<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM hanghoa WHERE MSHH = $id";
    $query = mysqli_query($conn, $sql);
    header("location: ./../content.php?page_layout=product_management");
?>


<!-- Chung cấp với staff.php -->