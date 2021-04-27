-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 27, 2021 alle 17:54
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_system`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `attivato` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `nome`, `email`, `attivato`, `token`) VALUES
(20, 'noemi123', '$2y$10$EMpJDe7QNQ/1H1l1o2Vu7.JD.5Eg170dL7O1TNEd8etZLl4pA6jCW', 'noemi123', 'prova12345prova12345prova12345@gmail.com', 1, '088689e2529df7ffa7ec1b32ae2d4d5dfc37ff9b16d68ac0f5525ce19a65c431'),
(23, 'nicola3102', '$2y$10$0tTd2tnwNHeEzRW/MggwzeW7JjBMbS2EUASbH8J99EbP0zd.7ix6e', 'nicola3102', 'larguent@noisemails.com', 1, 'afdce15b9a65358000a594b359b31d7018f56bbb2b46434d0ff4cd8b2a183aaf');

-- --------------------------------------------------------

--
-- Struttura della tabella `utentiloggati`
--

CREATE TABLE `utentiloggati` (
  `session_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utentiloggati`
--

INSERT INTO `utentiloggati` (`session_id`, `user_id`) VALUES
('vvdkcjqktc6tj39k2rho671eqr', 23);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indici per le tabelle `utentiloggati`
--
ALTER TABLE `utentiloggati`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
