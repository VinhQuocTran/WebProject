-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2022 lúc 03:23 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `airline_reservations_system_db`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ticket` (`FlightCode` INT(11), `DepartureDate` DATE, `EcoPrice` FLOAT, `BusPrice` FLOAT)   begin
	declare maxId int default 0;
    
	insert into ticket(flightcode,departuredate,ecoprice,busprice)
	values (FlightCode,DepartureDate,EcoPrice,BusPrice);
    

	set maxId=(select max(ticketid) from ticket);

    update ticket
    inner join flight on flight.flightcode=ticket.flightcode
    set 
		AvailEcoSeat=flight.EcoSeat,
		AvailBusSeat=flight.BusSeat
    where ticket.ticketid=maxId and flight.flightcode=ticket.flightcode;
end$$

DELIMITER ;

-- --------------------------------------------------------

CREATE TABLE `creditcard` (
  `AccountID` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Balanced` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `flight` (
  `FlightCode` int(11) NOT NULL,
  `TakeoffTime` time NOT NULL,
  `Duration` int(11) NOT NULL,
  `PlaneName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EcoSeat` int(11) NOT NULL,
  `BusSeat` int(11) NOT NULL,
  `Source` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SourceAP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Destination` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DestinationAP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `person` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) unique DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Name` varchar(50) DEFAULT '',
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) DEFAULT '',
  `DateOfBirth` date DEFAULT NULL,
  `DateOfRegister` date DEFAULT curdate(),
  `IsAdmin` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `planetype` (
  `PlaneName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PlaneLength` float NOT NULL,
  `PlaneWingspan` float NOT NULL,
  `Producer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `ticket` (
  `TicketID` int(11) NOT NULL,
  `FlightCode` int(11) NOT NULL,
  `DepartureDate` date NOT NULL,
  `EcoPrice` float NOT NULL,
  `BusPrice` float NOT NULL,
  `AvailEcoSeat` int(11) NOT NULL,
  `AvailBusSeat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ticketdetail` (
  `TicketDetailID` int(11) NOT NULL,
  `TicketID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `AmountEcoTicket` int(11) NOT NULL,
  `AmountBusTicket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELIMITER $$
CREATE TRIGGER `after_ticketdetail_insert` AFTER INSERT ON `ticketdetail` FOR EACH ROW begin
	update ticket
	set 	
		AvailEcoSeat=AvailEcoSeat-NEW.AmountEcoTicket,
		AvailBusSeat=AvailBusSeat-NEW.AmountBusTicket
	where ticketid=NEW.ticketid;
end
$$
DELIMITER ;

ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`AccountID`);

ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightCode`),
  ADD KEY `Flight_PlaneName_FK` (`PlaneName`);

ALTER TABLE `person`
  ADD PRIMARY KEY (`UserID`);

ALTER TABLE `planetype`
  ADD PRIMARY KEY (`PlaneName`);

ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `Ticket_FlightCode_FK` (`FlightCode`);

ALTER TABLE `ticketdetail`
  ADD PRIMARY KEY (`TicketDetailID`),
  ADD KEY `TicketDetail_Ticket_FK` (`TicketID`),
  ADD KEY `TicketDetail_Person_FK` (`UserID`);
  
ALTER TABLE `flight`
  MODIFY `FlightCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

ALTER TABLE `person`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `ticketdetail`
  MODIFY `TicketDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `flight`
  ADD CONSTRAINT `Flight_PlaneName_FK` FOREIGN KEY (`PlaneName`) REFERENCES `planetype` (`PlaneName`);

ALTER TABLE `ticket`
  ADD CONSTRAINT `Ticket_FlightCode_FK` FOREIGN KEY (`FlightCode`) REFERENCES `flight` (`FlightCode`);

ALTER TABLE `ticketdetail`
  ADD CONSTRAINT `TicketDetail_Person_FK` FOREIGN KEY (`UserID`) REFERENCES `person` (`UserID`),
  ADD CONSTRAINT `TicketDetail_Ticket_FK` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`TicketID`);
COMMIT;

INSERT INTO `creditcard` (`AccountID`, `Password`, `Balanced`) VALUES
('123456', '123456', 281100000),
('123abc', '123456', 100000);


INSERT INTO `planetype` (`PlaneName`, `PlaneLength`, `PlaneWingspan`, `Producer`) VALUES
('Airbus A321', 45, 34, 'Airbus'),
('Airbus A333', 50, 34, 'Airbus'),
('Airbus AB23', 65, 34, 'Airbus'),
('BOEING 777', 70, 35, 'BOEING'),
('BOEING 787', 75, 40, 'BOEING');

INSERT INTO `flight` (`TakeoffTime`, `Duration`, `PlaneName`, `EcoSeat`, `BusSeat`, `Source`, `SourceAP`, `Destination`, `DestinationAP`) VALUES
('02:00:00', 120, 'Airbus A321', 160, 20, 'TP Hồ Chí Minh', 'Tân Sân Nhất', 'Hà Nội', 'Nội Bài'),
('05:00:00', 75, 'Airbus A333', 140, 10, 'TP Hồ Chí Minh', 'Tân Sân Nhất', 'Đà Nẵng', 'Đà Nẵng'),

