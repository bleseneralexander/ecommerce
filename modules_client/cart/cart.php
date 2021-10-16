<?php
	if(!isset($_SESSION['login'])){
		header('location: ./modules_client/header/loginForm.php');
	}
?>

<?php
    include './admin/modules_admin/config.php';
    if(isset($_GET['username'])){
        $username = $_GET['username'];
    } else {
        $username = $_SESSION['login'];
    }
    $sql_cart = "SELECT h.TenHH, img.TenHinh, g.Size, g.GiaDatHang, g.SoLuong, g.GiamGia, g.TongTien, SUM(g.TongTien) AS TongSoTien
        FROM giohang g JOIN khachhang k ON g.MSKH=k.MSKH
                        JOIN hanghoa h ON g.MSHH=h.MSHH
                        JOIN hinhhanghoa img ON h.MSHH=img.MSHH
        WHERE k.UserName='$username'";
    $query_cart = mysqli_query($conn, $sql_cart);
?>

<div class="background-cart">
        <div class="container-cart">
            <div class="content-cart">
                <h1>Giỏ hàng</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th colspan="2" class="colspan_titleProduct">Sản phẩm</th>
                        <th>Size</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Giảm giá</th>
                        <th>Số tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                        $STT = 0;
                        while($row_order = mysqli_fetch_array($query_cart)){
                    ?>
                    <tr>
                        <td> <?php echo ++$STT ?> </td>
                        <td class="image"><img src="./admin/photo/<?php echo $row_order['TenHinh'] ?>"></td>
                        <td class="titleProduct" style="text-align: left;"><?php echo $row_order['TenHH'] ?></td>
                        <td><?php echo $row_order['Size'] ?></td>
                        <td><?php echo $row_order['GiaDatHang'] ?></td>
                        <td>
                            <div class="count-content">
                                <span>-</span>
                                <span><?php echo $row_order['SoLuong'] ?></span>
                                <span>+</span>
                            </div>
                        </td>
                        <td><?php echo $row_order['GiamGia']*100 ?>%</td>
                        <td><?php echo $row_order['TongTien'] ?></td>
                        <td>Xóa</td>
                    </tr>
                    <?php } ?>

                    <!-- <tr>
                        <td>2</td>
                        <td class="image"><img src="./../../admin/photo/giay_10.png" alt=""></td>
                        <td class="titleProduct" style="text-align: left;">Giày Nike Air Force 1</td>
                        <td>45</td>
                        <td>2000000</td>
                        <td>
                            <div class="count-content">
                                <span>-</span>
                                <span>1</span>
                                <span>+</span>
                            </div>
                        </td>
                        <td>0</td>
                        <td>2000000</td>
                        <td>Xóa</td>
                    </tr> -->


                </table>
            </div>


            <div class="cash">
                <?php 
                    $sql_get_TongSoTien = "SELECT SUM(g.TongTien) AS TongSoTien
                            FROM giohang g JOIN khachhang k ON g.MSKH=k.MSKH    		
                            WHERE k.UserName='$username'";
                    $query_get_TongSoTien = mysqli_query($conn, $sql_get_TongSoTien);
                    $row_get_TongSoTien = mysqli_fetch_array($query_get_TongSoTien);
                ?>
                <a href="#" class="cancel_order">Hủy đơn hàng</a>
                <div class="money_order">
                    <div>
                        <p class="title">Tổng thanh toán</p>
                        <p>(<?php echo $STT ?> sản phẩm)</p>
                    </div>
                    <p class="money"><?php echo $row_get_TongSoTien['TongSoTien']  ?>đ</p>
                </div>
                <a href="#" class="buy">Mua Hàng</a>
            </div>
        </div>
    </div>