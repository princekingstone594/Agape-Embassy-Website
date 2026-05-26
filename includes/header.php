<?php
require_once __DIR__ . '/data.php';

$pageTitle = $pageTitle ?? $church['name'];
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$navItems = [
    'index.php' => 'Home',
    'about.php' => 'About',
    'ministries.php' => 'Ministries',
    'events.php' => 'Events',
    'sermons.php' => 'Sermons',
    'giving.php' => 'Giving',
    'social.php' => 'Social',
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
            <span>
                <strong><?= e($church['name']); ?></strong>
                <small><?= e($church['tagline']); ?></small>
            </span>
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="site-nav" id="site-navigation" aria-label="Main navigation">
            <?php foreach ($navItems as $file => $label): ?>
                <a class="<?= $currentPage === $file ? 'active' : ''; ?>" href="<?= e($file); ?>"><?= e($label); ?></a>
            <?php endforeach; ?>
        </nav>
    </header>

    <main>
