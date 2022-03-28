-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 12:03 PM
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
-- Database: `qlbanxehoi`
--
CREATE DATABASE IF NOT EXISTS `qlbanxehoi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `qlbanxehoi`;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MABL` int(11) NOT NULL,
  `NDBL` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAHD` int(11) NOT NULL,
  `MATK` int(11) NOT NULL,
  `NGAYDANG` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MABL`, `NDBL`, `MAHD`, `MATK`, `NGAYDANG`) VALUES
(2, 'hello456', 20, 1, '2022-03-27 15:46:04'),
(3, '321 767', 20, 1, '2022-03-27 15:46:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `binhluan_ten`
-- (See below for the actual view)
--
CREATE TABLE `binhluan_ten` (
`MABL` int(11)
,`NDBL` mediumtext
,`MAHD` int(11)
,`MATK` int(11)
,`TENTK` mediumtext
,`NGAYDANG` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `giohopdong`
--

CREATE TABLE `giohopdong` (
  `Id` int(11) NOT NULL,
  `MAHD` int(11) NOT NULL,
  `MATK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohopdong`
--

INSERT INTO `giohopdong` (`Id`, `MAHD`, `MATK`) VALUES
(1, 20, 8),
(6, 19, 10),
(7, 20, 10),
(8, 46, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MAHSX` int(11) NOT NULL,
  `TENHSX` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINHANH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRANGTHAI` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MAHSX`, `TENHSX`, `HINHANH`, `TRANGTHAI`) VALUES
(1, 'Toyota', 'images/carconmpany/HangToyota.jpg', 'Công khai'),
(2, 'Mazda', 'images/carconmpany/HangMazda.jpg', 'Công khai'),
(3, 'Mercedes-Benz', 'images/carconmpany/HangMercedes-Benz.jpg', 'Công khai'),
(4, 'Lexus', 'images/carconmpany/HangLexus.jpg', 'Công khai'),
(5, 'Ford', 'images/carconmpany/HangFord.jpg', 'Công khai'),
(6, 'Hyundai', 'images/carconmpany/HangHyundai.jpg', 'Công khai'),
(7, 'Porsche', 'images/carconmpany/HangPorsche.jpg', 'Công khai'),
(8, 'Honda', 'images/carconmpany/HangHonda.jpg', 'Công khai'),
(9, 'BMW', 'images/carconmpany/HangBMW.jpg', 'Công khai'),
(10, 'Audi', 'images/carconmpany/HangAudi.jpg', 'Công khai'),
(11, 'Bugatti', 'images/carconmpany/HangBugatti.jpg', 'Công khai'),
(12, 'Ferrari', 'images/carconmpany/HangFerrari.jpg', 'Công khai'),
(13, 'Lamborghini', 'images/carconmpany/HangLamborghini.jpg', 'Công khai'),
(14, 'VinFast', 'images/carconmpany/HangVinFast.jpg', 'Công khai'),
(15, 'Mitsubishi Mirage', 'images/carconmpany/HangMitsubishi.jpg', 'Công khai'),
(16, 'Isuzu', 'images/carconmpany/IONm4xvuR1.jpg', 'Ẩn'),
(17, 'Isuzuka', 'images/carconmpany/HangBMW.jpg', 'Ẩn');

-- --------------------------------------------------------

--
-- Table structure for table `hopdong`
--

CREATE TABLE `hopdong` (
  `MAHD` int(11) NOT NULL,
  `MANGUOIBAN` int(11) NOT NULL,
  `MANGUOIMUA` int(11) DEFAULT NULL,
  `MAXE` int(11) NOT NULL,
  `NOIDUNGHD` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIADIEM` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIA` decimal(10,0) DEFAULT NULL,
  `NGAYLAP` datetime NOT NULL DEFAULT current_timestamp(),
  `TRANGTHAI` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`MAHD`, `MANGUOIBAN`, `MANGUOIMUA`, `MAXE`, `NOIDUNGHD`, `DIADIEM`, `GIA`, `NGAYLAP`, `TRANGTHAI`) VALUES
(1, 1, 6, 2, 'aaa', 'Tp.HCM', '566000000', '2022-03-03 00:00:00', 'Hoàn tất giao dịch'),
(19, 7, 9, 29, NULL, 'Tp.HCM', '665000000', '2022-03-10 20:43:46', 'Hoàn tất giao dịch'),
(20, 7, 1, 30, NULL, 'Hà Nội', '1690000000', '2022-03-10 20:56:51', 'Hoàn tất giao dịch'),
(26, 7, 1, 36, NULL, 'Tp.HCM', '410000000', '2022-03-14 09:28:43', 'Hoàn tất giao dịch'),
(46, 1, NULL, 56, '                          ', 'Tp.HCM', '759000000', '2022-03-26 13:24:26', 'Công khai'),
(47, 1, NULL, 57, NULL, 'Tp.HCM', '468000000', '2022-03-28 00:24:12', 'Công khai'),
(48, 1, NULL, 58, NULL, 'Đà Nẵng', '2290000000', '2022-03-28 00:31:48', 'Công khai'),
(49, 1, NULL, 59, NULL, 'Hải Phòng', '825000000', '2022-03-28 01:19:20', 'Công khai'),
(50, 1, NULL, 60, NULL, 'Hà Nội', '2366000000', '2022-03-28 01:26:21', 'Công khai');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hopdong_xe`
-- (See below for the actual view)
--
CREATE TABLE `hopdong_xe` (
`MATK` int(11)
,`TENTK` mediumtext
,`MAHD` int(11)
,`DIADIEM` mediumtext
,`GIA` decimal(10,0)
,`NGAYLAP` datetime
,`TRANGTHAI` mediumtext
,`MAXE` int(11)
,`TENXE` varchar(100)
,`HINHANH` mediumtext
,`BAOHANH` int(11)
,`NAMSANXUAT` int(11)
,`MALOAIXE` int(11)
,`TENLOAIXE` mediumtext
,`MAHSX` int(11)
,`TENHSX` mediumtext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hopdong_xe_nguoimua`
-- (See below for the actual view)
--
CREATE TABLE `hopdong_xe_nguoimua` (
`MAHD` int(11)
,`MANGUOIMUA` int(11)
,`TENTK` mediumtext
,`MAXE` int(11)
,`TENXE` varchar(100)
,`HINHANH` mediumtext
,`GIA` decimal(10,0)
,`BAOHANH` int(11)
,`NAMSANXUAT` int(11)
,`MALOAIXE` int(11)
,`TENLOAIXE` mediumtext
,`MAHSX` int(11)
,`TENHSX` mediumtext
,`NOIDUNGHD` mediumtext
,`DIADIEM` mediumtext
,`NGAYLAP` datetime
,`TRANGTHAI` mediumtext
);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TENKH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIOITINH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIACHI` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `EMAIL`, `GIOITINH`, `DIACHI`, `CMND`) VALUES
(1, 'Phạm Trần Huy Bảo', '0787502871', 'huybaoash@gmail.com', 'Nữ', '778D Đường số 4, Phường Hiệp BÌnh Phước', '026080277'),
(3, 'Lê Văn An', '0933561277', 'levelan@gmail.com', 'Nam', '232/2 Phan Đăng Lưu', '023287388'),
(4, 'Dương Văn Lâm', '0787502123', 'duongvanlam@gmail.com', 'Nam', '12 Đường số 4 Phướng Hiệp Bình Phước', '0260944421'),
(6, 'Lâm Duy Mạnh', '0787505678', 'lamduymanh@gmail.com', 'Nam', '779E Phường Hiệp Bình Quận Thủ Đức', '0260966612'),
(7, 'Một Lần Và Mãi Mãi', '0787505691', 'one4forever@gmail.com', 'Nam', '12 Đường số 4 Phướng Hiệp Bình Phước', '0260912322'),
(8, 'Tất Cả Cho Một', '0787556894', 'allforone@gmail.com', 'Nam', '779F Phường Hiệp Bình Quận Thủ Đức', '0260955326'),
(21, 'San An', '0937472588', 'sa@gmail.com', 'Nữ', '779F Phường Hiệp Bình Quận Thủ Đức', '0260325556');

-- --------------------------------------------------------

--
-- Table structure for table `loaixe`
--

CREATE TABLE `loaixe` (
  `MALOAIXE` int(11) NOT NULL,
  `TENLOAIXE` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINHANH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRANGTHAI` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaixe`
--

INSERT INTO `loaixe` (`MALOAIXE`, `TENLOAIXE`, `HINHANH`, `TRANGTHAI`) VALUES
(1, 'Dòng xe SUV', 'images/cartype/e5849910ff25785b2e81f0391dd99c17-2740466052296500054.jpg', 'Công khai'),
(2, 'Dòng ô tô CUV', 'images/cartype/XeCUV.jpg', 'Công khai'),
(3, 'Dòng xe Sedan', 'images/cartype/XeSedan.jpg', 'Công khai'),
(4, 'Dòng xe Minivan/MPV', 'images/cartype/XeMPV.jpg', 'Công khai'),
(5, 'Dòng ô tô Hatchback', 'images/cartype/XeHatchback.jpg', 'Công khai'),
(6, 'Dòng xe Convertible/Cabriolet', 'images/cartype/XeCabriolet.jpg', 'Công khai'),
(7, 'Dòng xe Pick-up', 'images/cartype/XePick-up.jpg', 'Công khai'),
(8, 'Dòng ô tô Limousine', 'images/cartype/XeLimousine.jpg', 'Công khai'),
(9, 'Dòng xe Coupe', 'images/cartype/XeCoupe.jpg', 'Công khai'),
(10, 'Dòng xe Ranger', 'images/cartype/XeRanger.jpg', 'Công khai'),
(11, 'Dòng xe Lamborghini', 'images/cartype/XeLamborghini.jpg', 'Công khai'),
(12, 'Dòng xe ASH', 'images/cartype/l_1646919103.951.jpg', 'Ẩn'),
(13, 'Dòng ô tô MAX', 'images/cartype/HangBMW.jpg', 'Ẩn');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` int(11) NOT NULL,
  `MAKH` int(11) DEFAULT NULL,
  `TENTK` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `MATKHAU` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINHANH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `CHUCVU` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MATK`, `MAKH`, `TENTK`, `MATKHAU`, `HINHANH`, `CHUCVU`, `TRANGTHAI`) VALUES
(1, 1, 'huybaoash', 'huybaoash', NULL, 'Người Quản Trị', 'Đang hoạt động'),
(6, 3, 'levela', 'levela', NULL, 'Người dùng', 'Đã khóa'),
(7, 4, 'duongvanlam', 'duongvanlam', NULL, 'Người dùng', 'Đang hoạt động'),
(8, 6, 'lamduymanh', 'lamduymanh', '', 'Người dùng', 'Đang hoạt động'),
(9, 7, 'motlanvamaimai', 'motlanvamaimai', '', 'Người dùng', 'Đang hoạt động'),
(10, 8, 'tatcachomot', 'tatcachomot', '', 'Người dùng', 'Đang hoạt động'),
(11, 21, 'sa', 'sa', '', 'Người dùng', 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MAXE` int(11) NOT NULL,
  `TENXE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NOIDUNGXE` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `HINHANH` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `BAOHANH` int(11) DEFAULT NULL,
  `GIA` decimal(20,0) DEFAULT NULL,
  `NAMSANXUAT` int(11) NOT NULL,
  `MALOAIXE` int(11) NOT NULL,
  `MAHSX` int(11) NOT NULL,
  `TRANGTHAI` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MAXE`, `TENXE`, `NOIDUNGXE`, `HINHANH`, `BAOHANH`, `GIA`, `NAMSANXUAT`, `MALOAIXE`, `MAHSX`, `TRANGTHAI`) VALUES
(2, 'Ford Ranger Xls At 2016', '\r\n\r\nDòng xe: Ranger\r\n\r\nNăm sản xuất: 2016\r\n\r\nSố Km đã đi: 118000\r\n\r\nTình trạng: Đã sử dụng\r\n\r\nHộp số: Tự động\r\n\r\nNhiên liệu: Dầu\r\n\r\nKiểu dáng: Pick-up (bán tải)\r\n', 'images/car/hopdong1/IMAG3259-1.jpg', 36, '566000000', 2016, 10, 5, 'Công khai'),
(29, 'Xe Mazda 3 Luxury 2020', 'Xuất xứ: Lắp ráp trong nước \r\nTình trạng: Xe đã dùng \r\nDòng xe: Sedan \r\nSố Km đã đi: 20,000 Km \r\nMàu ngoại thất: Đỏ \r\nMàu nội thất: Đen \r\nSố cửa: 4 cửa \r\nSố chỗ ngồi: 5 chỗ \r\nNhiên liệu - động cơ \r\nĐộng cơ: Xăng \r\nHệ thống nạp nhiên liệu: 1.5 \r\nHộp số chuyển động \r\nHộp số: Số tự động \r\nDẫn động: FWD - Dẫn động cầu trước \r\nTiêu thụ nhiên liệu: 6 L/100Km', 'images/car/hopdong19/l_1646919103.951.jpg', 24, '665000000', 2020, 1, 1, 'Công khai'),
(30, 'Xe Toyota Prado TXL 2.7L 2016 ', 'Thông số cơ bản \r\nXuất xứ: Nhập khẩu \r\nTình trạng: Xe đã dùng\r\n Dòng xe: SUV \r\nSố Km đã đi: 70,000 Km\r\n Màu ngoại thất: Trắng \r\nMàu nội thất: Đen \r\nSố cửa: 5 cửa \r\nSố chỗ ngồi: 8 chỗ \r\nNhiên liệu - động cơ \r\nĐộng cơ: Xăng \r\nHệ thống nạp nhiên liệu: Hộp số chuyển động \r\nHộp số: Số tự động \r\nDẫn động: 4WD hoặc AWD \r\nTiêu thụ nhiên liệu: L/100Km', 'images/car/hopdong20/l_1646919856.313.jpg', 24, '1690000000', 2016, 1, 1, 'Công khai'),
(36, 'BÁN ACCENT 2022 GIÁ TỐT,T GÓP 85%,XE GIAO NGAY', 'Trả góp 5.81 triệu/tháng, trả trước 123 triệu (Gói vay tham khảo từ Chợ Tốt)\r\nĐẶC BIỆT: Ngân hàng hỗ trợ vay lên đến 80% - 90% giá trị xe --- Không cần chứng minh thu nhập (Chỉ cần CMND + HK) --- Duyệt hồ sơ trong 15 phút.Lãi suất ưu đãi,thấp thị trường .Bao đậu hồ sơ vay ngân hàng\r\nGiá xe đề nghị mua:\r\n\r\nACEENT 1.4L MT Số Sàn Tiêu Chuẩn 2022 : 410.000.000 đ + Tặng Phụ Kiện Cao Cấp\r\n\r\nACCENT 1.4L MT Số Sàn Bản Đủ 2022 : 466.000.000 đ + Tặng Phụ Kiện Cao Cấp\r\n\r\nACCENT 1.4L AT Tự Động Tiêu Chuẩn 2022 : 495.000.000\r\n.đ + Tặng Phụ Kiện Cao Cấp\r\n\r\nACCENT 1.4L AT Số Tự Động Đặc Biệt 2022 : 535.000.000 đ + Tặng Phụ Kiện Cao Cấp\r\n\r\nBảo hành 100.000 km hoặc 5 năm theo tiêu chuẩn của Hyundai trên toàn quốc\r\nHyundai Accent 2022 hiện có các màu: Đen,Trắng,Bạc,Đỏ,Vàng Cát,Vàng Be\r\nTặng phụ kiện cho xe (Bao Tay Lái da, Tappi Sàn mạ crom,Khăn lau xe, Bình Chữa Cháy, Áo Trùm Xe, Nước Hoa, Dán Phim Cách Nhiệt Mỹ, Lót Sàn Cao Cấp, Hộp Đen,Phủ Gầm).\r\nGiá xe Hyundai Accent đã bao gồm thuế VAT nhưng chưa bao gồm chi phí lăn bánh.Để biết thêm chi tiết giá lăn bánh Quý Khách vui LH', 'images/car/hopdong26/e5849910ff25785b2e81f0391dd99c17-2740466052296500054.jpg', 3, '410000000', 2022, 3, 6, 'Công khai'),
(56, 'Xe Toyota Fortuner', 'Thông số cơ bản\r\n  Xuất xứ:\r\nLắp ráp trong nước\r\n  Tình trạng:\r\nXe đã dùng\r\n  Dòng xe:\r\nSUV\r\n  Số Km đã đi:\r\n0 Km\r\n  Màu ngoại thất:\r\nTrắng\r\n  Màu nội thất:\r\nMàu khác\r\n  Số cửa:\r\n5 cửa\r\n  Số chỗ ngồi:\r\n7 chỗ\r\nNhiên liệu - động cơ\r\n  Động cơ:\r\nDầu\r\n  Hệ thống nạp nhiên liệu:\r\nHộp số chuyển động\r\n  Hộp số:\r\nSố tay\r\n  Dẫn động:\r\nFWD - Dẫn động cầu trước\r\n  Tiêu thụ nhiên liệu:\r\nL/100Km\r\n', 'images/car/hopdong46/l_1648269199.516.jpg', 24, '759000000', 2016, 9, 1, 'Công khai'),
(57, 'Xe Volkswagen Beetle convertible 2005', 'Thông số cơ bản\r\n  Xuất xứ:\r\nNhập khẩu\r\n  Tình trạng:\r\nXe đã dùng\r\n  Dòng xe:\r\nConvertible/Cabriolet\r\n  Số Km đã đi:\r\n12,434 Km\r\n  Màu ngoại thất:\r\nTrắng\r\n  Màu nội thất:\r\nNâu\r\n  Số cửa:\r\n2 cửa\r\n  Số chỗ ngồi:\r\n4 chỗ\r\nNhiên liệu - động cơ\r\n  Động cơ:\r\nXăng\r\n  Hệ thống nạp nhiên liệu:\r\nPhun xăng điện tử\r\nHộp số chuyển động\r\n  Hộp số:\r\nSố tự động\r\n  Dẫn động:\r\n4WD - Dẫn động 4 bánh\r\n  Tiêu thụ nhiên liệu:\r\n8 L/100Km\r\nThông tin mô tả\r\n#Volkswagen_Beetle mui xếp nỉ 2006\r\n✓ Màu Trắng nội thất da Nâu.\r\n✓ Sản xuất 2005\r\n✓ Động cơ: 2.5L AT.\r\n✓ Xe trang bị: NewBeetle mui sếp nỉ 2 cửa 4 chổ, số tự động, ghế nội thất da sang trọng, âm thanh 7 loa nghe cực hay, đèn pha bi-xenon, , màn hình giải trí kết nối usb CD, mâm độ, số tự động, điều hoà mát lạnh, cách âm tốt, 4 vỏ mới chạy êm ái,…\r\n\r\n✓Giá: 468 Triệu.\r\n\r\n✓ Hồng Phúc Auto cam kết:\r\n✓ Đảm bảo máy móc nguyên bản, không đâm đụng, không ngập nước.\r\n✓ Nhận trao đổi, giao lưu xe.\r\n✓ Đặc biệt có nhận thu mua xe cũ giá cao nhất thị trường, có huê hồng cho người chỉ điểm.\r\n#Volwagen_New_Beetle_Mui_Sếp', 'images/car/hopdong47/m_1648398176.929.jpg', 23, '468000000', 2005, 6, 8, 'Công khai'),
(58, 'Xe Porsche Panamera 4S', 'Thông số cơ bản\r\n  Xuất xứ:\r\nNhập khẩu\r\n  Tình trạng:\r\nXe đã dùng\r\n  Dòng xe:\r\nSedan\r\n  Số Km đã đi:\r\n55,000 Km\r\n  Màu ngoại thất:\r\nXanh\r\n  Màu nội thất:\r\nNâu\r\n  Số cửa:\r\n4 cửa\r\n  Số chỗ ngồi:\r\n4 chỗ\r\nNhiên liệu - động cơ\r\n  Động cơ:\r\nXăng 4.8 L\r\n  Hệ thống nạp nhiên liệu:\r\nHộp số chuyển động\r\n  Hộp số:\r\nSố tự động\r\n  Dẫn động:\r\nRFD - Dẫn động cầu sau\r\n  Tiêu thụ nhiên liệu:\r\nL/100Km\r\nThông tin mô tả\r\nPORSCHE PANAMERA 4S 2012:\r\n\r\n-Đăng kí 2013\r\n-Ngoại thất xanh, nội thất nâu\r\n-ODO 5 vạn km\r\n-lợi thế biển thành phố\r\n\r\nXe được trang bị FULL OPTION:\r\n-Kiểm soát ổn định và kiểm soát độ bám đường\r\n-Hệ thống chống bó cứng phanh\r\n-Hệ thống treo trước là Front independent suspension trong khi hệ thống treo sau là Rear independent suspension\r\n-Hệ thống âm thanh 10 loa, cổng USB, kết nối AUX, Bluetooth,\r\n-Cốp điều khiển điện, hệ thống dẫn đường, Cruiser Control\r\n-Và còn nhiều trang bị tiện ích và an toàn khác...\r\nCam kết\r\n- Xe đẹp như hình\r\n- Không đâm đụng, không ngập nước\r\n- Giấy tờ, pháp lý rõ ràng\r\nLIÊN HỆ NGAY ĐỂ NHẬN TƯ VẤN TRỰC TIẾP VÀ BÁO GIÁ TỐT', 'images/car/hopdong48/l_1647654494.219.jpg', 12, '2290000000', 2012, 10, 7, 'Công khai'),
(59, 'Xe VinFast Lux A 2.0 2.0 AT ', 'Thông số cơ bản\r\n  Xuất xứ:\r\nLắp ráp trong nước\r\n  Tình trạng:\r\nXe đã dùng\r\n  Dòng xe:\r\nSedan\r\n  Số Km đã đi:\r\n5,000 Km\r\n  Màu ngoại thất:\r\nĐen\r\n  Màu nội thất:\r\nNâu\r\n  Số cửa:\r\n4 cửa\r\n  Số chỗ ngồi:\r\n5 chỗ\r\nNhiên liệu - động cơ\r\n  Động cơ:\r\nXăng 2.0 L\r\n  Hệ thống nạp nhiên liệu:\r\nHộp số chuyển động\r\n  Hộp số:\r\nSố tự động\r\n  Dẫn động:\r\nRFD - Dẫn động cầu sau\r\n  Tiêu thụ nhiên liệu:\r\nL/100Km\r\nThông tin mô tả\r\nAuto88 về Vinfast Lux A2.0 AT sx 2021 chạy 5000km. Xe một chủ từ mới sơn zin 99%.\r\n\r\nAuto88 cam kết sản phẩm bán ra không đâm đụng, không ngập nước, động cơ hộp số nguyên bản, hồ sơ pháp lý chuẩn, không phạt nguội.\r\n\r\nCheck hãng mọi nơi theo chỉ định của khách hàng.\r\nHỗ trợ trả góp 70% giá trị xe trong 5 năm!\r\nFb: Trịnh Vũ Thái Hoà.', 'images/car/hopdong49/l_1647004723.409.jpg', 20, '825000000', 2021, 5, 14, 'Công khai'),
(60, 'Xe Ford Explorer 2022', 'Tặng thảm sàn 6D cao cấp\r\nTặng dán phim cách nhiệt toàn bộ xe\r\nTặng nước hoa ô tô\r\nTặng thẻ vip 10 triệu\r\nTặng Thẻ cứu hộ miễn phí 3 năm\r\nGiá xe cam kết tốt thị trường\r\nGọi ngay hôm nay để nhận báo giá tốt nhất: xe có đủ màu Trắng, Đen,Xanh,Đỏ giao ngay\r\nHỗ trợ Trả góp đến 80% giá xe, lãi suất ưu đãi, thủ tục nhanh chóng\r\nHỗ trợ thủ tục đăng ký, đăng kiểm, giao xe tại nhà\r\nFord Explorer 2022 nhập khẩu nguyên chiếc từ Mỹ, xe chắc nịch. Động cơ Ecoboost 2.3L cực kỳ khỏe, cho công suất 301 mã lực\r\nNgập tràn những tính năng an toàn và hỗ trợ người lái . Công nghệ bảo vệ Khách hàng Co - Pilot 360° bao gồm :\r\n✅Hệ thống cảnh báo lệch làn và duy trì làn đường\r\n✅Hệ thống cảm biến hỗ trợ đỗ xe trước và sau, camera 360° và camera lùi\r\n✅Hệ thống hỗ trợ đánh lái, cảnh báo va chạm, cảnh báo điểm mù và xe cắt ngang\r\n✅Hệ thống điều chỉnh đèn pha/cốt tự động\r\n✅Hệ thống cân bằng điện tử, chống bó cứng phanh (ABS) & phân phối lực phanh điện từ (EBD)\r\n✅Hệ thống chống trộm, kiểm soát áp suất lốp\r\n✅Hệ thống kiểm soát hành trình, hỗ trợ khởi hành ngang dốc, kiểm soát khi xe vào cua\r\n✅Trang bị lên đến 8 túi khí.\r\n✅Hệ thống chống ồn chủ động : Cách âm kính lái, khoang động cơ, khung gầm.\r\n\r\nNhấn để hiện số: 097342 ***\r\nHãng\r\nHãng: Ford\r\nDòng xe\r\nDòng xe: Explorer\r\nNăm sản xuất\r\nNăm sản xuất: 2022\r\nTình trạng\r\nTình trạng: Mới\r\nHộp số\r\nHộp số: Tự động\r\nNhiên liệu\r\nNhiên liệu: Xăng\r\nXuất xứ\r\nXuất xứ: Mỹ\r\nKiểu dáng\r\nKiểu dáng: SUV / Cross over\r\nSố chỗ\r\nSố chỗ: 7\r\n', 'images/car/hopdong50/asdkasdasdk.jpg', 3, '2366000000', 2022, 9, 5, 'Công khai');

-- --------------------------------------------------------

--
-- Structure for view `binhluan_ten`
--
DROP TABLE IF EXISTS `binhluan_ten`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `binhluan_ten`  AS SELECT `binhluan`.`MABL` AS `MABL`, `binhluan`.`NDBL` AS `NDBL`, `binhluan`.`MAHD` AS `MAHD`, `binhluan`.`MATK` AS `MATK`, `taikhoan`.`TENTK` AS `TENTK`, `binhluan`.`NGAYDANG` AS `NGAYDANG` FROM (`binhluan` join `taikhoan`) WHERE `binhluan`.`MATK` = `taikhoan`.`MATK` ;

-- --------------------------------------------------------

--
-- Structure for view `hopdong_xe`
--
DROP TABLE IF EXISTS `hopdong_xe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hopdong_xe`  AS SELECT `taikhoan`.`MATK` AS `MATK`, `taikhoan`.`TENTK` AS `TENTK`, `hopdong`.`MAHD` AS `MAHD`, `hopdong`.`DIADIEM` AS `DIADIEM`, `hopdong`.`GIA` AS `GIA`, `hopdong`.`NGAYLAP` AS `NGAYLAP`, `hopdong`.`TRANGTHAI` AS `TRANGTHAI`, `xe`.`MAXE` AS `MAXE`, `xe`.`TENXE` AS `TENXE`, `xe`.`HINHANH` AS `HINHANH`, `xe`.`BAOHANH` AS `BAOHANH`, `xe`.`NAMSANXUAT` AS `NAMSANXUAT`, `loaixe`.`MALOAIXE` AS `MALOAIXE`, `loaixe`.`TENLOAIXE` AS `TENLOAIXE`, `hangsanxuat`.`MAHSX` AS `MAHSX`, `hangsanxuat`.`TENHSX` AS `TENHSX` FROM ((((`hopdong` join `xe`) join `loaixe`) join `hangsanxuat`) join `taikhoan`) WHERE `hopdong`.`MAXE` = `xe`.`MAXE` AND `loaixe`.`MALOAIXE` = `xe`.`MALOAIXE` AND `hangsanxuat`.`MAHSX` = `xe`.`MAHSX` AND `hopdong`.`MANGUOIBAN` = `taikhoan`.`MATK` ;

-- --------------------------------------------------------

--
-- Structure for view `hopdong_xe_nguoimua`
--
DROP TABLE IF EXISTS `hopdong_xe_nguoimua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hopdong_xe_nguoimua`  AS SELECT `hopdong`.`MAHD` AS `MAHD`, `hopdong`.`MANGUOIMUA` AS `MANGUOIMUA`, `taikhoan`.`TENTK` AS `TENTK`, `xe`.`MAXE` AS `MAXE`, `xe`.`TENXE` AS `TENXE`, `xe`.`HINHANH` AS `HINHANH`, `hopdong`.`GIA` AS `GIA`, `xe`.`BAOHANH` AS `BAOHANH`, `xe`.`NAMSANXUAT` AS `NAMSANXUAT`, `xe`.`MALOAIXE` AS `MALOAIXE`, `loaixe`.`TENLOAIXE` AS `TENLOAIXE`, `xe`.`MAHSX` AS `MAHSX`, `hangsanxuat`.`TENHSX` AS `TENHSX`, `hopdong`.`NOIDUNGHD` AS `NOIDUNGHD`, `hopdong`.`DIADIEM` AS `DIADIEM`, `hopdong`.`NGAYLAP` AS `NGAYLAP`, `hopdong`.`TRANGTHAI` AS `TRANGTHAI` FROM ((((`hopdong` join `taikhoan`) join `xe`) join `loaixe`) join `hangsanxuat`) WHERE `hopdong`.`MANGUOIMUA` = `taikhoan`.`MATK` AND `hopdong`.`MAXE` = `xe`.`MAXE` AND `xe`.`MALOAIXE` = `loaixe`.`MALOAIXE` AND `xe`.`MAHSX` = `hangsanxuat`.`MAHSX` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MABL`),
  ADD KEY `MAHD` (`MAHD`),
  ADD KEY `MATK` (`MATK`);

--
-- Indexes for table `giohopdong`
--
ALTER TABLE `giohopdong`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MAHD` (`MAHD`),
  ADD KEY `MATK` (`MATK`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MAHSX`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MANGUOIBAN` (`MANGUOIBAN`),
  ADD KEY `MANGUOIMUA` (`MANGUOIMUA`),
  ADD KEY `MAXE` (`MAXE`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`MALOAIXE`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MAXE`),
  ADD KEY `MALOAIXE` (`MALOAIXE`),
  ADD KEY `MAHSX` (`MAHSX`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MABL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giohopdong`
--
ALTER TABLE `giohopdong`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MAHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `loaixe`
--
ALTER TABLE `loaixe`
  MODIFY `MALOAIXE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `xe`
--
ALTER TABLE `xe`
  MODIFY `MAXE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hopdong` (`MAHD`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Constraints for table `giohopdong`
--
ALTER TABLE `giohopdong`
  ADD CONSTRAINT `giohopdong_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hopdong` (`MAHD`),
  ADD CONSTRAINT `giohopdong_ibfk_2` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Constraints for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`MANGUOIBAN`) REFERENCES `taikhoan` (`MATK`),
  ADD CONSTRAINT `hopdong_ibfk_2` FOREIGN KEY (`MANGUOIMUA`) REFERENCES `taikhoan` (`MATK`),
  ADD CONSTRAINT `hopdong_ibfk_3` FOREIGN KEY (`MAXE`) REFERENCES `xe` (`MAXE`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`MALOAIXE`) REFERENCES `loaixe` (`MALOAIXE`),
  ADD CONSTRAINT `xe_ibfk_2` FOREIGN KEY (`MAHSX`) REFERENCES `hangsanxuat` (`MAHSX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
