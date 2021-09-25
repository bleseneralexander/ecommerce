<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="view.css">
</head>
<body class="client_management">
    <?php
        if(isset($_GET['page_product'])){
            switch ($_GET['page_product']) {
                case 'list':
                    include './product_management/list.php';
                    break;

                case 'add':
                    include './add.php';
                    break;

                case 'modify':
                    include './modify.php';
                    break;

                case 'delete':
                    include './delete.php';
                    break;

                default:
                    include './product_management/list.php';
                    break;
            }
        }else {
            include './product_management/list.php';
            include './product_management/view.html';
        }
    ?>
</body>
</html>