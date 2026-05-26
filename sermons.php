<?php
$pageTitle = 'Sermons';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero sermons-hero">
    <div>
        <p class="eyebrow">Sermons</p>
        <h1>Recent messages from our teaching team.</h1>
    </div>
</section>

<section class="section">
    <div class="sermon-list">
        <?php foreach ($sermons as $sermon): ?>
            <article class="sermon-row">
                <div>
                    <p class="meta"><?= e($sermon['date']); ?></p>
                    <h2><?= e($sermon['title']); ?></h2>
                    <p><?= e($sermon['speaker']); ?> - <?= e($sermon['scripture']); ?></p>
                </div>
                <button type="button" class="button secondary">Listen</button>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
