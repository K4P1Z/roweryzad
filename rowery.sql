SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `kategoria` varchar(50) NOT NULL,
  `src` text NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `produkty` (`id`, `kategoria`, `src`, `opis`) VALUES
(1, '1', 'https://www.bikeatelier.pl/32212-large_default/rower-merida-one-twenty-400.jpg', 'Rower górski 1'),
(2, '1', 'https://www.bikeatelier.pl/36711-large_default/rower-merida-bignine-300-lite.jpg', 'Rower górski 2'),
(3, '1', 'https://www.bikeatelier.pl/32211-large_default/rower-mbike-tin-26-10-v.jpg', 'Rower górski 3'),
(4, '2', 'https://www.bikeatelier.pl/32215-large_default/rower-merida-crossway-20.jpg', 'Rower crossowy 1'),
(5, '2', 'https://www.bikeatelier.pl/32304-large_default/rower-merida-crossway-15-d.jpg', 'Rower crossowy 2'),
(6, '2', 'https://www.bikeatelier.pl/32337-large_default/rower-merida-crossway-500.jpg', 'Rower crossowy 3'),
(7, '3', 'https://www.bikeatelier.pl/32939-large_default/rower-puky-lr-light.jpg', 'Rower biegowy 1'),
(8, '3', 'https://www.bikeatelier.pl/32478-large_default/rower-puky-lr-m-classic-z-koszykiem.jpg', 'Rower biegowy 2'),
(9, '3', 'https://www.bikeatelier.pl/32849-large_default/rower-puky-lr-m.jpg', 'Rower biegowy 3');

ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;