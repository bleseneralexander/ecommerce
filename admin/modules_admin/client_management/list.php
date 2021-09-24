<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách khách hàng</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSKH</th>
                        <th>Họ tên</th>
                        <th>Tên công ty</th>
                        <th>Số điện thoại</th>
                        <th>Số fax</th>
                        <th>Địa chỉ</th>
                        <th>Lịch sử mua hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT * FROM khachhang k JOIN diachikh d ON k.MSKH=d.MSKH";
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MSKH"] ?></td>
                                <td><?php echo $rows["HoTenKH"] ?></td>
                                <td><?php echo $rows["TenCongTy"] ?></td>
                                <td><?php echo $rows["SoDienThoai"] ?></td>
                                <td><?php echo $rows["SoFax"] ?></td>
                                <td><?php echo $rows["DiaChi"] ?></td>
                                <td>
                                    <center><a class="btn btn-primary" href="./client_management/client.php?page_client=view&id= <?php echo $rows["MSKH"] ?>">Xem</a></center>
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