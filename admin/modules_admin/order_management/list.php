<!-- Chung cấp với content.php -->
<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Quản Lý Đơn Hàng</a>
            </div>
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
                                include './modules_admin/config.php';
                                $sql = "SELECT d.SoDonDH, k.HoTenKH, dia.DiaChi, k.SoDienThoai, d.NgayDH, d.NgayGH, d.TrangThaiDH
                                        FROM khachhang k 
                                            JOIN dathang d ON d.MSKH=k.MSKH
                                            JOIN diachikh dia ON d.MaDC=dia.MaDC
                                            ORDER BY d.SoDonDH DESC;";
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
                                        href="./index.php?page_layout=order_detail&id= <?php echo $rows['SoDonDH'] ?>"
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
</main>
