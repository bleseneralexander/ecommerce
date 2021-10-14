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
        <li><a href="#">Sản phẩm</a></li>
        <li><a href="#footer">Liên hệ</a></li>
        <li><a href="#"><?php echo $_SESSION['login']; ?></a></li>
        <li><a href="./index.php?logout=logoutclient">Đăng xuất</a></li>
        <!-- <li class="modal-btn">Của bạn</li> -->
        <li><a href="#"><i class="bi bi-bag-plus-fill" style="color:#333; font-size: 130%;" ></i></a></li>
    </ul>
</header>


<div class="modal-bg">
  <div class="modal">
    <h2>subscribe</h2>
    <label>Name: </label>
    <input type="text">
    <span class="modal-close">X</spsan>
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