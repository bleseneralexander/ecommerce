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
    </div>
  </div>
</div>

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
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="MoTa_modify" id="MoTa_modify" require>
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
                <div>
                    <label class="form-label">Giảm giá</label>
                    <input type="text" class="form-control" name="GiamGia_modify" id="GiamGia_modify" require>
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
            $('#MoTa_modify').val(data[2]);
            $('#QuyCach_modify').val(data[3]);
            $('#Gia_modify').val(data[4]);
            $('#GiamGia_modify').val(data[5]);
            $('#TenLoaiHang_modify').val(data[7]);
            // $('#TenAnh_modify').val(data[6]);
            $('#TenAnh_modify').attr('src', $(this).attr(data[8]));
        });
    });
</script>