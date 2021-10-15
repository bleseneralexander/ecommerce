<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_POST["btn_modify_profile"])){
        $UserName = $_POST["username"];
        $HoTenKH = $_POST["name_client"];
        $TenCongTy = $_POST["nameCompany_client"];
        $SoDienThoai = $_POST["phoneNumber_client"];
        $SoFax = $_POST["fax_client"];

        echo $UserName.'<br/>';
        echo $HoTenKH.'<br/>';
        echo $TenCongTy.'<br/>';
        echo $SoDienThoai.'<br/>';
        echo $SoFax.'<br/>';

        $sql_modify_profile = "UPDATE `khachhang` SET `HoTenKH`='$HoTenKH',`TenCongTy`='$TenCongTy',`SoDienThoai`='$SoDienThoai',`SoFax`='$SoFax' WHERE UserName='$UserName'";
        $query_modify_profile = mysqli_query($conn, $sql_modify_profile);
        // echo '<script type="text/javascript">alert("Saved!");</script>';
        if($sql_modify_profile){
            header("location: ./../../index.php?page_layout=profile&username=$UserName");
            echo '<script type="text/javascript">alert("Saved!");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>