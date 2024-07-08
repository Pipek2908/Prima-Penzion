-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 07. čen 2024, 13:15
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `penzion`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `stranka`
--

DROP TABLE IF EXISTS `stranka`;
CREATE TABLE `stranka` (
  `id` varchar(255) NOT NULL,
  `obsah` text DEFAULT NULL,
  `titulek` varchar(255) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `obrazek` varchar(255) DEFAULT NULL,
  `poradi` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `stranka`
--

INSERT INTO `stranka` (`id`, `obsah`, `titulek`, `menu`, `obrazek`, `poradi`) VALUES
('404', '<section>\r\n<h1>Chyba 404</h1>\r\n<p>Stranka neexistuje.</p>\r\n</section>', 'Stranka neexistuje', 'Napište nám', 'primapenzion-room2_optimized.jpg', 4),
('domu', '<section>\r\n<div class=\"obsah\">\r\n<div class=\"container\">\r\n<h1>Penzion a restauraceeeeeeeeeeeeee</h1>\r\n<h2>Inspirováno krásnými věcmi.</h2>\r\n<p>Hledáte ubytování v západních Čechách nebo dokonce klidný penzion v západních Čechách? Pak jste na správném místě. Rodinný penzion Žuhansta nabízí kromě příjemného a levného ubytování i celou řadu možností pro pořádání společenských akcí či výletů po okolní přírodě (oblast řeky Berounky), která je na seznamu UNESCO.</p>\r\n</div>\r\n</div>\r\n</section>', 'PrimaPenzion', 'Home', 'primapenzion-main_optimized.jpg', 0),
('galerie', '<section>\r\n<div class=\"obsah\">\r\n<div class=\"container\">\r\n<h1>Galerie</h1>\r\n<div class=\"galerie\"><a href=\"#\"> <img src=\"img/img1-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img2-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img3-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img4-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img5-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img6-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img7-min_optimized.jpg\" alt=\"obr\"> </a> <a href=\"#\"> <img src=\"img/img8-min_optimized.jpg\" alt=\"obr\"> </a></div>\r\n</div>\r\n</div>\r\n</section>', 'Fotogalerie', 'Foto', 'primapenzion-pool-min_optimized.jpg', 1),
('kontakt', '<section>\r\n<div class=\"kontakt\">\r\n<div class=\"container\">\r\n<div class=\"kontaktGrey\">\r\n<h1>Kontakt</h1>\r\n<div class=\"kontaktFlex\">\r\n<div class=\"kontaktBox\">\r\n<p><i class=\"fa-regular fa-map\"></i> <b>PrimaPenzion</b>, Jablonského 2, Praha 7</p>\r\n<p><i class=\"fa-regular fa-comment\"></i> <a href=\"tel:+420606123456\">+420 / 606 123 456</a></p>\r\n<p><i class=\"fa-regular fa-paper-plane\"></i> <span>info@primapenzion.cz</span></p>\r\n</div>\r\n<div class=\"kontaktBox\">\r\n<p><b>Po - Pá:</b> 8h - 20h</p>\r\n<p><b>So:</b> 10h - 22h</p>\r\n<p><b>Ne:</b> Zavřeno</p>\r\n</div>\r\n</div>\r\n<div class=\"karty\">\r\n<p>Přijímáme platební karty</p>\r\n<p><i class=\"fa-brands fa-cc-visa\"></i><i class=\"fa-brands fa-cc-mastercard\"></i><i class=\"fa-brands fa-bitcoin\"></i></p>\r\n</div>\r\n</div>\r\n<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2558.8954906605863!2d14.441053599999998!3d50.106963099999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94b58406182b%3A0x1f35b827dff20972!2sJablonsk%C3%A9ho%20640%2F2%2C%20170%2000%20Praha%207-Hole%C5%A1ovice!5e0!3m2!1scs!2scz!4v1716455360862!5m2!1scs!2scz\" width=\"400&quot;\" height=\"300\" style=\"border: 0;\" allowfullscreen=\"allowfullscreen\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\" sandbox=\"\">\r\n            </iframe>\r\n<div class=\"kontaktGrey\">\r\n<h2>Napište Nám</h2>\r\n<form action=\"#\" method=\"post\"><input type=\"text\" name=\"jmeno\" placeholder=\"Jméno\"> <input type=\"text\" name=\"prijmeni\" placeholder=\"Příjmení\"> <input type=\"email\" name=\"email\" placeholder=\"E-mail\"> <textarea name=\"vzkaz\" placeholder=\"Napište nám\"></textarea> <input type=\"submit\" value=\"odeslat\"></form></div>\r\n</div>\r\n</div>\r\n</section>', 'Kontakt', 'Napište nám', 'primapenzion-room2_optimized.jpg', 3),
('rezervace', '<section>\r\n<div class=\"kontakt rezervace\">\r\n<div class=\"container\">\r\n<div class=\"kontaktGrey\">\r\n<h1>Rezervace</h1>\r\n<form action=\"#\"><label> Vaše jméno <input type=\"text\" name=\"jmeno\" placeholder=\"Napište vaše jméno\"> </label> <label> Vaše příjmení <input type=\"text\" name=\"prijmeni\" placeholder=\"Napište vaše příjmení\"> </label> <label> Kolik s vámi pojede ratolestí <input type=\"number\" name=\"deti\" placeholder=\"Počet dětí\"> </label> <label> Kolik pojede dospělých <input type=\"number\" name=\"dospely\" placeholder=\"Počet dospělých\"> </label> <label> Kdy k nám přijedete <input type=\"date\" name=\"prijezd\" placeholder=\"Datum příjezdu\"> </label> <label> Do kdy u nás zůstanete <input type=\"date\" name=\"odjezd\" placeholder=\"Datum odjezdu\"> </label> <label> Kam vám můžeme napsat <input type=\"email\" name=\"mail\" placeholder=\"Napište vaš e-mail \"> </label> <label> Máte nějaké speciální přání <textarea name=\"vzkaz\" placeholder=\"Zanechte váš vzkaz \"></textarea> </label> <input type=\"submit\" value=\"odeslat\"></form></div>\r\n</div>\r\n</div>\r\n</section>', 'Rezervace', 'Chci pokoj', 'primapenzion-room_optimized.jpg', 2);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `stranka`
--
ALTER TABLE `stranka`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
