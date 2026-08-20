<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/auth.php';

$pageTitle = $pageTitle ?? $church['name'];
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$currentAdmin = admin();
$currentUser = user();
$currentAccount = $currentAdmin ?: $currentUser;
$visibleNavItems = [
    'index.php' => 'Home',
    'about.php' => 'About',
    'sermons.php' => 'Sermons',
    'ministries.php' => 'Ministries',
];
$moreNavItems = [
    'leaders.php' => 'Leaders',
    'events.php' => 'Events',
    'testimonials.php' => 'Testimonials',
    'giving.php' => 'Giving',
    'register.php' => 'Register',
    'contact.php' => 'Contact',
];
$profileImage = $currentAccount['profile_image'] ?? '';
$profileInitial = strtoupper(substr($currentAccount['name'] ?? 'A', 0, 1));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?> | <?= e($church['name']); ?></title>
    <link rel="preconnect" href="https://images.unsplash.com">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php" aria-label="<?= e($church['name']); ?> home">
            <img class="brand-logo" src="assets/images/agape-logo.jpg" alt="<?= e($church['name']); ?> logo">
            <span class="brand-copy">
                <strong class="brand-name"><?= e($church['short_name']); ?></strong>
            </span>
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-backdrop" data-close-menu></div>

        <nav class="site-nav" id="site-navigation" aria-label="Main navigation">
            <div class="mobile-nav-heading">
                <strong>Menu</strong>
                <button type="button" class="menu-close" data-close-menu aria-label="Close menu">Close</button>
            </div>
            <div class="nav-row primary-nav">
                <?php foreach ($visibleNavItems as $file => $label): ?>
                    <a class="<?= $currentPage === $file ? 'active' : ''; ?>" href="<?= e($file); ?>"><?= e($label); ?></a>
                <?php endforeach; ?>
                <div class="more-nav-wrap">
                    <button class="see-more-toggle" type="button" aria-expanded="false" aria-controls="more-navigation" data-see-more-toggle>
                        See more
                    </button>
                    <div class="more-nav" id="more-navigation" data-more-nav hidden>
                        <?php foreach ($moreNavItems as $file => $label): ?>
                            <a class="<?= $currentPage === $file ? 'active' : ''; ?>" href="<?= e($file); ?>"><?= e($label); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="account-actions">
                <?php if ($currentAdmin): ?>
                    <span class="profile-chip">
                        <?php if ($profileImage): ?>
                            <img class="profile-avatar" src="<?= e($profileImage); ?>" alt="<?= e($currentAdmin['name']); ?> profile picture">
                        <?php else: ?>
                            <span class="profile-initial"><?= e($profileInitial); ?></span>
                        <?php endif; ?>
                        <span><?= e($currentAdmin['name']); ?></span>
                    </span>
                    <a href="admin/dashboard.php">Dashboard</a>
                    <a href="logout.php">Logout</a>
                <?php elseif ($currentUser): ?>
                    <span class="profile-chip">
                        <?php if ($profileImage): ?>
                            <img class="profile-avatar" src="<?= e($profileImage); ?>" alt="<?= e($currentUser['name']); ?> profile picture">
                        <?php else: ?>
                            <span class="profile-initial"><?= e($profileInitial); ?></span>
                        <?php endif; ?>
                        <span><?= e($currentUser['name']); ?></span>
                    </span>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="signup.php">Sign Up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
