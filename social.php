<?php
$pageTitle = 'Social Media';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero social-hero">
    <div>
        <p class="eyebrow">Social Media</p>
        <h1>Follow Agape Embassy Ministries International online.</h1>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Stay Connected</p>
        <h2>Watch, follow, share, and keep up with ministry updates.</h2>
        <p>Use this page for official social media handles, livestream links, conference announcements, and ministry media.</p>
    </div>
    <div class="social-list">
        <?php foreach ($socialLinks as $social): ?>
            <a class="social-row" href="<?= e($social['url']); ?>">
                <span><?= e($social['platform']); ?></span>
                <strong><?= e($social['handle']); ?></strong>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
