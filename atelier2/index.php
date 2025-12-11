<?php
session_start();

// Si déjà connecté avec un cookie valide → redirection automatique
if (
    isset($_COOKIE['authToken'], $_SESSION['authToken'], $_SESSION['role']) &&
    $_COOKIE['authToken'] === $_SESSION['authToken']
) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: page_admin.php');
        exit();
    } elseif ($_SESSION['role'] === 'user') {
        header('Location: page_user.php');
        exit();
    }
}

// Soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérification admin / secret → page_admin.php
    if ($username === 'admin' && $password === 'secret') {
        // Exo 2 : token unique
        $token = bin2hex(random_bytes(16));

        // On mémorise dans la session
        $_SESSION['authToken'] = $token;
        $_SESSION['role'] = 'admin';

        // Exo 1 : cookie valable 60 secondes
        setcookie('authToken', $token, time() + 60, '/', '', false, true);

        header('Location: page_admin.php');
        exit();
    }

    // Vérification user / utilisateur → page_user.php (Exo 3)
    if ($username === 'user' && $password === 'utilisateur') {
        $token = bin2hex(random_bytes(16));

        $_SESSION['authToken'] = $token;
        $_SESSION['role'] = 'user';

        setcookie('authToken', $token, time() + 60, '/', '', false, true);

        header('Location: page_user.php');
        exit();
    }

    // Sinon : identifiants incorrects
    $error = "Nom d'utilisateur ou mot de passe incorrect.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Atelier 2</title>
</head>
<body>
    <h1>Atelier 2 : Authentification par Cookie</h1>
    <h3>La page admin est accessible avec <code>admin / secret</code></h3>
    <h3>La page user est accessible avec <code>user / utilisateur</code></h3>

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
    <a href="../index.html">Retour à l'accueil</a>
</body>
</html>
