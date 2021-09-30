<!-- Chung cấp với content.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
        crossorigin="anonymous">
</head>
<body class="order_management">
    <?php
        if(isset($_GET['page_order'])){
            switch ($_GET['page_order']) {
                case 'viewDetail':
                    include './viewDetail.php';
                    break;
            }
        }else {
            include './order_management/list.php';
        }
    ?>
</body>
</html>