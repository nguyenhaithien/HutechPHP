-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2020 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_truyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `IdChapter` int(11) NOT NULL,
  `SttChap` tinyint(4) NOT NULL,
  `TenChap` varchar(150) NOT NULL,
  `Noidung` text DEFAULT NULL,
  `NguoiDangChap` int(11) NOT NULL,
  `NgayTao` date DEFAULT current_timestamp(),
  `TinhTrang` tinyint(1) NOT NULL DEFAULT 0,
  `LuotChiase` tinyint(10) NOT NULL,
  `Manga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`IdChapter`, `SttChap`, `TenChap`, `Noidung`, `NguoiDangChap`, `NgayTao`, `TinhTrang`, `LuotChiase`, `Manga`) VALUES
(1, 1, 'Goku đến trái đất', '<img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-1.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-2.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-3.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-4.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-5.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\">', 4, '2020-05-26', 0, 0, 1),
(2, 2, 'Goku đến trái đất (2)', '<img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-1.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-2.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-3.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-4.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\"><img src=\"https://img.sachvui.com/images/2018/5/chap-1-000-5.jpg\" class=\"truyen-tranh\" alt=\"truyen tranh sachvui.com\">', 4, '2020-05-26', 0, 0, 1),
(3, 1, 'Bạn dữ quá à!', 'Bạn quá dữ', 5, '0000-00-00', 0, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `IdComment` int(11) NOT NULL,
  `NoiDungComment` varchar(250) NOT NULL,
  `ThoigianDang` date NOT NULL DEFAULT current_timestamp(),
  `CommentChinhSua` varchar(250) DEFAULT NULL,
  `CommentXoa` tinyint(1) NOT NULL DEFAULT 0,
  `Chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`IdComment`, `NoiDungComment`, `ThoigianDang`, `CommentChinhSua`, `CommentXoa`, `Chapter`) VALUES
