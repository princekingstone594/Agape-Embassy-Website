<?php
$pageTitle = 'Welcome';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <p class="eyebrow">Worship with us this Sunday</p>
        <h1><?= e($church['name']); ?></h1>
        <p><?= e($church['tagline']); ?></p>
        <div class="hero-actions">
            <a class="button primary" href="events.php">Plan a Visit</a>
            <a class="button secondary" href="giving.php">Participate in Giving</a>
        </div>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Service Times</p>
        <h2>A modern ministry family with Christ at the center.</h2>
        <p>Led by <?= e($church['leaders']); ?>, Agape Embassy gathers to worship, disciple, serve, and reach people with the love of God.</p>
    </div>
    <div class="schedule-list">
        <?php foreach ($church['service_times'] as $name => $time): ?>
            <article class="schedule-item">
                <span><?= e($name); ?></span>
                <strong><?= e($time); ?></strong>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Upcoming</p>
        <h2>Conferences & Gatherings</h2>
    </div>
    <div class="card-grid">
        <?php foreach (array_slice($events, 0, 3) as $event): ?>
            <article class="info-card">
                <p class="meta"><?= e($event['date']); ?></p>
                <h3><?= e($event['title']); ?></h3>
                <p><?= e($event['time']); ?> at <?= e($event['location']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Giving</p>
        <h2>Partner with what God is doing through Agape Embassy.</h2>
        <p>Give towards offerings, tithe, church projects, prophetic giving, love offerings, and organisation donations.</p>
    </div>
    <div class="giving-preview">
        <?php foreach (array_slice($givingOptions, 0, 4) as $option): ?>
            <span><?= e($option['name']); ?></span>
        <?php endforeach; ?>
        <a class="button primary" href="giving.php">View Giving Options</a>
    </div>
</section>

<section class="section band split">
    <div>
        <p class="eyebrow">Online</p>
        <h2>Connect with the ministry on social media.</h2>
        <p>Follow services, announcements, conference updates, testimonies, and ministry moments online.</p>
    </div>
    <div class="social-preview">
        <?php foreach ($socialLinks as $social): ?>
            <a href="<?= e($social['url']); ?>"><?= e($social['platform']); ?></a>
        <?php endforeach; ?>
    </div>
</section>

<section class="section cta-row">
    <div>
        <p class="eyebrow">Get Connected</p>
        <h2>Join a ministry, department, or assembly near you.</h2>
    </div>
    <a class="button primary" href="contact.php">Contact Us</a>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
