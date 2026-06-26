<?php

require_once __DIR__ . '/../config/database.php';

function start_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        $sessionPath = __DIR__ . '/../storage/sessions';

        if (!is_dir($sessionPath)) {
            mkdir($sessionPath, 0775, true);
        }

        session_save_path($sessionPath);
        session_start();
    }
}

function admin(): ?array
{
    start_session();
    return $_SESSION['admin'] ?? null;
}

function user(): ?array
{
    start_session();
    return $_SESSION['user'] ?? null;
}

function require_admin(): void
{
    if (!admin()) {
        header('Location: login.php');
        exit;
    }
}

function login_admin(string $email, string $password): bool
{
    $statement = db()->prepare('SELECT id, name, email, password_hash FROM admins WHERE email = :email LIMIT 1');
    $statement->execute(['email' => $email]);
    $admin = $statement->fetch();

    if (!$admin || !password_verify($password, $admin['password_hash'])) {
        return false;
    }

    start_session();
    $_SESSION['admin'] = [
        'id' => (int) $admin['id'],
        'name' => $admin['name'],
        'email' => $admin['email'],
    ];
    unset($_SESSION['user']);

    return true;
}

function login_user(string $email, string $password): bool
{
    $statement = db()->prepare('SELECT id, name, email, password_hash FROM users WHERE email = :email LIMIT 1');
    $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        return false;
    }

    start_session();
    $_SESSION['user'] = [
        'id' => (int) $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ];
    unset($_SESSION['admin']);

    return true;
}

function login_user_by_id(int $userId): void
{
    $statement = db()->prepare('SELECT id, name, email FROM users WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $userId]);
    $user = $statement->fetch();

    if (!$user) {
        return;
    }

    start_session();
    $_SESSION['user'] = [
        'id' => (int) $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ];
    unset($_SESSION['admin']);
}

function login_admin_by_id(int $adminId): void
{
    $statement = db()->prepare('SELECT id, name, email FROM admins WHERE id = :id LIMIT 1');
    $statement->execute(['id' => $adminId]);
    $admin = $statement->fetch();

    if (!$admin) {
        return;
    }

    start_session();
    $_SESSION['admin'] = [
        'id' => (int) $admin['id'],
        'name' => $admin['name'],
        'email' => $admin['email'],
    ];
    unset($_SESSION['user']);
}

function logout_admin(): void
{
    start_session();
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
}

function logout_user(): void
{
    start_session();
    unset($_SESSION['user']);
}

function logout_account(): void
{
    start_session();
    unset($_SESSION['admin'], $_SESSION['user']);
}
