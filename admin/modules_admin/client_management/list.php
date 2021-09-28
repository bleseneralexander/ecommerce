<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sách khách hàng</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>MSKH</th>
                        <th>Họ tên</th>
                        <th>Tên công ty</th>
                        <th>Số điện thoại</th>
                        <th>Số fax</th>
                        <th>Địa chỉ</th>
                        <th>Lịch sử mua hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            include './config.php';
                            $sql = "SELECT * FROM khachhang k JOIN diachikh d ON k.MSKH=d.MSKH";
                            $query = mysqli_query($conn, $sql);
                            while($rows = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $rows["MSKH"] ?></td>
                                <td><?php echo $rows["HoTenKH"] ?></td>
                                <td><?php echo $rows["TenCongTy"] ?></td>
                                <td><?php echo $rows["SoDienThoai"] ?></td>
                                <td><?php echo $rows["SoFax"] ?></td>
                                <td><?php echo $rows["DiaChi"] ?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-success editbtn">Xem</button> -->
                                    <center><a class="btn btn-primary" href="./client_management/client.php?page_client=view&id= <?php echo $rows["MSKH"] ?>">Xem</a></center>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- 
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LỊCH SỬ MUA HÀNG</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">MSKH</label>
                <input type="text" class="form-control" id="id_KH" name="MSKH" disabled>
                <label class="form-label">Tên khách hàng</label>
                <input type="text" class="form-control" id="name_KH" name="TenKH" disabled>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên hàng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
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
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
                
                
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('.editbtn').on('click', function(){

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#id_KH').val(data[0]);
            $('#name_KH').val(data[1]);

        });
    });
</script> -->