<?php
    include './admin/modules_admin/config.php';
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        // echo 'username'.$username;

        $sql = "SELECT `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax` FROM `khachhang` WHERE UserName='$username'";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($query);
        // echo $rows['HoTenKH'];
    }
?>

<div class="form-profile">
  <form action="./modules_client/profile/modify_profile.php" class="sign-in-form" method="POST">
    <h2 class="title">Hồ Sơ Của Tôi</h2>
      <input type="hidden" name="username" value="<?php echo $username?>"/>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" name="name_client" placeholder="Họ và tên" value="<?php echo $rows['HoTenKH'] ?>" required/>
      </div>
      <div class="input-field">
        <i class="fas fa-building"></i>
        <input type="text" name="nameCompany_client" placeholder="Tên công ty" value="<?php echo $rows['TenCongTy'] ?>"/>
      </div>
      <div class="input-field">
        <i class="fas fa-phone"></i>
        <input type="text" name="phoneNumber_client" placeholder="Số điện thoại" value="<?php echo $rows['SoDienThoai'] ?>" required/>
      </div>
      <div class="input-field">
          <i class="fas fa-fax"></i>
          <input type="text" name="fax_client" placeholder="Số fax" value="<?php echo $rows['SoFax'] ?>"/>
      </div>
      <input type="submit" value="Lưu" class="btn solid" name="btn_modify_profile" />
  </form>
</div>

<div class="form-profile">
  <?php
    $sql_get_diachi = "SELECT dia.DiaChi, dia.MaDC FROM diachikh dia JOIN khachhang k ON dia.MSKH=k.MSKH WHERE k.UserName='$username'";
    $query_get_diachi = mysqli_query($conn, $sql_get_diachi);
  ?>
  <form action="" class="sign-in-form" method="POST">
      <h2 class="title">Địa Chỉ</h2>
      <input type="hidden" name="username" value="<?php echo $username?>"/>
      <?php while($rows_get_diachi = mysqli_fetch_array($query_get_diachi)){ ?>
      <div class="input-container">
        <div class="input-field">
          <i class="fas fa-map-marker-alt"></i>
          <input type="text" placeholder="Địa chỉ" value="<?php echo $rows_get_diachi['DiaChi'] ?>" disabled/>
        </div>
        <div class="delete-area"><a href="./modules_client/profile/delete_address.php?id_address=<?php echo $rows_get_diachi['MaDC']?>&username=<?php echo $username?>">Xóa</a></div>
      </div>
      <?php } ?>
      <input type="button" value="Thêm địa chỉ mới" class="btn solid modal" id="modal-address" name="btn_modify_profile" />
    </form>
</div>

<div class="form-profile">
  <form class="sign-in-form">
    <h2 class="title">Đổi Mật Khẩu</h2>
    <input type="hidden" id="username" value="<?php echo $username?>"/>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input type="password" id="password_old" placeholder="Mật khẩu cũ" required/>
    </div>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input type="password" id="password_new" placeholder="Mật khẩu mới" required/>
    </div>
    <div class="input-field">
      <i class="fas fa-lock"></i>
      <input type="password" id="passwordAgain_new" placeholder="Nhập lại mật khẩu mới" required/>
    </div>
    <input type="button" value="Lưu" class="btn solid" name="btn_modify_password" onclick="check()"/>
  </form>
</div>
<script type="text/javascript" src='./modules_client/profile/profile_script.js'></script>


<div class="modal-bg-address" style="z-index: 10">
  <div class="modal-address">
    <label><b>Thêm địa chỉ</b></label>
    <form action="./modules_client/profile/add_address.php" class="sign-in-form" method="GET">
      <input type="hidden" name="username" value="<?php echo $username?>"/>
      <div class="input-field">
        <i class="fas fa-map-marker-alt"></i>
        <input type="text" name="address_txt" placeholder="Địa chỉ" required/>
      </div>
      <input type="submit" value="Thêm địa chỉ" class="btn solid modal" name="btn_add_address" />
    </form>
    <span class="modal-close-address">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn_address = document.getElementById('modal-address'); //sua ten
  var modalBg_address = document.querySelector('.modal-bg-address');
  var modalClose_address = document.querySelector('.modal-close-address');

  modalBtn_address.addEventListener('click', function(){
    modalBg_address.classList.add('bg-active-address');
  });
  
  modalClose_address.addEventListener('click', function(){
    modalBg_address.classList.remove('bg-active-address');
  });
</script>