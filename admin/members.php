<?php
$pageTitle = 'Members';
require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin();

$statement = db()->query('SELECT * FROM members ORDER BY created_at DESC');
$members = $statement->fetchAll();
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
                <strong>Members</strong>
                <small><?= e($church['short_name']); ?></small>
            </span>
        </a>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="members.php">Members</a>
            <a href="../register.php">Register Member</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="admin-main">
        <section class="admin-title">
            <p class="eyebrow">Members</p>
            <h1>Registered members and contacts.</h1>
            <p>These contacts will later be available for email and SMS announcements.</p>
        </section>

        <section class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Born Again</th>
                        <th>Assembly</th>
                        <th>HBC</th>
                        <th>Ministry</th>
                        <th>Messages</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$members): ?>
                        <tr>
                            <td colspan="9">No members registered yet.</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?= e($member['full_name']); ?></td>
                            <td><?= e($member['phone']); ?></td>
                            <td><?= e($member['email'] ?: '-'); ?></td>
                            <td><?= e($member['address'] ?: '-'); ?></td>
                            <td><?= e($member['born_again']); ?></td>
                            <td><?= e($member['assembly']); ?></td>
                            <td><?= e($member['hbc_fellowship'] ?: '-'); ?></td>
                            <td><?= e($member['ministry_interest'] ?: '-'); ?></td>
                            <td><?= $member['receive_messages'] ? 'Yes' : 'No'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
