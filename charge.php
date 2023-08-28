<?php
require_once('./config_stripe.php'); // Inclure votre fichier de configuration Stripe

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $price = $_POST['price']; // Récupérer le montant depuis le formulaire
    $amount_in_cents = $price * 100;


    // Créer la session de paiement avec Stripe en utilisant le montant dynamique
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $amount_in_cents,
                    // Montant en centimes
                    'product_data' => [
                        'name' => 'Réservation chez Atypik House', // Description du produit
                    ],
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => 'https://localhost/atypikhouse/index.php', // URL de confirmation
        'cancel_url' => 'https://localhost/annulation.php', // URL d'annulation
    ]);

    // Rediriger l'utilisateur vers la page de paiement Stripe
    header("Location: " . $session->url);
    exit();
}
?>
