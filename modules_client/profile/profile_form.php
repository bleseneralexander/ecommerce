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
        <form action="./modules_client/profile/modify_profile.php" class="sign-in-form" method="POST">
            <h2 class="title">Địa Chỉ</h2>
            <input type="hidden" name="username" value="<?php echo $username?>"/>
            <div class="input-field">
              <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="name_client" placeholder="Họ và tên" value="<?php echo $rows['HoTenKH'] ?>" required/>
            </div>
            
            <input type="submit" value="Lưu" class="btn solid" name="btn_modify_profile" />
        </form>
    </div>

    <div class="form-profile">
      <?php
        $sql_get_password = "SELECT `password` FROM `khachhang` WHERE UserName='$username'";
        $query_get_password = mysqli_query($conn, $sql_get_password);
        $rows_get_password = mysqli_fetch_array($query_get_password);
      ?>
        <form action="" class="sign-in-form" method="POST">
            <h2 class="title">Đổi Mật Khẩu</h2>
            <input type="hidden" name="username" value="<?php echo $username?>"/>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password_old" id="password_old" placeholder="Mật khẩu cũ" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password_new" id="password_new" placeholder="Mật khẩu mới" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="passwordAgain_new" id="passwordAgain_new" placeholder="Nhập lại mật khẩu mới" required/>
          </div>
            <input type="submit" value="Lưu" class="btn solid" name="btn_modify_profile" onmousedown="check()"/>
        </form>
    </div>

    <script type="text/javascript" src='profile_script.js'></script>