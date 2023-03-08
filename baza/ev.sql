-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 03:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAIL_ID` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`EMAIL_ID`, `PASSWORD`) VALUES
('admin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `BILL_ID` int(11) NOT NULL,
  `DL_NUM` varchar(10) NOT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `BOOKING_ID` int(11) NOT NULL,
  `BILL_DATE` date NOT NULL,
  `MODEL_NAME` varchar(30) DEFAULT NULL,
  `FROM_DATE` date DEFAULT NULL,
  `TO_DATE` date DEFAULT NULL,
  `NO_OF_DAYS` int(11) NOT NULL,
  `CPD` int(11) DEFAULT NULL,
  `PICK_LOC` char(30) DEFAULT NULL,
  `DROP_LOC` char(30) DEFAULT NULL,
  `GROSS_TOTAL` int(11) NOT NULL,
  `TOTAL_AMOUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`BILL_ID`, `DL_NUM`, `NAME`, `BOOKING_ID`, `BILL_DATE`, `MODEL_NAME`, `FROM_DATE`, `TO_DATE`, `NO_OF_DAYS`, `CPD`, `PICK_LOC`, `DROP_LOC`, `GROSS_TOTAL`, `TOTAL_AMOUNT`) VALUES
(114, '1111', 'Evelina  Kopić', 106, '2023-02-19', 'Kickscooter Max', '2023-02-21', '2023-02-22', 2, 80, 'AUTOBUSNI KOLODVOR', 'AUTOBUSNI KOLODVOR', 160, 179);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `BOOKING_ID` int(11) NOT NULL,
  `FROM_DT_TIME` date DEFAULT NULL,
  `RET_DT_TIME` date DEFAULT NULL,
  `AMOUNT` int(11) NOT NULL,
  `BOOKING_STATUS` char(1) NOT NULL,
  `PICKUP_LOC` char(4) NOT NULL,
  `DROP_LOC` char(4) NOT NULL,
  `REG_NUM` char(7) NOT NULL,
  `DL_NUM` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`BOOKING_ID`, `FROM_DT_TIME`, `RET_DT_TIME`, `AMOUNT`, `BOOKING_STATUS`, `PICKUP_LOC`, `DROP_LOC`, `REG_NUM`, `DL_NUM`) VALUES
(106, '2023-02-21', '2023-02-22', 80, 'Y', 'ABK', 'ABK', '19BH010', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `Message`) VALUES
(349, 'a@gmail.cok', 'T', 'a'),
(351, 'test@gmail.com', 'Test', 'Ovo je testna poruka.');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `EMAIL_ID` varchar(30) NOT NULL,
  `FNAME` varchar(25) NOT NULL,
  `MNAME` varchar(15) DEFAULT NULL,
  `LNAME` varchar(25) NOT NULL,
  `DL_NUMBER` char(8) NOT NULL,
  `PHONE_NUMBER` int(11) NOT NULL,
  `STREET` varchar(30) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATE_NAME` varchar(20) NOT NULL,
  `ZIPCODE` int(11) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`EMAIL_ID`, `FNAME`, `MNAME`, `LNAME`, `DL_NUMBER`, `PHONE_NUMBER`, `STREET`, `CITY`, `STATE_NAME`, `ZIPCODE`, `PASSWORD`) VALUES
('evelina@gmail.com', 'Evelina', '', 'Kopić', '1111', 2147483647, 'Ulica', 'Grad', 'Država', 0, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `location_details`
--

CREATE TABLE `location_details` (
  `LOCATION_ID` char(4) NOT NULL,
  `LOCATION_NAME` varchar(50) NOT NULL,
  `STREET` varchar(30) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATE_NAME` varchar(20) NOT NULL,
  `ZIPCODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_details`
--

INSERT INTO `location_details` (`LOCATION_ID`, `LOCATION_NAME`, `STREET`, `CITY`, `STATE_NAME`, `ZIPCODE`) VALUES
('ABK', 'AUTOBUSNI KOLODVOR', 'Četrnaesta ulica 97', 'ORAŠJE', 'POSAVSKI KANTON', 76270),
('GGP', 'Glavni Gradski Park', 'Treca ulica', 'ORAŠJE', 'POSAVSKI KANTON', 76270),
('GPA', 'Gradski Park', 'Osma ulica', 'ORAŠJE', 'POSAVSKI KANTON', 76270);

-- --------------------------------------------------------

--
-- Table structure for table `scooter`
--

