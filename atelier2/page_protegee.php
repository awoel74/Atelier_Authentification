<?php
// page_protegee.php

// Cookie expiré ou absent → retour login
if (empty($_COOKIE['authToken'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page protégée</title>
</head>
<body>
    <h1>Page protégée (Atelier 2)</h1>
    <p>Vous êtes connecté via un cookie valable 1 minute.</p>

    <p><a href="page_user.php">Accès à la page user</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
