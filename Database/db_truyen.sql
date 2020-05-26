-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2020 lúc 04:47 PM
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
(1, 1, 'Goku đến trái đất', 'Hắn đã đến, chạy nhanh. Cận thận mất dép', 4, '2020-05-26', 0, 0, 1),
(2, 2, 'Goku đến trái đất (2)', 'Hắn đã đến, chạy nhanh. Cận thận mất dép', 4, '2020-05-26', 0, 0, 1);

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
  `Slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manga`
--

INSERT INTO `manga` (`IdManga`, `TenManga`, `TenKhac`, `Tacgia`, `NguoiDich`, `TinhTrang`, `GioiThieu`, `ChuongCuoi`, `NguoiDang`, `Anh`, `Slug`) VALUES
(1, 'Bảy viên ngọc rồng', 'Dragonball', 'Rổng thần', 'Rồng giả mạo', 0, 'Songoku biến hình thành siêu saiya cấp 3', 1, 4, '', 'bay-vien-ngoc-rong'),
(2, 'Bảy viên ngọc rồng 123456', 'Dragonball123', 'Rổng thần123', 'Rồng giả mạo134', 0, 'Songoku biến hình thành siêu saiya cấp 3', 1, 4, '', 'bay-vien-ngoc-rong-123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `IdTheloai` int(11) NOT NULL,
  `TenTheloai` varchar(100) NOT NULL,
  `Slug` varchar(100) NOT NULL,
  `Content` varchar(150) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`IdTheloai`, `TenTheloai`, `Slug`, `Content`, `NgayTao`) VALUES
(1, 'Hành Động', 'hanh-dong', 'Thể loại hành động', '2020-05-26 21:13:17'),
(2, 'Viễn Tượng', 'vien-tuong', 'Thể loại hành động', '2020-05-26 21:13:17'),
(3, 'Trinh thám', 'trinh-tham', 'Thể loại hành động', '2020-05-26 21:13:17'),
(4, 'Trùng Sinh', 'trung-sinh', 'Thể loại hành động', '2020-05-26 21:13:17');

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
(2, '2020-05-26', 1, 2);

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
  `DangNhapLanCuoi` date NOT NULL,
  `UserGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Email`, `Password`, `NgayDangKy`, `DangNhapLanCuoi`, `UserGroup`) VALUES
(1, 'Admin', 'Admin@example.com', '1', '2020-05-26', '0000-00-00', 1),
(4, 'User', 'User@example.com', '1', '2020-05-26', '2020-05-26', 2);

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
  ADD KEY `theloai_truyen_pk_truyen` (`Manga`),
  ADD KEY `theloai_truyen_pk_theloai` (`Theloai`);

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
  MODIFY `IdChapter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `IdManga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `IdTheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `theloaitruyen`
--
ALTER TABLE `theloaitruyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `IdThongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `theloai_truyen_pk_truyen` FOREIGN KEY (`Manga`) REFERENCES `chapter` (`Manga`);

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
