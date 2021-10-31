<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Quản Lý Khách Hàng</a>
            </div>
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
                            <th>Lịch sử mua hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                include './modules_admin/config.php';
                                $sql = "SELECT * FROM khachhang";
                                $query = mysqli_query($conn, $sql);
                                $count_client=0;
                                while($rows = mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <td><?php echo $rows["MSKH"] ?></td>
                                    <td><?php echo $rows["HoTenKH"] ?></td>
                                    <td><?php echo $rows["TenCongTy"] ?></td>
                                    <td><?php echo $rows["SoDienThoai"] ?></td>
                                    <td><?php echo $rows["SoFax"] ?></td>
                                    <?php $count_client++ ?>
                                    <td>
                                        <!-- <button type="button" class="btn btn-success editbtn">Xem</button> -->
                                        <center><a href="./index.php?page_layout=viewHistory&id=<?php echo $rows["MSKH"] ?>" class="btn_view" style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px; cursor: pointer">Xem</a></center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <p><b><?php echo 'Số lượng khách hàng: '. $count_client ?></b></p>
            </div>
        </div>
    </div>
</main>
