<!-- Chung cấp với content.php -->

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách nhân viên</h2>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_staff_Modal">
                Thêm nhân viên
            </button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSNV</th>
                        <th>Họ tên</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT * FROM nhanvien";
                            $count_nhanvien=0;
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MSNV"] ?></td>
                                <td><?php echo $rows["HoTenNV"] ?></td>
                                <td><?php echo $rows["ChucVu"] ?></td>
                                <td><?php echo $rows["DiaChi"] ?></td>
                                <td><?php echo $rows["SoDienThoai"] ?></td>
                                <?php $count_nhanvien++ ?>
                                <td>
                                    <button type="button" class="btn btn-warning modifybtn">Sửa</button>
                                    <!-- <a href="./staff_management/staff.php?page_staff=modify&id= <?php echo $rows["MSNV"] ?>">
                                        Sửa
                                    </a> -->
                                </td>
                                <td>
                                    <a onclick="return confirm_Del('<?php echo $rows['HoTenNV'] ?>')" 
                                       href="./staff_management/staff.php?page_staff=delete&id= <?php echo $rows["MSNV"] ?>" style="background-color: red;color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </thead>
            </table>
            <p><b><?php echo 'Số lượng nhân viên: '. $count_nhanvien ?></b></p>
        </div>
    </div>
</div>
<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa nhân viên "+ name + "?");
    }
</script>


<!-- ######################################################### Modal Thêm nhân viên ######################################################### -->

<div class="modal fade" id="add_staff_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN NHÂN VIÊN</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./staff_management/staff.php?page_staff=add" enctype="multipart/form-data" method="POST"> 
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" class="form-control" name="HoTenNV" require>
                </div>
                <div class="form-group">
                    <label for="">Chức vụ</label>
                    <select class="form-control" name="ChucVu">
                        <option selected>Chọn chức vụ</option>
                        <option value = "Quản lý" >Quản Lý</option>
                        <option value = "Nhân viên bán hàng" >Nhân viên bán hàng</option>
                        <option value = "Nhân viên giao hàng" >Nhân viên giao hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="DiaChi" require>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="SoDienThoai" require>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btn_submit">Thêm</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- ######################################################### Modal Sua thong tin nhan vien######################################################### -->

<div class="modal fade" id="modify_product_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./staff_management/staff.php?page_staff=modify" method="POST"> 
            <div class="modal-body">
                <input type="hidden" name="MSNV_modify" id="MSNV_modify">
                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" class="form-control" name="HoTenNV_modify" id="HoTenNV_modify" require>
                </div>
                <div class="form-group">
                    <label for="">Chức vụ</label>
                    <select class="form-control" name="ChucVu_modify" id="ChucVu_modify">
                        <option selected>Chọn chức vụ</option>
                        <option value = "Quản lý">Quản Lý</option>
                        <option value = "Nhân viên bán hàng">Nhân viên bán hàng</option>
                        <option value = "Nhân viên giao hàng">Nhân viên giao hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="DiaChi_modify" id="DiaChi_modify" require>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="SoDienThoai_modify" id="SoDienThoai_modify" require>
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

            $('#MSNV_modify').val(data[0]);
            $('#HoTenNV_modify').val(data[1]);
            $('#ChucVu_modify').val(data[2]);
            $('#DiaChi_modify').val(data[3]);
            $('#SoDienThoai_modify').val(data[4]);
        });
    });
</script>
