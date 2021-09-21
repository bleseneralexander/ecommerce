<?php
    require_once './../connectSQL.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Westside Sneaker Store</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Westside Sneaker Store, Sneaker, Shoes">
    <meta name="description" content="ecommerce web">
    <meta name="author" content="ch.studio" />
    <link rel="shortcut icon" type="image/png" href="./../photo/logo.jpg" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'login':
                    require_once 'login.html';
                    break;

                case 'dashboard':
                    require_once 'dashboard.html';
                    break;

                // case 'modify':
                //     require_once 'sanpham/modify.php';
                //     break;

                // case 'delete':
                //     require_once 'sanpham/delete.php';
                //     break;

                default:
                    require_once 'login.html';
                    break;
            }
        }else {
            require_once 'login.html';
        }
    ?>
</body>
</html>