CREATE TABLE `scooter` (
  `scooter_id` int(11) NOT NULL,
  `REGISTRATION_NUMBER` char(7) NOT NULL,
  `MODEL_NAME` varchar(25) NOT NULL,
  `MAKE` varchar(25) NOT NULL,
  `MODEL_YEAR` int(11) NOT NULL,
  `SCOOTER_RANGE` int(11) NOT NULL,
  `SCOOTER_CATEGORY_NAME` varchar(25) NOT NULL,
  `COST_PER_DAY` int(11) NOT NULL,
  `AVAILABILITY_FLAG` char(1) NOT NULL,
  `SCOOTER_DESCRIPTION` longtext NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scooter`
--

INSERT INTO `scooter` (`scooter_id`, `REGISTRATION_NUMBER`, `MODEL_NAME`, `MAKE`, `MODEL_YEAR`, `SCOOTER_RANGE`, `SCOOTER_CATEGORY_NAME`, `COST_PER_DAY`, `AVAILABILITY_FLAG`, `SCOOTER_DESCRIPTION`, `image`) VALUES
(1, '18BH002', 'Kqi3 Max', 'Niu', 2022, 100, 'SKUTER', 50, 'Y', 'Niu Kqi3 Max je električni skuter koji ima sve: snažan motor, velik domet, moderan izgled i još mnogo toga. Jako smo se zabavili vozeći ga uokolo, a posebno nas je impresioniralo kako se nosio s brdima. Prednja prstenasta prednja svjetla Kqi3 Maxa stvaraju pravi profil, a crvene mehaničke disk kočnice na prednjim i stražnjim kotačima daju osjećaj sportskog automobila.', 'skuter1.png'),
(2, '19BH010', 'Kickscooter Max', 'Segway', 2021, 120, 'SEGWAY', 80, 'Y', 'Segway je prilično pokrenuo tržište električnih skutera sa svojim osobnim transporterom, i iako taj uređaj nije baš zaživio, tvrtka je imala više uspjeha s manje futurističkim uređajima. Segway Ninebot Kickscooter Max ne izgleda kao nešto iz znanstveno-fantastičnog filma, ali ono što mu nedostaje u stilu, nadoknađuje performansama. To je jedan od najboljih električnih skutera za one koji žele dugu i udobnu vožnju. Pogledajte ostatak naše recenzije Segway Ninebot Kickscooter Max da vidite što nam se još svidjelo kod ovog masivnog električnog romobila.', 'skuter2.png'),
(3, '20BH004', 'V8', 'TurboAnt', 2020, 95, 'SKUTER', 70, 'Y', 'Kako sve više od nas koristi električne skutere za alternativni prijevoz - recimo, za odlazak na posao ili u trgovinu - povećava se vjerojatnost da će vaš skuter biti ukraden. Iako je dobra ideja zaključati svoj skuter za stalak za bicikl ili rasvjetni stup, mnogi od najboljih električnih skutera nemaju dobar način da to učinite.', 'skuter3.png'),
(4, '20BH009', 'City', 'Apollo', 2019, 80, 'SKUTER', 40, 'Y', 'Apollo City ima značajku koju sam dugo želio na električnim skuterima: pokazivače smjera. Ako ste ikada vozili skuter koji stoji i pokušali ispružiti ruku kako bi automobilima dali do znanja da skrećete, znat ćete kako sve postaje klimavo.', 'skuter4.png'),
(5, '20BH012', 'Explore', 'Apollo', 2022, 100, 'SKUTER', 100, 'Y', 'Da se franšiza Brzi i žestoki temelji na električnim skuterima, a ne na automobilima, Apollo Explore bi imao glavnu ulogu - sa ili bez dušika. Kad sam prvi put stao na ovaj skuter, nagazio na papučicu gasa i krenuo niz ulicu, znao sam da me čeka ozbiljna zabava.', 'skuter5.png'),
(6, '21BH003', 'GXL V2 ', 'GoTrax', 2021, 85, 'SKUTER', 75, 'Y', 'GoTrax GXL V2 je poput Honde električnih skutera; nećete osvojiti stilske bodove ili utrke, ali to je jeftin i pouzdan način putovanja na posao ili školu i s posla. Dok sam testirao GoTrax GXL V2 od 349 dolara za ovu recenziju, otkrio sam da nudi pouzdanu i udobnu, iako neuzbudljivu vožnju. Ali za mnoge je to sve što trebate.', 'skuter6.png'),
(7, '21BH005', 'Swagger 5 Boost', 'Swagtron', 2021, 100, 'SKUTER', 95, 'Y', 'Swagger 5 Boost zamjenjuje Swagtronov početni skuter za prigradsku vožnju, Elite, dok nadograđuje motor i gume. Iako njegov iznimno osnovni izgled neće osvojiti nikakve bodove za stil, postiže dobru ravnotežu između cijene i značajki. Otkrio sam da je savršeno sposoban za prijevoz okolo i između susjedstava u priličnoj količini udobnosti i pogodnosti.', 'skuter7.png'),
(8, '21BH006', 'XR Ultra', 'GoTrax', 2021, 110, 'SKUTER', 90, 'Y', 'Električni skuteri zgodna su alternativa prijevozu zadnje milje, ali cijena vrhunskih vožnji - više od 500 USD - može ih učiniti nedostižnim za potrošače koji traže jeftin način putovanja na posao ili jednostavno kretanje po gradu. GoTrax XR Ultra neće oboriti rekorde u brzini ili udaljenosti, ali to je solidno izgrađen model s razumnom cijenom koji će vas dovesti kamo trebate i jedan je od boljih električnih skutera ispod 500 USD. Pročitajte ostatak naše recenzije GoTrax XR Ultra da biste vidjeli kakav je u usporedbi s najboljim električnim skuterima.', 'skuter8.png'),
(9, '21BH011', 'E100', 'Razor', 2021, 80, 'SKUTER', 70, 'Y', 'Ako razmišljate o tome da svom djetetu kupite električni romobil, Razor E100 od 159 USD trebao bi biti visoko na vašem popisu. Ovo je skuter umjerene cijene napravljen za djecu u dobi od 8 do 12 godina. E100 ima zakretnu ručku gasa i dovoljno snage da im omogući vožnju brzinom do 10 milja na sat oko 40 minuta.', 'skuter9.png'),
(10, '22BH001', 'Model I', 'Unagi', 2022, 70, 'SKUTER', 65, 'Y', 'Na japanskom Unagi znači \"jegulja\" i to je prikladan naziv za tvrtku koja proizvodi jedan od najelegantnijih električnih skutera.\n\nUnagi Model One (990 USD) ne samo da klizi kroz gužvu, već to čini i sa snagom i pritom dobro izgleda.', 'skuter10.png'),
(11, '22BH007', 'Dolly', 'Glion', 2022, 85, 'SKUTER', 70, 'Y', 'Ovo je solidno izgrađen skuter. Aluminijski okvir Glion Dolly izgleda i čini se kao da može podnijeti mnogo zlostavljanja; lako je izdržao tjedan dana dok sam ga vozio središtem Manhattana. Upravljač mu se može podesiti na jednu od tri visine, a platforma skutera prekrivena je istom vrstom prianjajuće površine koju ćete pronaći na skateboardu. Noge su mi ostale čvrsto na njemu, bez obzira na sve.', 'skuter11.png'),
(12, '22BH008', 'Balto', 'Glion', 2022, 120, 'SKUTER', 110, 'Y', 'Kada je riječ o električnim skuterima s košarama, Glion Balto dobiva gotovo sve kako treba. Ima svjetla, pokazivače smjera, bočni retrovizor, a može se čak i preklopiti na pola, što olakšava spremanje. Ne želite ga koristiti kao skuter za sjedenje? Možete ukloniti njegovo sjedište. Osim toga, možete koristiti Baltovu bateriju za punjenje svoje elektronike u pokretu.', 'skuter12.png');

--
-- Triggers `scooter`
--
DELIMITER $$
CREATE TRIGGER `delete_car_id_0` AFTER INSERT ON `scooter` FOR EACH ROW BEGIN
    DELETE FROM car WHERE car_id = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `scooter_category`
--

CREATE TABLE `scooter_category` (
  `CATEGORY_NAME` varchar(25) NOT NULL,
  `NO_OF_LUGGAGE` int(11) NOT NULL,
  `NO_OF_PERSON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scooter_category`
--

INSERT INTO `scooter_category` (`CATEGORY_NAME`, `NO_OF_LUGGAGE`, `NO_OF_PERSON`) VALUES
('HOVERBOARD', 370, 5),
('QUAD', 400, 5),
('SEGWAY', 350, 1),
('SKUTER', 380, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EMAIL_ID`,`PASSWORD`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`BILL_ID`),
  ADD KEY `BILLINGFK1` (`BOOKING_ID`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD KEY `BOOKINGFK1` (`PICKUP_LOC`),
  ADD KEY `BOOKINGFK2` (`DROP_LOC`),
  ADD KEY `BOOKINGFK3` (`REG_NUM`),
  ADD KEY `BOOKINGFK4` (`DL_NUM`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`DL_NUMBER`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `location_details`
--
ALTER TABLE `location_details`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `scooter`
--
ALTER TABLE `scooter`
  ADD PRIMARY KEY (`REGISTRATION_NUMBER`),
  ADD UNIQUE KEY `id` (`scooter_id`),
  ADD KEY `CARFK1` (`SCOOTER_CATEGORY_NAME`);

--
-- Indexes for table `scooter_category`
--
ALTER TABLE `scooter_category`
  ADD PRIMARY KEY (`CATEGORY_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `BILL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `BILLINGFK1` FOREIGN KEY (`BOOKING_ID`) REFERENCES `booking_details` (`BOOKING_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
