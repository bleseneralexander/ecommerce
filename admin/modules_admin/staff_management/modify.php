<?php
    include './../config.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    //Lay thong tin san pham theo id duoc nhan
    $sql_info = "SELECT * FROM `nhanvien` WHERE MSNV='$id'";
    $query_info = mysqli_query($conn, $sql_info);
    $row_info = mysqli_fetch_array($query_info);
?>

<?php
    if(isset($_POST["btn_submit"])){
        $HoTenNV = $_POST["HoTenNV"];
        $ChucVu = $_POST['ChucVu'];
        $DiaChi = $_POST['DiaChi'];
        $SoDienThoai = $_POST['SoDienThoai'];

        $sql_modify = "UPDATE nhanvien SET HoTenNV='$HoTenNV', ChucVu='$ChucVu', DiaChi='$DiaChi', SoDienThoai='$SoDienThoai' WHERE MSNV='$id'";
        $query_modify = mysqli_query($conn, $sql_modify);
        header("location: ./../content.php?page_layout=staff_management");
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Chỉnh sửa thông tin nhân viên</h2>
        </div>
        <div class="card-body">
            <form  method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" name="HoTenNV" class="form-control" value= "<?php echo $row_info['HoTenNV'] ?>" required>
                </div>
                    
                <div class="form-group">
                    <label for=""> Chức vụ </label>
                    <select class="form-control" name="ChucVu">
                        <option value = "Quản lý" >Quản Lý</option>
                        <option value = "Nhân viên bán hàng" >Nhân viên bán hàng</option>
                        <option value = "Nhân viên giao hàng" >Nhân viên giao hàng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="DiaChi" class="form-control" value= "<?php echo $row_info['DiaChi'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="SoDienThoai" class="form-control" value= "<?php echo $row_info['SoDienThoai'] ?>" required>
                </div>

                <button type="submit" name="btn_submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>