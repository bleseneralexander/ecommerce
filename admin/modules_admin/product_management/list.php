<!-- Chung cấp với file config.php -->
<?php
    include './modules_admin/config.php';           
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="card-header">
                <h2>Danh sách hàng hóa</h2>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_product_Modal">
                    Nhập hàng
                </button>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>MSHH</th>
                            <th>Tên hàng</th>
                            <th>Mô tả</th>
                            <th>Quy cách</th>
                            <th>Giá</th>
                            <th>Giảm giá</th>
                            <th>Tổng số lượng</th>
                            <th>Loại hàng</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Sửa thông tin</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                $sql = "SELECT h.MSHH, h.TenHH, h.MoTa, h.QuyCach, h.Gia, h.GiamGia, img.TenHinh, l.TenLoaiHang
                                        FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH 
                                                        JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang
                                        ORDER BY h.MSHH ASC ";
                                $query = mysqli_query($conn, $sql);
                                $count_hanghoa=0;

                                while($rows= mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <?php $count_hanghoa++ ?>
                                    <td><?php echo $rows["MSHH"] ?></td>
                                    <td><?php echo $rows["TenHH"] ?></td>
                                    <td><?php echo $rows["MoTa"] ?></td>
                                    <td><?php echo $rows["QuyCach"] ?></td>
                                    <td><?php echo $rows["Gia"] ?></td>
                                    <td><?php echo $rows["GiamGia"] ?></td>
                                    <td>
                                        <a href="./product_management/product.php?page_product=quantity&id= <?php echo $rows['MSHH']?>"
                                            title="Xem chi tiết số lượng từng size"
                                            style="color: blue;text-align: center;text-decoration: none;">
                                            <?php
                                                //Lay tong so luong hang hoa theo MSHH
                                                $MSHH = $rows['MSHH'];
                                                $sql_get_SoLuongHH = "SELECT SUM(SoLuongHang) AS SoLuongHang FROM `size` WHERE MSHH='$MSHH'";
                                                $query_get_SoLuongHH = mysqli_query($conn, $sql_get_SoLuongHH);
                                                $rows_get_SoLuongHH = mysqli_fetch_array($query_get_SoLuongHH);
                                                echo $rows_get_SoLuongHH['SoLuongHang'];
                                            ?>
                                        </a>
                                    </td>
                                    <td><?php echo $rows["TenLoaiHang"] ?></td>
                                    <td> <img src="./../photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 40%"> </td>
                                    <td>
                                        <?php
                                            if($rows_get_SoLuongHH['SoLuongHang']>0)
                                            echo 'Còn hàng';
                                            else  echo 'Hết hàng';
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning modifybtn">Sửa</button>
                                    </td>
                                    <td>
                                        <a onclick="return confirm_Del('<?php echo $rows['TenHH'] ?>')" 
                                        href="./product_management/product.php?page_product=delete&id= <?php echo $rows['MSHH'] ?>"
                                        style="background-color: red;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <p><b><?php echo 'Số lượng hàng hóa: '. $count_hanghoa ?></b></p>
            </div>
        </div>
    </div>
</main>

<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa mặt hàng "+ name + "?");
    }
</script>


