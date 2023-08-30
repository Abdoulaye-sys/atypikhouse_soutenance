<?php
include("config.php");

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insérer le code pour enregistrer les données dans la base de données ici

    // Rediriger l'utilisateur après l'enregistrement
    header("Location: thank_you_page.php");
    exit();
}
?>
