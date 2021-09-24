<?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'dashboard':
                    include './modules_admin/dashboard/dashboard.php';
                    break;

                case 'staff_management':
                    include './staff_management/staff.php';
                    break;

                case 'client_management':
                    include './client_management/client.php';
                    break;

                default:
                    include './modules_admin/dashboard/dashboard.php';
                    break;
            }
        }else {
            include './modules_admin/dashboard/dashboard.php';
        }
    ?>