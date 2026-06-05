<?php
$pageTitle = 'Events';
require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero events-hero">
    <div>
        <p class="eyebrow">Events</p>
        <h1>Conferences and gatherings for the Agape family.</h1>
    </div>
</section>

<section class="section">
    <div class="event-list">
        <?php foreach ($events as $event): ?>
            <article class="event-row">
                <div class="date-block"><?= e($event['date']); ?></div>
                <div>
                    <h2><?= e($event['title']); ?></h2>
                    <p><?= e($event['time']); ?> at <?= e($event['location']); ?></p>
                    <p><?= e($event['description']); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
