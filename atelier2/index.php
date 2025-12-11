<?php
session_start();

// Si l'utilisateur a déjà un cookie valide, on le renvoie direct vers page_admin.php
if (isset($_COOKIE['authToken']) && $_COOKIE['authToken'] === '12345') {
    header('Location: page_admin.php');
    exit();
}

// Soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Login/mot de passe corrects ?
    if ($username === 'admin' && $password === 'secret') {
        // Cookie valable 60 secondes
        setcookie('authToken', '12345', time() + 60, '/', '', false, true); // 60 secondes
        header('Location: page_admin.php');
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Atelier authentification par Cookie</h1>
    <h3>La page <a href="page_admin.php">page_admin.php</a> est inaccessible tant que vous ne vous serez pas connecté avec le login 'admin' et mot de passe 'secret'</h3>

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
