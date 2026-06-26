<?php
$pageTitle = 'Welcome';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/announcements.php';

if (!admin() && !user()) {
    header('Location: login.php');
    exit;
}

$homepageAnnouncements = latest_announcements(4);

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
                <p><?= e($event['description']); ?></p>
                <a class="button primary" href="<?= e($eventRegistrationUrl); ?>">Register for Event</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section word-section">
    <div class="word-card">
        <p class="eyebrow">Word Of The Year</p>
        <h2><?= e($wordOfTheYear['year']); ?> <?= e(strtoupper($wordOfTheYear['theme'])); ?></h2>
        <p class="word-reference"><?= e($wordOfTheYear['reference']); ?></p>
        <blockquote><?= e($wordOfTheYear['verse']); ?></blockquote>
    </div>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Church Gallery</p>
        <h2>Church Gallery</h2>
    </div>
    <div class="moments-grid">
        <?php foreach ($ministryMoments as $moment): ?>
            <article class="moment-card">
                <img src="<?= e($moment['image']); ?>" alt="<?= e($moment['title']); ?>">
                <h3><?= e($moment['title']); ?></h3>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Leadership</p>
        <h2>Meet the leaders serving the vision.</h2>
        <p><?= e($church['leaders']); ?> lead the ministry through prayer, teaching, pastoral care, and kingdom service.</p>
        <a class="button secondary" href="leaders.php">View Leaders</a>
    </div>
    <div class="leader-preview">
        <?php foreach ($leaders as $leader): ?>
            <article class="mini-profile">
                <?php if ($leader['image']): ?>
                    <img class="mini-profile-photo" src="<?= e($leader['image']); ?>" alt="<?= e($leader['name']); ?>">
                <?php else: ?>
                    <div class="avatar-placeholder"><?= e(substr($leader['name'], 0, 1)); ?></div>
                <?php endif; ?>
                <div>
                    <h3><?= e($leader['name']); ?></h3>
                    <p><?= e($leader['role']); ?></p>
                </div>
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
        <div class="stream-actions">
            <?php foreach ($liveStreamLinks as $stream): ?>
                <a class="button primary" href="<?= e($stream['url']); ?>" target="_blank" rel="noopener">Watch/Stream Live on <?= e($stream['platform']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="social-preview">
        <?php foreach ($socialLinks as $social): ?>
            <a href="<?= e($social['url']); ?>"><?= e($social['platform']); ?></a>
        <?php endforeach; ?>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Testimonies</p>
        <h2>Stories of faith, growth, and encounter.</h2>
        <p>Members and visitors can share testimonies, feedback, and experiences from services, conferences, fellowships, and ministry interactions.</p>
    </div>
    <div class="testimonial-preview">
        <?php foreach (array_slice($testimonials, 0, 2) as $testimonial): ?>
            <article class="quote-card">
                <p>"<?= e($testimonial['message']); ?>"</p>
                <strong><?= e($testimonial['name']); ?></strong>
            </article>
        <?php endforeach; ?>
        <a class="button primary" href="testimonials.php">Read Testimonies</a>
    </div>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Announcements</p>
        <h2>Latest ministry updates.</h2>
    </div>
    <div class="announcement-grid">
        <?php if (!$homepageAnnouncements): ?>
            <article class="announcement-card">
                <p>No announcements have been published yet.</p>
            </article>
        <?php endif; ?>
        <?php foreach ($homepageAnnouncements as $announcement): ?>
            <article class="announcement-card">
                <p class="meta"><?= e($announcement['created_at']); ?></p>
                <h3><?= e($announcement['title']); ?></h3>
                <p><?= nl2br(e($announcement['message'])); ?></p>
            </article>
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