(1, 'Xin lỗi nhé, nó lại dở vãi', '2020-05-26', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countview`
--

CREATE TABLE `countview` (
  `IDViews` int(11) NOT NULL,
  `Day` tinyint(2) NOT NULL,
  `Month` tinyint(2) NOT NULL,
  `Year` year(4) NOT NULL,
  `Chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countview`
--

INSERT INTO `countview` (`IDViews`, `Day`, `Month`, `Year`, `Chapter`) VALUES
(1, 26, 5, 2020, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manga`
--

CREATE TABLE `manga` (
  `IdManga` int(11) NOT NULL,
  `TenManga` varchar(150) NOT NULL,
  `TenKhac` varchar(150) NOT NULL,
  `Tacgia` varchar(100) NOT NULL,
  `NguoiDich` varchar(100) NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL,
  `GioiThieu` text NOT NULL,
  `ChuongCuoi` int(11) NOT NULL,
  `NguoiDang` int(11) NOT NULL,
  `Anh` varchar(250) NOT NULL,
  `Slug` varchar(150) NOT NULL,
  `KieuTruyen` tinyint(1) NOT NULL DEFAULT 1,
  `NgayDang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manga`
--

INSERT INTO `manga` (`IdManga`, `TenManga`, `TenKhac`, `Tacgia`, `NguoiDich`, `TinhTrang`, `GioiThieu`, `ChuongCuoi`, `NguoiDang`, `Anh`, `Slug`, `KieuTruyen`, `NgayDang`) VALUES
(1, 'Bảy viên ngọc rồng', 'Dragonball', 'Rổng thần', 'Rồng giả mạo', 0, 'Songoku biến hình thành siêu saiya cấp 3\r\nGiải Đấu Sức Mạnh đã kết thúc với chiến thắng đến từ Vũ Trụ 7, MVP Số 17 khi đó đã ước cho các Vũ Trụ bị xóa sổ được hồi sinh trở lại. Nhưng với điều ước vĩ đại đó thì Số 17 đã vô tình hồi sinh 6 Vũ Trụ mà trước đó đã bị Zeno hủy diệt, kèm theo đó là một Vũ Trụ bí ẩn đã được mở phong ấn và dần gây hại cho thế giới này', 1, 4, 'Images/Manga/ImageManga/yeu-than-ky_1443013926.jpg', 'bay-vien-ngoc-rong', 1, '2020-05-29 10:45:47'),
(2, 'Bảy viên ngọc rồng 123456', 'Dragonball123', 'Rổng thần123', 'Rồng giả mạo134', 0, 'Songoku biến hình thành siêu saiya cấp 3', 1, 4, 'Images/Manga/ImageManga/yeu-than-ky_1443013926.jpg', 'bay-vien-ngoc-rong-123456', 2, '2020-06-01 10:46:34'),
(35, 'Yêu em nhiều lắm mà!!!', 'Bảo thể này', 'Yêu thì câm', 'Không yêu thì biến', 0, '<p>Id_Manga =1 , Theloai_id [1,2,3,4] l&agrave; đ&uacute;ng</p>', 0, 4, 'Images/Manga/ImageManga/gintama.jpg', 'yeu-em-nhieu-lam-ma', 2, NULL),
(36, 'Tấu hài', 'Quyền lực', 'Number1', 'Yeah', 0, '<p>Gh&ecirc; gớm</p>', 0, 4, 'Images/Manga/ImageManga/gintama.jpg', 'tau-hai', 1, NULL),
(37, 'jkkk', 'kkkkkkk', 'kkkkkkkkk', 'aaaaaaa', 0, '<p>ttttttttttt</p>', 0, 4, 'Images/Manga/ImageManga/hunter-x-hunter.jpg', 'jkkk', 1, NULL),
(38, 'Id 38 Thể loại 4', 'Vậy là 38 & 4', '38 - 4', '3 38 4', 0, '<p>3 38 4-&gt; true</p>', 0, 4, 'Images/Manga/ImageManga/i-am-the-sorcerer-king.jpg', 'id-38-the-loai-4', 1, NULL),
(39, '39 1 2 3', '39 -1 39-2 39-3', '3 39-1 4 39-2 5 39-3', 'Kio', 0, '<p>T&agrave;u h&agrave;i</p>', 0, 4, 'Images/Manga/ImageManga/dao-hai-tac.jpg', '39-1-2-3', 1, '2020-06-01 09:19:02'),
(40, '40 1 2 3', '40-1 40-2 40-3', '3 40-1 4 40-2 5 40-3', '3 40-1 4 40-2 5 40-3', 0, '<p>!!!!!!!!!!!!</p>', 0, 4, 'Images/Manga/ImageManga/dao-hai-tac.jpg', '40-1-2-3', 1, NULL),
(41, '40 1 2 3', '40-1 40-2 40-3', '3 40-1 4 40-2 5 40-3', '3 40-1 4 40-2 5 40-3', 0, '<p>!!!!!!!!!!!!</p>', 0, 4, 'Images/Manga/ImageManga/dao-hai-tac.jpg', '40-1-2-3', 1, '2020-06-01 08:49:28'),
(42, 'Buồn', 'Buồn', 'Buồn', '42 - 1', 0, '<p>Buồn</p>', 0, 4, 'Images/Manga/ImageManga/fukakai-na-boku-no-subete-o_1557759637.jpg', 'buon', 1, NULL),
(43, '43 43 43', '43 /1 43/2', '43 /1 43/2', '43 /1 43/2', 0, '<p>43 /1 43/2</p>', 0, 4, 'Images/Manga/ImageManga/fukakai-na-boku-no-subete-o_1557759637.jpg', '43-43-43', 1, NULL),
(44, 'Xin chào 44 / 2 44 /3', 'xin-chao-44-2-44-3', 'xin-chao-44-2-44-3', 'xin-chao-44-2-44-3', 0, '<p>xin-chao-44-2-44-3</p>', 0, 4, 'Images/Manga/ImageManga/dao-hai-tac.jpg', 'xin-chao-44-2-44-3', 1, NULL),
(45, 'Tà thần cứu đế', 'Thần tà ma dại', 'Ahihi', 'kimochi', 0, '&lt;p&gt;CC KIOL AAAAAAAA !!&lt;/p&gt;', 0, 5, 'Images/Manga/ImageManga/story-list-icon14.png', 'ta-than-cuu-de', 1, NULL),
(46, 'Obnp', 'aaaa', '24', '111112222222', 0, '&lt;p&gt;aaaaaaaaa111111111&lt;/p&gt;', 0, 5, 'Images/Manga/ImageManga/1.jpg', 'obnp', 2, NULL),
(47, 'Anh hung', 'Anh hung', 'Anh hung', '112', 0, '<p>12324</p>', 0, 7, 'Images/Manga/ImageManga/anh-hung-ta-khong-lam-lau-roi.jpg', 'anh-hung', 2, NULL),
(48, 'Bách luyện thành thần', 'Thần ơ ơ theem 2 cai ', 'ô ơ', 'ahihi', 0, '&lt;p&gt;Thằng ch&amp;oacute; đi&amp;ecirc;n. Địt mẹ m.&amp;nbsp;&lt;/p&gt;', 0, 5, 'Images/Manga/ImageManga/bach-luyen-thanh-than.jpg', 'bach-luyen-thanh-than', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `IdTheloai` int(11) NOT NULL,
  `TenTheloai` varchar(100) NOT NULL,
  `Slug` varchar(100) NOT NULL,
  `Content` varchar(250) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`IdTheloai`, `TenTheloai`, `Slug`, `Content`, `NgayTao`) VALUES
(1, 'Hành Động', 'hanh-dong', 'Thể loại hành động', '2020-05-26 21:13:17'),
(2, 'Viễn Tượng', 'vien-tuong', 'Thể loại hành động', '2020-05-26 21:13:17'),
(3, 'Trinh thám', 'trinh-tham', 'Thể loại hành động', '2020-05-26 21:13:17'),
(4, 'Trùng Sinh', 'trung-sinh', 'Thể loại hành động', '2020-05-26 21:13:17'),
(5, 'Haren', 'haren', 'Truyện có gái', '2020-06-01 15:28:46'),
(6, 'Thể thao', 'the-thao', 'Đúng như tên gọi, những môn thể thao như bóng đá, bóng chày, bóng chuyền, đua xe, cầu lông,... là một phần của thể loại này.', '2020-06-08 15:28:46'),
(7, 'Vampire', 'vampire', ' Thể loại về quỷ,đặc biệt là quỷ hút máu', '2020-06-08 10:46:39'),
(8, 'Adult', 'adult', 'Thể loại có đề cập đến vấn đề nhạy cảm, chỉ dành cho tuổi 17+.', '2020-06-08 10:47:35'),
(9, 'Adventure', 'adventure', 'Thể loại phiêu lưu, mạo hiểm, thường là hành trình của các nhân vật.', '2020-06-08 10:48:29'),
(10, 'Angst', 'angst', 'Truyện miêu tả sự đau khổ của nhân vật', '2020-06-08 10:49:11'),
(11, 'Bishojo', 'bishojo', 'Còn gọi là \"Moe\",là thể loại truyện có các nhân vật nữ xinh đẹp', '2020-06-08 10:49:31'),
(12, 'Bishonen', 'bishonen', ' Tương tự Bishojo nhưng là thể loại có các nhân vật chính nam điển trai', '2020-06-08 10:50:02'),
(13, 'Chanbara', 'chanbara', 'Thể loại truyện kiếm hiệp,nói về những người sử dụng kiếm - Lãng khách...', '2020-06-08 10:50:29'),
(14, 'Comedy', 'comedy', 'Còn gọi là \"Humor\". Thể loại có các tình tiết gây cười, các xung đột nhẹ nhàng nhưng tạo được tiếng cười nơi độc giả, vài bộ còn mang chất \"bựa\" rất c', '2020-06-08 10:50:51'),
(15, 'Demetia', 'demetia', ' Thể loại truyện \"hâm hâm điên điên\",chả giống ai', '2020-06-08 10:52:10'),
(16, 'Parody', 'parody', 'Thể loại hài hước, nhái hay chọc những anime/manga', '2020-06-08 10:53:14'),
(17, 'Doujinshi', 'doujinshi', 'Hay \"Fanfiction\". Thể loại truỵện phóng tác do fan hay có thể cả những Mangaka khác với tác giả truyện gốc. Tác giả vẽ Doujinshi thường dựa trên những nhân vật gốc để viết ra những câu chuyện theo sở thích của mình.', '2020-06-08 10:53:40'),
(18, 'Drama', 'drama', 'Có tính kịch. Thể loại mang đến cho người xem những cảm xúc khác nhau: buồn bã, căng thẳng thậm chí là bi phẫn.', '2020-06-08 10:54:05'),
(19, 'Ecchi', 'ecchi', 'Thể loại ở ranh giới giữa Hentai và Non-Hentai. Thường có những tình huống nhạy cảm nhằm lôi cuốn người xem.', '2020-06-08 10:54:59'),
(20, 'Fantasy', 'fantasy', 'Thể loại xuất phát từ trí tưởng tượng phong phú, từ pháp thuật đến thế giới trong mơ thậm chí là những câu chuyện thần tiên.', '2020-06-08 10:55:22'),
(21, 'Gekiga', 'gekiga', 'Còn gọi là Kịch họa. Truyện có nội dung nghiêm túc. Không phải tất cả manga đều có mục đích giải trí đơn thuần. Nhiều manga được người đọc đọc để hiểu biết thêm về lịch sử, chính trị, hoặc những kiến thức khác, nó được sáng tác bởi một số họa sĩ truy', '2020-06-08 10:55:43'),
(22, 'Gender Bender', 'gender-bender', 'Là một thể loại trong đó giới tính của nhân vật bị lẫn lộn: nam hoá thành nữ, nữ hóa thành nam...', '2020-06-08 10:56:27'),
(23, 'Harry Stu', 'harry-stu', 'Là thể loại manga có nhân vật nam được miêu tả như thiên thần , luôn làm được mọi việc , có thể đó là ước muốn của tác giả và tác giả hoà mình hoặc cải trang thành nhân vật . Tuy nhiên nên tránh có Harry Stu trong tác phẩm ', '2020-06-08 10:56:59'),
(24, 'Historical', 'historical', 'Thể loại có liên quan đến thời xa xưa.', '2020-06-08 10:57:30'),
(25, 'Mafia', 'mafia', 'Truyện nói về xã hội đen', '2020-06-08 10:58:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaitruyen`
--

CREATE TABLE `theloaitruyen` (
  `Id` int(11) NOT NULL,
  `NgayTao` date NOT NULL DEFAULT current_timestamp(),
  `Manga` int(11) NOT NULL,
  `Theloai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloaitruyen`
--

INSERT INTO `theloaitruyen` (`Id`, `NgayTao`, `Manga`, `Theloai`) VALUES
(1, '2020-05-26', 1, 1),
(2, '2020-05-26', 1, 2),
(18, '0000-00-00', 1, 3),
(23, '0000-00-00', 43, 1),
(24, '0000-00-00', 44, 2),
(25, '0000-00-00', 44, 3),
(26, '0000-00-00', 45, 1),
(27, '0000-00-00', 45, 2),
(28, '0000-00-00', 45, 3),
(29, '0000-00-00', 45, 4),
(30, '0000-00-00', 46, 1),
(31, '0000-00-00', 46, 2),
(32, '0000-00-00', 46, 3),
(33, '0000-00-00', 46, 4),
(34, '0000-00-00', 47, 1),
(35, '0000-00-00', 47, 4),
(47, '0000-00-00', 48, 16),
(48, '0000-00-00', 48, 18),
(49, '0000-00-00', 48, 5),
(51, '0000-00-00', 48, 7),
(52, '0000-00-00', 48, 8),
(54, '0000-00-00', 48, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `IdThongbao` int(11) NOT NULL,
  `TenThongbao` varchar(150) NOT NULL,
  `Noidungthongbao` varchar(250) DEFAULT NULL,
  `Thoigianthongbao` date NOT NULL,
  `Tinhtrang` tinyint(1) NOT NULL DEFAULT 0,
  `Url` varchar(150) NOT NULL,
  `Chapter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`IdThongbao`, `TenThongbao`, `Noidungthongbao`, `Thoigianthongbao`, `Tinhtrang`, `Url`, `Chapter`) VALUES
(1, 'Có chap mới rồng nè', 'Rồng ơi quẩy lên', '2020-05-27', 0, '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDangKy` date NOT NULL DEFAULT current_timestamp(),
  `DangNhapLanCuoi` datetime NOT NULL,
  `UserGroup` int(11) NOT NULL,
  `HoTen` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Sdt` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Email`, `Password`, `NgayDangKy`, `DangNhapLanCuoi`, `UserGroup`, `HoTen`, `NgaySinh`, `Sdt`, `DiaChi`, `Anh`, `GioiTinh`) VALUES
(1, 'Admin', 'Admin@example.com', '1', '2020-05-26', '0000-00-00 00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'User', 'User@example.com', '1', '2020-05-26', '2020-05-26 00:00:00', 2, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'dev', 'duydinh123@gmail.com', '8d5e957f297893487bd98fa830fa6413', '2031-05-20', '2020-06-01 15:36:30', 2, 'ThreadTest', '1998-12-11', '939536237', 'Hà nội', 'Images/User/35859267_223828678448297_28188737947041792_n.jpg', 0),
(6, 'dev2', 'dev@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-05-31', '2020-06-01 14:54:20', 2, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'dev3', 'namkta@gmail.com', '8d5e957f297893487bd98fa830fa6413', '2020-06-01', '2020-06-01 15:41:38', 2, 'Trần Tiến Nam', '1998-12-11', '0652222', 'Bình thạnh', 'Images/User/35859267_223828678448297_28188737947041792_n.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usergroup`
--

CREATE TABLE `usergroup` (
  `Id` int(11) NOT NULL,
  `TenGroup` varchar(250) NOT NULL,
  `NgayTaoGroup` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `usergroup`
--

INSERT INTO `usergroup` (`Id`, `TenGroup`, `NgayTaoGroup`) VALUES
(1, 'Admin', '2020-05-26'),
(2, 'User', '2020-05-26'),
(3, 'Bí Ẩn', '2020-05-26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`IdChapter`),
  ADD KEY `NguoiDangKy` (`NguoiDangChap`),
  ADD KEY `Manga_Chap` (`Manga`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdComment`),
  ADD KEY `Binhluan` (`Chapter`);

--
-- Chỉ mục cho bảng `countview`
--
ALTER TABLE `countview`
  ADD PRIMARY KEY (`IDViews`),
  ADD KEY `viewcuachap` (`Chapter`);

--
-- Chỉ mục cho bảng `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`IdManga`),
  ADD KEY `NguoiDang` (`NguoiDang`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`IdTheloai`);

--
-- Chỉ mục cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `theloai_truyen_pk_theloai` (`Theloai`),
  ADD KEY `theloai_truyen_pk_truyen` (`Manga`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`IdThongbao`),
  ADD KEY `Thongbaorachap` (`Chapter`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `UserGroup` (`UserGroup`);

--
-- Chỉ mục cho bảng `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `IdChapter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `countview`
--
ALTER TABLE `countview`
  MODIFY `IDViews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `manga`
--
ALTER TABLE `manga`
  MODIFY `IdManga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `IdTheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `IdThongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `Manga_Chap` FOREIGN KEY (`Manga`) REFERENCES `manga` (`IdManga`),
  ADD CONSTRAINT `NguoiDangKy` FOREIGN KEY (`NguoiDangChap`) REFERENCES `user` (`IdUser`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Binhluan` FOREIGN KEY (`Chapter`) REFERENCES `chapter` (`IdChapter`);

--
-- Các ràng buộc cho bảng `countview`
--
ALTER TABLE `countview`
  ADD CONSTRAINT `viewcuachap` FOREIGN KEY (`Chapter`) REFERENCES `chapter` (`IdChapter`);

--
-- Các ràng buộc cho bảng `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `NguoiDang` FOREIGN KEY (`NguoiDang`) REFERENCES `user` (`IdUser`);

--
-- Các ràng buộc cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  ADD CONSTRAINT `theloai_truyen_pk_theloai` FOREIGN KEY (`Theloai`) REFERENCES `theloai` (`IdTheloai`),
  ADD CONSTRAINT `theloai_truyen_pk_truyen` FOREIGN KEY (`Manga`) REFERENCES `manga` (`IdManga`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `Thongbaorachap` FOREIGN KEY (`Chapter`) REFERENCES `chapter` (`IdChapter`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `UserGroup` FOREIGN KEY (`UserGroup`) REFERENCES `usergroup` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
