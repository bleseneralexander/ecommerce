<?php
    include './../config.php';
    if(isset($_POST["btn_add_availableProduct"])){
        
        $MSHH_availableProduct = $_POST["MSHH_availableProduct"];
        $Size_availableProduct = $_POST["Size_availableProduct"];
        //Lay so luong hang them vao
        $SoLuong_availableProduct = $_POST['SoLuong_availableProduct'];

        //Lay so luong hang hien co trong CSDL
        $sql_SoLuongHangHoa = "SELECT SoLuongHang FROM `size` WHERE MaSize='$Size_availableProduct' AND MSHH=$MSHH_availableProduct";
        $query_SoLuongHangHoa = mysqli_query($conn, $sql_SoLuongHangHoa);
        $rows_SoLuongHangHoa = mysqli_fetch_array($query_SoLuongHangHoa);
        
        //So luong hang sau khi duoc cong them -> cap nhat vao CSDL
        $soLuongHang_update = $rows_SoLuongHangHoa['SoLuongHang'] + $SoLuong_availableProduct;

        $sql_update="UPDATE `size` SET `SoLuongHang`=$soLuongHang_update WHERE MaSize='$Size_availableProduct' AND MSHH=$MSHH_availableProduct";
        $query_update = mysqli_query($conn, $sql_update);


        if($sql_update){
            header("location: ./../../index.php?page_layout=quantityOfProduct&id=$MSHH_availableProduct");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }

    }
?>