('20:30:00', 120, 'Airbus AB23', 180, 20, 'Hà Nội', 'Nội Bài', 'TP Hồ Chí Minh', 'Tân Sơn Nhất'),
('05:00:00', 80, 'Airbus A333', 160, 20, 'Hà Nội', 'Nội Bài', 'Đà Nẵng', 'Đà Nẵng'),

('08:00:00', 100, 'Airbus A321', 100, 10, 'Huế', 'Phú Bài', 'Phú Quốc', 'Phú Quốc'),
('11:00:00', 90, 'BOEING 777', 100, 10, 'Huế', 'Phú Bài', 'Vinh', 'Quốc tế Vinh'),

('13:00:00', 100, 'BOEING 787', 100, 10, 'Phú Quốc', 'Phú Quốc','Huế', 'Phú Bài'),
('18:00:00', 90, 'Airbus AB23', 100, 10, 'Vinh', 'Quốc tế Vinh','Huế', 'Phú Bài'),

('19:00:00', 45, 'Airbus A333', 150, 0, 'Đà Lạt', 'Liên Khương', 'Cần Thơ', 'Trà Nóc'),
('18:00:00', 45, 'BOEING 777', 150, 0, 'Cần Thơ', 'Trà Nóc', 'Đà Lạt', 'Liên Khương');

INSERT INTO `person` (`Username`, `Password`, `Name`, `Email`, `Phone`, `DateOfBirth`, `DateOfRegister`, `IsAdmin`) VALUES
('admin', '123456', 'Vinh', 'admin@gmail.com', '342243554', '2002-10-06', '2022-12-16', b'1'),
('thaopro123', '123456', 'Trần Văn Thảo', 'thaopro123@gmail.com', '0911452692', '2002-11-12', '2022-12-16', b'0'),
('user1', '123', 'Vinh', 'Vinh@gmail.com', '91111101', '2002-10-06', '2022-12-15', b'0'),
('user2', '123', 'An', 'An@gmail.com', '91111101', '2002-10-06', '2022-12-15', b'0'),
('user3', '123', 'Thuy', 'Thuy@gmail.com', '91111101', '2002-10-06', '2022-12-15', b'0'),
('user4', '123', 'Tien', 'Tien@gmail.com', '91111101', '2002-10-06', '2022-12-15', b'0'),
('user5', '123', 'Dieu', 'Dieu@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0'),
('user6', '123', 'Nhi', 'Nhi@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0'),
('user7', '123', 'Hong', 'Hong@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0'),
('user8', '123', 'Tham', 'Tham@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0'),
('user9', '123', 'Tram', 'Tram@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0'),
('user10', '123', 'Anh', 'Anh@gmail.com', '91111101', '2002-10-06', '2022-12-21', b'0');

-- INSERT INTO `ticket` (`FlightCode`, `DepartureDate`, `EcoPrice`, `BusPrice`) VALUES
CALL insert_ticket(1000, '2022-12-25', 1500000, 2800000);
CALL insert_ticket(1000, '2022-12-28', 1500000, 2800000);

CALL insert_ticket(1001, '2022-12-25', 1200000, 1200000);
CALL insert_ticket(1001, '2022-12-30', 1200000, 1200000);

CALL insert_ticket(1002, '2022-12-30', 1500000, 2800000);
CALL insert_ticket(1002, '2023-01-01', 1500000, 2800000);

CALL insert_ticket(1003, '2022-12-30', 1500000, 2800000);
CALL insert_ticket(1003, '2023-01-02', 2000000, 4000000);

CALL insert_ticket(1004, '2023-01-03', 1800000, 3500000);
CALL insert_ticket(1004, '2023-01-05', 1800000, 1800000);

CALL insert_ticket(1005, '2023-01-03', 2000000, 3900000);
CALL insert_ticket(1005, '2023-01-05', 2000000, 3900000);

CALL insert_ticket(1006, '2023-01-05', 1400000, 3500000);
CALL insert_ticket(1006, '2023-01-08', 1400000, 3500000);

CALL insert_ticket(1007, '2023-01-05', 1200000, 3200000);
CALL insert_ticket(1007, '2023-01-08', 1200000, 3200000);

CALL insert_ticket(1008, '2023-01-10', 800000, 1800000);
CALL insert_ticket(1008, '2023-01-12', 800000, 1800000);

CALL insert_ticket(1009, '2023-01-10', 600000, 1200000);
CALL insert_ticket(1009, '2023-01-12', 600000, 1200000);

INSERT INTO `ticketdetail` (`TicketID`, `UserID`, `PurchaseDate`, `AmountEcoTicket`, `AmountBusTicket`) VALUES
(100, 3, '2022-12-20', 1, 0),
(101, 4, '2022-12-20', 1, 3),
(102, 5, '2022-12-20', 2, 0),
(103, 6, '2022-12-20', 1, 0),
(104, 7, '2022-12-20', 1, 1),
(105, 8, '2022-12-20', 2, 1),
(106, 9, '2022-12-25', 3, 1),
(107, 10, '2022-12-25', 1, 2),
(108, 11, '2022-12-25', 1, 1),
(109, 12, '2022-12-25', 0, 2);
