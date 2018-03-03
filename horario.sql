-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 06:47 PM
-- Server version: 5.7.16
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horario`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `identificacion_ibm` varchar(100) NOT NULL,
  `correo_electronico` varchar(200) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `clave` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `cedula`, `identificacion_ibm`, `correo_electronico`, `estado`, `clave`) VALUES
(1, 'Juan Camilo', 'Cruz Franco', '1019075739', '1234567', 'kusanagimilo@gmail.com', 'AC', 'ba9b28c5bf9d2709c294f21e71c54c88132b4f6916e8073ced48f531443d443bce89707ef7be62dfcad9aa5b6f8ec853f4750b21756dfbf5ac2f78fd39595324'),
(2, 'ruber perico', 'barros el maton', '233343', '039338', 'sjdskj@hotmail', 'AC', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85');

-- --------------------------------------------------------

--
-- Table structure for table `horario_empleado`
--

CREATE TABLE `horario_empleado` (
  `id_horario_empleado` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `detalle_horario` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `hora_inicio` varchar(200) NOT NULL,
  `hora_fin` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indexes for table `horario_empleado`
--
ALTER TABLE `horario_empleado`
  ADD PRIMARY KEY (`id_horario_empleado`),
  ADD KEY `horario_empleado_empleado_FK` (`id_empleado`),
  ADD KEY `horario_empleado_turno_FK` (`id_turno`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `horario_empleado`
--
ALTER TABLE `horario_empleado`
  MODIFY `id_horario_empleado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `horario_empleado`
--
ALTER TABLE `horario_empleado`
  ADD CONSTRAINT `horario_empleado_empleado_FK` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `horario_empleado_turno_FK` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
