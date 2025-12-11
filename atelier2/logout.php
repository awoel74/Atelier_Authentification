<?php
session_start();

// On vide la session
$_SESSION = [];
session_destroy();

// On supprime le cookie
setcookie('authToken', '', time() - 3600, '/', '', false, true);

// Retour à la page de login
header('Location: index.php');
exit();
