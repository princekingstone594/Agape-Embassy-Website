<?php
$pageTitle = 'About';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero about-hero">
    <div>
        <p class="eyebrow">Our Story</p>
        <h1><?= e($church['tagline']); ?></h1>
    </div>
</section>

<section class="section split">
    <div>
        <h2>Who We Are</h2>
        <p><?= e($church['name']); ?> is a ministry family committed to loving God, loving people, teaching the Word, raising disciples, and serving communities with compassion.</p>
    </div>
    <div>
        <h2>Leadership</h2>
        <p><?= e($church['leaders']); ?> serve the ministry through prayer, teaching, pastoral care, and vision for growing assemblies.</p>
    </div>
</section>

<section class="section band">
    <div class="values">
        <article>
            <span>01</span>
            <h3>Worship</h3>
            <p>We gather to honor God with reverence, joy, and expectation.</p>
        </article>
        <article>
            <span>02</span>
            <h3>Community</h3>
            <p>We build fellowship across families, youth, campuses, and assemblies.</p>
        </article>
        <article>
            <span>03</span>
            <h3>Mercy</h3>
            <p>We serve people with compassion through outreach and practical care.</p>
        </article>
    </div>
</section>

<section class="section">
    <div class="section-heading">
        <p class="eyebrow">Assemblies</p>
        <h2>One ministry family across many locations.</h2>
    </div>
    <div class="pill-grid">
        <?php foreach ($assemblies as $assembly): ?>
            <span><?= e($assembly); ?></span>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
