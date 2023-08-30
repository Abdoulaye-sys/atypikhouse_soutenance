<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['uid'])) {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php"); // Remplacez "login.php" par la page de connexion de votre site
    exit();
}

// Inclure votre fichier de configuration de la base de données
include("config.php");

if (isset($_POST['submit'])) {
    $property_id = $_POST['property_id'];
    $departure_date = $_POST['departure_date'];
    $arrival_date = $_POST['arrival_date'];

    // Récupérez les données du logement depuis la base de données
    $query = "SELECT type, pcontent, price FROM property WHERE pid = $property_id";
    $result = mysqli_query($con, $query);
    $property_data = mysqli_fetch_assoc($result);

    if ($property_data) {
        $type = mysqli_real_escape_string($con, $property_data['type']);
        $description = mysqli_real_escape_string($con, $property_data['pcontent']);
        $prix = $property_data['price'];

        // Vérifiez la disponibilité du property pour les dates spécifiées
        $disponibilite = checkDisponibility($property_id, $departure_date, $arrival_date);

        if ($disponibilite) {
            // Effectuez le traitement de la réservation dans la base de données
            $insertQuery = "INSERT INTO booking (property_id, type, description, prix, departure_date, arrival_date) VALUES ('$property_id', '$type', '$description', '$prix', '$departure_date', '$arrival_date')";
            $result = mysqli_query($con, $insertQuery);

            if ($result) {
                // Mettez à jour la disponibilité du property (à implémenter)
                updateDisponibility($property_id);

                // Redirigez l'utilisateur vers la page de paiement de Stripe
                header("Location: pay.php?price=$prix");
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

// Fonction pour vérifier la disponibilité du property (à implémenter)
function checkDisponibility($property_id, $departure_date, $arrival_date) {
    global $con;

    // Implémentez la logique de vérification de disponibilité ici
    // Renvoyez true si le property est disponible pour les dates spécifiées, sinon false
    // Assurez-vous de renvoyer la valeur correcte en fonction de votre logique
    // Par exemple, vous pouvez interroger la base de données pour voir si des réservations existent pour les dates données
    // et si le property est disponible pour ces dates
    $query = "SELECT COUNT(*) FROM booking WHERE property_id = '$property_id' AND departure_date = '$departure_date' AND arrival_date = '$arrival_date'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_row($result);
        $existingBookings = $row[0]; // Nombre de réservations existantes pour ces dates

        if ($existingBookings == 0) {
            return true; // Le logement est disponible pour ces dates
        } else {
            return false; // Le logement n'est pas disponible pour ces dates
        }
    } else {
        return false; // Erreur lors de la requête SQL
    }
}

// Fonction pour mettre à jour la disponibilité du property (à implémenter)
function updateDisponibility($property_id) {
    global $con;

    // Implémentez la logique de mise à jour de disponibilité ici
    // Par exemple, marquer le property comme réservé dans la base de données
    // Assurez-vous de mettre à jour correctement la disponibilité dans la base de données
    $updateQuery = "UPDATE property SET disponibilite = 0 WHERE pid = '$property_id'";
    $result = mysqli_query($con, $updateQuery);

    if (!$result) {
        echo "Erreur lors de la mise à jour de la disponibilité.";
    }
}

// Fermer la connexion à la base de données
mysqli_close($con);
?>

