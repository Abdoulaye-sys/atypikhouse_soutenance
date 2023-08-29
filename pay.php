<?php
require_once('./config_stripe.php');


require_once('./vendor/autoload.php'); // Assurez-vous que le chemin est correct

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$stripe_secret_key = $_ENV['STRIPE_SECRET_KEY'];

\Stripe\Stripe::setApiKey($stripe_secret_key);


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['price'])) {
    $price = $_GET['price'];
    $amount_in_cents = $price * 100;

    try {
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => $amount_in_cents,
                        'product_data' => [
                            'name' => 'Réservation chez Atypik House',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => 'https://localhost/atypikhouse/index.php?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://localhost/annulation.php',
        ]);

        header("Location: " . $session->url);
        exit();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo "Une erreur s'est produite lors de la création de la session de paiement : " . $e->getMessage();
    }
} else {
    echo "Le prix n'a pas été spécifié.";
}
?>
