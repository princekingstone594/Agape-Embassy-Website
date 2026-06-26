<?php
$pageTitle = 'Giving Requests';
require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/giving_requests.php';

require_admin();

$requests = giving_requests();
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
                <strong>Giving Requests</strong>
                <small><?= e($church['short_name']); ?></small>
            </span>
        </a>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="members.php">Members</a>
            <a href="giving.php">Giving</a>
            <a href="announcements.php">Announcements</a>
            <a href="../index.php">Website</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="admin-main">
        <section class="admin-title">
            <p class="eyebrow">Giving</p>
            <h1>Giving payment requests.</h1>
            <p>These are giving details submitted from the public Giving page. STK status will update here after provider integration is connected.</p>
        </section>

        <section class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Giving Type</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Mode</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$requests): ?>
                        <tr>
                            <td colspan="7">No giving requests submitted yet.</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?= e($request['created_at']); ?></td>
                            <td><?= e($request['giving_type']); ?></td>
                            <td><?= e($request['name']); ?></td>
                            <td><?= e(number_format((float) $request['amount'], 2)); ?></td>
                            <td><?= e($request['payment_mode']); ?></td>
                            <td><?= e($request['phone']); ?></td>
                            <td><?= e($request['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
