-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2024 lúc 06:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansachonline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_chi_tiet_hoadon` bigint(10) NOT NULL,
  `donhang_id` bigint(20) NOT NULL,
  `masp` bigint(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` decimal(9,2) NOT NULL,
  `madv` varchar(200) NOT NULL,
  `sodh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_chi_tiet_hoadon`, `donhang_id`, `masp`, `soluong`, `dongia`, `thanhtien`, `madv`, `sodh`) VALUES
(144, 127, 214, 1, 214, 214.00, '15', NULL),
(145, 129, 214, 1, 214, 214.00, '16', NULL),
(146, 130, 212, 1, 75, 75.00, '', NULL),
(147, 130, 213, 0, 94, 0.00, '', NULL),
(148, 130, 214, 0, 214, 0.00, '', NULL),
(149, 130, 222, 0, 90, 0.00, '', NULL),
(150, 131, 212, 1, 75, 75.00, '', NULL),
(151, 131, 213, 0, 94, 0.00, '', NULL),
(152, 133, 212, 1, 75, 75.00, '', NULL),
(153, 134, 212, 1, 75, 75.00, '', NULL),
(154, 135, 214, 1, 214, 214.00, '', NULL),
(155, 136, 212, 1, 75, 75.00, '', NULL),
(156, 137, 213, 1, 94, 94.00, '', NULL),
(174, 169, 213, 1, 94, 94.00, '', 169),
(175, 170, 213, 1, 94, 94.00, '', 170),
(176, 171, 212, 8, 75, 600.00, '', 171),
(177, 172, 214, 1, 214, 214.00, '', 172),
(178, 173, 212, 1, 75, 75.00, '', 173),
(179, 174, 216, 1, 110, 110.00, '', 174),
(180, 175, 212, 1, 75, 75.00, '', 175),
(181, 176, 213, 1, 94, 94.00, '', 176),
(182, 176, 216, 1, 110, 110.00, '', 176),
(183, 177, 216, 1, 110, 110.00, '', 177),
(184, 178, 219, 1, 59, 59.00, '', 178),
(185, 178, 231, 1, 24, 24.00, '', 178),
(186, 179, 213, 1, 94, 94.00, '', 179),
(187, 179, 219, 1, 59, 59.00, '', 179),
(188, 179, 231, 1, 24, 24.00, '', 179),
(189, 180, 216, 1, 110, 110.00, '', 180),
(190, 181, 231, 1, 24, 24.00, '', 181),
(191, 182, 231, 2, 24, 48.00, '', 182),
(192, 183, 214, 1, 214, 214.00, '', 183),
(193, 183, 216, 1, 110, 110.00, '', 183),
(194, 184, 222, 1, 90, 90.00, '', 184),
(195, 184, 225, 1, 24, 24.00, '', 184),
(196, 185, 218, 1, 200, 200.00, '', 185),
(197, 185, 232, 1, 43, 43.00, '', 185);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `madv` bigint(20) NOT NULL,
  `tendv` varchar(200) NOT NULL,
  `gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`madv`, `tendv`, `gia`) VALUES
(15, 'bcs', 10),
(16, 'Gói quà tặng', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `sodh` bigint(20) NOT NULL,
  `emailkh` varchar(50) NOT NULL,
  `ngaygiao` date NOT NULL,
  `tenkh` varchar(100) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `dienthoai` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hinhthucthanhtoan` varchar(100) NOT NULL,
  `thanhtien` decimal(9,2) NOT NULL,
  `tinh_trang_don_hang` varchar(255) NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`sodh`, `emailkh`, `ngaygiao`, `tenkh`, `diachi`, `dienthoai`, `user_id`, `hinhthucthanhtoan`, `thanhtien`, `tinh_trang_don_hang`) VALUES
