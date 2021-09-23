<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <!-- <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" 
      integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" 
      crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="./../style/dashboard.css" /> -->
  </head>
  <body id="body">
    <div class="container">
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
          <a href="#">
            <img width="30" src="./photo/avatar.png" alt="" />
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->
          <?php
            include './modules_admin/config.php';
            $username = $_SESSION['login_admin'];
            $sql = "SELECT HoTenNV FROM nhanvien WHERE ChucVu='Quản Lý' AND UserName='$username'";
            $query = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($query);
          ?>

          <div class="main__title">
            <!-- <img src="./photo/logo.jpg" alt="" /> -->
            <div class="main__greeting">
              <h1>Dashboard</h1>
              <p>Xin chào <?php echo $rows['HoTenNV']?></p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Tổng số khách hàng</p>
                <span class="font-bold text-title">578</span>
              </div>
            </div>

            <div class="card">
              <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Số lượng sản phẩm</p>
                <span class="font-bold text-title">2467</span>
              </div>
            </div>

            <div class="card">
              <i
                class="fa fa-video-camera fa-2x text-yellow"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Số đơn trong tháng</p>
                <span class="font-bold text-title">340</span>
              </div>
            </div>

            <div class="card">
              <i
                class="fa fa-thumbs-up fa-2x text-green"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Lợi thuận trong tháng</p>
                <span class="font-bold text-title">645</span>
              </div>
            </div>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Báo cáo năm</h1>
                  <p>Ninh Kiều, Cần Thơ</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports</h1>
                  <p>Cupertino, California, USA</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>Income</h1>
                  <p>$75,300</p>
                </div>

                <div class="card2">
                  <h1>Sales</h1>
                  <p>$124,200</p>
                </div>

                <div class="card3">
                  <h1>Users</h1>
                  <p>3900</p>
                </div>

                <div class="card4">
                  <h1>Orders</h1>
                  <p>1881</p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="./photo/logo.jpg" alt="logo"/>
            <h1>Westside Sneaker Store</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
          </div>
          <h2>QUẢN LÝ</h2>
          <div class="sidebar__link">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <a href="#">Quản Lý Admin</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="./modules_admin/client_management/client.php">Quản Lý Khách Hàng</a>
          </div>
          <div class="sidebar__link">
            <!-- <i class="fas fa-user-alt"></i> -->
            <i class="fa fa-wrench"></i>
            <a href="./modules_admin/staff_management/staff.php">Quản Lý Nhân Viên</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-archive"></i>
            <a href="#">Quản Lý Hàng Hóa</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-handshake-o"></i>
            <a href="#">Quản Lý Đơn Hàng</a>
          </div>
          <!-- <h2>LEAVE</h2>
          <div class="sidebar__link">
            <i class="fa fa-question"></i>
            <a href="#">Requests</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-sign-out"></i>
            <a href="#">Leave Policy</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="#">Special Days</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-files-o"></i>
            <a href="#">Apply for leave</a>
          </div>
          <h2>PAYROLL</h2>
          <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="#">Payroll</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-briefcase"></i>
            <a href="#">Paygrade</a>
          </div> -->

        <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="index.php?logout=logout_admin">Đăng Xuất</a>
          </div>
        </div>

        <?php
            
            if(isset($_GET['logout']) && $_GET['logout']=='logout_admin'){
                unset($_SESSION['login_admin']);
                //khác session_destroy() vì session_destroy() bỏ tất cả session còn unset chỉ bỏ 1 session đã chọn
                header('location: ./login.php');
            }
        ?>

      </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="dashboard.js"></script> -->
  </body>
</html>