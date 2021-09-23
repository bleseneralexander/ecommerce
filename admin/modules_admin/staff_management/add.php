<?php
    include './../config.php';
    if(isset($_POST["btn_submit"])){
        $HoTenNV = $_POST["HoTenNV"];
        $ChucVu = $_POST['ChucVu'];
        $DiaChi = $_POST['DiaChi'];
        $SoDienThoai = $_POST['SoDienThoai'];

        // echo $HoTenNV;
        // echo $ChucVu;
        // echo $DiaChi;
        // echo $SoDienThoai;

        $sql_add = "INSERT INTO `nhanvien`(`HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) 
            VALUES ('$HoTenNV','$ChucVu','$DiaChi','$SoDienThoai')";

        $query = mysqli_query($conn, $sql_add);
        header('location: staff.php?page_layout=list');
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm nhân viên</h2>
        </div>
        <div class="card-body">
            <form  method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" name="HoTenNV" class="form-control" required>
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
                    <input type="text" name="DiaChi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="SoDienThoai" class="form-control" required>
                </div>

                <button type="submit" name="btn_submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
</div>