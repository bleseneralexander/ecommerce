<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách hàng hóa</h2>
        </div>
        <div class="card-body">
        <a class="btn btn-primary" href="./staff_management/staff.php?page_staff=add">Nhập hàng</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSHH</th>
                        <th>Tên hàng</th>
                        <th>Quy cách</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Loại hàng</th>
                        <th>Hình ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT * FROM hanghoa h JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang JOIN hinhhanghoa img ON h.MSHH=img.MSHH";
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MSHH"] ?></td>
                                <td><?php echo $rows["TenHH"] ?></td>
                                <td><?php echo $rows["QuyCach"] ?></td>
                                <td><?php echo $rows["Gia"] ?></td>
                                <td><?php echo $rows["SoLuongHang"] ?></td>
                                <td><?php echo $rows["TenLoaiHang"] ?></td>
                                <td> <img src="./../photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 20%"> </td>
                                <td>
                                    <a href="./staff_management/staff.php?page_staff=modify&id= <?php echo $rows["MSNV"] ?>">
                                        Sửa
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm_Del('<?php echo $rows['HoTenNV'] ?>')" 
                                       href="./product_management/product.php?page_product=delete&id= <?php echo $rows["MSHH"] ?>">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa mặt hàng "+ name + "?");
    }
</script>