USE agape_embassy_db;

ALTER TABLE members
    ADD COLUMN IF NOT EXISTS hbc_fellowship VARCHAR(120) NULL AFTER assembly;
