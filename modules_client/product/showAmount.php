<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['size'])){
        $size = $_GET['size'];
        $MSHH = $_GET['MSHH'];

        $sql = "SELECT SoLuongHang FROM size WHERE MaSize ='$size' AND MSHH=$MSHH";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $soluong = $row['SoLuongHang'];
        echo $soluong;
    }
?>