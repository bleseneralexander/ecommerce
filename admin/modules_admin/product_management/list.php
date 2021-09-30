<!-- Chung cấp với file config.php -->
<?php
    include './config.php';           
?>

<div class="container-fluid">
    <div class="card">
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
                        <th>Quy cách</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Loại hàng</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Thêm hàng</th>
                        <th>Sửa thông tin</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa img ON h.MSHH=img.MSHH JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang ORDER BY h.MSHH ASC ";
                            $query = mysqli_query($conn, $sql);  
                            $count_hanghoa=0;
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <?php $count_hanghoa++ ?>
                                <td><?php echo $rows["MSHH"] ?></td>
                                <td><?php echo $rows["TenHH"] ?></td>
                                <td><?php echo $rows["QuyCach"] ?></td>
                                <td><?php echo $rows["Gia"] ?></td>
                                <td><?php echo $rows["SoLuongHang"] ?></td>
                                <td><?php echo $rows["TenLoaiHang"] ?></td>
                                <td> <img src="./../photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 20%"> </td>
                                <td><?php 
                                        if($rows["SoLuongHang"]>0)
                                           echo 'Còn hàng';
                                        else  echo 'Hết hàng';?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn_availableProduct">Thêm</button>
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
<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa mặt hàng "+ name + "?");
    }
</script>


<!-- ######################################################### Modal Nhập hàng ######################################################### -->

<div class="modal fade" id="add_product_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN HÀNG HÓA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./product_management/add.php" enctype="multipart/form-data" method="POST"> 
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tên hàng</label>
                    <input type="text" class="form-control" name="TenHH" require>
                        <div class="form-text">Tên hàng phải in hoa.</div>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select class="form-control" name="TenLoaiHang">
                        <option selected>Chọn loại</option>
                        <option value="1">Giày</option>    
                        <option value="2">Áo</option>
                        <option value="3">Tất</option>
                        <option value="4">Bóng</option>
                        <option value="5">Quần</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quy cách</label>
                    <select class="form-control" name="QuyCach">
                        <option selected>Chọn quy cách</option>
                        <option value="Đôi">Đôi</option>
                        <option value="Chiếc">Chiếc</option>
                        <option value="Quả">Quả</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Giá</label>
                    <input type="number" class="form-control" name="Gia" min="1000" require>
                </div>
                <div>
                    <label class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="SoLuong" min="0" require>
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label><br />
                    <input type="file" name="TenAnh" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btn_submit">Xác nhận</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- ####################################################### Modal Thêm hàng có sẵn ######################################################### -->

<div class="modal fade" id="editmodal_availableProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN HÀNG HÓA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./product_management/add_availableProduct.php" method="POST"> 
            <div class="modal-body">
                <input type="hidden" name="MSHH_availableProduct" id="MSHH_availableProduct">
                <div class="mb-3">
                    <label class="form-label">Tên</label>
                    <input type="text" class="form-control" id="TenHH" name="TenHH_availableProduct">
                </div>
                <div>
                    <label class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="SoLuong_availableProduct" min="0" require>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btn_add_availableProduct">Xác nhận</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- ######################################################### Modal Sua thong tin hàng ######################################################### -->

<div class="modal fade" id="modify_product_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CHỈNH SỬA THÔNG TIN HÀNG HÓA</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./product_management/modify.php" enctype="multipart/form-data" method="POST"> 
            <div class="modal-body">
                <input type="hidden" name="MSHH_modify" id="MSHH_modify">
                <div class="mb-3">
                    <label class="form-label">Tên hàng</label>
                    <input type="text" class="form-control" name="TenHH_modify" id="TenHH_modify" require>
                        <div class="form-text">Tên hàng phải in hoa.</div>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select class="form-control" name="TenLoaiHang_modify" id="TenLoaiHang_modify">
                        <option selected>Chọn loại</option>
                        <option value="Giày">Giày</option>    
                        <option value="Áo">Áo</option>
                        <option value="Tất">Tất</option>
                        <option value="Bóng">Bóng</option>
                        <option value="Quần">Quần</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quy cách</label>
                    <select class="form-control" name="QuyCach_modify" id="QuyCach_modify">
                        <option selected>Chọn quy cách</option>
                        <option value="Đôi">Đôi</option>
                        <option value="Chiếc">Chiếc</option>
                        <option value="Quả">Quả</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Giá</label>
                    <input type="number" class="form-control" name="Gia_modify" id="Gia_modify" min="1000" require>
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label><br />
                    <input type="file" name="TenAnh_modify" id="TenAnh_modify">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btn_modify">Xác nhận</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<!-- NHẬP THÊM HÀNG CÓ SẴN -->
<script>
    $(document).ready(function(){
        $('.editbtn_availableProduct').on('click', function(){

            $('#editmodal_availableProduct').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#MSHH_availableProduct').val(data[0]);
            $('#TenHH').val(data[1]);
        });
    });
</script>

<!-- CHỈNH SỬA THÔNG TIN HÀNG HÓA -->
<script>
    $(document).ready(function(){
        $('.modifybtn').on('click', function(){

            $('#modify_product_Modal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#MSHH_modify').val(data[0]);
            $('#TenHH_modify').val(data[1]);
            $('#QuyCach_modify').val(data[2]);
            $('#Gia_modify').val(data[3]);
            $('#TenLoaiHang_modify').val(data[5]);
            // $('#TenAnh_modify').val(data[6]);
            $('#TenAnh_modify').attr('src', $(this).attr(data[6]));
        });
    });
</script>