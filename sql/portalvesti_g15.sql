-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2017 at 06:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalvesti_g15`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `IDKomentara` int(11) NOT NULL,
  `IDKorisnika` int(11) DEFAULT NULL,
  `IDVesti` int(11) DEFAULT NULL,
  `BrojHejtova` int(11) DEFAULT '0',
  `BrojLajkova` int(11) DEFAULT '0',
  `NaslovKomentara` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TextKomentara` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`IDKomentara`, `IDKorisnika`, `IDVesti`, `BrojHejtova`, `BrojLajkova`, `NaslovKomentara`, `TextKomentara`) VALUES
(2, 1, 3, 2, 1, 'Naslov', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed ante sit amet enim imperdiet tempus. Phasellus vel aliquam enim. Phasellus sit amet velit in justo varius ornare.'),
(3, 1, 1, 0, 0, 'Neki naslov za Komentar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur cursus imperdiet lacus ut aliquam. Nunc blandit eros non lacus placerat tristique. Aenean faucibus nisi ligula, nec blandit augue convallis tristique. Curabitur efficitur pulvinar magna eget vulputate. Nam mattis lorem orci, et dictum ex gravida vitae.'),
(4, 1, 1, 0, 0, 'Drugi Komentar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur cursus imperdiet lacus ut aliquam. Nunc blandit eros non lacus placerat tristique. Aenean faucibus nisi ligula, nec blandit augue convallis tristique. Curabitur efficitur pulvinar magna eget vulputate. Nam mattis lorem orci, et dictum ex gravida vitae.'),
(5, 1, 1, 0, 0, 'Treci Komentar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur cursus imperdiet lacus ut aliquam. Nunc blandit eros non lacus placerat tristique. Aenean faucibus nisi ligula, nec blandit augue convallis tristique. Curabitur efficitur pulvinar magna eget vulputate. Nam mattis lorem orci, et dictum ex gravida vitae.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `IDKorisnika` int(11) NOT NULL,
  `Ime` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prezime` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Šifra` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mobilni` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adresa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Slika` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Komentar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`IDKorisnika`, `Ime`, `Prezime`, `Email`, `Šifra`, `Mobilni`, `Adresa`, `Slika`, `Komentar`) VALUES
(1, 'Administrator', 'G15', 'admin@g15.com', 'e10adc3949ba59abbe56e057f20f883e', '+381 666-2133', 'Adresa 123, Beograd, Srbija', 'images/admin.png', 'G15 - Administrator. Bojan Andjelkoski i Askovic Lazar.');

-- --------------------------------------------------------

--
-- Table structure for table `opcije`
--

CREATE TABLE `opcije` (
  `id` int(11) NOT NULL,
  `Blok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kategorija` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Broj` int(11) NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opcije`
--

INSERT INTO `opcije` (`id`, `Blok`, `Kategorija`, `Broj`, `Sortiranje`) VALUES
(1, 'D', '1', 5, 1),
(2, 'E', '2', 5, 1),
(3, 'L', '3', 5, 1),
(4, 'F', '4', 5, 1),
(5, 'G', '4_1', 5, 1),
(6, 'H', '3_1', 5, 1),
(7, 'I', '2_1', 5, 1),
(8, 'J', '1_2', 5, 1),
(9, 'K', '5', 5, 1),
(10, 'A', '0', 4, 3),
(11, 'B', '0', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `IDVesti` int(11) NOT NULL,
  `IDKorisnika` int(11) DEFAULT NULL,
  `PodKategorija` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Naslov` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `BrojHejtova` int(11) DEFAULT '0',
  `BrojLajkova` int(11) DEFAULT '0',
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`IDVesti`, `IDKorisnika`, `PodKategorija`, `Naslov`, `BrojHejtova`, `BrojLajkova`, `datum`) VALUES
(1, 1, '4, 4_1', 'GOLMAN JUVENTUSA NEUTEŠAN Bufon: Imaću još jednu šansu da svojim Ligu šampona!', 0, 6, '2017-06-04 11:57:27'),
(2, 1, '4, 4_1', 'SKROMNI RONALDO: Postali smo prvi klub koji je odbranio trofej u LŠ! Šta još mogu da tražim?', 0, 4, '2017-06-04 11:58:02'),
(3, 1, '4, 4_1', 'MAŽIĆ SUDI REALU I JUVENTUSU: Srbija ima svog predstavnika u finalu LŠ', 2, 19, '2017-06-04 11:58:45'),
(4, 1, '4, 4_1', 'FULAM ZACEPIO CENU: Hoćete Jokana? Dajte 6.000.000!', 0, 2, '2017-06-04 11:59:15'),
(5, 1, '4, 4_3', 'ĐOKOVIĆ NIŠTA NE PREPUŠTA SLUČAJU: Evo kako se Novak priprema za osminu finala Rolan Garosa', 0, 0, '2017-06-04 11:59:53'),
(6, 1, '4, 4_2', 'PUKLA STOTKA U PIONIRU: Mega šokirala Partizan. Zvezda nadigrala Dinamik', 0, 0, '2017-06-04 12:00:26'),
(7, 1, '1, 1_2, 1_3', 'Komisija upala u \"Frikom\", ispituju POVREDU KONKURENCIJE', 0, 0, '2017-06-04 15:53:03'),
(8, 1, '2, 2_1', 'DS ne ide na konsultacije jer \"sa Vučićem nema o čemu da priča\"', 0, 0, '2017-06-04 15:53:43'),
(9, 1, '1, 1_3', 'Potpredsednici Vang i Ljajić otvorili Sajam \"Put svile 2017\"', 0, 0, '2017-06-04 15:54:40'),
(10, 1, '1, 1_3', 'Vučić: Srbija ne oseća krizu u Agrokoru, ali osećaju DOBAVLJAČI', 0, 0, '2017-06-04 15:56:08'),
(11, 1, '1, 1_2, 1_3', 'Obim trgovinske razmene Srbije i Rusije i do 2 milijarde dolara', 0, 0, '2017-06-04 15:57:12'),
(12, 1, '1, 1_2', 'Dinar u ponedeljak 122,3165 evra', 0, 0, '2017-06-04 15:57:56'),
(13, 1, '5, 5_4', 'Miloš Timotijević: Od predstave \"Zoran Đinđić\" niko me više nije zvao da igram u pozorištu', 0, 0, '2017-06-04 16:01:13'),
(14, 1, '5', 'Preminuo španski pisac Huan Gojtisolo', 0, 0, '2017-06-04 16:01:54'),
(15, 1, '5, 5_4', 'Sterijino pozorje ove godine bez pobednika', 0, 0, '2017-06-04 16:02:34'),
(16, 1, '3, 3_1', 'Algoritmi na delu: “Netflix o korisnicima zna više od Googlea”', 0, 0, '2017-06-04 16:03:44'),
(17, 1, '3, 3_2', 'Kraj jedne ere: Zbogom, del.icio.us!', 0, 0, '2017-06-04 16:04:33'),
(18, 1, '3, 3_1', 'Microsoft greškom poslao Windows 10 nadogradnju, uređaji otkazali', 0, 0, '2017-06-04 16:04:58'),
(19, 1, '3, 3_1', 'Qualcomm: Baterije ćete od sada puniti brže i trajaće duže', 0, 0, '2017-06-04 16:05:26'),
(20, 1, '3, 3_1, 3_2', '9 korisnih saveta za lakše korišćenje Googlea', 0, 0, '2017-06-04 16:06:04'),
(21, 1, '3', 'REVIEW: Injustice 2', 0, 0, '2017-06-04 16:06:33'),
(22, 1, '2, 2_1', '\"Vučić da podnese ostavku u SNS, pa da pozove\"', 0, 0, '2017-06-04 16:07:22'),
(23, 1, '2, 2_1', 'SDS: Ne pada nam na pamet... LDP: Idemo kod Vučića', 0, 0, '2017-06-04 16:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`IDKomentara`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`IDKorisnika`);

--
-- Indexes for table `opcije`
--
ALTER TABLE `opcije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`IDVesti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `IDKomentara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `IDKorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `IDVesti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
