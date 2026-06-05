<?php
$pageTitle = 'Testimonials';
require_once __DIR__ . '/includes/header.php';

$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
?>

<section class="page-hero testimonials-hero">
    <div>
        <p class="eyebrow">Testimonies</p>
        <h1>Stories of God at work through the ministry.</h1>
    </div>
</section>

<section class="section split">
    <div>
        <p class="eyebrow">Share Your Story</p>
        <h2>Testimonies and feedback strengthen the church family.</h2>
        <p>Use this space for testimonies, feedback from services, conference experiences, prayer reports, and ministry interactions.</p>
    </div>

    <form class="contact-form" method="post" action="testimonials.php">
        <?php if ($submitted): ?>
            <div class="success-message">Thank you. Your testimony has been received for review.</div>
        <?php endif; ?>

        <label>
            Name
            <input type="text" name="name" required>
        </label>
        <label>
            Phone or Email
            <input type="text" name="contact" required>
        </label>
        <label>
            Testimony / Feedback
            <textarea name="message" rows="5" required></textarea>
        </label>
        <button class="button primary" type="submit">Submit Testimony</button>
    </form>
</section>

<section class="section band">
    <div class="section-heading">
        <p class="eyebrow">Shared Stories</p>
        <h2>Recent testimonies and ministry feedback.</h2>
    </div>
    <div class="testimonial-grid">
        <?php foreach ($testimonials as $testimonial): ?>
            <article class="quote-card">
                <p>"<?= e($testimonial['message']); ?>"</p>
                <strong><?= e($testimonial['name']); ?></strong>
                <span><?= e($testimonial['context']); ?></span>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
