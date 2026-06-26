<?php

require_once __DIR__ . '/../config/database.php';

function ensure_announcements_table(): void
{
    db()->exec(
        "CREATE TABLE IF NOT EXISTS announcements (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(180) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
    );
}

function create_announcement(string $title, string $message): void
{
    ensure_announcements_table();

    $statement = db()->prepare(
        'INSERT INTO announcements (title, message) VALUES (:title, :message)'
    );
    $statement->execute([
        'title' => $title,
        'message' => $message,
    ]);
}

function latest_announcements(int $limit = 5): array
{
    ensure_announcements_table();

    $limit = max(1, min($limit, 12));
    $statement = db()->query('SELECT * FROM announcements ORDER BY created_at DESC LIMIT ' . $limit);
    return $statement->fetchAll();
}

function announcement_count(): int
{
    ensure_announcements_table();

    return (int) db()->query('SELECT COUNT(*) FROM announcements')->fetchColumn();
}
