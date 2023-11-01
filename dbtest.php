<?php
$servername = "localhost"; // Adresse du serveur MySQL (généralement localhost)
$username = "root"; // Nom d'utilisateur MySQL
$password = "root"; // Mot de passe MySQL
$dbname = "portfolio"; // Nom de la base de données

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $date = date("Y-m-d H:i:s"); // Date actuelle au format MySQL

    // Échappez les données pour éviter les attaques SQL par injection
    $nom = mysqli_real_escape_string($conn, $nom);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    // Insérez les données dans la base de données
    $sql = "INSERT INTO formulaire_contact (nom, email, message, date) VALUES ('$nom', '$email', '$message', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Votre message a été enregistré avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermez la connexion à la base de données
$conn->close();
?>
<?php
$servername = "localhost"; // Adresse du serveur MySQL (généralement localhost)
$username = "votre_nom_utilisateur"; // Nom d'utilisateur MySQL
$password = "votre_mot_de_passe"; // Mot de passe MySQL
$dbname = "nom_de_votre_base_de_donnees"; // Nom de la base de données

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $date = date("Y-m-d H:i:s"); // Date actuelle au format MySQL

    // Échappez les données pour éviter les attaques SQL par injection
    $nom = mysqli_real_escape_string($conn, $nom);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    // Insérez les données dans la base de données
    $sql = "INSERT INTO formulaire_contact (nom, email, message, date) VALUES ('$nom', '$email', '$message', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Votre message a été enregistré avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermez la connexion à la base de données
$conn->close();
?>
