<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET["username"])){
        $UserName = $_GET["username"];
        $newpassword = md5($_GET["newpass"]);

        // echo $UserName;
        // echo $newpassword;

        $sql_modify_password = "UPDATE khachhang SET password = '$newpassword' WHERE UserName='$UserName'";
        $query_modify_password = mysqli_query($conn, $sql_modify_password);
        if($query_modify_password){
            echo 'True'; //Them vao CSDL thanh cong
        } else {
            echo 'False'; //Them vao CSDL ko thanh cong
        }
    }
?>