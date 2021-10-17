<!-- Chung cấp với list.php -->
<?php
    include './../config.php';  
    if(isset($_GET['MSNV'])){
        $id = $_GET['MSNV'];
        echo $id;
    }

    $sql = "DELETE FROM nhanvien WHERE MSNV = $id";
    $query = mysqli_query($conn, $sql);
    header("location: ./../../index.php?page_layout=staff_management");
?>