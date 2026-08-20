USE agape_embassy_db;

ALTER TABLE users
    ADD COLUMN IF NOT EXISTS profile_image VARCHAR(255) NULL AFTER email;

ALTER TABLE admins
    ADD COLUMN IF NOT EXISTS profile_image VARCHAR(255) NULL AFTER email;
