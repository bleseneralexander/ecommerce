<?php
    include './admin/modules_admin/config.php';
    
?>

<div class = "products">
    <div class = "container">

        <h1 class = "lg-title">Westside Sneaker Store</h1>
        <p class = "text-light">Tháng ưu đãi giảm giá lên đến 20% khi mua trực tuyến áp dụng bất kỳ sản phẩm đang được ưu đãi bên dưới.</p>

        <div class = "product-items">
            <?php
                $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH WHERE GiamGia>0 ORDER BY h.MSHH ASC ";
                $query =  mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
            ?>
            <!-- single product -->
            <div class = "product">
                <div class = "product-content">
                    <div class = "product-img">
                    <img src="./admin/photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>">
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
                    <p class = "product-price-sale"><?php echo $GiamGia=$rows["Gia"]-($rows["Gia"]*$rows["GiamGia"]) ?>₫</p>
                </div>

                <div class = "off-info">
                    <h2 class = "sm-title">Giảm <?php echo $rows["GiamGia"]*100 ?>%</h2>
                </div>
            </div>
            <?php } ?>
            <!-- end of single product -->      
        </div>
    </div>
</div>

    <div class = "product-collection">
        <div class = "container">
            <div class = "product-collection-wrapper">
                    <!-- product col left -->
                    <div class = "product-col-left flex">
                        <div class = "product-col-content">
                            <h2 class = "sm-title">Thương hiệu đến từ nhà Nike </h2>
                            <h2 class = "md-title">Bộ sưu tập Air Jordan</h2>
                            <p class = "text-light">Air Jordan là thương hiệu giày dép và trang thiết bị thể thao được thành lập, thiết kế và sản xuất riêng dành riêng cho cầu thủ bóng rổ nhà nghề nước Mỹ là Michael Jordan bởi một nhánh của Nike có tên thương mại là “Jordan Brand”.</p>
                            <button type = "button" class = "btn-dark">Xem ngay</button>
                        </div>
                    </div>

                    <!-- product col right -->
                    <div class = "product-col-right">
                        <div class = "product-col-r-top flex">
                            <div class = "product-col-content">
                                <h2 class = "sm-title">Sản phẩm được ưa chuộng nhất </h2>
                                <h2 class = "md-title">Converse </h2>
                                <p class = "text-light">Loại giày trượt ván và quần áo được giới trẻ ưa chuộng nhất từ trước tới nay.</p>
                                <button type = "button" class = "btn-dark">Xem ngay</button>
                            </div>
                        </div>

                        <div class = "product-col-r-bottom">
                            <!-- left -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class = "sm-title">Giày đá bóng</h2>
                                    <h2 class = "md-title">Giảm lên đến 20% </h2>
                                    <p class = "text-light">Westside Sneaker Store chuyên cung cấp chủ yếu là các mẫu giày đá bóng sân cỏ thường, nhân tạo cho đến các loại giày trên sân futsal cho các bạn yêu bóng đá trên khắp cả nước.</p>
                                    <button type = "button" class = "btn-dark">Xem ngay</button>
                                </div>
                            </div>
                            <!-- right -->
                            <div class = "flex">
                                <div class = "product-col-content">
                                    <h2 class = "sm-title">Giày trượt ván </h2>
                                    <h2 class = "md-title">Vans </h2>
                                    <p class = "text-light">Giày Vans là loại giày Sneaker chuyên trượt ván và là một dòng giày nổi tiếng toàn cầu từ thế kỷ trước. Vans cũng là giày thể thao phục vụ cho giới trẻ tham gia các môn thể thao mạo hiểm khác.</p>
                                    <button type = "button" class = "btn-dark">Xem ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>