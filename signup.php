<?php
$pageTitle = 'Sign Up';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/auth.php';

if (admin()) {
    header('Location: admin/dashboard.php');
    exit;
}

if (user()) {
    header('Location: index.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $accountType = trim($_POST['account_type'] ?? 'user');

    if ($name === '') {
        $errors[] = 'Username is required.';
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

    if (!in_array($accountType, ['user', 'admin'], true)) {
        $errors[] = 'Choose a valid account type.';
    }

    if (!$errors) {
        $existingUser = db()->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
        $existingUser->execute(['email' => $email]);
        $existingAdmin = db()->prepare('SELECT id FROM admins WHERE email = :email LIMIT 1');
        $existingAdmin->execute(['email' => $email]);

        if ($existingUser->fetch() || $existingAdmin->fetch()) {
            $errors[] = 'That email already has an account. Please login instead.';
        }
    }

    if (!$errors) {
        $table = $accountType === 'admin' ? 'admins' : 'users';
        $statement = db()->prepare("INSERT INTO {$table} (name, email, password_hash) VALUES (:name, :email, :password_hash)");

        $statement->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        if ($accountType === 'admin') {
            login_admin_by_id((int) db()->lastInsertId());
            header('Location: admin/dashboard.php');
            exit;
        }

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
            <p>Choose Admin for dashboard access or User for normal website access.</p>

            <?php foreach ($errors as $error): ?>
                <div class="error-message"><?= e($error); ?></div>
            <?php endforeach; ?>

            <label>
                Username
                <input type="text" name="username" value="<?= e($_POST['username'] ?? ''); ?>" required>
            </label>
            <label>
                Email
                <input type="email" name="email" value="<?= e($_POST['email'] ?? ''); ?>" required>
            </label>
            <label>
                Account Type
                <select name="account_type" required>
                    <?php foreach (['user' => 'User', 'admin' => 'Admin'] as $value => $label): ?>
                        <option value="<?= e($value); ?>" <?= ($_POST['account_type'] ?? 'user') === $value ? 'selected' : ''; ?>><?= e($label); ?></option>
                    <?php endforeach; ?>
                </select>
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
