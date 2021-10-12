<?php
    include './../config.php';
    if(isset($_POST["btn_submit"])){
        $TenHH = $_POST["TenHH"];
        $MoTa = $_POST["MoTa"];
        $TenLoaiHang = $_POST['TenLoaiHang'];
        $QuyCach = $_POST['QuyCach'];
        $Gia = $_POST['Gia'];
        $GiamGia = $_POST['GiamGia'];
        $TenAnh = $_FILES['TenAnh']['name'];

        $size_shoes; //Size giày
        $size_footballs; //Size bóng
        $size_products; //size sản phẩm còn lại
        
        if($TenLoaiHang=='1'){
            //Giay
            $Shoes_34_SoLuong = $_POST['Shoes_34_SoLuong'];
            $Shoes_35_SoLuong = $_POST['Shoes_35_SoLuong'];
            $Shoes_36_SoLuong = $_POST['Shoes_36_SoLuong'];
            $Shoes_37_SoLuong = $_POST['Shoes_37_SoLuong'];
            $Shoes_38_SoLuong = $_POST['Shoes_38_SoLuong'];
            $Shoes_39_SoLuong = $_POST['Shoes_39_SoLuong'];
            $Shoes_40_SoLuong = $_POST['Shoes_40_SoLuong'];
            $Shoes_41_SoLuong = $_POST['Shoes_41_SoLuong'];
            $Shoes_42_SoLuong = $_POST['Shoes_42_SoLuong'];
            $Shoes_43_SoLuong = $_POST['Shoes_43_SoLuong'];
            $Shoes_44_SoLuong = $_POST['Shoes_44_SoLuong'];
            $Shoes_45_SoLuong = $_POST['Shoes_45_SoLuong'];

            //Luu vao mang de dung vong lap INSERT vao csdl Size
            $size_shoes = array(
                '34' => $Shoes_34_SoLuong,
                '35' => $Shoes_35_SoLuong,
                '36' => $Shoes_36_SoLuong,
                '37' => $Shoes_37_SoLuong,
                '38' => $Shoes_38_SoLuong,
                '39' => $Shoes_39_SoLuong,
                '40' => $Shoes_40_SoLuong,
                '41' => $Shoes_41_SoLuong,
                '42' => $Shoes_42_SoLuong,
                '43' => $Shoes_43_SoLuong,
                '44' => $Shoes_44_SoLuong,
                '45' => $Shoes_45_SoLuong
            );

            // echo $size_shoes['35'];
            // echo $size_shoes['37'];

            // $size_shoes['37']= $Shoes_37_SoLuong;

        } else if($TenLoaiHang=='4'){
            //Bóng
            $football_3_SoLuong = $_POST['football_3_SoLuong'];
            $football_4_SoLuong = $_POST['football_4_SoLuong'];
            $football_5_SoLuong = $_POST['football_5_SoLuong'];

            //Luu vao mang de dung vong lap INSERT vao csdl Size
            $size_footballs = array(
                '3' => $football_3_SoLuong,
                '4' => $football_4_SoLuong,
                '5' => $football_5_SoLuong
            );
        } else {
            //Còn lại
            $product_XS_SoLuong = $_POST['product_XS_SoLuong'];
            $product_S_SoLuong = $_POST['product_S_SoLuong'];
            $product_M_SoLuong = $_POST['product_M_SoLuong'];
            $product_L_SoLuong = $_POST['product_L_SoLuong'];
            $product_XL_SoLuong = $_POST['product_XL_SoLuong'];
            $product_2XL_SoLuong = $_POST['product_2XL_SoLuong'];

            //Luu vao mang de dung vong lap INSERT vao csdl Size
            $size_products = array(
                'XS' => $product_XS_SoLuong,
                'S' => $product_S_SoLuong,
                'M' => $product_M_SoLuong,
                'L' => $product_L_SoLuong,
                'XL' => $product_XL_SoLuong,
                '2XL' => $product_2XL_SoLuong
            );
        }
        

        // echo $TenHH.'<br/>';
        // echo $MoTa.'<br/>';
        // echo $TenLoaiHang.'<br/>';
        // echo $QuyCach.'<br/>';
        // echo $Gia.'<br/>';
        // echo $GiamGia.'<br/>';
        // echo $TenAnh.'<br/>';

        
        //Them du lieu vao bang HangHoa
        $sql_add_product = "INSERT INTO `hanghoa`(`TenHH`, `MoTa`, `QuyCach`, `Gia`, `GiamGia`, `MaLoaiHang`) 
            VALUES ('$TenHH','$MoTa','$QuyCach',$Gia,$GiamGia,$TenLoaiHang)";
        $query_add_product = mysqli_query($conn, $sql_add_product);


        //Lay MSHH vua them vao CSDL
        $sql_get_MSHH = "SELECT MSHH FROM `hanghoa` WHERE TenHH='$TenHH'";
        $query_get_MSHH = mysqli_query($conn, $sql_get_MSHH);
        $rows_get_MSHH = mysqli_fetch_array($query_get_MSHH);

        // Bắt buộc phải có biến chuyển dữ liệu mới cho vào INSERT
        $id_proudct = $rows_get_MSHH['MSHH']; 

        //Them hinhanh vao CSDL
        $sql_add_img_product = "INSERT INTO `hinhhanghoa`(`TenHinh`, `MSHH`) VALUES ('$TenAnh', $id_proudct)";
        $query_add_img_product = mysqli_query($conn, $sql_add_img_product);


        //Them du lieu vao bang Size
        if($TenLoaiHang=='1'){
            //Giay
            foreach($size_shoes as $size => $SoLuongHang) {
                // echo "Size=" . $size . ", SoLuongHang=" . $SoLuongHang;
                // echo "<br>";
                $sql_add_soLuong_into_Size = "INSERT INTO `size`(`MaSize`, `MSHH`, `SoLuongHang`) VALUES ('$size',$id_proudct,$SoLuongHang)";
                $query_add_soLuong_into_Size = mysqli_query($conn, $sql_add_soLuong_into_Size);
              }
            

        } else if($TenLoaiHang=='4'){
            //Bóng
            foreach($size_footballs as $size => $SoLuongHang) {
                // echo "Size=" . $size . ", SoLuongHang=" . $SoLuongHang;
                // echo "<br>";
                $sql_add_soLuong_into_Size = "INSERT INTO `size`(`MaSize`, `MSHH`, `SoLuongHang`) VALUES ('$size',$id_proudct,$SoLuongHang)";
                $query_add_soLuong_into_Size = mysqli_query($conn, $sql_add_soLuong_into_Size);
              }
        } else {
            //Còn lại
            foreach($size_products as $size => $SoLuongHang) {
                // echo "Size=" . $size . ", SoLuongHang=" . $SoLuongHang;
                // echo "<br>";
                $sql_add_soLuong_into_Size = "INSERT INTO `size`(`MaSize`, `MSHH`, `SoLuongHang`) VALUES ('$size',$id_proudct,$SoLuongHang)";
                $query_add_soLuong_into_Size = mysqli_query($conn, $sql_add_soLuong_into_Size);
              }
        }
        

        if($sql_add_img_product && $sql_add_product && $sql_add_soLuong_into_Size){
            header("location: ./../content.php?page_layout=product_management");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
        
    }
?>