(127, 'thanh@gmail.com', '2021-06-26', 'Thanh Truong', 'Hà Nội', '1234567890', 3, 'ATM', 224.00, 'Đang xử lý'),
(128, 'nhuvuong2828@gmail.com', '2024-04-01', 'vuong nguyen', '121i đường số 11', '0969363837', 1, 'ATM', 234.00, 'Đang xử lý'),
(129, 'nhuvuong2828@gmail.com', '2024-04-01', 'vuong nguyen', '121i đường số 11', '0969363837', 1, 'ATM', 234.00, 'Đang xử lý'),
(130, 'thanh@gmail.com', '2024-04-25', 'Thanh Truong', '11 Nguyễn Chí Thanh', '1234567890', 3, 'ATM', 0.00, 'Đang xử lý'),
(131, 'thanh@gmail.com', '2024-04-25', 'Thanh Truong', '11 Nguyễn Chí Thanh', '1234567890', 3, 'ATM', 0.00, 'Đang xử lý'),
(132, 'testing2@gmail.com', '2024-04-17', 'tester2', '', '815418', 9, 'Live', 0.00, 'Đang xử lý'),
(133, 'testing2@gmail.com', '2024-04-17', 'tester2', '', '815418', 9, 'Live', 0.00, 'Đang xử lý'),
(134, 'testing2@gmail.com', '2024-04-26', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(135, 'testing2@gmail.com', '2024-04-26', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(136, 'testing2@gmail.com', '2024-04-26', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(137, 'testing2@gmail.com', '2024-04-26', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(138, 'testing2@gmail.com', '2024-04-26', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(139, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(140, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(141, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(142, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(143, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(144, 'testing2@gmail.com', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(147, '', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(149, '', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(150, '', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(151, '', '2024-04-27', 'tester2', '', '815418', 9, 'ATM', 0.00, 'Đang xử lý'),
(160, 'traidep1@gmail.com', '2024-04-27', 'tuhuy', '11 Nguyễn Chí Thanh', '115', 7, 'ATM', 0.00, 'Đang xử lý'),
(164, 'test27@gmail.com', '2024-04-27', 'Test27', '18 Nguyễn', '06064647225', 10, 'ATM', 0.00, 'Đang xử lý'),
(165, 'test27@gmail.com', '2024-04-27', 'Test27', 'Sài Gòn', '06064647225', 10, 'ATM', 0.00, 'Đang xử lý'),
(169, 'test27@gmail.com', '2024-04-27', 'Test27', 'Mới Tạo', '06064647225', 10, 'ATM', 0.00, 'Đang xử lý'),
(170, 'test27@gmail.com', '2024-04-27', 'Test27', 'Mới Tạo nữa', '06064647225', 10, 'ATM', 0.00, 'Đang xử lý'),
(171, 'test27@gmail.com', '2024-04-27', 'Test27', 'Sài Gòn', '06064647225', 10, 'ATM', 600.00, 'Đang xử lý'),
(172, 'test27@gmail.com', '2024-04-27', 'Test27', '1231', '06064647225', 10, 'COD', 268.00, 'Đang xử lý'),
(173, 'traidep@gmail.com', '2024-05-01', 'traidep', 'Sài Gòn nè', '116', 5, 'ATM', 75.00, 'Đang xử lý'),
(174, 'test27@gmail.com', '2024-05-02', 'Test27', '18 Nguyễn', '06064647225', 10, 'ATM', 138.00, 'Đang xử lý'),
(175, 'test27@gmail.com', '2024-05-07', 'Test27', 'dâda', '06064647225', 10, 'ATM', 75.00, 'Đang xử lý'),
(176, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Trần Duy Hưng', '1234567890', 3, 'ATM', 248.00, 'Đang xử lý'),
(177, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Trần Duy Khang', '1234567890', 3, 'ATM', 138.00, 'Đang xử lý'),
(178, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Mới Tạo', '1234567890', 3, 'ATM', 103.00, 'Đang xử lý'),
(179, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Sài Gòn', '1234567890', 3, 'COD', 213.00, 'Đang xử lý'),
(180, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', '1231', '1234567890', 3, 'ATM', 138.00, 'Đang xử lý'),
(181, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Sài Gòn', '1234567890', 3, 'ATM', 24.00, 'Đang xử lý'),
(182, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'Sài Gòn', '1234567890', 3, 'ATM', 48.00, 'Đang xử lý'),
(183, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', 'mới đây ', '1234567890', 3, 'ATM', 406.00, 'Đang xử lý'),
(184, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', '18 Nguyễn', '1234567890', 3, 'ATM', 114.00, 'Đang xử lý'),
(185, 'thanh@gmail.com', '2024-05-07', 'Thanh Truong', '18 Nguyễn', '1234567890', 3, 'ATM', 243.00, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Ma_KH` int(11) NOT NULL,
  `Ten_KH` varchar(20) NOT NULL,
  `Tai_Khoan` varchar(50) NOT NULL,
  `Mat_Khau` varchar(50) NOT NULL,
  `Ngay_Sinh` date NOT NULL,
  `Dia_Chi` text NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loginadmin`
--

CREATE TABLE `loginadmin` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `ma_ql` varchar(10) NOT NULL,
  `ten_ql` varchar(10) NOT NULL,
  `email_ql` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loginadmin`
--

INSERT INTO `loginadmin` (`tendangnhap`, `matkhau`, `ma_ql`, `ten_ql`, `email_ql`) VALUES
('admin', 'admin', 'QL001', 'Admin 1', 'admin@example.com'),
('manager1', 'password1', 'QL002', 'Manager 1', 'manager1@example.com'),
('manager2', 'password2', 'QL003', 'Manager 2', 'manager2@example.com'),
('manager3', 'password3', 'QL004', 'Manager 3', 'manager3@example.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loginuser`
--

CREATE TABLE `loginuser` (
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `khoatk` int(1) NOT NULL DEFAULT 0,
  `chitietkhoa` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loginuser`
--

INSERT INTO `loginuser` (`email`, `matkhau`, `HoTen`, `DienThoai`, `dia_chi`, `khoatk`, `chitietkhoa`, `user_id`) VALUES
('nhuvuong2828@gmail.com', '123456', 'vuong nguyen', '0969363837', NULL, 1, 'Spam', 1),
('testing@gmail.com', '0', 'Phạm Hào0000', '11365', '', 0, NULL, 2),
('thanh@gmail.com', '123', 'Thanh Truong', '1234567890', NULL, 0, NULL, 3),
('tungvu@gmail.com', '123', 'Vũ Đình Tùng', '0123456789', NULL, 0, NULL, 4),
('traidep@gmail.com', 'haolatui', 'traidep', '116', '11 Nguyễn Chí Thanh', 0, NULL, 5),
('traidep1@gmail.com', 'haolatui', 'tuhuy', '115', '11 Nguyễn Chí Thanh', 0, NULL, 7),
('testing1@gmail.com', 'haolatui', 'tester', '090875494', '113 hy', 0, NULL, 8),
('testing2@gmail.com', 'haolatui', 'tester2', '815418', '11Nguyễn Chí Thanh', 0, NULL, 9),
('test27@gmail.com', 'haolatui', 'Test27', '06064647225', '110 Đường số 3', 0, NULL, 10),
('thunghiem154@gmail.com', 'haolatui', 'thunghiem154', '09181873618', '440 Nơ Trang Long', 0, NULL, 11),
('thunghiem154@gmail.com', 'haolatui', 'thunghiem154', '09181873618', '440 Nơ Trang Long', 0, NULL, 12),
('thunghiem1542@gmail.com', 'haolatui', 'thunghiem1542', '09181873618', '440 Nơ Trang Long', 0, NULL, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `ID` bigint(10) NOT NULL,
  `Ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`ID`, `Ten`) VALUES
(15, 'NXB Trẻ'),
(16, 'NXB Tổng hợp TP.HCM'),
(17, 'NXB Thế Giới'),
(18, 'NXB Hội Nhà Văn'),
(19, 'NXB Kim Đồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` bigint(10) NOT NULL,
  `Ten` varchar(200) NOT NULL,
  `Gia` double NOT NULL,
  `HinhAnh` varchar(200) NOT NULL,
  `Manhasx` bigint(10) NOT NULL,
  `Mota` text NOT NULL,
  `date` date NOT NULL,
  `KhuyenMai` tinyint(1) NOT NULL,
  `giakhuyenmai` double NOT NULL,
  `tacgia` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `Ten`, `Gia`, `HinhAnh`, `Manhasx`, `Mota`, `date`, `KhuyenMai`, `giakhuyenmai`, `tacgia`) VALUES
(212, 'Bản Án Chế Độ Thực Dân Phá', 75, 'DSHCM.jpg', 15, '<p>&ldquo;Bản &aacute;n chế độ thực d&acirc;n Ph&aacute;p&rdquo; (Le Proc&egrave;s de la Colonisation Fran&ccedil;aise) l&agrave; t&aacute;c phẩm của Hồ Chủ tịch viết bằng tiếng Ph&aacute;p trong khoảng những năm 1921-1925, đăng tải lần đầu ti&ecirc;n năm 1925 tại Paris (thủ đ&ocirc; nước Ph&aacute;p) tr&ecirc;n b&aacute;o Impr&eacute;kor của Quốc tế Cộng sản. T&aacute;c phẩm gồm 12 chương v&agrave; phần phụ lục, với c&aacute;ch h&agrave;nh văn ngắn gọn, s&uacute;c t&iacute;ch, c&ugrave;ng với những sự kiện đầy sức thuyết phục, t&aacute;c phẩm tố c&aacute;o thực d&acirc;n Ph&aacute;p d&ugrave;ng mọi thủ đoạn khốc liệt bắt &ldquo;d&acirc;n bản xứ&rdquo; phải đ&oacute;ng &ldquo;thuế m&aacute;u&rdquo; cho ch&iacute;nh quốc... để &ldquo;phơi th&acirc;y tr&ecirc;n chiến trường ch&acirc;u &Acirc;u&rdquo;; đ&agrave;y đọa phụ nữ, trẻ em &ldquo;thuộc địa&rdquo;; c&aacute;c thống sứ, quan lại thực d&acirc;n độc &aacute;c như một bầy th&uacute; dữ, v.v... T&aacute;c phẩm đ&atilde; g&acirc;y được tiếng vang lớn ngay từ khi ra đời, thức tỉnh lương tri của những con người y&ecirc;u tự do, b&igrave;nh đẳng, b&aacute;c &aacute;i, hướng c&aacute;c d&acirc;n tộc bị &aacute;p bức đi theo con đường C&aacute;ch mạng th&aacute;ng Mười Nga v&agrave; chủ nghĩa M&aacute;c &ndash; L&ecirc;nin, thắp l&ecirc;n ngọn lửa đấu tranh cho độc lập, tự do v&agrave; chủ nghĩa x&atilde; hội của d&acirc;n tộc Việt Nam. Nh&acirc;n hưởng ứng cuộc vận động học tập v&agrave; l&agrave;m theo tấm gương đạo đức Hồ Ch&iacute; Minh, Nh&agrave; xuất bản Trẻ in t&aacute;c phẩm &ldquo;Bản &aacute;n chế độ thực d&acirc;n Ph&aacute;p&rdquo; &ndash; một trong những đỉnh cao của văn chương ch&iacute;nh luận c&aacute;ch mạng.</p>\r\n', '2021-06-26', 0, 0, 'Hồ Chí Minh'),
(213, 'Và Rồi Chẳng Còn Ai - And Then There Were None', 110, 'VRCCA.jpg', 15, '<p>&ldquo;Mười&hellip;&rdquo; Mười người bị lừa ra một h&ograve;n đảo nằm trơ trọi giữa biển khơi thuộc vịnh Devon, tất cả được bố tr&iacute; cho ở trong một căn nh&agrave;. T&aacute;c giả của tr&ograve; bịp n&agrave;y l&agrave; một nh&acirc;n vật b&iacute; hiểm c&oacute; t&ecirc;n &ldquo;U.N.Owen&rdquo;. &ldquo;Ch&iacute;n&hellip;&rdquo; Trong bữa ăn tối, một th&ocirc;ng điệp được thu &acirc;m sẵn vang l&ecirc;n lần lượt buộc tội từng người đ&atilde; g&acirc;y ra những tội &aacute;c b&iacute; mật. V&agrave;o cuối buổi tối h&ocirc;m đ&oacute;, một vị kh&aacute;ch đ&atilde; thiệt mạng. &ldquo;T&aacute;m&hellip;&rdquo; Bị kẹt lại giữa mu&ocirc;n tr&ugrave;ng khơi v&igrave; gi&ocirc;ng b&atilde;o c&ugrave;ng nỗi &aacute;m ảnh về một b&agrave;i v&egrave; đếm ngược, từng người, từng người một&hellip; những vị kh&aacute;ch tr&ecirc;n đảo bắt đầu bỏ mạng. &ldquo;Bảy&hellip;&rdquo; Ai trong số mười người tr&ecirc;n đảo l&agrave; kẻ giết người, v&agrave; liệu ai trong số họ c&oacute; thể sống s&oacute;t? &ldquo;Một trong những t&aacute;c phẩm g&acirc;y t&ograve; m&ograve; hay nhất, xuất sắc nhất của Christie.&rdquo; &ndash; Tạp ch&iacute; Observer &ldquo;Kiệt t&aacute;c của Agatha Christie.&rdquo; &ndash; Tạp ch&iacute; Spectator</p>\r\n', '2021-06-26', 1, 94, 'Agatha Christie'),
(214, 'Muôn Kiếp Nhân Sinh Tập 2', 268, 'MKNS.jpg', 16, '<p>T&aacute;c phẩm Mu&ocirc;n Kiếp Nh&acirc;n Sinh tập 1 của t&aacute;c giả Nguy&ecirc;n Phong xuất bản giữa t&acirc;m điểm của đại dịch đ&atilde; thực sự tạo n&ecirc;n một hiện tượng xuất bản hiếm c&oacute; ở Việt Nam. Cuốn s&aacute;ch đ&atilde; khơi dậy những trực cảm tiềm ẩn của con người, l&agrave;m thay đổi g&oacute;c nh&igrave;n cuộc sống v&agrave; thức tỉnh nhận thức của ch&uacute;ng ta giữa một thế giới đang ng&agrave;y c&agrave;ng bất ổn v&agrave; đầy biến động. Ngo&agrave;i việc ph&aacute;t h&agrave;nh hơn 200.000 bản trong 6 th&aacute;ng, chưa kể lượng ph&aacute;t h&agrave;nh Ebook v&agrave; Audio Book qua Voiz-FM, First News c&ograve;n nhận được h&agrave;ng ng&agrave;n tin nhắn, e-mail chuyển lời cảm ơn đến t&aacute;c giả Nguy&ecirc;n Phong. Điều n&agrave;y chứng tỏ sức lan tỏa của cuốn s&aacute;ch đ&atilde; tạo n&ecirc;n một hiện tượng trong văn h&oacute;a đọc của năm 2020.</p>\r\n', '2021-06-26', 1, 214, 'Nguyên Phong'),
(216, 'Hiểu Về Trái Tim (Tái Bản 2019) ', 138, 'image_195509_1_14922.jpg', 16, 'HIỂU VỀ TRÁI TIM – CUỐN SÁCH MỞ CỬA THẾ GIỚI CẢM XÚC CỦA MỖI NGƯỜI  \r\n\r\n“Hiểu về trái tim” là một cuốn sách đặc biệt được viết bởi thiền sư Minh Niệm. Với phong thái và lối hành văn gần gũi với những sinh hoạt của người Việt, thầy Minh Niệm đã thật sự thổi hồn Việt vào cuốn sách nhỏ này.\r\n\r\nXuất bản lần đầu tiên vào năm 2011, Hiểu Về Trái Tim trình làng cũng lúc với kỷ lục: cuốn sách có số lượng in lần đầu lớn nhất: 100.000 bản. Trung tâm sách kỷ lục Việt Nam công nhận kỳ tích ấy nhưng đến nay, con số phát hành của Hiểu về trái tim vẫn chưa có dấu hiệu chậm lại.\r\n\r\nLà tác phẩm đầu tay của nhà sư Minh Niệm, người sáng lập dòng thiền hiểu biết (Understanding Meditation), kết hợp giữa tư tưởng Phật giáo Đại thừa và Thiền nguyên thủy Vipassana, nhưng Hiểu Về Trái Tim không phải tác phẩm thuyết giáo về Phật pháp. Cuốn sách rất “đời” với những ưu tư của một người tu nhìn về cõi thế. Ở đó, có hạnh phúc, có đau khổ, có tình yêu, có cô đơn, có tuyệt vọng, có lười biếng, có yếu đuối, có buông xả… Nhưng, tất cả những hỉ nộ ái ố ấy đều được khoác lên tấm áo mới, một tấm áo tinh khiết và xuyên suốt, khiến người đọc khi nhìn vào, đều thấy mọi sự như nhẹ nhàng hơn…\r\n', '2021-06-26', 1, 110, 'Minh Niệm'),
(218, 'Đừng Chạy Theo Số Đông ', 200, 'image_195509_1_37011.jpg', 17, 'Nếu tất cả mọi người ai cũng làm chủ doanh nghiệp, thì ai sẽ đi làm thuê?\r\n\r\nTôi.\r\n\r\nBởi lúc đó họ sẽ phải đấu giá để có được tôi.\r\n\r\nNhưng điều này không bao giờ xảy ra. Bởi ngay từ trong trứng đến lúc mọc cánh, chúng ta đã được dạy phải làm cho người khác cả đời. Chỉ có 1% được dạy khác.\r\n\r\nBạn không chạy theo số đông.\r\n\r\nBạn LÀ số đông.\r\n\r\nTuy nhiên bạn đừng nhầm lẫn. Cuốn sách này không chỉ nói về vấn đề “làm thuê” hay “làm riêng”. Đây chỉ là một trong những khía cạnh rất nhỏ.\r\n\r\nCuốn sách này muốn làm nổi bật một hệ tư duy ngầm lớn và khủng khiếp hơn thế mà chúng ta không nhận ra. Một sức hút vô hình nhưng mạnh mẽ.', '2021-06-26', 0, 0, 'Kiên Trần'),
(219, 'Nhà Giả Kim (Tái Bản 2020) ', 79, 'image_195509_1_36793.jpg', 18, 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”', '2021-06-26', 1, 59, 'Paulo Coelho'),
(222, 'Cây cam ngọt của tôi', 90, 'caycamngotcuatoi.jpg', 15, '<p>m&ocirc; tả ở đ&acirc;y</p>\r\n', '2024-04-17', 0, 0, 'José Mauro de Vasconcelos'),
(223, 'Asari - Cô Bé Tinh Nghịch - Tập 1 (Tái Bản 2024)', 24, 'asari1.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!</p>\r\n', '2024-04-25', 0, 0, 'Mayumi Muroyama'),
(224, 'Asari - Cô Bé Tinh Nghịch - Tập 2 (Tái Bản 2024)', 24, 'asari2.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!</p>\r\n', '2024-05-01', 0, 0, 'Mayumi Muroyama'),
(225, 'Asari - Cô Bé Tinh Nghịch - Tập 3 (Tái Bản 2024)', 24, 'asari3.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!​</p>\r\n', '2024-05-01', 0, 0, 'Mayumi Muroyama'),
(226, 'Asari - Cô Bé Tinh Nghịch - Tập 4 (Tái Bản 2024)', 24, 'asari4.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!​</p>\r\n', '2024-05-01', 0, 0, 'Mayumi Muroyama'),
(227, 'Asari - Cô Bé Tinh Nghịch - Tập 5 (Tái Bản 2024)', 24, 'asari5.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!​</p>\r\n', '2024-05-01', 0, 0, 'Mayumi Muroyama'),
(228, 'Asari - Cô Bé Tinh Nghịch - Tập 6 (Tái Bản 2024)', 24, 'asari6.jpg', 19, '<p>Ng&agrave;y nảy ng&agrave;y nay, một gia đ&igrave;nh nọ ở Nhật Bản c&oacute; hai c&ocirc; con g&aacute;i. C&ocirc; em l&agrave; b&eacute; Asari, học lớp 4, một c&ocirc; b&eacute; học h&agrave;nh tuy hơi bết b&aacute;t nhưng được c&aacute;i lu&ocirc;n vui tươi hồn nhi&ecirc;n. C&ocirc; chị l&agrave; Tatami, học lớp 6, học giỏi nhất trường, nhưng lại xấu t&iacute;nh v&agrave; kho&aacute;i chọc ghẹo Asari. Mỗi ng&agrave;y tr&ocirc;i qua với hai chị em đều l&agrave; một &ldquo;trận chiến&rdquo; bất ph&acirc;n thắng bại khiến bố mẹ cũng phải b&oacute; tay. Ấy vậy m&agrave; l&uacute;c cần đo&agrave;n kết vẫn y&ecirc;u thương nhau lắm đ&oacute;! M&ugrave;a h&egrave; n&agrave;y, c&aacute;c fan của Asari - c&ocirc; b&eacute; tinh nghịch h&atilde;y chuẩn bị đ&oacute;n ch&agrave;o sự trở lại của bộ đ&ocirc;i chị em &quot;b&aacute;o thủ&quot;: Asari v&agrave; Tatami nh&eacute;!​</p>\r\n', '2024-05-01', 0, 0, 'Mayumi Muroyama'),
(229, 'Blue Period - Tập 13', 46, 'bp13.jpg', 15, '<p>Yataro Yaguchi l&agrave; một học sinh xuất sắc nhưng c&oacute; lối sống bu&ocirc;ng thả, kh&ocirc;ng mục đ&iacute;ch. Một ng&agrave;y nọ, tận mắt chi&ecirc;m ngưỡng bức tranh của một chị lớp tr&ecirc;n ở CLB Mỹ thuật, Yataro ho&agrave;n to&agrave;n bị h&uacute;t hồn v&agrave; lần đầu ti&ecirc;n trong đời, cậu đ&atilde; t&igrave;m ra thứ m&igrave;nh thật sự đam m&ecirc; v&agrave; đặt mọi t&acirc;m huyết v&agrave;o đ&oacute;. Yataro quyết định tham gia v&agrave;o CLB mỹ thuật v&agrave; nu&ocirc;i hy vọng thi v&agrave;o trường ĐH mỹ thuật Tokyo danh tiếng. Thế nhưng, cậu li&ecirc;n tục vấp phải sự phản đối từ cha mẹ v&agrave; bạn b&egrave;. Đứng trước t&igrave;nh thế kh&oacute; xử n&agrave;y, Yataro đ&atilde; quyết định tự m&igrave;nh thuyết phục mọi người bằng c&aacute;c bức vẽ đầy t&acirc;m huyết.</p>\r\n\r\n<p>Bộ truyện đ&atilde; đạt giải Manga Taisho v&agrave; giải thưởng Kodansha năm 2019. Năm 2020, bộ truyện tiếp tục đạt hai giải Manga Taisho v&agrave; Kodansha, đồng thời nhận giải thưởng danh gi&aacute; Tezuka Osamu.</p>\r\n', '2024-05-01', 0, 0, 'Yamaguchi Tsubasa'),
(231, 'Thám tử lừng danh Conan - Tập 101', 24, 'tham-tu-lung-danh-conan_bia_tap-101.jpg', 19, '<p>&nbsp;</p>\r\n\r\n<p>Mật m&atilde; Akemi Miyano để lại ẩn chứa gợi &yacute; về vị tr&iacute; ch&ocirc;n chiếc hộp thời gian ở trường tiểu học!? Conan dẽ c&ugrave;ng nh&oacute;m Haibara hợp sức giải m&atilde;!!</p>\r\n\r\n<p>Tiếng s&uacute;ng vang l&ecirc;n tại nh&agrave; h&agrave;ng Ph&aacute;p danh tiếng! Conan lần theo dấu viết của tiến sĩ vừa bị bắt đi, thế rồi &ldquo;nữ thần gi&oacute;&rdquo; bất ngờ xuất hiện trước mặt cậu. Th&acirc;n phận thực sự của c&ocirc; l&agrave; g&igrave;?</p>\r\n\r\n<p>V&agrave; lần n&agrave;y, Toru Amuro sẽ đối đầu với Kaito Kid khi hắn định trộm m&oacute;n bảo vật!</p>\r\n', '2024-05-01', 0, 0, 'Gosho Aoyama'),
(232, 'Người Bà Tài Giỏi Vùng Saga - Tập 6', 43, 'nguoibataigioi-6.jpg', 19, '<p>&nbsp;</p>\r\n\r\n<table style=\"width:1200px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"vertical-align:top\">\r\n			<p>Gi&aacute; sản phẩm tr&ecirc;n Fahasa.com đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. B&ecirc;n cạnh đ&oacute;, tuỳ v&agrave;o loại sản phẩm, h&igrave;nh thức v&agrave; địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như Phụ ph&iacute; đ&oacute;ng g&oacute;i, ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh,...</p>\r\n\r\n			<p>Ch&iacute;nh s&aacute;ch khuyến m&atilde;i tr&ecirc;n Fahasa.com kh&ocirc;ng &aacute;p dụng cho Hệ thống Nh&agrave; s&aacute;ch Fahasa tr&ecirc;n to&agrave;n quốc</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Người b&agrave; t&agrave;i giỏi v&ugrave;ng Saga 6 &ndash; Những th&aacute;ng ng&agrave;y vui vẻ</p>\r\n\r\n<p>Mới ng&agrave;y n&agrave;o được gửi từ Hiroshima về sống với b&agrave; ngoại, nay Akihiro đ&atilde; l&ecirc;n lớp bốn, mỗi ng&agrave;y đều trải qua biết bao chuyện th&uacute; vị b&ecirc;n bạn b&egrave; v&agrave; người d&acirc;n Saga. N&agrave;o l&agrave; chuyện đi lễ ch&ugrave;a đầu năm được thần linh &ldquo;l&igrave; x&igrave;&rdquo;, n&agrave;o l&agrave; chuyến du lịch suối nước n&oacute;ng miễn ph&iacute;, n&agrave;o l&agrave; được mời đi tiệc sinh nhật&hellip; Kh&ocirc;ng c&oacute; ng&agrave;y n&agrave;o của cậu nh&oacute;c thiếu vắng niềm vui v&agrave; tiếng cười. Dẫu vậy, Akihiro vẫn lu&ocirc;n nhớ đến người mẹ th&acirc;n y&ecirc;u ở Hiroshima.</p>\r\n\r\n<p>Được b&aacute;c kể chuyện bằng kịch giấy m&aacute;ch nước cho phương ph&aacute;p chế tạo cỗ m&aacute;y thời gian, Akihiro v&agrave; người bạn mới quen Yamada c&ugrave;ng hợp t&aacute;c để c&oacute; thể trở về qu&aacute; khứ: quay lại ng&agrave;y cậu bị mẹ đẩy l&ecirc;n chuyến t&agrave;u đến Saga. Liệu kế hoạch bất khả thi của hai cậu nh&oacute;c c&oacute; th&agrave;nh c&ocirc;ng kh&ocirc;ng? Hay sẽ dẫn đến một sự việc nghi&ecirc;m trọng đến kh&ocirc;ng ngờ?</p>\r\n\r\n<p>Tập thứ 6 của bộ truyện &ldquo;Người b&agrave; t&agrave;i giỏi v&ugrave;ng Saga&rdquo; vẫn xoay quanh cuộc sống của cậu nh&oacute;c Akihiro v&agrave; người b&agrave; &ldquo;dữ thần&rdquo; tại v&ugrave;ng đất Saga tuy ngh&egrave;o kh&oacute; m&agrave; ấm &aacute;p t&igrave;nh người. Mời c&aacute;c bạn c&ugrave;ng d&otilde;i theo những chuyện thường ng&agrave;y h&agrave;i hước nhưng kh&ocirc;ng k&eacute;m phần cảm động của hai b&agrave; ch&aacute;u nh&eacute;!</p>\r\n', '2024-05-01', 0, 0, 'Yoshichi Shimada');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_chi_tiet_hoadon`),
  ADD KEY `chitiethoadon` (`donhang_id`),
  ADD KEY `fk_chitiethoadon_sanpham` (`masp`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`madv`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`sodh`),
  ADD KEY `fk_hoadon_loginuser` (`user_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Ma_KH`),
  ADD UNIQUE KEY `Ma_KH_UNIQUE` (`Ma_KH`);

--
-- Chỉ mục cho bảng `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Ten` (`Ten`),
  ADD KEY `sanpham` (`Manhasx`),
  ADD KEY `giakhuyenmai` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_2` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_3` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_4` (`giakhuyenmai`),
  ADD KEY `giakhuyenmai_5` (`giakhuyenmai`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `Ten_2` (`Ten`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_chi_tiet_hoadon` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `madv` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `sodh` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Ma_KH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon` FOREIGN KEY (`donhang_id`) REFERENCES `hoadon` (`sodh`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chitiethoadon_hoadon` FOREIGN KEY (`donhang_id`) REFERENCES `hoadon` (`sodh`),
  ADD CONSTRAINT `fk_chitiethoadon_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_loginuser` FOREIGN KEY (`user_id`) REFERENCES `loginuser` (`user_id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham` FOREIGN KEY (`Manhasx`) REFERENCES `nhaxuatban` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
