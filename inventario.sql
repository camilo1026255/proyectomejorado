-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 17:28:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Admin_ID` int(11) NOT NULL,
  `Inve_ID` int(11) DEFAULT NULL,
  `PRe_ID` int(11) DEFAULT NULL,
  `Empl_ID` int(11) DEFAULT NULL,
  `Satellite_ID` int(11) DEFAULT NULL,
  `Prod_Term_ID` int(11) DEFAULT NULL,
  `ID_Mate_prima` int(11) DEFAULT NULL,
  `Prod_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_bodega`
--

CREATE TABLE `aux_bodega` (
  `ID_AuxBodega` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo_material` varchar(50) DEFAULT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `stock_disponible` int(11) DEFAULT NULL,
  `precio_rollo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aux_bodega`
--

INSERT INTO `aux_bodega` (`ID_AuxBodega`, `nombre`, `tipo_material`, `unidad_medida`, `fecha`, `stock_disponible`, `precio_rollo`) VALUES
(1, '122', '12', 122, '0111-02-11', 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Prod_ID` int(11) NOT NULL,
  `Prod_Nombre` varchar(100) DEFAULT NULL,
  `Prod_Prec_Compra` int(11) DEFAULT NULL,
  `Prod_Prec_Venta` int(11) DEFAULT NULL,
  `Prod_Cantidad` int(11) DEFAULT NULL,
  `Prod_Ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Prod_ID`, `Prod_Nombre`, `Prod_Prec_Compra`, `Prod_Prec_Venta`, `Prod_Cantidad`, `Prod_Ubicacion`) VALUES
(3, 'Chinseao', 8000, 15000, 50, 'Suba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_realizado`
--

CREATE TABLE `producto_realizado` (
  `PRe_ID` int(11) NOT NULL,
  `PRe_Cantidad` int(11) DEFAULT NULL,
  `PRe_Nombre` varchar(100) DEFAULT NULL,
  `PRe_Referencia` varchar(100) DEFAULT NULL,
  `PRe_Prec_Realizacion` int(11) DEFAULT NULL,
  `Des_producto` varchar(100) DEFAULT NULL,
  `Detalle_producto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_realizado`
--

INSERT INTO `producto_realizado` (`PRe_ID`, `PRe_Cantidad`, `PRe_Nombre`, `PRe_Referencia`, `PRe_Prec_Realizacion`, `Des_producto`, `Detalle_producto`) VALUES
(3, 12, 'v', '23', 121, NULL, '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_terminado`
--

CREATE TABLE `producto_terminado` (
  `Pro_Term_ID` int(11) NOT NULL,
  `Fecha_entrada` date DEFAULT NULL,
  `Fecha_Entrega` date DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Tipo_Chaqueta` varchar(50) DEFAULT NULL,
  `Material_Sobrante` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_terminado`
--

INSERT INTO `producto_terminado` (`Pro_Term_ID`, `Fecha_entrada`, `Fecha_Entrega`, `Cantidad`, `Tipo_Chaqueta`, `Material_Sobrante`) VALUES
(1, '5555-05-05', '0055-12-05', 12, 'kj', 'jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satelite`
--

CREATE TABLE `satelite` (
  `Satelite_ID` int(11) NOT NULL,
  `Material_Descripcion` varchar(50) DEFAULT NULL,
  `Material_Cantidad` int(11) DEFAULT NULL,
  `Tipo_Material` varchar(50) DEFAULT NULL,
  `Fecha_Entrada` date DEFAULT NULL,
  `Fecha_Salida` date DEFAULT NULL,
  `Pro_Term_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin'),
(2, 'camilo', '4464882dc89b7fa42117e929233f75359622031304413825e28aa992b1c5d08a', 'employee'),
(3, 'jose', '1cd763f4482ed8c2f58fe7608542b975c0b158c81aae7aaade5d58b0164b4a37', 'employee'),
(4, 'sebas', '70bd8714a2d856538c68cb92919d6573f4c690959e148dc133f6f043c0e41199', 'admin'),
(5, 'jess', 'c5c8477bdda35a938ea29635f6b3f02acffb1767ada24e16534a899e570dc398', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `PRe_ID` (`PRe_ID`),
  ADD KEY `Prod_ID` (`Prod_ID`);

--
-- Indices de la tabla `aux_bodega`
--
ALTER TABLE `aux_bodega`
  ADD PRIMARY KEY (`ID_AuxBodega`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Prod_ID`);

--
-- Indices de la tabla `producto_realizado`
--
ALTER TABLE `producto_realizado`
  ADD PRIMARY KEY (`PRe_ID`);

--
-- Indices de la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  ADD PRIMARY KEY (`Pro_Term_ID`);

--
-- Indices de la tabla `satelite`
--
ALTER TABLE `satelite`
  ADD PRIMARY KEY (`Satelite_ID`),
  ADD KEY `Pro_Term_ID` (`Pro_Term_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aux_bodega`
--
ALTER TABLE `aux_bodega`
  MODIFY `ID_AuxBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_realizado`
--
ALTER TABLE `producto_realizado`
  MODIFY `PRe_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  MODIFY `Pro_Term_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `satelite`
--
ALTER TABLE `satelite`
  MODIFY `Satelite_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`PRe_ID`) REFERENCES `producto_realizado` (`PRe_ID`),
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`Prod_ID`) REFERENCES `productos` (`Prod_ID`);

--
-- Filtros para la tabla `satelite`
--
ALTER TABLE `satelite`
  ADD CONSTRAINT `satelite_ibfk_1` FOREIGN KEY (`Pro_Term_ID`) REFERENCES `producto_terminado` (`Pro_Term_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
