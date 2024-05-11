-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 07:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucnang`
--

CREATE TABLE `chucnang` (
  `maChucNang` varchar(255) NOT NULL,
  `tenChucNang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucnang`
--

INSERT INTO `chucnang` (`maChucNang`, `tenChucNang`) VALUES
('QLKH', 'Quan ly khach hang'),
('QLNV', 'Quan ly nhan vien'),
('QLPN', 'Quan ly phieu nhap'),
('QLPX', 'Quan ly phieu xuat'),
('QLSP', 'Quan ly san pham'),
('QLTK', 'Quan ly tai khoan');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(255) NOT NULL COMMENT 'tendangnhap',
  `holot` varchar(255) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `holot`, `ten`, `sdt`, `email`) VALUES
('KH00001', 'Ho', 'Ten', '0123456789', 'asd@gnu.com'),
('KH00002', 'Ho', 'Ten', '0123456789', 'asd@gml.com');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `matl` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `hinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `matl`, `soluong`, `dongia`, `hinh`) VALUES
(1, 'Samsung Galaxy S20', 1, 50, 20000000, '/myweb/img/404.png'),
(2, 'Laptop Dell XPS 15', 2, 20, 35000000, '/myweb/img/404.png'),
(3, 'Máy ảnh Canon EOS R5', 3, 10, 70000000, '/myweb/img/404.png'),
(4, 'Điện thoại iPhone 13 Pro', 1, 30, 25000000, '/myweb/img/404.png'),
(5, 'clear', 1, 0, 23000, '/myweb/img/clear.png'),
(9, 'clear1', 1, 0, 23000, '/myweb/img/clear.png'),
(10, 'clear2', 1, 0, 23000, '/myweb/img/clear.png'),
(11, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(12, 'clear11', 1, 0, 23000, '/myweb/img/clear.png'),
(13, 'clear21', 1, 0, 23000, '/myweb/img/clear.png'),
(14, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(15, 'Samsung Galaxy S20', 1, 50, 20000000, '/myweb/img/404.png'),
(16, 'Laptop Dell XPS 15', 2, 20, 35000000, '/myweb/img/404.png'),
(17, 'Máy ảnh Canon EOS R5', 3, 10, 70000000, '/myweb/img/404.png'),
(18, 'Điện thoại iPhone 13 Pro', 1, 30, 25000000, '/myweb/img/404.png'),
(19, 'clear', 1, 0, 23000, '/myweb/img/clear.png'),
(20, 'clear1', 1, 0, 23000, '/myweb/img/clear.png'),
(21, 'clear2', 1, 0, 23000, '/myweb/img/clear.png'),
(22, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(23, 'clear11', 1, 0, 23000, '/myweb/img/clear.png'),
(24, 'clear21', 1, 0, 23000, '/myweb/img/clear.png'),
(25, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(26, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(27, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(28, 'clear11', 1, 0, 23000, '/myweb/img/clear.png'),
(29, 'Samsung Galaxy S20', 1, 50, 20000000, '/myweb/img/404.png'),
(30, 'Laptop Dell XPS 15', 2, 20, 35000000, '/myweb/img/404.png'),
(31, 'Máy ảnh Canon EOS R5', 3, 10, 70000000, '/myweb/img/404.png'),
(32, 'Điện thoại iPhone 13 Pro', 1, 30, 25000000, '/myweb/img/404.png'),
(33, 'clear', 1, 0, 23000, '/myweb/img/clear.png'),
(34, 'clear1', 1, 0, 23000, '/myweb/img/clear.png'),
(35, 'clear2', 1, 0, 23000, '/myweb/img/clear.png'),
(36, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(37, 'clear11', 1, 0, 23000, '/myweb/img/clear.png'),
(38, 'clear21', 1, 0, 23000, '/myweb/img/clear.png'),
(39, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(40, 'Samsung Galaxy S20', 1, 50, 20000000, '/myweb/img/404.png'),
(41, 'Laptop Dell XPS 15', 2, 20, 35000000, '/myweb/img/404.png'),
(42, 'Máy ảnh Canon EOS R5', 3, 10, 70000000, '/myweb/img/404.png'),
(43, 'Điện thoại iPhone 13 Pro', 1, 30, 25000000, '/myweb/img/404.png'),
(44, 'clear', 1, 0, 23000, '/myweb/img/clear.png'),
(45, 'clear1', 1, 0, 23000, '/myweb/img/clear.png'),
(46, 'clear2', 1, 0, 23000, '/myweb/img/clear.png'),
(47, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(48, 'clear11', 1, 0, 23000, '/myweb/img/clear.png'),
(49, 'clear21', 1, 0, 23000, '/myweb/img/clear.png'),
(50, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(51, 'clear22', 1, 0, 23000, '/myweb/img/clear.png'),
(52, 'clear10', 1, 0, 23000, '/myweb/img/clear.png'),
(53, 'clear11', 1, 0, 23000, '/myweb/img/clear.png');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL,
  `tendangnhap` varchar(20) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `maVaiTro` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `otp` int(11) NOT NULL,
  `otp_expiry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tendangnhap`, `matkhau`, `maVaiTro`, `trangthai`, `sdt`, `hoTen`, `email`, `otp`, `otp_expiry`) VALUES
(1, 'KH00001', '123456', 1, 1, '', '', 'truong123@gmail.com', 0, '2024-05-09 21:58:47'),
(2, 'KH00002', '123', 1, 1, '', '', 'truong12@gmail.com', 0, '2024-05-09 21:58:47'),
(5, 'truong', 'a', 2, 1, '', '', 'nqt26304@gmail.com', 183775, '2024-05-10 00:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `matl` int(11) NOT NULL,
  `tentl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`matl`, `tentl`) VALUES
(1, 'Điện thoại di động'),
(2, 'Máy tính xách tay'),
(3, 'Máy ảnh');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`maVaiTro`, `tenVaiTro`) VALUES
(1, 'administrator'),
(2, 'khachhang');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro_chucnang`
--

CREATE TABLE `vaitro_chucnang` (
  `maVaiTro` int(11) NOT NULL,
  `maChucNang` varchar(255) NOT NULL,
  `them` tinyint(1) NOT NULL,
  `sua` tinyint(1) NOT NULL,
  `xoa` tinyint(1) NOT NULL
) ;

--
-- Dumping data for table `vaitro_chucnang`
--

INSERT INTO `vaitro_chucnang` (`maVaiTro`, `maChucNang`, `them`, `sua`, `xoa`) VALUES
(1, 'QLKH', 1, 1, 1),
(1, 'QLNV', 1, 1, 1),
(1, 'QLPN', 1, 1, 1),
(1, 'QLPX', 1, 1, 1),
(1, 'QLSP', 1, 1, 1),
(1, 'QLTK', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`maChucNang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`matk`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matl`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- Indexes for table `vaitro_chucnang`
--
ALTER TABLE `vaitro_chucnang`
  ADD PRIMARY KEY (`maVaiTro`,`maChucNang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `matl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `maVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
