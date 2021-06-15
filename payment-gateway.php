<?php
    if(isset($_POST['cart-btn'])) {
        require_once('./vendor/autoload.php');
        $price = (float) $_POST['total-price'];

        \Stripe\Stripe::setApiKey('sk_test_51HGpuKHE1xzdsUkJWBlbN9PpYvDZkpuxqS6gEM2Y5Z9HXsOKMDwH0Xmcf9yaEaEqb7rULsE3oDgBwIWlGZKhdxoz00d2hCVlM7');
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $price * 100,
            'currency' => 'eur'
        ]);
    } else {
        header("Location: ./index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/payment-gateway.css">
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
        <h2>Paiement</h2>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form id="payment_form" method="post">
                        <div class="row">
                            <div class="col-58">
                                <h3>Informations personnelles</h3>
                                <label for="fname"><i class="fa fa-user"></i>Nom complet</label>
                                <input type="text" id="fname" name="firstname" placeholder="Jean Dupré">

                                <label for="adr"><i class="fa fa-adress-card-o"></i>Adresse</label>
                                <input type="text" id="adr" name="address" placeholder="19 Rue des Augustins">

                                <label for="city"><i class="fa fa-institution"></i>Ville</label>
                                <input type="text" id="city" name="city" placeholder="Puy-En-Velay">
                            
                                <div class="row">
                                    <div class="col-50">
                                        <label for="cname">Titulaire de la carte</label>
                                        <input type="text" id="cname" name="cname" placeholder="Jean Dujardin">
                                    </div>
                                    <div class="col-50">
                                        <label for="state">Pays</label>
                                        <input type="text" id="state" name="state" placeholder="France">
                                    </div>
                                </div>
                                <div id="errors"></div>
                                <div id="card-elements" class="col-50">
                                    
                                </div>
                                <div id="card-errors"></div>
                                <input type="checkbox" checked="checked" name="sameadr">L'adresse de paiement est la même que celle de livraison</label>
                                <button id="submit-btn" class="button" name="order-btn" type="button" data-secret="<?= $intent['client_secret'] ?>">Acheter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-25">
                <div class="cart-container">
                    
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
        <script src="./js/payments.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="./js/checkout.js"></script>
    </body>
</html>