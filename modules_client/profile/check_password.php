<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['pass'])){
        $username = $_GET['username'];
        $new_password = md5($_GET['pass']);
        // echo $username.$password;

        $sql_get_password = "SELECT password FROM khachhang WHERE UserName='$username'";
        $query_get_password = mysqli_query($conn, $sql_get_password);
        $row_get_password = mysqli_fetch_array($query_get_password);
        if($row_get_password['password']==$new_password){
            echo 'True';
        } else {
            echo 'False';
        }

    }
?>