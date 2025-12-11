<?php
session_start();

// Vérifier que le cookie existe et correspond bien au token en session,
// ET que le rôle est bien "admin"
if (
    empty($_COOKIE['authToken']) ||
    empty($_SESSION['authToken']) ||
    $_COOKIE['authToken'] !== $_SESSION['authToken'] ||
    ($_SESSION['role'] ?? '') !== 'admin'
) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page ADMIN</title>
</head>
<body>
    <h1>Bienvenue sur la page ADMIN</h1>
    <p>Vous êtes connecté en tant qu'<strong>admin</strong>. Le cookie est valable 1 minute.</p>

    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
