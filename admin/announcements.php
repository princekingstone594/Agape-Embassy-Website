<?php
$pageTitle = 'Announcements';
require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/announcements.php';

require_admin();

$errors = [];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($title === '') {
        $errors[] = 'Announcement title is required.';
    }

    if ($message === '') {
        $errors[] = 'Announcement message is required.';
    }

    if (!$errors) {
        create_announcement($title, $message);
        $submitted = true;
        $_POST = [];
    }
}

$announcements = latest_announcements(20);
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
                <strong>Announcements</strong>
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
            <p class="eyebrow">Announcements</p>
            <h1>Publish updates to the homepage.</h1>
            <p>Write an announcement here and it will appear in the homepage announcements section.</p>
        </section>

        <section class="admin-panel-grid">
            <form class="admin-card admin-form-card" method="post" action="announcements.php">
                <h2>New Announcement</h2>

                <?php if ($submitted): ?>
                    <div class="success-message">Announcement published to the homepage.</div>
                <?php endif; ?>

                <?php foreach ($errors as $error): ?>
                    <div class="error-message"><?= e($error); ?></div>
                <?php endforeach; ?>

                <label>
                    Title
                    <input type="text" name="title" value="<?= e($_POST['title'] ?? ''); ?>" required>
                </label>
                <label>
                    Message
                    <textarea name="message" rows="6" required><?= e($_POST['message'] ?? ''); ?></textarea>
                </label>
                <button class="button primary" type="submit">Publish Announcement</button>
            </form>

            <section class="announcement-admin-list">
                <?php if (!$announcements): ?>
                    <article class="announcement-card">
                        <p>No announcements published yet.</p>
                    </article>
                <?php endif; ?>

                <?php foreach ($announcements as $announcement): ?>
                    <article class="announcement-card">
                        <p class="meta"><?= e($announcement['created_at']); ?></p>
                        <h3><?= e($announcement['title']); ?></h3>
                        <p><?= nl2br(e($announcement['message'])); ?></p>
                    </article>
                <?php endforeach; ?>
            </section>
        </section>
    </main>
</body>
</html>
