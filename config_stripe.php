<?php
require_once('./vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_test_51Nk44dBgl1yA4AN8uld18fpp05nbOPApiHGElvcofAH7YZsETfETq0bQ3gGEhQmVBopqX37uvuhvMr1K8nt6WK4R00NunhHtNc",
  "publishable_key" => "pk_test_51Nk44dBgl1yA4AN84evrD7VYWvZPjULQAn0KtFPl2F7kYHvLiRi7HEUyoVEfIXQoCPq1d7aC4dlmJFQHIRTuko0m006dMceyVt",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>