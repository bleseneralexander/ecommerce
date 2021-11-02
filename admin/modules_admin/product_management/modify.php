<?php
    include './modules_admin/config.php';  

    $MSHH = $_GET['id'];
    
    if(isset($_POST["btn_modify_product"])){
        $TenHH = $_POST["TenHH_modify"];
        $MoTa = $_POST["MoTa_modify"];
        $Gia = $_POST['Gia_modify'];
        $GiamGia = $_POST['GiamGia_modify'];

        // echo $TenHH.'<br/>';
        // echo $MoTa.'<br/>';
        // echo $Gia.'<br/>';
        // echo $GiamGia;
                
        //Cap nhat hanghoa
        $sql_modify_product = "UPDATE `hanghoa` SET `TenHH`='$TenHH',`MoTa`='$MoTa',`Gia`=$Gia,`GiamGia`=$GiamGia WHERE MSHH=$MSHH";
        $query_modify_product = mysqli_query($conn, $sql_modify_product);

        if($query_modify_product){
            header("location: ./index.php?page_layout=product_management");
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
        
    }
?>


<main>
    <div class="container-fluid">
        <div class="card">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=product_management">Quản Lý Khách Hàng</a> /
                <a href="">Chỉnh sửa thông tin hàng hóa</a>
            </div>
            <div class="card-header">
                <h2>CHỈNH SỬA THÔNG TIN HÀNG HÓA</h2>
            </div>
            <div class="card-body">
                <?php
                    $sql_get_HangHoa = "SELECT * FROM hanghoa WHERE MSHH=$MSHH";
                    $query_get_HangHoa = mysqli_query($conn, $sql_get_HangHoa);
                    $rows_get_HangHoa = mysqli_fetch_array($query_get_HangHoa);
                ?>
                <form action="" method="POST"> 
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">MSHH</label>
                            <input type="text" class="form-control" name="MSHH_modify" value="<?php echo $MSHH?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên hàng hóa</label>
                            <input type="text" class="form-control" name="TenHH_modify" value="<?php echo $rows_get_HangHoa['TenHH'] ?>" require>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <input type="text" class="form-control" name="MoTa_modify" value="<?php echo $rows_get_HangHoa['MoTa'] ?>" require>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá</label>
                            <input type="number" class="form-control" name="Gia_modify" value="<?php echo $rows_get_HangHoa['Gia'] ?>" require>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giảm giá</label>
                            <input type="text" class="form-control" name="GiamGia_modify" value="<?php echo $rows_get_HangHoa['GiamGia'] ?>" require>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_modify_product">Xác nhận</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</main>