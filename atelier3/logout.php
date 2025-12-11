<?php
session_start();

// On vide la session
$_SESSION = [];
session_unset();
session_destroy();

// Retour à l'accueil de l'atelier 3
header('Location: index.php');
exit();
