<?php
$pageTitle = 'Contact';
require_once __DIR__ . '/includes/header.php';

$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
?>

<section class="page-hero contact-hero">
    <div>
        <p class="eyebrow">Contact</p>
        <h1>Connect with Agape Embassy Ministries International.</h1>
    </div>
</section>

<section class="section contact-layout">
    <div>
        <h2>Visit or send a message</h2>
        <p><?= e($church['address']); ?></p>
        <p><?= e($church['phone']); ?></p>
        <p><?= e($church['email']); ?></p>
        <p><?= e($church['leaders']); ?></p>
        <a class="button secondary" href="register.php">Register as Member</a>
    </div>

    <form class="contact-form" method="post" action="contact.php">
        <?php if ($submitted): ?>
            <div class="success-message">Thank you. Your message has been received.</div>
        <?php endif; ?>

        <label>
            Name
            <input type="text" name="name" required>
        </label>
        <label>
            Email
            <input type="email" name="email" required>
        </label>
        <label>
            Message
            <textarea name="message" rows="5" required></textarea>
        </label>
        <button class="button primary" type="submit">Send Message</button>
    </form>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
