<?php
    include './../config.php';
    if(isset($_POST["btn_modify"])){
        $MSHH = $_POST["MSHH_modify"];
        $TenHH = $_POST["TenHH_modify"];
        $TenLoaiHang = $_POST['TenLoaiHang_modify'];
        $QuyCach = $_POST['QuyCach_modify'];
        $Gia = $_POST['Gia_modify'];
        $TenAnh = $_FILES['TenAnh_modify']['name'];

        // echo $TenHH.'<br/>';
        // echo $TenLoaiHang.'<br/>';
        // echo $QuyCach.'<br/>';
        // echo $Gia.'<br/>';
        // echo $TenAnh;
        
        //Lay ma loai hang
        $sql_get_MaLoaiHang = "SELECT `MaLoaiHang`FROM `loaihanghoa` WHERE TenLoaiHang='$TenLoaiHang'";
        $query_get_MaLoaiHang = mysqli_query($conn, $sql_get_MaLoaiHang);
        $rows_get_MaLoaiHang = mysqli_fetch_array($query_get_MaLoaiHang);
        $MaLoaiHang = $rows_get_MaLoaiHang['MaLoaiHang']; 
        
        //Cap nhat hanghoa
        $sql_modify_product = "UPDATE `hanghoa` SET `TenHH`='$TenHH',`QuyCach`='$QuyCach',`Gia`=$Gia,`MaLoaiHang`=$MaLoaiHang WHERE MSHH=$MSHH";
        $query_modify_product = mysqli_query($conn, $sql_modify_product);

        //Cap nhat hinhanh vao CSDL
        $sql_modify_img_product = "UPDATE `hinhhanghoa` SET `TenHinh`='$TenAnh' WHERE MSHH=$MSHH";
        $query_modify_img_product = mysqli_query($conn, $sql_modify_img_product);


        if($sql_modify_product && $sql_modify_img_product){
            header("location: ./../content.php?page_layout=product_management");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
        
    }
?>