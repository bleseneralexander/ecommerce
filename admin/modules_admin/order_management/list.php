<!-- Chung cấp với content.php -->

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách đơn hàng</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Họ tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Nhân viên phụ trách</th>
                        <th>Duyệt</th>
                        <th>Hủy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT d.SoDonDH, k.HoTenKH, dia.DiaChi, k.SoDienThoai, d.NgayDH, d.NgayGH, d.TrangThaiDH, n.HoTenNV
                                    FROM khachhang k 
                                        JOIN dathang d ON d.MSKH=k.MSKH
                                        JOIN diachikh dia ON dia.MSKH=k.MSKH
                                        JOIN nhanvien n ON n.MSNV=d.MSNV
                                        ORDER BY d.SoDonDH ASC;";
                            $count_nhanvien=1;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["SoDonDH"] ?></td>
                                <td><?php echo $rows["HoTenKH"] ?></td>
                                <td><?php echo $rows["DiaChi"] ?></td>
                                <td><?php echo $rows["SoDienThoai"] ?></td>
                                <td><?php echo $rows["NgayDH"] ?></td>
                                <td><?php echo $rows["NgayGH"] ?></td>
                                <td><?php echo $rows["TrangThaiDH"] ?></td>
                                <td><?php echo $rows["HoTenNV"] ?></td>
                                <?php $count_nhanvien++ ?>
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
            <p><b><?php echo 'Số lượng nhân viên: '. $count_nhanvien ?></b></p>
        </div>
    </div>
</div>
<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa nhân viên "+ name + "?");
    }
</script>