<?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'dashboard':
                    include './dashboard/dashboard.php'; //Loi
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

                default:
                    include './dashboard/dashboard.php'; //Loi
                    break;
            }
        }else {
            include './modules_admin/dashboard/dashboard.php';
        }
    ?>