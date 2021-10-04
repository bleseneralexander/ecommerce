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
                <h5 class="name-shoe">GIÀY BÓNG ĐÁ PREDATOR FREAK.3 FIRM GROUND</h5>
                <p class="description-shoe">Đôi giày bóng đá nâng đỡ giúp bạn làm chủ thế trận trên sân cỏ tự nhiên.</p>
                <p class="price-shoe">2.400.000₫</p>
                <a href="#">Xem thêm</a>
            </div>
            <div class="imgBox">
                <img src="./modules_client/photo/poster_img1.png" class="starbucks">
            </div>
        </div>
        <ul class="thumb">
            <li><img src="./modules_client/photo/thumbnail_img1.png" 
                onclick="imgSlider('./modules_client/photo/poster_img1.png'); 
                        changeColor('#9c9c9c'); 
                        changeContent('GIÀY BÓNG ĐÁ PREDATOR FREAK.3 FIRM GROUND', 'Đôi giày bóng đá nâng đỡ giúp bạn làm chủ thế trận trên sân cỏ tự nhiên.', '2.400.000₫') ">
            </li>
            <li><img src="./modules_client/photo/thumbnail_img2.png" 
                onclick="imgSlider('./modules_client/photo/poster_img2.png'); 
                        changeColor('#ad4541'); 
                        changeContent('GIÀY BÓNG ĐÁ SÂN CỎ TỰ NHIÊN PREDATOR FREAK.3', 'Đôi giày bóng đá cổ thấp giúp bạn làm chủ trận đấu trên sân cỏ tự nhiên.', '1.900.000₫')">
            </li>
            <li><img src="./modules_client/photo/thumbnail_img3.png" 
                onclick="imgSlider('./modules_client/photo/poster_img3.png'); 
                        changeColor('#ded1c0'); 
                        changeContent('GIÀY ĐÁ BÓNG X GHOSTED.1 FIRM GROUND', 'Đôi giày bóng đá siêu nhẹ cho những đường bóng tốc độ ánh sáng.', '3.150.000₫')">
            </li>
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

        }

        function changeContent(name_shoe, description_shoe, price_shoe){
            const name = document.querySelector('.name-shoe');
            name.innerHTML = name_shoe;

            const description = document.querySelector('.description-shoe');
            description.innerHTML = description_shoe;

            const price = document.querySelector('.price-shoe');
            price.innerHTML = price_shoe;
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