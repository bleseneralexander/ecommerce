<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westside Sneaker Store</title>
    <link rel="stylesheet" href="./modules_client/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" 
        integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" 
        crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="./modules_client/photo/logo.png" class="logo"></a>
            <div class="toggle" onclick="toggleMenu();"></div>
            <ul class="navigation">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Đăng nhập</a></li>
                <li><a href="#"><i class="bi bi-bag-plus-fill" style="color:#333; font-size: 130%;" ></i></a></li>
            </ul>
        </header>
        <div class="content">
            <div class="textBox">
                <h2>Cá tính thể thao<br><span>Westside</span></h2>
                <h5>GIÀY BÓNG ĐÁ PREDATOR FREAK.3 FIRM GROUND</h5>
                <p>Đôi giày bóng đá nâng đỡ giúp bạn làm chủ thế trận trên sân cỏ tự nhiên.</p>
                <p>2.400.000₫</p>
                <a href="#">Xem thêm</a>
            </div>
            <div class="imgBox">
                <img src="./modules_client/photo/poster_img1.png" class="starbucks">
            </div>
        </div>
        <ul class="thumb">
            <li><img src="./modules_client/photo/thumbnail_img1.png" onclick="imgSlider('./modules_client/photo/poster_img1.png'); changeColor('#9c9c9c')"></li>
            <li><img src="./modules_client/photo/thumbnail_img2.png" onclick="imgSlider('./modules_client/photo/poster_img2.png'); changeColor('#ad4541')"></li>
            <li><img src="./modules_client/photo/thumbnail_img3.png" onclick="imgSlider('./modules_client/photo/poster_img3.png'); changeColor('#ded1c0')"></li>
        </ul>
        <ul class="sci">
            <li><a href="#"><img src="./modules_client/photo/facebook.png"></a></li>
            <li><a href="#"><img src="./modules_client/photo/twitter.png"></a></li>
            <li><a href="#"><img src="./modules_client/photo/instagram.png"></a></li>
        </ul>
    </section>
    <section>
        <div>
            
    </section>  
    <script type="text/javascript">
        function imgSlider(anything){
            document.querySelector('.starbucks').src = anything;
        }

        function changeColor(color){
            const circle = document.querySelector('.circle');
            circle.style.background = color;

            const name = document.querySelector('.content .textBox h2 span');
            name.style.color = color;

            const button = document.querySelector('.content .textBox a');
            button.style.background = color;

            // const name_shoes = document.getElementByID
            // name_shoes.style.background = color;
        }

        function toggleMenu(){
            var menuToggle = document.querySelector('.toggle');
            var navigation = document.querySelector('.navigation');
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>
</body>
</html>