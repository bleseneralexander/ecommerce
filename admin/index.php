<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" type="text/css" href="style/index.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" /> -->
</head>
<body>
<?php
	session_start();
	//session_destroy();
	if(!isset($_SESSION['dangnhapadmin'])){
		header('location:login.php');
	}
?>
<div class="wrapper">
	<?php
		include 'modules_admin/config.php';
		include 'modules_admin/header.php';
		include 'modules_admin/menu.php';
		include 'modules_admin/content.php';
		include 'modules_admin/footer.php';
	?>
</div>

</body>
</html>