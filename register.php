<?php
$pageTitle = 'Church Membership Registration';
require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/config/database.php';

$submitted = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $bornAgain = trim($_POST['born_again'] ?? 'Not Sure');
    $assembly = trim($_POST['assembly'] ?? '');
    $hbcFellowship = trim($_POST['hbc_fellowship'] ?? '');
    $ministryInterest = trim($_POST['ministry_interest'] ?? '');
    $notes = trim($_POST['notes'] ?? '');
    $receiveMessages = isset($_POST['receive_messages']) ? 1 : 0;

    if ($fullName === '') {
        $errors[] = 'Full name is required.';
    }

    if ($phone === '') {
        $errors[] = 'Contact number is required.';
    }

    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email address is not valid.';
    }

    if ($assembly === '') {
        $errors[] = 'Assembly is required.';
    }

    if ($hbcFellowship !== '' && !in_array($hbcFellowship, $hbcFellowships, true)) {
        $errors[] = 'HBC fellowship is not valid.';
    }

    if (!in_array($bornAgain, ['Yes', 'No', 'Not Sure'], true)) {
        $errors[] = 'Born again status is not valid.';
    }

    if (!$errors) {
        $statement = db()->prepare(
            'INSERT INTO members (full_name, phone, email, address, born_again, assembly, hbc_fellowship, ministry_interest, receive_messages, notes)
             VALUES (:full_name, :phone, :email, :address, :born_again, :assembly, :hbc_fellowship, :ministry_interest, :receive_messages, :notes)'
        );

        $statement->execute([
            'full_name' => $fullName,
            'phone' => $phone,
            'email' => $email ?: null,
            'address' => $address ?: null,
            'born_again' => $bornAgain,
            'assembly' => $assembly,
            'hbc_fellowship' => $hbcFellowship ?: null,
            'ministry_interest' => $ministryInterest ?: null,
            'receive_messages' => $receiveMessages,
            'notes' => $notes ?: null,
        ]);

        $submitted = true;
        $_POST = [];
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-hero register-hero">
    <div>
        <p class="eyebrow">Church Membership</p>
        <h1>Register to join or connect with the ministry.</h1>
    </div>
</section>

<section class="section contact-layout">
    <div>
        <p class="eyebrow">Membership Registration</p>
        <h2>Share your church membership details.</h2>
        <p>This form is for joining or connecting with Agape Embassy Ministries International. It is different from website account sign up.</p>
    </div>

    <form class="contact-form" method="post" action="register.php">
        <?php if ($submitted): ?>
            <div class="success-message">Thank you. Your church membership registration has been received.</div>
        <?php endif; ?>

        <?php foreach ($errors as $error): ?>
            <div class="error-message"><?= e($error); ?></div>
        <?php endforeach; ?>

        <label>
            Full Name
            <input type="text" name="full_name" value="<?= e($_POST['full_name'] ?? ''); ?>" required>
        </label>
        <label>
            Contact Number
            <input type="text" name="phone" value="<?= e($_POST['phone'] ?? ''); ?>" required>
        </label>
        <label>
            Email
            <input type="email" name="email" value="<?= e($_POST['email'] ?? ''); ?>">
        </label>
        <label>
            Address / Location
            <input type="text" name="address" value="<?= e($_POST['address'] ?? ''); ?>">
        </label>
        <label>
            Are you born again?
            <select name="born_again">
                <?php foreach (['Yes', 'No', 'Not Sure'] as $option): ?>
                    <option value="<?= e($option); ?>" <?= ($_POST['born_again'] ?? 'Not Sure') === $option ? 'selected' : ''; ?>><?= e($option); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Ministry Interest
            <select name="ministry_interest">
                <option value="">Choose ministry</option>
                <?php foreach ($ministries as $ministry): ?>
                    <option value="<?= e($ministry['name']); ?>" <?= ($_POST['ministry_interest'] ?? '') === $ministry['name'] ? 'selected' : ''; ?>><?= e($ministry['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Assembly You Would Like To Join
            <select name="assembly" required>
                <option value="">Choose assembly</option>
                <?php foreach ($assemblies as $assembly): ?>
                    <option value="<?= e($assembly); ?>" <?= ($_POST['assembly'] ?? '') === $assembly ? 'selected' : ''; ?>><?= e($assembly); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            HBC Fellowship
            <select name="hbc_fellowship">
                <option value="">Choose HBC fellowship</option>
                <?php foreach ($hbcFellowships as $hbcFellowship): ?>
                    <option value="<?= e($hbcFellowship); ?>" <?= ($_POST['hbc_fellowship'] ?? '') === $hbcFellowship ? 'selected' : ''; ?>><?= e($hbcFellowship); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Notes
            <textarea name="notes" rows="4"><?= e($_POST['notes'] ?? ''); ?></textarea>
        </label>
        <label class="checkbox-label">
            <input type="checkbox" name="receive_messages" value="1" checked>
            I agree to receive ministry messages by phone or email.
        </label>
        <button class="button primary" type="submit">Submit Membership Registration</button>
    </form>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
