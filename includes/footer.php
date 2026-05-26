<?php require_once __DIR__ . '/data.php'; ?>
    </main>

    <footer class="site-footer">
        <div>
            <strong><?= e($church['name']); ?></strong>
            <p><?= e($church['address']); ?></p>
        </div>
        <div>
            <p><?= e($church['phone']); ?></p>
            <p><?= e($church['email']); ?></p>
            <p><a href="giving.php">Participate in Giving</a> · <a href="social.php">Social Media</a></p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
