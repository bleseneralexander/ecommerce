<?php
  if(isset($_GET['logout']) && $_GET['logout']=='logoutclient'){
    unset($_SESSION['login']);
    header('location:index.php');
  }
?>

<header>
    <a href="#"><img src="./modules_client/photo/logo.png" class="logo"></a>
    <div class="toggle" onclick="toggleMenu();"></div>
    <ul class="navigation">
        <li><a href="#">Trang chủ</a></li>
        <li><a href="./modules_client/product/product.php">Sản phẩm</a></li>
        <li><a href="#footer">Liên hệ</a></li>
        <li><a class="modal-btn" style="cursor: pointer;"><?php echo $_SESSION['login']; ?></a></li>
        <li><a href="#"><i class="bi bi-bag-plus-fill" style="color:#333; font-size: 130%;" ></i></a></li>
    </ul>
</header>


<div class="modal-bg" style="z-index: 10; cursor: pointer;">
  <div class="modal">
    <h2>subscribe</h2>
    <label>Name: </label>
    <label><?php echo $_SESSION['login']; ?></label>
    <span class="modal-close">X</spsan>
    <a href="./index.php?logout=logoutclient">Đăng xuất</a>
  </div>
</div>

<script type="text/javascript">
  var modalBtn = document.querySelector('.modal-btn'); //sua ten
  var modalBg = document.querySelector('.modal-bg');
  var modalClose = document.querySelector('.modal-close');

  modalBtn.addEventListener('click', function(){
    modalBg.classList.add('bg-active');
  });
  
  modalClose.addEventListener('click', function(){
    modalBg.classList.remove('bg-active');
  });
</script>