<?php
$pageTitle = 'Dashboard';
require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin();

$memberCount = (int) db()->query('SELECT COUNT(*) FROM members')->fetchColumn();
$messageConsentCount = (int) db()->query('SELECT COUNT(*) FROM members WHERE receive_messages = 1')->fetchColumn();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?> | <?= e($church['name']); ?></title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header class="admin-header">
        <a class="admin-brand" href="dashboard.php">
            <img src="../assets/images/agape-logo.jpg" alt="<?= e($church['name']); ?> logo">
            <span>
                <strong>Admin Dashboard</strong>
                <small><?= e($church['short_name']); ?></small>
            </span>
        </a>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="members.php">Members</a>
            <a href="../index.php">Website</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="admin-main">
        <section class="admin-title">
            <p class="eyebrow">Welcome</p>
            <h1>Hello, <?= e(admin()['name']); ?>.</h1>
            <p>Manage members first. Email and SMS notifications will build on this foundation.</p>
        </section>

        <section class="admin-stats">
            <article>
                <span><?= e((string) $memberCount); ?></span>
                <p>Registered Members</p>
            </article>
            <article>
                <span><?= e((string) $messageConsentCount); ?></span>
                <p>Can Receive Messages</p>
            </article>
            <article>
                <span>Next</span>
                <p>Email & SMS announcements</p>
            </article>
        </section>
    </main>
</body>
</html>
