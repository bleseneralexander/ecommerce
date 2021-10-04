<nav class="navbar">
  <div class="nav_icon" onclick="toggleSidebar()">
    <i class="fa fa-bars" aria-hidden="true"></i>
  </div>
  <div class="navbar__left">
    <!-- <a href="#">Subscribers</a>
    <a href="#">Video Management</a> -->
    <a class="active_link" href="#">Admin</a>
  </div>
  <div class="navbar__right">
    <a href="#">
      <i class="fa fa-search" aria-hidden="true"></i>
    </a>
    <a href="#">
      <i class="fa fa-clock-o" aria-hidden="true"></i>
    </a>
    <!-- <a class="modal-btn" href="#">
      <i class="fa fa-user-circle-o" aria-hidden="true"></i>
    </a> -->
    <button class="modal-btn">Modal</button>
  </div>
</nav>


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