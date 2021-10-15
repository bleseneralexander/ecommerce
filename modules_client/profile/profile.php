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


<div class="profile-background">
    <div class="option-profile">
        <div class="component-option"><a href="#">Hồ sơ</a></div>
        <div class="component-option"><a href="#">Địa chỉ</a></div>
        <div class="component-option"><a href="#">Đổi mật khẩu</a></div>
    </div>
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
          <!-- <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username_client" placeholder="Tên đăng nhập" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password_client" id="password_client" placeholder="Mật khẩu" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="passwordAgain_client" id="passwordAgain_client" placeholder="Nhập lại mật khẩu" required/>
          </div> -->
            <input type="submit" value="Lưu" class="btn solid" name="btn_modify_profile" />
        </form>
    </div>
</div>