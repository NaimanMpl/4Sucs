<?php
    if(isset($_POST['order-btn'])) {
        require_once('../vendor/autoload.php');
        $price = (float) $_POST['total-price'];

        \Stripe\Stripe::setApiKey('sk_test_51HGpuKHE1xzdsUkJWBlbN9PpYvDZkpuxqS6gEM2Y5Z9HXsOKMDwH0Xmcf9yaEaEqb7rULsE3oDgBwIWlGZKhdxoz00d2hCVlM7');
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $price * 100,
            'currency' => 'eur'
        ]);

        echo '<pre>';
        var_dump($intent);
        echo '</pre>';
        die();
    } else {
        header("Location: ../index.php");
        exit();
    }
?>
