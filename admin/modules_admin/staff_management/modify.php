<?php
    // include './modules_admin/config.php';
    $MSNV = $_GET['id'];
    
    if(isset($_POST["btn_modify_staff"])){
        $MSNV = $_POST["MSNV_modify"];
        $HoTenNV = $_POST["HoTenNV_modify"];
        $ChucVu = $_POST['ChucVu_modify'];
        $DiaChi = $_POST['DiaChi_modify'];
        $SoDienThoai = $_POST['SoDienThoai_modify'];

        echo $MSNV;
        echo $HoTenNV;
        echo $ChucVu;
        echo $DiaChi;
        echo $SoDienThoai;

        // $sql_modify = "UPDATE nhanvien SET HoTenNV='$HoTenNV', ChucVu='$ChucVu', DiaChi='$DiaChi', SoDienThoai='$SoDienThoai' WHERE MSNV='$MSNV'";
        // $query_modify = mysqli_query($conn, $sql_modify);
        // header("location: ./index.php?page_layout=staff_management");
    }
?>

<main>
    <div class="container-fluid">
        <div class="card">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=product_management">Quản lý nhân viên</a> /
                <a href="">Chỉnh sửa thông tin nhân viên</a>
            </div>
            <div class="card-header">
                <h2>CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h2>
            </div>
            <div class="card-body">
                <?php
                    $sql_get_NhanVien = "SELECT * FROM nhanvien WHERE MSNV=$MSNV";
                    $query_get_NhanVien = mysqli_query($conn, $sql_get_NhanVien);
                    $rows_get_NhanVien = mysqli_fetch_array($query_get_NhanVien);
                ?>
                <form action="" method="POST"> 
                    <div class="modal-body">
                        <input type="hidden" name="MSNV_modify" id="MSNV_modify">
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" class="form-control" name="HoTenNV_modify" value="<?php echo $rows_get_NhanVien['HoTenNV'] ?>" require>
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ</label>
                            <select class="form-control" name="ChucVu_modify" >
                                <option value = "Quản lý">Quản Lý</option>
                                <option value = "Nhân viên bán hàng">Nhân viên bán hàng</option>
                                <option value = "Nhân viên giao hàng">Nhân viên giao hàng</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="DiaChi_modify" value="<?php echo $rows_get_NhanVien['DiaChi'] ?>" require>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="SoDienThoai_modify" value="<?php echo $rows_get_NhanVien['SoDienThoai'] ?>" require>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_modify_staff">Xác nhận</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</main>
