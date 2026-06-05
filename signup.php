<?php
$pageTitle = 'Sign Up';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/auth.php';

if (user()) {
    header('Location: index.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($name === '') {
        $errors[] = 'Name is required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    if (!$errors) {
        $existing = db()->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
        $existing->execute(['email' => $email]);

        if ($existing->fetch()) {
            $errors[] = 'That email already has an account. Please login instead.';
        }
    }

    if (!$errors) {
        $statement = db()->prepare(
            'INSERT INTO users (name, email, password_hash)
             VALUES (:name, :email, :password_hash)'
        );

        $statement->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        login_user_by_id((int) db()->lastInsertId());
        header('Location: index.php');
        exit;
    }
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
        <form class="admin-card" method="post" action="signup.php">
            <img class="admin-logo" src="assets/images/agape-logo.jpg" alt="<?= e($church['name']); ?> logo">
            <p class="eyebrow">Website Access</p>
            <h1>Create your access account.</h1>

            <?php foreach ($errors as $error): ?>
                <div class="error-message"><?= e($error); ?></div>
            <?php endforeach; ?>

            <label>
                Name
                <input type="text" name="name" value="<?= e($_POST['name'] ?? ''); ?>" required>
            </label>
            <label>
                Email
                <input type="email" name="email" value="<?= e($_POST['email'] ?? ''); ?>" required>
            </label>
            <label>
                Password
                <input type="password" name="password" required>
            </label>
            <label>
                Confirm Password
                <input type="password" name="confirm_password" required>
            </label>
            <button class="button primary" type="submit">Sign Up</button>
            <a href="login.php">Already have an account? Login</a>
        </form>
    </main>
</body>
</html>
