<?php
    include './../config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql_get_nameKH="SELECT k.HoTenKH, k.SoDienThoai, k.SoFax, a.DiaChi, d.NgayDH, d.NgayGH, d.TrangThaiDH
                FROM  khachhang k JOIN dathang d ON d.MSKH=k.MSKH
                    JOIN diachikh a ON a.MSKH=k.MSKH
                WHERE d.SoDonDH=$id";
    }
?>

<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <?php
                $query_get_nameKH = mysqli_query($conn, $sql_get_nameKH);
                $rows_get_nameKH = mysqli_fetch_array($query_get_nameKH);
            ?>
            <h2><?php echo $rows_get_nameKH["HoTenKH"] ?></h2>
            <p>Số điện thoại: <?php echo $rows_get_nameKH["SoDienThoai"] ?></p>
            <p>Fax: <?php echo $rows_get_nameKH["SoFax"] ?></p>
            <p>Địa chỉ: <?php echo $rows_get_nameKH["DiaChi"] ?></p>
        </div>
        <div class="card">
            <table class="table table-striped table-hover">
                <tbody>
                    <tr>
                        <tr>
                            <th scope="row">Mã đơn hàng</th>
                            <td><?php echo $id ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ngày đặt</th>
                            <td><?php echo $rows_get_nameKH["NgayDH"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ngày giao</th>
                            <td><?php echo $rows_get_nameKH["NgayGH"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Trạng thái</th>
                            <td><?php echo $rows_get_nameKH["TrangThaiDH"] ?></td>
                        </tr>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Giảm giá</th>
                        <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $sql="SELECT h.TenHH, img.TenHinh, c.SoLuong, h.Gia, c.GiamGia, c.GiaDatHang
                                        FROM hanghoa h JOIN hinhhanghoa img ON img.MSHH=h.MSHH
                                            JOIN chitietdathang c   ON c.MSHH=h.MSHH
                                        WHERE c.SoDonDH=$id";
                
                                $query_info_order = mysqli_query($conn, $sql);
                                $STT=0;
                                while($rows = mysqli_fetch_array($query_info_order)){ ?>
                                <tr>
                                    <th scope="row"><?php echo ++$STT ?></th>
                                    <td><?php echo $rows["TenHH"] ?></td>
                                    <td><img src="./../../photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 20%"></td>
                                    <td><?php echo $rows["SoLuong"] ?></td>
                                    <td><?php echo $rows["Gia"] ?></td>
                                    <td><?php echo $rows["GiamGia"] ?></td>
                                    <td><?php echo $rows["GiaDatHang"] ?></td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <h5>Tổng tiền: 
                    <?php
                        $sql_sumPrice="SELECT SUM(GiaDatHang) AS sum FROM chitietdathang WHERE SoDonDH=$id";
                        $query_sumPrice = mysqli_query($conn, $sql_sumPrice);
                        $rows_sumPrice = mysqli_fetch_array($query_sumPrice);
                        echo $rows_sumPrice["sum"];
                        ?>₫
                </h5>
            </div>      
        </div>
        <br/>
        <div class="card">
            <?php
                $sql = "SELECT TrangThaiDH FROM dathang WHERE SoDonDH=$id";
                $query = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_array($query);
                $options = $rows['TrangThaiDH'];
            ?>
            <h4>Cập nhật tình trạng đơn hàng</h4>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="TenLoaiHang_modify">
                <option <?php if($options=="Chưa duyệt") echo 'selected="selected"';  ?> value="Chưa duyệt" >Chưa duyệt</option>
                <option <?php if($options=="Đã duyệt") echo 'selected="selected"';  ?> value="Đã duyệt">Đã duyệt</option>
                <option <?php if($options=="Đã giao") echo 'selected="selected"';  ?> value="Đã giao">Đã giao</option>
                <option <?php if($options=="Đã hủy") echo 'selected="selected"';  ?> value="Đã hủy">Đã hủy</option>
            </select>
            <br/>
            <a 
                href="./order_management/order.php?page_order=viewDetail&id= <?php echo $rows['SoDonDH'] ?>"
                style="background-color: green;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                    Xác nhận
             </a>
        </div>
    </div>
</div>