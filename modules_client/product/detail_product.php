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
                <h1 class="info-title" id="abc"><?php echo $rows['TenHH'] ?></h1>
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
                        <span class="size-total" onclick="
                    chooseSize()"><?php echo $rows_size['MaSize'] ?></span>
                        <?php }?>

                        <!-- demo active size -->
                        <!-- <span class="size-total">7</span>
                        <span class="size-total">8</span>
                        <span class="size-total active">9</span>
                        <span class="size-total">10</span>
                        <span class="size-total">11</span> -->
                    </div>
                </div>

                <!-- COUNT -->
                <div class="count">
                    <h3 class="count-title">Số lượng</h3>
                    <div class="count-content">
                        <span onmousedown="mouseDown_dec()" onmouseup="mouseUp()" onmouseleave="mouseLeave()" class="btn-adjust-amount">-</span>
                        <input id="input-amount" value="1" class="input-amount" readonly></input>	
                        <span onmousedown="mouseDown_inc(10)" onmouseup="mouseUp()" onmouseleave="mouseLeave()" class="btn-adjust-amount">+</span>
                    </div>
                </div>
            </div>

            <!-- PRICE -->
            <div class="price-footer">
                <div class="price">
                    <span class="sale">Giảm <?php echo $rows['GiamGia']*100 ?>%</span>
                    <span class="price-title"><?php echo $rows['Gia'] ?>₫</span>
                    <span class="price-title-sale"><?php echo $GiamGia=$rows["Gia"]-($rows["Gia"]*$rows["GiamGia"]) ?>₫</span>
                </div>

                <div class="product-button">
                    <button type="button" class="btn-cart" onclick="window.location.href='./index.php?page_layout=cart'">Thêm vào giỏ hàng
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                    <!-- <button type="button" class="btn-buy" onclick="value_show()"> Mua ngay
                        <span><i class="fas fa-plus"></i></span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</main>

<input type="hidden" value="<?php echo $MSHH?>" id="MSHH">


<script type="text/javascript">
    //Choose size
    const sizes = document.querySelectorAll('.size-total');
    function changeSize(){
        sizes.forEach(size => size.classList.remove('active'));
        this.classList.add('active');
    }   
    sizes.forEach(size => size.addEventListener('click', changeSize));
    window.addEventListener('resize', changeHeight);

    //add product's amount:
    var timeout;
    function mouseDown_inc(max){
        value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
        if(value + 1 >= max){
            document.getElementById('input-amount').value = max;
        }else{
            document.getElementById('input-amount').value = value + 1;  
        }
        timeout = setTimeout(function() { mouseDown_inc(); }, 150);
    }

    function mouseDown_dec(){
        value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
        if(value - 1 <=0){
            document.getElementById('input-amount').value = '1';
        }else{
            document.getElementById('input-amount').value = value - 1;
        }
        timeout = setTimeout(function() { mouseDown_dec(); }, 150);
    }

    function mouseUp() { clearTimeout(timeout); }

    function mouseLeave() { clearTimeout(timeout); } 

    
    //lay thong tin hang hoa
    function value_show(){
        MSHH = document.getElementById('MSHH').value;
        count_value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
        size = document.querySelector(".active").innerHTML;
        GiaDatHang = document.querySelector(".price-title").innerHTML;
        GiamGia = document.querySelector(".sale").innerHTML;
        TongTien = document.querySelector(".price-title-sale").innerHTML;


        alert("MSHH: "+MSHH +
            "so luong: "+count_value +
            "size: " + size + 
            "Gia dat hang: "+GiaDatHang +
            "Giam gia "+GiamGia +
            "TongTien: "+TongTien);

        $.get("./modules_client/product/shop_now.php", {'MSHH': MSHH}, function(data){ alert(data);});

        // $.ajax({
        //     type: "POST",
        //     url: './modules_client/product/shop_now.php',
        //     data: "userID=" + MSHH,
        //     success: function(data){
        //         alert("success!");
        //     }
        // });
    }

    
    
</script>


