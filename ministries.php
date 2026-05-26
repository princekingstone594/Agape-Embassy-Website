<?php
$pageTitle = 'Ministries';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero ministry-hero">
    <div>
        <p class="eyebrow">Ministries</p>
        <h1>Find a place to belong, grow, and serve.</h1>
    </div>
</section>

<section class="section">
    <div class="card-grid">
        <?php foreach ($ministries as $ministry): ?>
            <article class="info-card">
                <h2><?= e($ministry['name']); ?></h2>
                <p><?= e($ministry['summary']); ?></p>
                <a href="contact.php">Join this ministry</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Departments</p>
        <h2>Serve with your gifts.</h2>
    </div>
    <div class="pill-grid">
        <?php foreach ($departments as $department): ?>
            <span><?= e($department); ?></span>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
