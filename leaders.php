<?php
$pageTitle = 'Leaders';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero leaders-hero">
    <div>
        <p class="eyebrow">Ministry Leaders</p>
        <h1>Servant leaders carrying the vision of Agape Embassy.</h1>
    </div>
</section>

<section class="section">
    <div class="section-heading">
        <p class="eyebrow">Leadership Profiles</p>
        <h2>Meet the leaders of the ministry.</h2>
    </div>
    <div class="leader-grid">
        <?php foreach ($leaders as $leader): ?>
            <article class="leader-card">
                <?php if ($leader['image']): ?>
                    <img src="<?= e($leader['image']); ?>" alt="<?= e($leader['name']); ?>">
                <?php else: ?>
                    <div class="leader-photo-placeholder"><?= e(substr($leader['name'], 0, 1)); ?></div>
                <?php endif; ?>
                <div>
                    <p class="meta"><?= e($leader['role']); ?></p>
                    <h2><?= e($leader['name']); ?></h2>
                    <p><?= e($leader['bio']); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
