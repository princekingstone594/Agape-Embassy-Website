USE agape_embassy_db;

INSERT INTO admins (name, email, password_hash)
VALUES (
    'Agape Admin',
    'admin@agapeembassy.test',
    '$2y$10$wS74XFYyjy2iU4wHMSo8t.nrPtAFw3C1rwJGmAB7LSgPGaRrUbbDi'
)
ON DUPLICATE KEY UPDATE
    name = VALUES(name),
    password_hash = VALUES(password_hash);
