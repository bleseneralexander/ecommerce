<?php
  include './modules_admin/config.php';
  $username = $_SESSION['login_admin'];
  $sql = "SELECT HoTenNV FROM nhanvien WHERE UserName='$username'";
  $query = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($query);
?>

<main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->
          
          <div class="main__title">
            <!-- <img src="./photo/logo.jpg" alt="" /> -->
            <div class="main__greeting">
              <h1>Dashboard</h1>
              <p>Xin chào <?php echo $rows['HoTenNV'] ?></p>
            </div>
          </div>
          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <?php
                $sql_get_KH = "SELECT COUNT(*) AS SoLuongKH FROM `khachhang` ";
                $query_get_KH = mysqli_query($conn, $sql_get_KH);
                $rows_get_KH = mysqli_fetch_array($query_get_KH);
              ?>
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Tổng số khách hàng</p>
                <span class="font-bold text-title"><?php echo $rows_get_KH['SoLuongKH'] ?></span>
              </div>
            </div>

            <div class="card">
              <?php
                $sql_get_HH = "SELECT COUNT(*) AS SoLuongHH FROM `hanghoa` ";
                $query_get_HH = mysqli_query($conn, $sql_get_HH);
                $rows_get_HH = mysqli_fetch_array($query_get_HH);
              ?>
              <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Số lượng sản phẩm</p>
                <span class="font-bold text-title"><?php echo $rows_get_HH['SoLuongHH'] ?></span>
              </div>
            </div>

            <div class="card">
              <?php
              //Lay thang hien tai
                $date = getdate();
                $month = $date['mon'];
                // echo $month;
                $sql_get_DonHang = "SELECT COUNT(*) AS SoDon FROM `dathang` WHERE TrangThaiDH='Đã giao' AND MONTH(NgayGH)='$month'";
                $query_get_DonHang = mysqli_query($conn, $sql_get_DonHang);
                $rows_get_DonHang = mysqli_fetch_array($query_get_DonHang);

              ?>
              <i
                class="fa fa-video-camera fa-2x text-yellow"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Số đơn thành công trong tháng <?php echo $month; ?></p>
                <span class="font-bold text-title"><?php echo $rows_get_DonHang['SoDon'] ?></span>
              </div>
            </div>

            <div class="card">
              <i
                class="fa fa-thumbs-up fa-2x text-green"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Lợi thuận trong tháng</p>
                <span class="font-bold text-title">#</span>
              </div>
            </div>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <?php
              //Lay tong tien don
              $sql_get_TongTien = "SELECT SUM(c.TongTien) AS TongTien
                                  FROM dathang d JOIN chitietdathang c ON d.SoDonDH=c.SoDonDH
                                  WHERE d.TrangThaiDH='Đã giao'";
              $query_get_TongTien = mysqli_query($conn, $sql_get_TongTien);
              $rows_get_TongTien = mysqli_fetch_array($query_get_TongTien);

              //Lay tong so don
              $sql_get_TongSoDon = "SELECT COUNT(*) AS SoDon FROM `dathang` WHERE TrangThaiDH='Đã giao'";
              $query_get_TongSoDon = mysqli_query($conn, $sql_get_TongSoDon);
              $rows_get_TongSoDon = mysqli_fetch_array($query_get_TongSoDon);
            ?>
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Loại hàng được mua</h1>
                  <p>Từ đầu năm 2021 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Báo cáo tài chính</h1>
                  <p>Từ đầu năm 2021 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>Tổng vốn</h1>
                  <p>$</p>
                </div>

                <div class="card2">
                  <h1>Tổng tiền đơn</h1>
                  <p><?php echo $rows_get_TongTien['TongTien'] ?> ₫</p>
                </div>

                <div class="card3">
                  <h1>Tổng Lợi nhuận</h1>
                  <p>$</p>
                </div>

                <div class="card4">
                  <h1>Tổng Số đơn</h1>
                  <p><?php echo $rows_get_TongSoDon['SoDon'] ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>

      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="./modules_admin/dashboard/dashboard.js"></script>