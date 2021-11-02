<!-- Chung cấp với file index.php -->
<?php
    include './modules_admin/config.php';           
?>

<main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Quản Lý Khách Hàng</a>
            </div>
            <div class="card-header">
                <h2>Danh sách hàng hóa</h2>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn_add">Nhập hàng</button>
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
                                        <a href="./index.php?page_layout=quantityOfProduct&id= <?php echo $rows['MSHH']?>"
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
                                    <td> <img src="./photo/<?php echo $rows["TenHinh"] ?>" alt="<?php echo $rows["TenHinh"] ?>" style="width: 100%"> </td>
                                    <td>
                                        <?php
                                            if($rows_get_SoLuongHH['SoLuongHang']>0)
                                            echo 'Còn hàng';
                                            else  echo 'Hết hàng';
                                        ?>
                                    </td>
                                    <td>
                                        <!-- <button type="button" class="btn_modify">Sửa</button> -->
                                        <a href="./index.php?page_layout=modifyOfProduct&id= <?php echo $rows['MSHH']?>"
                                        style="background-color: rgb(255, 187, 0);color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">
                                            Sửa
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm_Del('<?php echo $rows['TenHH'] ?>')" 
                                        href="./modules_admin/product_management/delete.php?id= <?php echo $rows['MSHH'] ?>"
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


<!-- ################################################# Modal Nhập hàng ################################################### -->
<div class="modal-bg-add-product">
  <div class="modal-add-product">
    <h2>Nhập hàng hóa</h2>
    <form action="./modules_admin/product_management/add.php" enctype="multipart/form-data" method="POST"> 
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tên hàng</label>
                    <input type="text" class="form-control" name="TenHH" required>
                        <div class="form-text">Tên hàng phải in hoa.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="MoTa" required>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select class="form-control" name="TenLoaiHang" onchange="typeChanged(this)">
                        <option value="" selected>Chọn loại</option>
                        <option value="1">Giày</option>    
                        <option value="2">Áo</option>
                        <option value="3">Tất</option>
                        <option value="4">Bóng</option>
                        <option value="5">Quần</option>
                    </select>
                    <p style="color: red" id="show_message"></p>
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
                    <input type="number" class="form-control" name="Gia" min="1000" required>
                </div><br/>
                <div class="mb-3">
                    <label class="form-label">Giảm giá</label>
                    <input type="text" class="form-control" name="GiamGia" required>
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label><br />
                    <input type="file" name="TenAnh" required>
                </div>
                <div>
                    <label class="form-label">Số lượng</label>
                    <table class="table" id="shoes" style="visibility: collapse;">
                        <thead class="thead-light">
                            <tr>
                                <th>Size</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <td>34</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_34_SoLuong" min="0" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>35</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_35_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_36_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>37</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_37_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_38_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>39</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_39_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_40_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>41</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_41_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_42_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_43_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_44_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>45</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="Shoes_45_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" id="all_product" style="visibility: collapse;">
                        <thead class="thead-light">
                            <tr>
                                <th>Size</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <td>XS</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_XS_SoLuong" min="0" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_S_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>M</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_M_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>L</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_L_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>XL</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_XL_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>2XL</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="product_2XL_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" id="football" style="visibility: collapse;">
                        <thead class="thead-light">
                            <tr>
                                <th>Size</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="football_3_SoLuong" min="0" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="football_4_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <input type="number" class="form-control" value="0" name="football_5_SoLuong" min="0" required>
                                    </td> 
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="btn_submit">Xác nhận</button>
            </div>
        </form>
    <span class="modal-close-add">X</spsan>
  </div>
</div>

<!-- Show size when choose type of product -->
<script>
    function typeChanged(obj) {
        var message = document.getElementById('show_message');
        var value = obj.value;
        if (value === ''){
            message.innerHTML = "Bạn chưa chọn loại hàng";
        }else if (value === '1'){ //Giay
            document.getElementById("all_product").style.visibility = "collapse";
            document.getElementById("shoes").style.visibility = "visible";
            document.getElementById("football").style.visibility = "collapse";
        }else if (value === '4'){ //Bong
            document.getElementById("all_product").style.visibility = "collapse";
            document.getElementById("shoes").style.visibility = "collapse";
            document.getElementById("football").style.visibility = "visible";
        }else{
            document.getElementById("all_product").style.visibility = "visible";
            document.getElementById("shoes").style.visibility = "collapse";
            document.getElementById("football").style.visibility = "collapse";
        }
    }
</script>

<!-- Modal Add -->
<script type="text/javascript">
  var modalBtn_add = document.querySelector('.btn_add'); //sua ten
  var modalBg_add = document.querySelector('.modal-bg-add-product');
  var modalClose_add = document.querySelector('.modal-close-add');
  var btn_Close_add = document.querySelector('.modal-close-add-btn');

  modalBtn_add.addEventListener('click', function(){
    modalBg_add.classList.add('bg-active-add');
  });
  
  modalClose_add.addEventListener('click', function(){
    modalBg_add.classList.remove('bg-active-add');
  });

  btn_Close_add.addEventListener('click', function(){
    modalBg_add.classList.remove('bg-active-add');
  });
</script>


<!-- ############################# Modal Sửa nhân viên ######################################## -->

<!-- <div class="modal-bg-modify">
  <div class="modal-modify">
    <h2>Chỉnh sửa thông tin nhân viên</h2>
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
    <span class="modal-close-modify">X</spsan>
  </div>
</div> -->

<!-- <script type="text/javascript">
  var modalBtn_modify = document.querySelector('.btn_modify'); //sua ten
  var modalBg_modify = document.querySelector('.modal-bg-modify');
  var modalClose_modify = document.querySelector('.modal-close-modify');

  modalBtn_modify.addEventListener('click', function(){
    modalBg_modify.classList.add('bg-active-modify');
  });
  
  modalClose_modify.addEventListener('click', function(){
    modalBg_modify.classList.remove('bg-active-modify');
  });
</script> -->