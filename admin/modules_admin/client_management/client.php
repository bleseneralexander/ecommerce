<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management</title>
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" 
        crossorigin="anonymous">
</head>
<body>
    <?php
        if(isset($_GET['page_client'])){
            switch ($_GET['page_client']) {
                case 'list':
                    include './client_management/list.php';
                    break;

                case 'view':
                    include './view.php';
                    break;

                default:
                    include './client_management/list.php';
                    break;
            }
        }else {
            include './client_management/list.php';
        }
    ?>
</body>
</html>