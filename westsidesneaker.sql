-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 03:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westsidesneaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `Size` varchar(5) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` float NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `Size`, `SoLuong`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES
(44, 1, '2XL', 2, 2000000, 0.1, 3600000),
(44, 34, '45', 1, 2290000, 0, 2290000),
(45, 1, 'XL', 15, 2000000, 0.1, 27000000),
(45, 51, '34', 1, 3239000, 0, 3239000),
(45, 57, '34', 1, 2340000, 0, 2340000),
(46, 34, '45', 1, 2290000, 0, 2290000),
(46, 39, '45', 1, 5000000, 0, 5000000),
(47, 55, '40', 1, 1932000, 0, 1932000),
(48, 40, '43', 1, 2400000, 0, 2400000),
(48, 49, 'L', 2, 2000000, 0, 4000000);

--
-- Triggers `chitietdathang`
--
DELIMITER $$
CREATE TRIGGER `trigger_order` AFTER INSERT ON `chitietdathang` FOR EACH ROW UPDATE size
SET size.SoLuongHang= size.SoLuongHang - new.SoLuong
WHERE size.MSHH=new.MSHH AND size.MaSize= new.Size
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThaiDH` varchar(10) NOT NULL,
  `MaDC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `MaDC`) VALUES
(44, 1, 19, '2016-11-04', '2016-11-07', 'Đã giao', 1),
(45, 8, 1, '2021-11-04', '2017-11-07', 'Đã giao', 12),
(46, 13, 3, '2021-11-04', '2018-11-07', 'Đã giao', 10),
(47, 9, 3, '2017-11-04', '2017-11-07', 'Đã duyệt', 13),
(48, 6, 3, '2016-11-04', '2016-11-07', 'Đã duyệt', 14);

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'Long Hòa, Bình Thủy, Cần Thơ', 1),
(2, 'Võ Văn Kiệt, Bình Thủy, Cần Thơ', 2),
(3, 'Lê Hồng Phong, Khu Dân Cư Ngân Thuận, Bình Thủy, Cần Thơ', 3),
(4, 'Nguyễn Văn Cừ Nối Dài', 1),
(8, '107 Nguyễn Đệ, phường An Hòa, quận Ninh Kiều, TP Cần Thơ', 16),
(9, '107 Nguyễn Đệ, phường An Hòa, quận Ninh Kiều, TP Cần Thơ', 10),
(10, '200/A3 Nguyễn Văn Hưởng, phường Thảo Điền, quận 2, TP HCM', 13),
(11, 'Đại học Cần Thơ', 24),
(12, '40 Đường số 3, phường An Khánh, quận Ninh Kiều, Cần Thơ', 8),
(13, '200/A3 Nguyễn Văn Hưởng, phường Thảo Điền, quận 2, TP HCM', 9),
(14, '200/A3 Nguyễn Văn Hưởng, phường Thảo Điền, quận 2, TP HCM', 6),
(15, 'Số 40 đường số 3, KDC Thới Nhựt', 6),
(16, 'Bình Dương', 6);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Size` varchar(5) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` float NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `MSKH`, `MSHH`, `SoLuong`, `Size`, `GiaDatHang`, `GiamGia`, `TongTien`) VALUES
(23, 10, 54, 1, '41', 1750000, 0, 1750000),
(23, 10, 56, 1, '40', 1350000, 0, 1350000),
(63, 8, 48, 1, 'L', 420000, 0.001, 378000),
(63, 8, 49, 1, 'XL', 2000000, 0, 2000000),
(63, 8, 58, 1, '45', 2500000, 0, 2500000),
(65, 6, 1, 1, '2XL', 2000000, 0.001, 1800000),
(65, 6, 1, 1, 'M', 2000000, 0.001, 1800000),
(65, 6, 1, 2, 'S', 2000000, 0.001, 1800000),
(65, 6, 45, 1, '5', 550000, 0.001, 495000);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(500) NOT NULL,
  `MoTa` varchar(1000) DEFAULT NULL,
  `QuyCach` varchar(20) NOT NULL,
  `Gia` int(11) NOT NULL,
  `GiamGia` float NOT NULL,
  `MaLoaiHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTa`, `QuyCach`, `Gia`, `GiamGia`, `MaLoaiHang`) VALUES
(1, 'ÁO ĐẤU SÂN KHÁCH MANCHESTER UNITED 21/20', 'CHIẾC ÁO ĐẤU DÀNH CHO CỔ ĐỘNG VIÊN VỚI CHỮ ', 'Chiếc', 2000000, 0.1, 2),
(34, 'Nike Air Force 1 FULL WHITE', 'Thương hiệu được khá nhiều bạn trẻ đón nhận', 'Đôi', 2290000, 0, 1),
(39, 'GIÀY CHẠY BỘ ULTRABOOST 21 TOKYO', 'NĂNG LƯỢNG CHỈ THUẦN LÀ NĂNG LƯỢNG CHO ĐẾN KHI VÀO TAY ULTRABOOST 21.', 'Đôi', 5000000, 0, 1),
(40, 'GIÀY BÓNG ĐÁ PREDATOR FREAK.3 FIRM GROUND', 'ĐÔI GIÀY BÓNG ĐÁ NÂNG ĐỠ GIÚP BẠN LÀM CHỦ THẾ TRẬN TRÊN SÂN CỎ TỰ NHIÊN.', 'Đôi', 2400000, 0, 1),
(41, 'GIÀY BÓNG ĐÁ SÂN CỎ TỰ NHIÊN PREDATOR FREAK.3', 'ĐÔI GIÀY BÓNG ĐÁ CỔ THẤP GIÚP BẠN LÀM CHỦ TRẬN ĐẤU TRÊN SÂN CỎ TỰ NHIÊN.', 'Đôi', 1900000, 0, 1),
(42, 'GIÀY ĐÁ BÓNG X GHOSTED.1 FIRM GROUND', 'ĐÔI GIÀY ĐÁ BÓNG SIÊU NHẸ CHO NHỮNG ĐƯỜNG BÓNG TỐC ĐỘ ÁNH SÁNG.', 'Đôi', 3150000, 0, 1),
(43, 'GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO X SPEEDFLOW.3', 'ĐÔI GIÀY ĐÁ BÓNG SIÊU NHẸ DÀNH CHO PHIÊN BẢN TỐC ĐỘ CỦA BẠN.', 'Đôi', 1900000, 0, 1),
(44, 'TẤT SÂN NHÀ ARSENAL 21/22', 'ĐÔI TẤT DÀI NGANG GỐI MANG MÀU SẮC SÂN NHÀ CLB.', 'Chiếc', 420000, 0, 3),
(45, 'BÓNG SÂN NHÀ MANCHESTER UNITED', 'TRÁI BÓNG BỀN BỈ MANG SẮC MÀU CÂU LẠC BỘ.', 'Quả', 550000, 0.1, 4),
(46, 'QUẦN SHORT SÂN NHÀ ARSENAL 21/22', 'CHIẾC QUẦN SHORT THOÁT ẨM DÀNH CHO CÁC FAN CUỒNG NHIỆT CỦA ARSENAL.', 'Chiếc', 1100000, 0, 5),
(47, 'GIÀY BÓNG ĐÁ PREDATOR FREAK.1 FIRM GROUND', 'ĐÔI GIÀY BÓNG ĐÁ NÂNG ĐỠ VỚI THIẾT KẾ TRAO QUYỀN KIỂM SOÁT', 'Đôi', 2500000, 0, 1),
(48, 'TẤT SÂN NHÀ 21/22 MANCHESTER UNITED', 'ĐÔI TẤT CỔ ĐỘNG VIÊN MANG MÀU SẮC SÂN NHÀ ĐẶC TRƯNG.', 'Chiếc', 420000, 0.1, 3),
(49, 'ÁO ĐẤU SÂN NHÀ FC BAYERN 21/22', 'CHIẾC ÁO ĐẤU MANG SẮC ĐỎ CLASSIC DÀNH CHO TẤT CẢ CÁC SIÊU ANH HÙNG CỦA FC BAYERN.', 'Chiếc', 2000000, 0, 2),
(50, 'GIÀY NIKE AIR FORCE 1', 'Mang đến một sự thay đổi mới mẻ về những gì bạn biết rõ nhất: chất liệu da sắc nét, màu sắc sạch sẽ và lượng đèn flash hoàn hảo để bạn tỏa sáng. Lớp hoàn thiện màu trắng tinh khiết, sạch sẽ này tạo thêm độ tương phản cho đế kẹo cao su để có một cái nhìn mới mẻ, linh hoạt chỉ với một lượng phù hợp.', 'Đôi', 2290000, 0, 1),
(51, 'GIÀY NIKE AIR FORCE 1 SHADOW', 'Nike Air Force 1 Shadow mang một nét phá cách vui nhộn trên thiết kế b-ball cổ điển.', 'Đôi', 3239000, 0, 1),
(52, 'Giày Vans old skool 1979', 'Một trong những dòng giày mang tính kinh điển và làm nên thương hiệu của VANS -OFF THE WALL', 'Đôi', 2180000, 0, 1),
(53, 'Giày Vans yacht club old skool', 'Một sự lựa chọn khác từ nhà Vans mang đến sự mới lạ, phóng khoáng cho các bạn trẻ yêu thích trượt ván', 'Đôi', 1380000, 0, 1),
(54, 'Giày Vans Old Skool Black WHITE', 'Được ra đời năm 1977 trở thành biểu tượng giày trượt ván - skate shoe của giới mộ đạo giày thể thao trên toàn thế giới', 'Đôi', 1750000, 0, 1),
(55, 'Giày Vans stacy peralta', 'Là một trong những dòng giày mang tính kinh điển, và làm nên thương hiệu của VANS -OFF THE WALL.', 'Đôi', 1932000, 0, 1),
(56, 'Giày Vans Classic Slip-On Checkerboard', 'Họa tiết Checkerboard kinh điển được sắp xếp tinh tế ở một phần thân giày và gót giày. Khả năng kết hợp nhiều phong cách bởi thiết kế vô cực chất, cực cá tính và không bao giờ lỗi mốt', 'Đôi', 1350000, 0, 1),
(57, 'GIÀY CONVERSE CHUCK TAYLOR RED HIGH TOPS', 'Giày Sneaker Unisex Converse Chuck Taylor All Star 1970s Enamel Red - High được thiết kế từ chất liệu vải canvas nhẹ, tạo cảm giác thoải mái cho người sử dụng.', 'Đôi', 2340000, 0, 1),
(58, 'GIÀY ADIDAS BOUNCE ALPHABOUNCE', 'Mẫu giày chạy được thiết kế cho các vận động viên chạy bộ muốn trở thành người xuất sắc nhất trong bộ môn của mình.', 'Đôi', 2500000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(1000) NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(18, 'ao_1.png', 1),
(41, 'giay_10.png', 34),
(46, 'giay_13.png', 39),
(47, 'giay_15.png', 40),
(48, 'giay_16.png', 41),
(49, 'giay_14.png', 42),
(50, 'giay_1.png', 43),
(51, 'tat_1.png', 44),
(52, 'bong_1.png', 45),
(53, 'quan_1.png', 46),
(54, 'giay_2.png', 47),
(55, 'tat_2.png', 48),
(56, 'ao_2.png', 49),
(57, 'giay_3.png', 50),
(58, 'giay_4.png', 51),
(59, 'giay_5.png', 52),
(60, 'giay_6.png', 53),
(61, 'giay_7.png', 54),
(62, 'giay_8.png', 55),
(63, 'giay_9.png', 56),
(64, 'giay_11.png', 57),
(65, 'giay_12.png', 58);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(100) NOT NULL,
  `TenCongTy` varchar(200) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `SoFax` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `UserName`, `password`) VALUES
(1, 'Nguyễn Văn Hà', 'Axon Active', '0838720508', '1234', 'nguyenvanha', 'cce31e34a6c26dabd03d91b271266ad0'),
(2, 'Nguyễn Đình Quý', 'NashTech', '0832483050', '', 'nguyendinhquy', '10bf6845523df936e6c12881bbd86b7a'),
(3, 'Lê Doãn Khánh', 'Bệnh viện Đa Khoa Trung Ương Cần Thơ', '0379026256', '', 'ledoankhanh', 'bbee2e7c540fde597ad1a708bc30b51c'),
(6, 'Ngô Quý Nhân', '', '0989123456', '', 'ngoquynhan', '9a0bc9f806b868e24ac698a99eee73bc'),
(8, 'Võ Thị Thái', 'Dược Hậu Giang', '0939335450', '', 'vothithai', '684999df7232bab7e0a6c4cdba150a94'),
(9, 'Trần Ngọc Mai', 'SCID', '0906627513', '', 'tranngocmai', 'b5d6ac2889c1a0243ac30803f9ae0d6f'),
(10, 'Trần Thị Ánh Như', '', '0939017060', '', 'tranthianhnhu', '928f2ebe65cc62f2bbb037b4c05bb370'),
(13, 'Ngô Quý Đức', '', '123', '', 'ngoquyduc', 'd0b229c599d2ebfe3eb785331366cac7'),
(16, 'Hoàng Lê Minh', 'Trung tâm y tế quận Bình Thủy', '0704487658', '', 'hoangleminh', 'f82e62d7c3ea69cc12b5cdb8d621dab6'),
(24, 'Nguyễn Minh Trung', 'Đại học Cần Thơ', '113', '', 'thaytrungvuitinh', 'bdae18d0bede86e3d7fe0fc5bb73d424');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Giày'),
(2, 'Áo'),
(3, 'Tất'),
(4, 'Bóng'),
(5, 'Quần');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) DEFAULT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `UserName` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `UserName`, `password`) VALUES
(1, 'Trần Nhân Nghĩa', 'Quản Lý', 'An Khánh, Ninh Kiều, Cần Thơ', '0939635755', 'nghia@001', '397f6bfad8c5b2400386653bf804211f'),
(2, 'Tô Huỳnh Minh Khôi', 'Quản Lý', 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0945595503', 'khoi@002', 'cde29de8c587e4cd53e16212b99115be'),
(3, 'Nguyễn Lê Thanh Cao', 'Quản Lý', 'An Lạc, Ninh Kiều, Cần Thơ', '0523294259', 'cao@003', 'b30b5a463026f8c4bc659fcb2a0dda00'),
(4, 'Lữ Thị Thanh Mi', 'Nhân viên bán hàng', 'Hẻm 91, CMT8, Bình Thủy, Cần Thơ', '0914635308', NULL, NULL),
(18, 'Cao Ngọc Bảo Long', 'Nhân viên giao hàng', 'Ô Môn, Cần Thơ', '0939894721', NULL, NULL),
(19, 'Thầy Trung vui tính', 'Quản Lý', 'Cần Thơ', '113', 'thaytrungvuitinh', 'bdae18d0bede86e3d7fe0fc5bb73d424');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `MaSize` varchar(5) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`MaSize`, `MSHH`, `SoLuongHang`) VALUES
('2XL', 1, 15),
('2XL', 44, 0),
('2XL', 46, 6),
('2XL', 48, 3),
('2XL', 49, 2),
('3', 45, 1),
('34', 34, 0),
('34', 39, 0),
('34', 40, 0),
('34', 41, 0),
('34', 42, 0),
('34', 43, 0),
('34', 47, 0),
('34', 50, 1),
('34', 51, 13),
('34', 52, 0),
('34', 53, 0),
('34', 54, 0),
('34', 55, 0),
('34', 56, 0),
('34', 57, 4),
('34', 58, 0),
('35', 34, 0),
('35', 39, 0),
('35', 40, 0),
('35', 41, 0),
('35', 42, 0),
('35', 43, 0),
('35', 47, 0),
('35', 50, 2),
('35', 51, 23),
('35', 52, 0),
('35', 53, 0),
('35', 54, 0),
('35', 55, 0),
('35', 56, 0),
('35', 57, 0),
('35', 58, 0),
('36', 34, 0),
('36', 39, 0),
('36', 40, 0),
('36', 41, 0),
('36', 42, 0),
('36', 43, 0),
('36', 47, 0),
('36', 50, 3),
('36', 51, 4),
('36', 52, 0),
('36', 53, 0),
('36', 54, 0),
('36', 55, 0),
('36', 56, 0),
('36', 57, 0),
('36', 58, 0),
('37', 34, 0),
('37', 39, 0),
('37', 40, 0),
('37', 41, 0),
('37', 42, 0),
('37', 43, 0),
('37', 47, 0),
('37', 50, 0),
('37', 51, 6),
('37', 52, 0),
('37', 53, 0),
('37', 54, 0),
('37', 55, 0),
('37', 56, 0),
('37', 57, 0),
('37', 58, 0),
('38', 34, 0),
('38', 39, 7),
('38', 40, 0),
('38', 41, 0),
('38', 42, 0),
('38', 43, 0),
('38', 47, 0),
('38', 50, 4),
('38', 51, 7),
('38', 52, 0),
('38', 53, 0),
('38', 54, 0),
('38', 55, 0),
('38', 56, 0),
('38', 57, 4),
('38', 58, 0),
('39', 34, 0),
('39', 39, 0),
('39', 40, 0),
('39', 41, 0),
('39', 42, 0),
('39', 43, 6),
('39', 47, 3),
('39', 50, 0),
('39', 51, 8),
('39', 52, 6),
('39', 53, 0),
('39', 54, 0),
('39', 55, 0),
('39', 56, 0),
('39', 57, 0),
('39', 58, 0),
('4', 45, 2),
('40', 34, 0),
('40', 39, 0),
('40', 40, 9),
('40', 41, 0),
('40', 42, 0),
('40', 43, 5),
('40', 47, 0),
('40', 50, 8),
('40', 51, 0),
('40', 52, 0),
('40', 53, 3),
('40', 54, 0),
('40', 55, 3),
('40', 56, 5),
('40', 57, 0),
('40', 58, 5),
('41', 34, 0),
('41', 39, 0),
('41', 40, 8),
('41', 41, 0),
('41', 42, 5),
('41', 43, 4),
('41', 47, 0),
('41', 50, 14),
('41', 51, 0),
('41', 52, 0),
('41', 53, 0),
('41', 54, 6),
('41', 55, 3),
('41', 56, 0),
('41', 57, 3),
('41', 58, 0),
('42', 34, 0),
('42', 39, 0),
('42', 40, 6),
('42', 41, 3),
('42', 42, 7),
('42', 43, 8),
('42', 47, 2),
('42', 50, 23),
('42', 51, 0),
('42', 52, 5),
('42', 53, 4),
('42', 54, 9),
('42', 55, 0),
('42', 56, 0),
('42', 57, 0),
('42', 58, 0),
('43', 34, 0),
('43', 39, 0),
('43', 40, 2),
('43', 41, 0),
('43', 42, 3),
('43', 43, 7),
('43', 47, 9),
('43', 50, 2),
('43', 51, 0),
('43', 52, 0),
('43', 53, 0),
('43', 54, 7),
('43', 55, 3),
('43', 56, 4),
('43', 57, 0),
('43', 58, 3),
('44', 34, 0),
('44', 39, 0),
('44', 40, 10),
('44', 41, 2),
('44', 42, 6),
('44', 43, 6),
('44', 47, 8),
('44', 50, 5),
('44', 51, 0),
('44', 52, 0),
('44', 53, 0),
('44', 54, 3),
('44', 55, 0),
('44', 56, 0),
('44', 57, 0),
('44', 58, 0),
('45', 34, 8),
('45', 39, 0),
('45', 40, 5),
('45', 41, 2),
('45', 42, 15),
('45', 43, 5),
('45', 47, 4),
('45', 50, 12),
('45', 51, 0),
('45', 52, 6),
('45', 53, 0),
('45', 54, 14),
('45', 55, 0),
('45', 56, 0),
('45', 57, 0),
('45', 58, 7),
('5', 45, 6),
('L', 1, 10),
('L', 44, 6),
('L', 46, 4),
('L', 48, 2),
('L', 49, 2),
('M', 1, 10),
('M', 44, 12),
('M', 46, 5),
('M', 48, 0),
('M', 49, 0),
('S', 1, 10),
('S', 44, 5),
('S', 46, 3),
('S', 48, 0),
('S', 49, 0),
('XL', 1, 0),
('XL', 44, 7),
('XL', 46, 7),
('XL', 48, 0),
('XL', 49, 3),
('XS', 44, 2),
('XS', 46, 0),
('XS', 48, 0),
('XS', 49, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`),
  ADD KEY `Size` (`Size`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `dathang_ibfk_1` (`MSKH`),
  ADD KEY `dathang_ibfk_2` (`MSNV`),
  ADD KEY `dathang_ibfk_3` (`MaDC`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `diachikh_ibfk_1` (`MSKH`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`,`MSKH`,`MSHH`,`Size`),
  ADD KEY `giohang_ibfk_1` (`MSHH`),
  ADD KEY `giohang_ibfk_2` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `hanghoa_ibfk_1` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `hinhhanghoa_ibfk_1` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MaSize`,`MSHH`),
  ADD KEY `size_ibfk_1` (`MSHH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_4` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_5` FOREIGN KEY (`Size`) REFERENCES `size` (`MaSize`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`MaDC`) REFERENCES `diachikh` (`MaDC`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON UPDATE CASCADE;

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
