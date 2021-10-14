<?php
    include './admin/modules_admin/config.php';
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];

        $sql = "SELECT h.TenHH, h.MoTa, h.Gia, h.GiamGia, img.TenHinh, l.TenLoaiHang, s.MaSize, s.SoLuongHang 
                    FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH 
                    JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang 
                    JOIN size s ON h.MSHH=s.MSHH
                    WHERE h.MSHH=$MSHH
                    ORDER BY h.MSHH ASC";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);
    }

?>

<main class="main">
    <div class="row">
        <!--SHOE -->
        <div class="shoe">
            <div class="shoe-figure"></div>
            <div>
                <img class="shoe-img" src="./admin/photo/<?php echo $rows['TenHinh'] ?>" alt="" />
            </div>
        </div>

        <div class="info">
            <!-- INFORMATION -->
            <div class="shoe-info">
                <span class="info-subtitle"><?php echo $rows['TenLoaiHang'] ?></span>
                <h1 class="info-title"><?php echo $rows['TenHH'] ?></h1>
                <p class="info-description"><?php echo $rows['MoTa'] ?></p>
            </div>

            <div class="info-down">
                <!-- SIZE -->
                <div class="size">
                    <h3 class="size-title">Size</h3>
                    <div class="size-content">
                        <?php
                            $query_size = mysqli_query($conn, $sql);
                            while($rows_size = mysqli_fetch_array($query_size)){
                        ?>
                        <span class="size-total active"><?php echo $rows_size['MaSize'] ?></span>
                        <?php }?>
                        <!-- <span class="size-total active">8.6</span> -->
                        <span class="size-total">9</span>
                        <span class="size-total">9.5</span>
                    </div>
                </div>

                <!-- COUNT -->
                <div class="count">
                    <h3 class="count-title">Số lượng</h3>
                    <div class="count-content">
                        <span>-</span>
                        <span>1</span>
                        <span>+</span>
                    </div>
                </div>
            </div>

            <!-- PRICE -->
            <div class="price-footer">
                <div class="price">
                    <span class="price-title"><?php echo $rows['Gia'] ?>₫</span>
                    <span class="price-title-sale"><?php echo $GiamGia=$rows["Gia"]-($rows["Gia"]*$rows["GiamGia"]) ?>₫</span>
                </div>

                <div class="product-button">
                    <button type="button" class="btn-cart"> Thêm vào giỏ hàng
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                    <button type="button" class="btn-buy"> Mua ngay
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
