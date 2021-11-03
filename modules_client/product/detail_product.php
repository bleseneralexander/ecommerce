<?php
    include './admin/modules_admin/config.php';
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];

        $sql = "SELECT h.TenHH, h.MoTa, h.Gia, h.GiamGia, img.TenHinh, l.TenLoaiHang, s.MaSize, s.SoLuongHang 
                    FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH 
                    JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang 
                    JOIN size s ON h.MSHH=s.MSHH
                    WHERE h.MSHH=$MSHH AND s.SoLuongHang>0
                    ORDER BY h.MSHH ASC";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);
    }
?>

<?php
    if(!isset($_SESSION['login'])){
        header('location: ./modules_client/header/loginForm.php');
    }
?>

<input type="hidden" value="<?php echo $MSHH?>" id="MSHH">
<input type="hidden" value="<?php echo $_SESSION['login']?>" id="username_client">

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
                        <span class="size-total"><?php echo $rows_size['MaSize'] ?></span>
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
                        <span onmousedown="mouseDown_inc()" onmouseup="mouseUp()" onmouseleave="mouseLeave()" class="btn-adjust-amount">+</span>
                    </div>
                    <p id="txtHint">Có <span id="txtAmount"></span> sản phẩm</p>
                </div>
            </div>

            <!-- PRICE -->
            <div class="price-footer">
                <div class="price">
                    <p class="sale">Giảm <span id="sale"><?php echo $rows['GiamGia']*100 ?></span>%</p>
                    <p class="price-title"><span id="price-title"><?php echo $rows['Gia'] ?></span>₫</p>
                    <p class="price-title-sale"><span id="price-title-sale"><?php echo $GiamGia=$rows["Gia"]-($rows["Gia"]*$rows["GiamGia"]) ?></span>₫</p>
                </div>

                <div class="product-button">
                    <input type="hidden" value="abc" id="check_size"> <!-- Kiểm tra xem đã bấm chọn size chưa -->
                    <button type="button" class="btn-cart" onclick="add_cart()" >Thêm vào giỏ hàng
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                    <button type="button" class="btn-buy" onclick="buy_now()"> Mua ngay
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript">
    //Choose size
    const sizes = document.querySelectorAll('.size-total');
    const hint = document.getElementById('txtHint');

    function changeSize(){
        sizes.forEach(size => size.classList.remove('active'));
        this.classList.add('active');

        //show hint: số lượng sản phẩm theo size
        hint.classList.add('active');
        showAmountOfSize();
    }
    sizes.forEach(size => size.addEventListener('click', changeSize));
    // window.addEventListener('resize', changeHeight);

    //show so luong sau khi bam size
    var response_amount;
    function showAmountOfSize() {
        size = document.querySelector(".active").innerHTML;
        // alert("size: " + size);

        //call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "./modules_client/product/showAmount.php?size="+size+"&MSHH="+<?php echo $MSHH?>;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();

        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                response_amount = this.responseText;
                document.getElementById("txtAmount").innerHTML = response_amount; 
                document.getElementById("check_size").value = response_amount;
            }
        }
        return false;
    }

    //add product's amount:
    var timeout;
    function mouseDown_inc(){
        max = response_amount; //Gia tri so luong lon nhat trong counter = so luong hang hoa theo size
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

    //Them hang hoa vao gio hang nhung ko chuyen trang
    function add_cart(){
        var x = document.getElementById("check_size").value;
        
        //===Kiểm tra chọn size===
        if(x == 'abc'){
            alert('Vui lòng chọn size');
        } else {
            username_client = document.getElementById('username_client').value;
            MSHH = document.getElementById('MSHH').value;
            count_value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
            size = document.querySelector(".active").innerHTML;
            GiaDatHang = document.getElementById("price-title").innerHTML;
            GiamGia = document.getElementById("sale").innerHTML;
            GiaSauGiam = document.getElementById("price-title-sale").innerHTML;

            //call ajax
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "./modules_client/product/add_cart.php?username="+username_client+"&MSHH="+MSHH+"&SoLuong="+count_value+"&size="+size+"&GiaDatHang="+GiaDatHang+"&GiamGia="+GiamGia+"&GiaSauGiam="+GiaSauGiam;
            var asynchronous = true;
            ajax.open(method, url, asynchronous);

            //send
            ajax.send();
            
            //receive
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var response = this.responseText;
                    alert(response);
                    // window.location.href='./index.php?page_layout=cart';
                }
            }
        }
    }

    //Them hang hoa vao gio hang vao chuyen trang sang trang gio hang
    function buy_now(){
        var x = document.getElementById("check_size").value;

        //===Kiểm tra chọn size===
        if(x == 'abc'){
            alert('Vui lòng chọn size');
        } else {
            username_client = document.getElementById('username_client').value;
            MSHH = document.getElementById('MSHH').value;
            count_value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
            size = document.querySelector(".active").innerHTML;
            GiaDatHang = document.getElementById("price-title").innerHTML;
            GiamGia = document.getElementById("sale").innerHTML;
            GiaSauGiam = document.getElementById("price-title-sale").innerHTML;

            // alert(username_client+MSHH+count_value+size+GiaDatHang+GiamGia+GiaSauGiam);

            //call ajax
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "./modules_client/product/buy_now.php?username="+username_client+"&MSHH="+MSHH+"&SoLuong="+count_value+"&size="+size+"&GiaDatHang="+GiaDatHang+"&GiamGia="+GiamGia+"&GiaSauGiam="+GiaSauGiam;
            var asynchronous = true;
            ajax.open(method, url, asynchronous);

            //send
            ajax.send();
            
            //receive
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    // var response = this.responseText;
                    // alert(response);
                    window.location.href='./index.php?page_layout=cart';
                }
            }
        }        
    }

</script>


