<?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                // case 'dashboard':
                //     include './dashboard/dashboard.php'; //Loi
                //     break;

                case 'admin_management':
                    include './admin_management/admin.php';
                    break;

                case 'staff_management':
                    include './staff_management/staff.php';
                    break;

                case 'client_management':
                    include './client_management/client.php';
                    break;

                case 'product_management':
                    include './product_management/product.php';
                    break; 
                    
                case 'order_management':
                    include './order_management/order.php';
                    break;  

                // default:
                //     include './dashboard/dashboard.php'; //Loi
                //     break;
            }
        }else {
            include './modules_admin/dashboard/dashboard.php';
        }
    ?>