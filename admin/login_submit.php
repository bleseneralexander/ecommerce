<?php
    include './../connectSQL.php';

    if(isset($_POST['btnLogin']) && $_POST['username'] != '' && $_POST['password'] != ''){
        $username = $_POST['username'];
        $password = $_POST['password'];
            
        $sql = "SELECT password FROM nhanvien WHERE Username='$username'";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_fetch_assoc($query);

        if($rows['password'] == $password){
            header('location: index.php?page_layout=dashboard');
        } else {
            header('location: index.php?page_layout=login');
        }
        
    } else {
        header('location: index.php?page_layout=login');
    }
?>

<!-- <script>
    function confirm_Del(name){
        return confirm("Sai mật khẩu!!!");
    }
</script> -->