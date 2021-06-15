<?php
	session_start();
?>
	<header>
		<div class="logo-container">
			<img src="../img/logo.svg" alt="logo"/>
			<a href="../index.php" class="logo">Brasserie des 4 Sucs</a>
		</div>
		<nav>
			<ul class="nav-links">
				<li><a class="nav-link" href="../index.php">Acceuil</a></li>
				<li><a class="nav-link" href="../bieres.php">Bières</a></li>
				<li><a class="nav-link" href="#">Actualités</a></li>
				<li><a class="nav-link" href="#">Contact</a></li>
			</ul>
		</nav>
		<div class="cart">
			<a href="../cart.php">
				<img src="../img/cart.svg" alt="cart"/>
			</a>
			<p>0</p>
		</div>
		<div class="account">
			<a href="../login.php">
				<ion-icon name="person-circle-sharp"></ion-icon>
			</a>
		</div>
	</header>