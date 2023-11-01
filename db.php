<?php
$servername = "localhost"; // Généralement, localhost fonctionne pour 000webhost
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = "root"; // Remplacez par votre mot de passe MySQL
$dbname = "portfolio"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST["Nom"];
$email = $_POST["Email"];
$message = $_POST["Message"];

// Préparation de la requête SQL pour l'insertion
$sql = "INSERT INTO client (name, email, message, date) VALUES (?, ?, ?, NOW())";

// Préparation de la requête avec un objet PreparedStatement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Liaison des valeurs aux paramètres
    $stmt->bind_param("sss", $nom, $email, $message);
    
    // Exécution de la requête
    if ($stmt->execute()) {
        header("Location: index.html");
    } else {
        echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
    }

    // Fermeture du statement
    $stmt->close();
} else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();

?>
