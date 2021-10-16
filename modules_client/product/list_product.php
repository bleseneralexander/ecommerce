<?php
    include './admin/modules_admin/config.php';
    
?>

<div class = "products">
    <div class = "container">
        <div class = "product-items">
            <!-- single product sale -->
            <?php
                $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH WHERE GiamGia>0 ORDER BY h.MSHH ASC ";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
            ?>
            <div class = "product">
                <div class = "product-content">
                    <div class = "product-img">
                        <a href="index.php?page_layout=detail&MSHH=<?php echo $rows["MSHH"] ?>">
                            <img src="./admin/photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>">
                        </a>
                    </div>
                </div>

                <div class = "product-info">
                    <a href = "index.php?page_layout=detail&MSHH=<?php echo $rows["MSHH"] ?>" class = "product-name"><?php echo $rows["TenHH"] ?></a>
                    <p class = "product-price"><?php echo $rows["Gia"] ?>₫</p>
                    <p class = "product-price-sale"><?php echo $GiamGia=$rows["Gia"]-($rows["Gia"]*$rows["GiamGia"]) ?>₫</p>
                </div>

                <div class = "off-info">
                    <h2 class = "sm-title">Giảm <?php echo $rows["GiamGia"]*100 ?>%</h2>
                </div>
            </div>
            <?php } ?>
            <!-- end of single product sale-->

            <!-- single product -->
            <?php
                $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH WHERE GiamGia=0 ORDER BY h.MSHH ASC ";
                $query = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
            ?>
            <div class = "product">
                <div class = "product-content">
                    <div class = "product-img">
                        <a href="index.php?page_layout=detail&MSHH=<?php echo $rows["MSHH"] ?>">
                            <img src="./admin/photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>">
                        </a>
                    </div>
                </div>

                <div class = "product-info">
                    <a href = "index.php?page_layout=detail&MSHH=<?php echo $rows["MSHH"] ?>" class = "product-name"><?php echo $rows["TenHH"] ?></a>
                    <p class = "product-price-sale"><?php echo $rows["Gia"] ?>₫</p>
                </div>
            </div>
            <?php } ?>
            <!-- end of single product -->
        </div>
    </div>
</div>