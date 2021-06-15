<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<title>Brasserie des 4 Sucs</title>
	</head>
	<body>
		<?php include('./header.php'); ?>
		<style>
			<?php include('./css/header.css') ?>
		</style>
		<main>
			<section class="presentation">
				<div class="introduction">
					<div class="intro-text">
						<h1>Une terre, des amis, une bierre...</h1>
						<p>
							La Brasserie des 4 Sucs est une micro brasserie artisanale située en Haute-Loire (Auvergne) née d'une rencontre de 4 gars. De cette rencontre est née une amitié et de cette amitié... une bière.
						</p>
					</div>
					<div class="cta">
						<button class="cta-select">Artisanale</button>
						<button class="cta-add"><a href="./bieres.php">Commander</a></button>
					</div>
				</div>
				<div class="cover">
					
				</div>
			</section>
			<img class="big-circle" src="./img/big-eclipse.svg" alt=""/>
			<?php
				if(isset($_SESSION['userId'])) {
					echo '<p>Vous êtes actuellement connecté !</p>';
				} else {
					echo '<p>Vous êtes actuellement déconnecté.</p>';
				}
			?>
		</main>
		<script src="./js/main.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
	</body>
</html>