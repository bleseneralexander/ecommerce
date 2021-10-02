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
                        <th>Mã đơn hàng</th>
                        <th>Họ tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT d.SoDonDH, k.HoTenKH, dia.DiaChi, k.SoDienThoai, d.NgayDH, d.NgayGH, d.TrangThaiDH
                                    FROM khachhang k 
                                        JOIN dathang d ON d.MSKH=k.MSKH
                                        JOIN diachikh dia ON dia.MSKH=k.MSKH
                                        ORDER BY d.SoDonDH ASC;";
                            $count_order=0;
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
                                <?php $count_order++ ?>
                                <td>
                                    <a 
                                       href="./order_management/order.php?page_order=viewDetail&id= <?php echo $rows['SoDonDH'] ?> &usernameAdmin= <?php echo $_GET['usernameAdmin'] ?>"
                                       style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
            <p><b><?php echo 'Số lượng đơn hàng: '. $count_order;?></b></p>
        </div>
    </div>
</div>