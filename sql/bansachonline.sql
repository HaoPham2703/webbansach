-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2024 lúc 11:34 AM
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
  `sodh` bigint(20) NOT NULL,
  `masp` bigint(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` decimal(9,2) NOT NULL,
  `madv` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_chi_tiet_hoadon`, `sodh`, `masp`, `soluong`, `dongia`, `thanhtien`, `madv`) VALUES
(144, 127, 214, 1, 214, 214.00, '15'),
(145, 129, 214, 1, 214, 214.00, '16'),
(146, 130, 212, 1, 75, 75.00, ''),
(147, 130, 213, 0, 94, 0.00, ''),
(148, 130, 214, 0, 214, 0.00, ''),
(149, 130, 222, 0, 90, 0.00, ''),
(150, 131, 212, 1, 75, 75.00, ''),
(151, 131, 213, 0, 94, 0.00, '');

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
  `hinhthucthanhtoan` varchar(100) NOT NULL,
  `thanhtien` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`sodh`, `emailkh`, `ngaygiao`, `tenkh`, `diachi`, `dienthoai`, `hinhthucthanhtoan`, `thanhtien`) VALUES
(127, 'thanh@gmail.com', '2021-06-26', 'Thanh Truong', 'Hà Nội', '1234567890', 'ATM', 224.00),
(128, 'nhuvuong2828@gmail.com', '2024-04-01', 'vuong nguyen', '121i đường số 11', '0969363837', 'ATM', 234.00),
(129, 'nhuvuong2828@gmail.com', '2024-04-01', 'vuong nguyen', '121i đường số 11', '0969363837', 'ATM', 234.00),
(130, 'thanh@gmail.com', '2024-04-25', 'Thanh Truong', '11 Nguyễn Chí Thanh', '1234567890', 'ATM', 0.00),
(131, 'thanh@gmail.com', '2024-04-25', 'Thanh Truong', '11 Nguyễn Chí Thanh', '1234567890', 'ATM', 0.00);

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
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` int(200) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loginuser`
--

INSERT INTO `loginuser` (`user_id`, `email`, `matkhau`, `HoTen`, `DienThoai`, `dia_chi`) VALUES
(1, 'nhuvuong2828@gmail.com', 123456, 'vuong nguyen', '0969363837', NULL),
(2, 'testing@gmail.com', 0, 'Phạm Hào0000', '11365', ''),
(3, 'thanh@gmail.com', 123, 'Thanh Truong', '1234567890', NULL),
(4, 'tungvu@gmail.com', 123, 'Vũ Đình Tùng', '0123456789', NULL);

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
(18, 'NXB Hội Nhà Văn');

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
(222, 'Cây cam ngọt của tôi', 90, 'caycamngotcuatoi.jpg', 15, '<p>m&ocirc; tả ở đ&acirc;y</p>\r\n', '2024-04-17', 0, 0, 'José Mauro de Vasconcelos');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_chi_tiet_hoadon`),
  ADD KEY `chitiethoadon` (`sodh`),
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
  ADD PRIMARY KEY (`sodh`);

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
  MODIFY `id_chi_tiet_hoadon` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `madv` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `sodh` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Ma_KH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon` FOREIGN KEY (`sodh`) REFERENCES `hoadon` (`sodh`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chitiethoadon_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham` FOREIGN KEY (`Manhasx`) REFERENCES `nhaxuatban` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
