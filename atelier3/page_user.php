<?php
session_start();

// Autorisé uniquement si role = user
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page USER - Atelier 3</title>
</head>
<body>
    <h1>Page USER (Atelier 3)</h1>
    <p>Bienvenue <strong>user</strong> (mot de passe : <strong>utilisateur</strong>). Vous êtes authentifié via une <strong>session</strong>.</p>

    <p><a href="index.php">Retour à l'accueil de l'atelier 3</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
