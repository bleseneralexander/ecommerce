<?php
    //Chia luồng
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'product':
                include './modules_client/product/list_product.php';
                break;
            case 'detail':
                include './modules_client/product/detail_product.php';
                break;
            case 'profile':
                include './modules_client/profile/profile.php';
                break;
            case 'order':
                include './modules_client/product/detail_product.php';
                break;
        }
    }else {
        include './modules_client/main/billboard.php';
        include './modules_client/main/product_list.php';
    }
?>