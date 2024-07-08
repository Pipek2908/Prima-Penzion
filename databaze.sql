-- Active: 1720432043181@@127.0.0.1@3306@penzion
--vytvoreni nove databze penzion

CREATE DATABASE penzion DEFAULT CHARSET utf8mb4;

SHOW TABLES;

CREATE TABLE stranka (
    id VARCHAR(255) PRIMARY KEY,
    obsah TEXT,
    titulek VARCHAR(255),
    menu VARCHAR(255),
    obrazek VARCHAR(255),
    poradi INT UNSIGNED DEFAULT 0
);



INSERT INTO stranka SET id="404", obsah="<section>
    <h1>Chyba 404</h1>

    <p>Stranka neexistuje.</p>
</section>", titulek="Stranka neexistuje", obrazek="primapenzion-room2_optimized.jpg";

SELECT * FROM stranka;

