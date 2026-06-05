<?php
$pageTitle = 'Login';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/auth.php';

if (user()) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (login_user($email, $password)) {
        header('Location: index.php');
        exit;
    }

    $error = 'Invalid email or password.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?> | <?= e($church['name']); ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="admin-auth-page">
    <main class="admin-auth-shell">
        <form class="admin-card" method="post" action="login.php">
            <img class="admin-logo" src="assets/images/agape-logo.jpg" alt="<?= e($church['name']); ?> logo">
            <p class="eyebrow">Website Access</p>
            <h1>Login to continue.</h1>

            <?php if ($error): ?>
                <div class="error-message"><?= e($error); ?></div>
            <?php endif; ?>

            <label>
                Email
                <input type="email" name="email" required>
            </label>
            <label>
                Password
                <input type="password" name="password" required>
            </label>
            <button class="button primary" type="submit">Login</button>
            <a href="signup.php">No account? Sign up</a>
        </form>
    </main>
</body>
</html>
