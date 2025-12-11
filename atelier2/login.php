<?php
// login.php

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // ⚠️ Pour l'instant : on accepte n'importe quel couple login/mdp juste pour l'exemple
    // Tu peux remplacer cette partie par une vraie vérification si le prof vous en donne une.
    if (!empty($username) && !empty($password)) {

        // -------- EXERCICE 1 : COOKIE VALABLE 1 MINUTE --------
        // Token simple pour commencer (on le rend unique à l'exercice 2)
        $token = '12345';

        // Cookie valable 60 secondes
        setcookie('authToken', $token, time() + 60, '/');
        // On stocke aussi le login (utile pour l'exercice 3)
        setcookie('login', $username, time() + 60, '/');

        // Redirection vers une page protégée
        header('Location: page_protegee.php');
        exit;
    } else {
        $error = "Login ou mot de passe vide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Atelier 2</title>
</head>
<body>
    <h1>Connexion (Atelier 2)</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label>
            Login :
            <input type="text" name="login" required>
        </label><br><br>

        <label>
            Mot de passe :
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
