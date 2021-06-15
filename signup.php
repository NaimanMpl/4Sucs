<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="./css/signup.css">
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
						<a href="./login.php">
							<button type="button" class="toggle-btn">Connexion</button>
						</a>
						<button type="button" class="toggle-btn">S'inscrire</button>
					</div>
					<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == "emptyfields") {
								echo '<p class="signuperror">Veuillez remplir tous les champs !</p>';
							}
						}
					?>
					<div class="social-icons">
						<ion-icon name="logo-facebook"></ion-icon>
						<ion-icon name="logo-twitter"></ion-icon>
						<ion-icon name="logo-instagram"></ion-icon>
					</div>
					<form action="includes/signup.inc.php" id="register" class="input-group" method="post">
						<input type="text" name="uid" class="input-field" placeholder="Nom d'utilisateur">
						<input type="text" name="mail" class="input-field" placeholder="Adresse mail">
						<input type="password" name="pwd" class="input-field" placeholder="Mot de passe">
						<input type="password" name="pwd-repeat" class="input-field" placeholder="Confirmation du mot de passe">
						<input type="checkbox" class="check-box"><span>J'accepte les Conditions générales d'utilisation et certifie être majeur</span>
						<button type="submit" name="signup-submit" class="signup-submit">S'inscrire</button>
					</form>
				</div>
			</div>
			<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
		</main>
	</body>
</html>