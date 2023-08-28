<?php
// Inclure votre fichier de configuration de la base de données
include 'config.php';
if (isset($_POST['submit'])) {
    $property_id = $_POST['property_id'];
    $dates = $_POST['dates'];

    // Récupérez les autres champs du formulaire
    $disponibilite = $_POST['disponibilite'];
    $dates_reservees = $_POST['dates_reservees'];

    // Récupérez les données du logement depuis la base de données
    $query = "SELECT type, pcontent, price FROM property WHERE pid = $property_id";
    $result = mysqli_query($con, $query);
    $property_data = mysqli_fetch_assoc($result);

    if ($property_data) {
        $type = $property_data['type'];
        $description = $property_data['pcontent'];
        $prix = $property_data['price'];

        // Vérifiez la disponibilité du property pour les dates spécifiées (vous devez implémenter cette logique)
        $disponibilite = checkDisponibility($property_id, $dates);

        if ($disponibilite) {
            // Effectuez le traitement de la réservation dans la base de données
            $insertQuery = "INSERT INTO booking (id, type, description, prix, disponibilite, dates_reservees) VALUES ('$property_id', '$type', '$description', '$prix', '$disponibilite', '$dates_reservees')";
            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                // Mettez à jour la disponibilité du property (vous devez implémenter cette logique)
                updateDisponibility($property_id, $dates);

                // Stockez un message de succès dans la session
                $_SESSION['success_message'] = "Vous avez réservé avec succès!";

                // Redirigez l'utilisateur vers une page de confirmation
                header("Location: index.php");
                exit();
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement de la réservation.";
            }
        } else {
            echo "Ce property n'est pas disponible pour les dates spécifiées.";
        }
    } else {
        echo "Logement non trouvé.";
    }
} else {
    echo "Formulaire non soumis.";
}




// Fermer la connexion à la base de données
mysqli_close($con);

// Fonction pour vérifier la disponibilité du property (à implémenter)
function checkDisponibility($property_id, $dates) {
    // Implémentez la logique de vérification de disponibilité ici
    // Renvoyez true si le property est disponible pour les dates spécifiées, sinon false
    // Assurez-vous de renvoyer la valeur correcte en fonction de votre logique
    return true; // Ou false en fonction de votre logique
}

// Fonction pour mettre à jour la disponibilité du property (à implémenter)
function updateDisponibility($property_id, $dates) {
    // Implémentez la logique de mise à jour de disponibilité ici
    // Assurez-vous de mettre à jour correctement la disponibilité dans la base de données
}
?>
