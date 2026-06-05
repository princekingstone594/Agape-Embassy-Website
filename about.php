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
            <h3>Our Vision</h3>
            <p>To be a transformed and empowered community of Christian believers.</p>
        </article>
        <article>
            <span>02</span>
            <h3>Our Mission Statement</h3>
            <p>To go into all the world reaching them with the gospel and with the gospel of Christ.</p>
        </article>
        <article>
            <span>03</span>
            <h3>Core Values</h3>
            <p>Love, Excellence, Truth, Honesty, and Integrity.</p>
        </article>
        <article>
            <span>04</span>
            <h3>Call Scripture</h3>
            <p>John 15:13</p>
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
