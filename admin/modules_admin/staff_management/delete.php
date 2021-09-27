<!-- Chung cấp với staff.php -->
<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM nhanvien WHERE MSNV = $id";
    $query = mysqli_query($conn, $sql);
    header("location: ./../content.php?page_layout=staff_management");
?>