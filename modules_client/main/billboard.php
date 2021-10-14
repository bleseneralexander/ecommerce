<section>
    <div class="circle"></div>
        
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
        <li><a href="https://www.facebook.com/westsidesneakerstore"><img src="./modules_client/photo/facebook.png"></a></li>
        <li><a href="#"><img src="./modules_client/photo/twitter.png"></a></li>
        <li><a href="#"><img src="./modules_client/photo/instagram.png"></a></li>
    </ul>
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