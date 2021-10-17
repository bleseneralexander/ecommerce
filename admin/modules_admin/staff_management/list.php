<!-- cấp index.php -->
<?php
//   $username = $_SESSION['login_admin'];
?>
<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="card-header">
                <h2>Danh sách nhân viên</h2>
                <!-- <p>Xin chào <?php echo $username ?></p> -->
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn_add">Thêm nhân viên</button>
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
                                include './modules_admin/config.php';
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
                                        <button type="button" class="btn_modify">Sửa</button>

                                        <!-- <button type="button" class="btn btn-warning modifybtn">Sửa</button> -->
                                        <!-- <a href="./staff_management/staff.php?page_staff=modify&id= <?php echo $rows["MSNV"] ?>">
                                            Sửa
                                        </a> -->
                                    </td>
                                    <td>
                                        <a onclick="return confirm_Del('<?php echo $rows['HoTenNV'] ?>')" 
                                        href="./modules_admin/staff_management/delete.php?MSNV=<?php echo $rows["MSNV"] ?>" class="btn_delete">Xóa</a>
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
</main>

<script>
    function confirm_Del(name){
        return confirm("Bạn có chắc muốn xóa nhân viên "+ name + "?");
    }
</script>

<!-- ############################# Modal Thêm nhân viên ######################################## -->

<div class="modal-bg-add">
  <div class="modal-add">
    <h2>abc</h2>       
    <span class="modal-close-add">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn_add = document.querySelector('.btn_add'); //sua ten
  var modalBg_add = document.querySelector('.modal-bg-add');
  var modalClose_add = document.querySelector('.modal-close-add');

  modalBtn_add.addEventListener('click', function(){
    modalBg_add.classList.add('bg-active-add');
  });
  
  modalClose_add.addEventListener('click', function(){
    modalBg_add.classList.remove('bg-active-add');
  });
</script>

<!-- ############################# Modal Sửa nhân viên ######################################## -->

<div class="modal-bg-modify">
  <div class="modal-modify">
    <h2>abc</h2>       
    <span class="modal-close-modify">X</spsan>
  </div>
</div>

<script type="text/javascript">
  var modalBtn_modify = document.querySelector('.btn_modify'); //sua ten
  var modalBg_modify = document.querySelector('.modal-bg-modify');
  var modalClose_modify = document.querySelector('.modal-close-modify');

  modalBtn_modify.addEventListener('click', function(){
    modalBg_modify.classList.add('bg-active-modify');
  });
  
  modalClose_modify.addEventListener('click', function(){
    modalBg_modify.classList.remove('bg-active-modify');
  });
</script>
