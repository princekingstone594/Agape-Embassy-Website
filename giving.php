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
    <div class="giving-details" id="giving-details">
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
                <button
                    class="button primary"
                    type="button"
                    data-payment-open
                    data-giving-type="<?= e($option['name']); ?>"
                    data-giving-action="<?= e($option['action']); ?>"
                >
                    <?= e($option['action']); ?>
                </button>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<div class="payment-modal" data-payment-modal aria-hidden="true">
    <div class="payment-modal-backdrop" data-payment-close></div>
    <section class="payment-dialog" role="dialog" aria-modal="true" aria-labelledby="payment-title">
        <button class="payment-close" type="button" data-payment-close aria-label="Close payment form">Close</button>
        <p class="eyebrow">Giving Approval</p>
        <h2 id="payment-title">Approve Giving</h2>
        <p class="payment-context" data-payment-context>Complete your giving details below.</p>

        <form class="payment-form" data-payment-form method="post" action="payment-request.php">
            <input type="hidden" name="giving_type" data-payment-type value="">

            <label>
                Name
                <input type="text" name="name" required>
            </label>
            <label>
                Amount
                <input type="number" name="amount" min="1" step="1" required>
            </label>
            <label>
                Mode of Payment
                <select name="payment_mode" required>
                    <option value="">Choose mode</option>
                    <option value="mpesa">M-Pesa</option>
                    <option value="airtel_money">Airtel Money</option>
                    <option value="paypal">PayPal</option>
                    <option value="vooma">Vooma</option>
                </select>
            </label>
            <label>
                Phone Number
                <input type="tel" name="phone" placeholder="e.g. 254729487946" required>
            </label>

            <div class="payment-status" data-payment-status hidden></div>
            <button class="button primary" type="submit" data-payment-submit>Approve</button>
        </form>
    </section>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
