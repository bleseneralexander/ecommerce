<?php
	// if(isset($_GET['ac']) && $_GET['ac']=='logout'){
	// 	unset($_SESSION['login']);
	// 	//khác session_destroy() vì session_destroy() bỏ tất cả session còn unset chỉ bỏ 1 session đã chọn
	// 	header('location: ./../index.php');
	// }
?>

<header>
    <a href="#"><img src="./modules_client/photo/logo.png" class="logo"></a>
    <div class="toggle" onclick="toggleMenu();"></div>
    <ul class="navigation">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Đăng xuất</a></li>
        <li><a href="#"><i class="bi bi-bag-plus-fill" style="color:#333; font-size: 130%;" ></i></a></li>
    </ul>
</header>