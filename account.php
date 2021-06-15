<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="./css/account.css?v=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<title>Brasserie des 4 Sucs</title>
	</head>
	<body>
		<?php include('./header.php'); ?>
		<style>
			<?php include('./css/header.css') ?>
		</style>
		<?php
			if(!isset($_SESSION['userId'])) {
				header("Location: ./login.php");
				exit();
			}
		?>
    </body>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</html>