<?php
session_start();

if (!isset($_COOKIE['authToken']) || $_COOKIE['authToken'] !== '12345') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page admin</title>
</head>
<body>
    <h1>Bienvenue sur la page ADMIN</h1>
    <p>Vous êtes connecté via un cookie valable 1 minute.</p>

    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
