<?php
    include './../../admin/modules_admin/config.php';
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];
        // echo 'MSHH'.$MSHH;

        $sql = "SELECT h.TenHH, h.MoTa, h.Gia, h.GiamGia, img.TenHinh, l.TenLoaiHang, s.MaSize, s.SoLuongHang 
                    FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH 
                    JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang 
                    JOIN size s ON h.MSHH=s.MSHH 
                    ORDER BY h.MSHH ASC";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);
    }

?>

<main class="main container">
        <div class="row">
            <!--SHOE -->
            <div class="shoe">
                <div class="shoe-figure"></div>

                <div>
                    <img class="shoe-img" src="./../../admin/photo/ao_1.png" alt="" />
                </div>

            </div>

            <div class="info">
                <!-- INFORMATION -->
                <div class="shoe-info">
                    <span class="info-subtitle"><?php echo $rows['TenLoaiHang']; ?></span>
                    <h1 class="info-title"><?php echo $rows['TenHH']; ?></h1>
                    <p class="info-description"><?php echo $rows['MoTa']; ?></p>
                </div>

                <div class="info-down">
                    <!-- SIZE -->
                    <div class="size">
                        <h3 class="size-title">Size</h3>
                        <div class="size-content">
                            <span class="size-total active">8.6</span>
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
                <div class="footer">
                    <div class="price">
                        <span class="price-title">3.000.000₫</span>
                        <span class="price-title-sale">2.000.000₫</span>
                    </div>

                    <div class="product-btns">
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