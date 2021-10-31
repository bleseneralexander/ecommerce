<?php
    include './modules_admin/config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];  
    }
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=client_management">Quản Lý Khách Hàng</a> /
                <a href="">Chi Tiết Khách Hàng</a>
            </div>
            <div class="card-header">
            <h2><?php 
                $sql_get_nameKH="SELECT * FROM khachhang WHERE MSKH = $id;";
                $query_get_nameKH = mysqli_query($conn, $sql_get_nameKH);
                $rows_get_nameKH = mysqli_fetch_array($query_get_nameKH);
                echo $rows_get_nameKH["HoTenKH"] ?></h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Tên hàng</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Size</th>
                            <th scope="col">Giá gốc</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Ngày giao hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Nhân viên phụ trách</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $count_client=0;
                                $sql="SELECT d.SoDonDH, d.NgayDH, d.NgayGH, d.TrangThaiDH, c.SoLuong, c.GiaDatHang, c.GiamGia, c.TongTien, c.Size, h.TenHH, n.HoTenNV, img.TenHinh
                                    FROM dathang d JOIN chitietdathang c ON c.SoDonDH=d.SoDonDH
                                                    JOIN hanghoa h ON c.MSHH=h.MSHH
                                                    JOIN nhanvien n ON d.MSNV=n.MSNV
                                                    JOIN hinhhanghoa img ON h.MSHH=img.MSHH
                                                WHERE d.MSKH = $id;";
                        
                                $query_info_order = mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($query_info_order)){ ?>
                                <tr>
                                    <?php ++$count_client ?>
                                    <th scope="row"><?php echo $rows["SoDonDH"] ?></th>
                                    <td><?php echo $rows["TenHH"] ?></td>
                                    <td><img src="./photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 50%"></td>
                                    <td><?php echo $rows["SoLuong"] ?></td>
                                    <td><?php echo $rows["Size"] ?></td>
                                    <td><?php echo $rows["GiaDatHang"] ?></td>
                                    <td><?php echo $rows["GiamGia"] ?></td>
                                    <td><?php echo $rows["TongTien"] ?></td>
                                    <td><?php echo $rows["NgayDH"] ?></td>
                                    <td><?php echo $rows["NgayGH"] ?></td>
                                    <td id="status_color">
                                        <?php 
                                            echo $rows["TrangThaiDH"];
                                            // onclick="changeColor($rows["TrangThaiDH"])";
                                        ?>
                                    </td>
                                    <td><?php echo $rows["HoTenNV"] ?></td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <p><b><?php echo 'Số lượng hàng hóa đã mua: '. $count_client ?></b></p>
                <!-- <button onclick="changeColor()">abc</button> -->
            </div>
        </div>
    </div>
</main>


<!-- Thay đổi màu trạng thái đơn hàng -> chưa làm được  -->
<!-- <script>
    function changeColor(){
        var status_color_status = document.getElementById("status_color").innerHTML;
        alert(status_color_status);
        // document.getElementById("status_color").style.color = 'red';
        
        // if(status_color_status == "Chưa duyệt")
        //     alert("ok");
        // }
    }
</script> -->