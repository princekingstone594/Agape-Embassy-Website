<?php
require_once __DIR__ . '/data.php';

$pageTitle = $pageTitle ?? $church['name'];
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$primaryNavItems = [
    'index.php' => 'Home',
    'about.php' => 'About',
    'leaders.php' => 'Leaders',
    'ministries.php' => 'Ministries',
    'events.php' => 'Events',
];
$secondaryNavItems = [
    'sermons.php' => 'Sermons',
    'testimonials.php' => 'Testimonials',
    'giving.php' => 'Giving',
    'register.php' => 'Register',
    'contact.php' => 'Contact',
];
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
                <span class="brand-meta">
                    <small><?= e($church['tagline']); ?></small>
                    <small><?= e($church['scripture']); ?></small>
                </span>
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
                <?php foreach ($primaryNavItems as $file => $label): ?>
                    <a class="<?= $currentPage === $file ? 'active' : ''; ?>" href="<?= e($file); ?>"><?= e($label); ?></a>
                <?php endforeach; ?>
            </div>
            <div class="nav-row secondary-nav">
                <?php foreach ($secondaryNavItems as $file => $label): ?>
                    <a class="<?= $currentPage === $file ? 'active' : ''; ?>" href="<?= e($file); ?>"><?= e($label); ?></a>
                <?php endforeach; ?>
            </div>
        </nav>
    </header>

    <main>
