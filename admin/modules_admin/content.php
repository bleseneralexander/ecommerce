<?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'dashboard':
                include './modules_admin/dashboard/dashboard.php';
                break;

            case 'admin_management':
                include './modules_admin/admin_management/admin.php';
                break;

            case 'staff_management':
                include './modules_admin/staff_management/list.php';
                break;

            case 'client_management':
                include './modules_admin/client_management/list.php';
                break;

            case 'product_management':
                include './modules_admin/product_management/list.php';
                break;

            case 'quantityOfProduct':
                include './modules_admin/product_management/quantity.php';
                break; 
                    
            case 'order_management':
                include './modules_admin/order_management/list.php';
                break;
                 
            case 'order_detail':
                include './modules_admin/order_management/viewDetail.php';
                break; 
            }
    }else {
        include './modules_admin/dashboard/dashboard.php';
    }
?>