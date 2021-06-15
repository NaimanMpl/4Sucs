<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="../css/beer.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
		<title>Brasserie des 4 Sucs</title>
	</head>
	<body>
		<?php include('./header.php'); ?>
		<style>
			<?php include('../css/header.css'); ?>
		</style>
		<main>
			<section class="presentation">
				<div class="introduction">
					<div class="intro-text">
						<h1>La 4 Sucs Ambrée</h1>
						<p>
							Amber Ale avec une mousse onctueuse et généreuse. En bouche, vous découvrirez sa grandeur et ses mots de caramel.
						</p>
					</div>
					<div class="cta">
						<button class="cta-select">2.50€</button>
						<script type="text/javascript">
							let cartItems = localStorage.getItem('productsInCart');
							cartItems = JSON.parse(cartItems);
							let currentBeer = location.pathname.split('/').slice(-1)[0];
							let cta = document.querySelector('.cta');
							let bool = false;
							if (cartItems && cta) {
								Object.values(cartItems).map(item => {
									let name = item.tag + '.php';
									console.log(name);
									if(name.toUpperCase() === currentBeer.toUpperCase()) {
										bool = true;
									}
								});
							}
							console.log(bool);
							if (bool == true) {
								cta.innerHTML += `
								<button class="cta-already">Dans le panier</button>
								`
							} else {
								cta.innerHTML += `
								<button class="cta-add">Ajouter au panier</button>
								`
							}
						</script>
					</div>
				</div>
				<div class="cover">
					<img src="../img/biere.png" alt="biere"/>
				</div>
			</section>

			<div class="beer-select">
				<img src="../img/arrow-left.svg" alt=""/>
				<img src="../img/dot.svg" alt=""/>
				<img src="../img/dot-full.svg" alt=""/>
				<img src="../img/arrow-right.svg" alt=""/>
			</div>

			<img class="big-circle" src="../img/big-eclipse.svg" alt=""/>
		</main>

		<div class="ingredients">
			<div class="ingredients-bloc">
				<h1>Ingrédients</h1>
				<p>Eau</p>
				<p>Malts d'orge</p>
				<p>Houblon</p>
				<p>Levure</p>
				<p>Sucre</p>
			</div>
		</div>
		<script src="../js/main.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
	</body>
</html>