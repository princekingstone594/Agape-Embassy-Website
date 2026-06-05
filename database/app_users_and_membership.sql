USE agape_embassy_db;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(160) NOT NULL,
    email VARCHAR(160) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE members
    DROP INDEX IF EXISTS members_email_unique,
    DROP COLUMN IF EXISTS password_hash,
    ADD COLUMN IF NOT EXISTS address VARCHAR(190) NULL AFTER email,
    ADD COLUMN IF NOT EXISTS born_again ENUM('Yes', 'No', 'Not Sure') NOT NULL DEFAULT 'Not Sure' AFTER address;
