<?php
// login.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // ---- Exercice 3 : Login spécial user/utilisateur ----
    if ($username === 'user' && $password === 'utilisateur') {

        // Token unique
        $token = bin2hex(random_bytes(16));

        // Cookie valable 1 minute
        setcookie('authToken', $token, time() + 60, '/');
        setcookie('login', $username, time() + 60, '/');

        header('Location: page_user.php');
        exit;
    }

    // ---- Exercice 1 & 2 : les autres utilisateurs ----
    if (!empty($username) && !empty($password)) {
        
        // Exercice 1 : token simple, Exercice 2 : token unique
        $token = bin2hex(random_bytes(16)); 
    
        setcookie('authToken', $token, time() + 60, '/');
        setcookie('login', $username, time() + 60, '/');

        header('Location: page_protegee.php');
        exit;
    }

    $error = "Identifiants invalides.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Atelier 2</title>
</head>
<body>
    <h1>Connexion Atelier 2</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label>Login :
            <input type="text" name="login" required>
        </label><br><br>

        <label>Mot de passe :
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
