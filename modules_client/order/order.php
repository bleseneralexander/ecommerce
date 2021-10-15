<?php
    include './admin/modules_admin/config.php';
    if(isset($_GET['username'])){
        $username = $_GET['username'];

        $sql_order = "SELECT d.SoDonDH, d.NgayDH, d.NgayGH, d.TrangThaiDH 
        FROM dathang d JOIN khachhang k ON d.MSKH=k.MSKH	WHERE k.UserName='$username'";
        $query_order = mysqli_query($conn, $sql_order);
        $row_order = mysqli_fetch_array($query_order);
        $SoDonDH = $row_order['SoDonDH'];
    }
?>

<div class="background-order">
    <div class="container-order">
        <div class="content-order">
            <h1>Danh sách đơn hàng</h1>
            <div class="order">
                <div class="info_order">
                    <div class="title_order">
                        <h4>Số đơn hàng: #<?php echo $SoDonDH ?></h4>
                        <h4>Tình trạng: <?php echo $row_order['TrangThaiDH'] ?></h4>
                    </div>
                    <div class="date_order">
                        <h4>Ngày đặt: <?php echo $row_order['NgayDH'] ?></h4>
                        <h4>Dự kiến nhận: <?php echo $row_order['NgayGH'] ?></h4>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>STT</th>
                        <th colspan="2" class="colspan_titleProduct">Sản phẩm</th>
                        <th>Size</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Giảm giá</th>
                        <th>Số tiền</th>
                    </tr>
                    <?php
                        $sql_detail_order = "SELECT img.TenHinh, h.TenHH, c.Size, c.GiaDatHang, c.SoLuong, c.GiamGia, c.TongTien
                                        FROM chitietdathang c JOIN hanghoa h ON c.MSHH=h.MSHH
                                                            JOIN hinhhanghoa img ON h.MSHH=img.MSHH
                                        WHERE SoDonDH=$SoDonDH";
                        $query_detail_order = mysqli_query($conn, $sql_detail_order);
                        $STT = 0;
                        while($row_detail_order = mysqli_fetch_array($query_detail_order)){
                    ?>
                    <tr>
                        <td><?php echo ++$STT ?></td>
                        <td class="image"><img src="./admin/photo/<?php echo $row_detail_order['TenHinh'] ?>"></td>
                        <td class="titleProduct" style="text-align: left;"><?php echo $row_detail_order['TenHH'] ?></td>
                        <td><?php echo $row_detail_order['Size'] ?></td>
                        <td><?php echo $row_detail_order['GiaDatHang'] ?></td>
                        <td><?php echo $row_detail_order['SoLuong'] ?></td>
                        <td><?php echo $row_detail_order['GiamGia']*100 ?>%</td>
                        <td><?php echo $row_detail_order['TongTien'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

                <!-- <div class="order">
                    <div class="info_order">
                        <div class="title_order">
                            <h4>Đơn hàng: #111</h4>
                            <h4>Tình trạng: Chưa duyệt</h4>
                        </div>
                        <div class="date_order">
                            <h4>Ngày đặt: 11-10-2021</h4>
                            <h4>Dự kiến nhận: 15-10-2021</h4>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th colspan="2" class="colspan_titleProduct">Sản phẩm</th>
                            <th>Size</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Giảm giá</th>
                            <th>Số tiền</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td class="image"><img src="./../../admin/photo/giay_11.png" alt=""></td>
                            <td class="titleProduct" style="text-align: left;">Giày Converse Chuck Taylor Red High Tops
                            </td>
                            <td>45</td>
                            <td>1000000</td>
                            <td>1</td>
                            <td>0</td>
                            <td>1000000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="image"><img src="./../../admin/photo/giay_10.png" alt=""></td>
                            <td class="titleProduct" style="text-align: left;">Giày Nike Air Force 1</td>
                            <td>45</td>
                            <td>2000000</td>
                            <td>1</td>
                            <td>0</td>
                            <td>2000000</td>
                        </tr>
                    </table>
                </div> -->
        </div>
    </div>
</div>