<?php
session_start();

// Autorisé uniquement si role = admin
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page ADMIN - Atelier 3</title>
</head>
<body>
    <h1>Page ADMIN (Atelier 3)</h1>
    <p>Bienvenue <strong>admin</strong>. Vous êtes authentifié via une <strong>session</strong> côté serveur.</p>

    <p><a href="index.php">Retour à l'accueil de l'atelier 3</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
