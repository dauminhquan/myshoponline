-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 11:51 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `ngaydatdonhang` date NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `ho` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `ngaydatdonhang`, `tinhtrang`, `ho`, `ten`, `diachi`, `sodienthoai`, `email`) VALUES
(1, '2017-08-06', 1, 'Đậu Minh', 'Quân', 'Hoàng Mai - Hà Nội', '01673667000', 'dauminhquantlu@gmail.com'),
(2, '2017-08-07', 1, 'Đậu Minh', 'Quân', 'Hà Nội', '01673667000', 'dauminhquantlu@gmail.com'),
(3, '2017-08-09', 1, 'Đậu Minh', 'Quân', 'Hà Nội', '01673667000', 'dauminhquantlu@gmail.com'),
(4, '2017-08-10', 1, 'Đậu Minh', 'Quân', 'Hà Nội', '01673667000', 'dauminhquantlu@gmail.com'),
(5, '2017-08-11', 1, 'Đậu Minh', 'Quân', 'Hà Nội', '01673667000', 'dauminhquantlu@gmail.com'),
(6, '2017-08-06', 1, 'Đậu Minh', 'Quân', 'Hà Nội', '01673667000', 'dauminhquantlu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donhang_sanpham`
--

CREATE TABLE `donhang_sanpham` (
  `id_donhang` int(11) DEFAULT NULL,
  `id_sanpham` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang_sanpham`
--

INSERT INTO `donhang_sanpham` (`id_donhang`, `id_sanpham`, `soluong`) VALUES
(1, 1, 10),
(1, 2, 10),
(1, 3, 10),
(1, 4, 10),
(1, 5, 10),
(1, 6, 10),
(2, 1, 10),
(2, 2, 10),
(2, 3, 10),
(2, 4, 10),
(2, 5, 10),
(2, 6, 10),
(3, 1, 10),
(3, 2, 10),
(3, 3, 10),
(3, 4, 10),
(3, 5, 10),
(3, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loaisanpham` int(11) NOT NULL,
  `tenloaisanpham` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thongtinloaisanpham` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loaisanpham`, `tenloaisanpham`, `thongtinloaisanpham`) VALUES
(1, 'Quần áo', 'Quần áo');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `ho` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tendem` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ten` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `diachi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaythangnamsinh` date NOT NULL,
  `quyentruycap` int(11) NOT NULL,
  `ngaydangky` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `taikhoan`, `matkhau`, `ho`, `tendem`, `ten`, `diachi`, `sodienthoai`, `email`, `ngaythangnamsinh`, `quyentruycap`, `ngaydangky`) VALUES
(13, 'adm', 'admin', 'a', 'a', 'a', 'Nhà số 100 ngõ 168 Kim Giang Hoàng Mai', '', 'dauminhquantlu@gmail.com', '1995-06-25', 2, NULL),
(17, 'admidsa', 'dsajh', 'ads', 'a', 'a', 'dsadsa', '', 'dauminhquantlu@gmail.com', '1995-06-25', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhomsanpham`
--

CREATE TABLE `nhomsanpham` (
  `id_nhomsanpham` int(11) NOT NULL,
  `tennhomsanpham` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thongtinnhomsanpham` text CHARACTER SET utf8,
  `id_loaisanpham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhomsanpham`
--

INSERT INTO `nhomsanpham` (`id_nhomsanpham`, `tennhomsanpham`, `thongtinnhomsanpham`, `id_loaisanpham`) VALUES
(1, 'Áo', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_nhomsanpham` int(11) NOT NULL,
  `gioitinh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `xuatxu` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `kichco` char(1) DEFAULT NULL,
  `thongtinsanpham` text CHARACTER SET utf8,
  `soluong` int(11) NOT NULL,
  `ngaythemvao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensanpham`, `id_nhomsanpham`, `gioitinh`, `xuatxu`, `kichco`, `thongtinsanpham`, `soluong`, `ngaythemvao`) VALUES
(1, 'Áo thun', 1, 'Nam', 'Việt Nam', 'L', 'Quần áo đẹp', 100, '0000-00-00'),
(2, 'Váy xanh', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07'),
(3, 'Váy đỏ', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07'),
(4, 'Váy vàng', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07'),
(5, 'Váy tím', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07'),
(6, 'Váy hoa', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07'),
(7, 'Váy hòe', 1, 'Nữ', 'Việt Nam', 'X', 'Đẹp', 10, '2017-08-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `donhang_sanpham`
--
ALTER TABLE `donhang_sanpham`
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Indexes for table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  ADD PRIMARY KEY (`id_nhomsanpham`),
  ADD KEY `id_loaisanpham` (`id_loaisanpham`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_nhomsanpham` (`id_nhomsanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  MODIFY `id_nhomsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang_sanpham`
--
ALTER TABLE `donhang_sanpham`
  ADD CONSTRAINT `donhang_sanpham_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `donhang_sanpham_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Constraints for table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  ADD CONSTRAINT `nhomsanpham_ibfk_1` FOREIGN KEY (`id_loaisanpham`) REFERENCES `loaisanpham` (`id_loaisanpham`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_nhomsanpham`) REFERENCES `nhomsanpham` (`id_nhomsanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
