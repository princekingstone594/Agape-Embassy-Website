<?php

require_once __DIR__ . '/../config/database.php';

function ensure_giving_requests_table(): void
{
    db()->exec(
        "CREATE TABLE IF NOT EXISTS giving_requests (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            giving_type VARCHAR(160) NOT NULL,
            name VARCHAR(160) NOT NULL,
            amount DECIMAL(12, 2) NOT NULL,
            payment_mode VARCHAR(40) NOT NULL,
            phone VARCHAR(40) NOT NULL,
            status VARCHAR(40) NOT NULL DEFAULT 'Pending STK Configuration',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
    );
}

function create_giving_request(array $data): int
{
    ensure_giving_requests_table();

    $statement = db()->prepare(
        'INSERT INTO giving_requests (giving_type, name, amount, payment_mode, phone, status)
         VALUES (:giving_type, :name, :amount, :payment_mode, :phone, :status)'
    );

    $statement->execute([
        'giving_type' => $data['giving_type'],
        'name' => $data['name'],
        'amount' => $data['amount'],
        'payment_mode' => $data['payment_mode'],
        'phone' => $data['phone'],
        'status' => $data['status'] ?? 'Pending STK Configuration',
    ]);

    return (int) db()->lastInsertId();
}

function giving_requests(): array
{
    ensure_giving_requests_table();

    $statement = db()->query('SELECT * FROM giving_requests ORDER BY created_at DESC');
    return $statement->fetchAll();
}
