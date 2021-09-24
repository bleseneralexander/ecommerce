<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách nhân viên</h2>
        </div>
        <div class="card-body">
        <a class="btn btn-primary" href="./staff_management/staff.php?page_staff=add">Thêm nhân viên</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSNV</th>
                        <th>Họ tên</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT * FROM nhanvien";
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MSNV"] ?></td>
                                <td><?php echo $rows["HoTenNV"] ?></td>
                                <td><?php echo $rows["ChucVu"] ?></td>
                                <td><?php echo $rows["DiaChi"] ?></td>
                                <td><?php echo $rows["SoDienThoai"] ?></td>
                                <td>
                                    <a href="./staff_management/staff.php?page_staff=modify&id= <?php echo $rows["MSNV"] ?>">
                                        Sửa
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm_Del('<?php echo $rows['HoTenNV'] ?>')" 
                                       href="./staff_management/staff.php?page_staff=delete&id= <?php echo $rows["MSNV"] ?>">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa nhân viên "+ name + "?");
    }
</script>