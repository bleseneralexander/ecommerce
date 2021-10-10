<?php
    include './../../admin/modules_admin/config.php';
    
?>

<div class = "products">
    <div class = "container">
        <div class = "product-items">
            <!-- single product -->
            <?php
                $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH WHERE img.PNG=1 ORDER BY h.MSHH ASC ";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
            ?>
            <div class = "product">
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="./../../admin/photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>">
                    </div>
                    <div class = "product-btns">
                        <button type = "button" class = "btn-cart"> Thêm vào giỏ hàng
                            <span><i class = "fas fa-plus"></i></span>
                        </button>
                        <button type = "button" class = "btn-buy"> Mua ngay
                            <span><i class = "fas fa-shopping-cart"></i></span>
                        </button>
                    </div>
                </div>

                <div class = "product-info">
                    <a href = "#" class = "product-name"><?php echo $rows["TenHH"] ?></a>
                    <p class = "product-price"><?php echo $rows["Gia"] ?>₫</p>
                    <p class = "product-price-sale"><?php echo $rows["Gia"] ?>₫</p>
                </div>

                <div class = "off-info">
                    <h2 class = "sm-title">Giảm 10%</h2>
                </div>
            </div>
            <?php } ?>
            <!-- end of single product -->
        </div>
    </div>
</div>