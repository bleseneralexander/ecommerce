<!-- chung cap voi product -->
<?php
    include './modules_admin/config.php';  
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<main>
    <div class="container-fluid">
        <div class="card-quantity">
            <div class="link-nav-pages">
                <a href="./index.php?page_layout=product_management">Quản Lý Khách Hàng</a> / 
                <a href="">Số Lượng Hàng Hóa Theo Size</a>
            </div>
            <div class="card-header">
                <h2>THÔNG TIN SỐ LƯỢNG HÀNG HÓA THEO SIZE</h2>
            </div>
            <div class="card-body">
                <div class="card">
                    <?php
                        $sql_get_TenHangHoa = "SELECT TenHH FROM `hanghoa` WHERE MSHH=$id";
                        $query_get_TenHangHoa = mysqli_query($conn, $sql_get_TenHangHoa);
                        $rows_get_TenHangHoa = mysqli_fetch_array($query_get_TenHangHoa);
                    ?>
                    <h4>MSHH: <?php echo $id ?></h4>
                    <h4>Tên hàng: <?php echo $rows_get_TenHangHoa["TenHH"] ?></h4>
                </div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Size</th>
                            <th>Số lượng</th>
                            <th>Thêm hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                $sql = "SELECT * FROM size WHERE MSHH='$id'";
                                $query = mysqli_query($conn, $sql);
                                $count_soLuong=0;

                                while($rows= mysqli_fetch_array($query)){ ?>
                                <tr>
                                    <?php $count_soLuong++ ?>
                                    <td><?php echo $rows["MaSize"] ?></td>
                                    <td><?php echo $rows["SoLuongHang"] ?></td>
                                    <td>
                                        <button type="button" class="editbtn_availableProduct">Thêm hàng</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <p><b><?php echo 'Số lượng size: '. $count_soLuong ?></b></p>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="editmodal_availableProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa số lượng</h5>
            </div>
            <form action="./modules_admin/product_management/add_availableProduct.php" method="POST"> 
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">MSHH</label>
                        <input type="text" value="<?php echo $id?>" class="form-control" id="MSHH_availableProduct" name="MSHH_availableProduct">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" id="Size_availableProduct" name="Size_availableProduct">
                    </div>
                    <div>
                        <label class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="SoLuong_availableProduct" min="0" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="btn_add_availableProduct">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<!-- ####################################################### Modal Thêm hàng có sẵn ######################################################### -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

<!-- NHẬP THÊM HÀNG CÓ SẴN -->
<script>
    $(document).ready(function(){
        $('.editbtn_availableProduct').on('click', function(){

            // $('#editmodal_availableProduct').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#Size_availableProduct').val(data[0]);
        });
    });
</script>