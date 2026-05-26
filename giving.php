<?php
$pageTitle = 'Giving';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero giving-hero">
    <div>
        <p class="eyebrow">Giving</p>
        <h1>Participate in giving and support the work of ministry.</h1>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Kingdom Partnership</p>
        <h2>Give with faith, honor, and a willing heart.</h2>
        <p>Your giving supports worship services, discipleship, outreach, conferences, assemblies, ministry projects, and the compassionate work of Agape Hand of Mercy.</p>
    </div>
    <div class="giving-details">
        <h3>Giving Details</h3>
        <p>Payment details will be added here.</p>
        <p class="meta">M-Pesa Paybill / Till / Bank details pending</p>
    </div>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Ways to Give</p>
        <h2>Choose the area you want to support.</h2>
    </div>
    <div class="card-grid">
        <?php foreach ($givingOptions as $option): ?>
            <article class="info-card">
                <h3><?= e($option['name']); ?></h3>
                <p><?= e($option['summary']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
