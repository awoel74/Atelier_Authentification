<?php
// page_user.php

// Vérifier que le cookie existe encore
if (empty($_COOKIE['authToken']) || empty($_COOKIE['login'])) {
    header('Location: login.php');
    exit;
}

// Vérifier que c'est bien l'utilisateur autorisé
if ($_COOKIE['login'] !== 'user') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page USER</title>
</head>
<body>
    <h1>Bienvenue USER</h1>
    <p>Cette page est réservée à l'utilisateur <strong>user</strong> avec le mot de passe <strong>utilisateur</strong>.</p>

    <p><a href="page_protegee.php">Retour page protégée</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
