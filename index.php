<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westside Sneaker Store</title>
    <link rel="stylesheet" href="./modules_client/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" 
        integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" 
        crossorigin="anonymous">
</head>
<body>
    
    
    <?php
        session_start();
        // session_destroy();
        if(!isset($_SESSION['login'])){
            include './modules_client/header_login.php';
        } else {
            include './modules_client/header_loggedin.php';
        }
        
        include './modules_client/main.php';
		include './modules_client/footer.php';
	?>

    

    <script type="text/javascript">
        function imgSlider(anything){
            document.querySelector('.starbucks').src = anything;
        }

        function changeColor(color){
            const circle = document.querySelector('.circle');
            circle.style.background = color;

            const name = document.querySelector('.content .textBox h2 span');
            name.style.color = color;

            const button = document.querySelector('.content .textBox a');
            button.style.background = color;

        }

        function changeContent(name_shoe, description_shoe, price_shoe){
            const name = document.querySelector('.name-shoe');
            name.innerHTML = name_shoe;

            const description = document.querySelector('.description-shoe');
            description.innerHTML = description_shoe;

            const price = document.querySelector('.price-shoe');
            price.innerHTML = price_shoe;
        }

        function toggleMenu(){
            var menuToggle = document.querySelector('.toggle');
            var navigation = document.querySelector('.navigation');
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>
</body>
</html>