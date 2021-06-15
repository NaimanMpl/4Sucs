<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="./css/login.css?v=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<title>Brasserie des 4 Sucs</title>
	</head>
	<body>
		<?php include('./header.php'); ?>
		<style>
			<?php include('./css/header.css') ?>
		</style>
		<main>
			<div class="hero">
				<div class="form-box">
					<div class="button-box">
						<div id="btn"></div>
						<button type="button" class="toggle-btn">Connexion</button>
						<a href="./signup.php">
							<button type="button" class="toggle-btn">S'inscrire</button>
						</a>
					</div>
					<div class="social-icons">
						<ion-icon name="logo-facebook"></ion-icon>
						<ion-icon name="logo-twitter"></ion-icon>
						<ion-icon name="logo-instagram"></ion-icon>
					</div>
					<form action="includes/login.inc.php" id="login" class="input-group" method="post">
						<input type="text" name="mailuid" class="input-field" placeholder="Adresse mail / Nom d'utilisateur">
						<input type="password" name="pwd" class="input-field" placeholder="Mot de passe">
						<button type="submit" name="login-submit" class="login-submit">Connexion</button>
					</form>
				</div>
			</div>
			<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
		</main>
	</body>
</html>