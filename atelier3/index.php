<?php
session_start();

/*
 * EXO 2 : Compteur de visites de la page d'accueil
 * On incrémente uniquement sur les requêtes GET
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 0;
    }
    $_SESSION['visits']++;
}

/*
 * EXO 1 : Authentification par SESSION
 *  admin / secret      -> page_admin.php
 *  user / utilisateur  -> page_user.php
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // admin / secret
    if ($username === 'admin' && $password === 'secret') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = 'admin';
        header('Location: page_admin.php');
        exit();
    }

    // user / utilisateur
    if ($username === 'user' && $password === 'utilisateur') {
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = 'user';
        header('Location: page_user.php');
        exit();
    }

    $error = "Nom d'utilisateur ou mot de passe incorrect.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Atelier 3 - Authentification par Session</title>
</head>
<body>
    <h1>Atelier 3 : Authentification par Session</h1>

    <p>
        <?php
        $visits = $_SESSION['visits'] ?? 0;
        echo "Vous avez visité cette page d'accueil <strong>{$visits}</strong> fois.";
        ?>
    </p>

    <hr>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Se connecter</button>
    </form>

    <br>
    <a href="../index.html">Retour à l'accueil général</a>
</body>
</html>
