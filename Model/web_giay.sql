-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2023 lúc 07:48 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_giay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 5, 2, '2023-02-15', 'Giày đẹp 10 điểm ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(1, 11, 1, 'Đen', 39, 3000000, 0),
(2, 6, 1, 'Vàng Kim Loại', 43, 1300000, 0),
(3, 2, 1, 'Trắng', 0, 2600000, 0),
(3, 8, 1, 'Trắng', 0, 1275000, 0),
(3, 11, 1, 'Trắng', 39, 3000000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `madg` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydg` date NOT NULL,
  `rate` int(10) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`madg`, `mahh`, `makh`, `ngaydg`, `rate`, `noidung`) VALUES
(2, 7, 10, '2023-03-08', 2, '123123'),
(3, 16, 10, '2023-03-08', 5, 'xấu vl'),
(4, 8, 31, '2023-03-10', 4, '123123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(100) NOT NULL,
  `dongia` double NOT NULL,
  `giamgia` double NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `nhom` int(4) NOT NULL,
  `maloai` int(11) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `nhom`, `maloai`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`, `rate`) VALUES
(1, 'ADDIDAS NEW HAMMER SOLE FOR SPORTS PERSON', 150000, 210000, 'a1.jpg', 5, 1, 332, '0034-03-12', '', 25, 'Xám', 42, 0),
(2, 'GIÀY STAN SMITH', 2600000, 0, 'a2.png', 6, 1, 16, '0000-00-00', '', 20, 'Trắng', 35, 0),
(3, 'GIÀY RACER TR ADIDAS X LEGO', 1445000, 1700000, 'a3.jpg', 7, 1, 6, '0000-00-00', '', 10, 'Cam', 37, 0),
(4, 'GIÀY SPORT PRO ADIDAS X LEGO', 500000, 1000000, 'a1.jpg', 8, 1, 27, '0000-00-00', '', 0, 'Xanh', 39, 0),
(5, 'GIÀY CONTINENTAL 80', 1900000, 0, 'a4.jpg', 9, 1, 129, '0000-00-00', '', 60, 'Trắng', 40, 0),
(6, 'GIÀY BÓNG ĐÁ PREDATOR MUTATOR 20.3 TURF', 1300000, 0, 'a5.jpg', 10, 2, 202, '0000-00-00', '', 0, 'Vàng Kim Loại', 43, 0),
(7, 'GIÀY EQ21 RUN 2.0 BOUNCE SPORT RUNNING CÓ DÂY GIÀY CO GIÃN VÀ QUAI DÁN', 1400000, 0, 'a6.jpg', 11, 2, 112, '0000-00-00', '', 0, 'Đen', 41, 2),
(8, 'GIÀY FORUM', 1275000, 0, 'a7.jpg', 12, 1, 60, '0000-00-00', '', 0, 'Trắng', 36, 4),
(9, 'GIÀY RACER TR ADIDAS X LEGO®', 1445000, 1700000, 'a8.jpg', 13, 2, 0, '0000-00-00', '', 0, 'Hồng', 36, 0),
(10, 'GIÀY SUPERSTAR', 2600000, 0, 'a9.jpg', 14, 1, 10, '0000-00-00', '', 0, 'Trắng', 34, 0),
(11, 'GIÀY CHẠY BỘ ADIDAS ADIZERO SL', 3000000, 0, 'a10.jpg', 15, 2, 11, '0000-00-00', '', 0, 'Trắng', 39, 0),
(12, 'GIÀY NMD_S1', 5000000, 0, 'a11.jpg', 16, 2, 14, '0000-00-00', '', 0, 'Xám', 41, 0),
(13, 'GIÀY CHẠY BỘ ADIDAS ADIZERO SL', 3000000, 0, 'a12.jpg', 15, 2, 0, '0000-00-00', '', 0, 'Đen', 40, 0),
(14, 'OZWEEGO CELOX SHOES', 1650000, 3300000, 'a13.jpg', 4, 2, 0, '0000-00-00', '', 0, 'Trắng', 40, 0),
(15, 'NOVA COURT LIFESTYLE VEGAN SHOES', 1700000, 2000000, 'a14.webp', 3, 1, 0, '0000-00-00', '', 0, 'Trắng', 38, 0),
(16, 'ZX 2K BOOST 2.0 SHOES', 1850000, 3700000, 'a15.webp', 19, 2, 5, '0000-00-00', '', 0, 'Xám', 40, 5),
(17, 'BARRICADE TENNIS SHOES', 2800000, 4000000, 'a16.webp', 4, 2, 1, '0000-00-00', '', 0, 'Trắng Đen', 41, 0),
(18, 'SOLARGLIDE 5 SHOES', 1900000, 3800000, 'a17.jpg', 2, 2, 0, '0000-00-00', '', 0, 'Đen', 43, 0),
(19, 'OZWEEGO CELOX SHOES', 1650000, 3300000, 'a18.webp', 18, 1, 0, '0000-00-00', '', 0, 'Trắng', 42, 0),
(20, 'NMD_R1 SHOES', 2520000, 3600000, 'a19.webp', 1, 2, 0, '0000-00-00', '', 0, 'Xám', 40, 0),
(21, 'NMD_R1 SHOES', 2520000, 3600000, 'a21.webp', 1, 2, 0, '0000-00-00', '', 0, 'Đen', 41, 0),
(22, 'NMD_R1 SHOES', 2520000, 3600000, 'a22.webp', 1, 2, 0, '0000-00-00', '', 0, 'Trắng', 39, 0),
(23, 'SOLARGLIDE 5 SHOES', 1900000, 3800000, 'a23.jpg', 2, 2, 0, '0000-00-00', '', 0, 'Cam', 42, 0),
(24, 'NOVA COURT LIFESTYLE VEGAN SHOES', 1700000, 2000000, 'a24.webp', 3, 1, 0, '0000-00-00', '', 0, 'Đen', 41, 0),
(25, 'BARRICADE TENNIS SHOES', 4000000, 0, 'a25.webp', 4, 2, 0, '0000-00-00', '', 0, 'Đen', 43, 0),
(26, 'BARRICADE TENNIS SHOES', 2800000, 4000000, 'a26.webp', 4, 2, 0, '0000-00-00', '', 0, 'Xanh', 40, 0),
(27, 'BARRICADE TENNIS SHOES', 2800000, 4000000, 'a27.webp', 4, 2, 0, '0000-00-00', '', 0, 'Vàng', 38, 0),
(28, 'ADDIDAS NEW HAMMER SOLE FOR SPORTS PERSON', 150000, 210000, 'p7.jpg', 5, 1, 0, '0000-00-00', '', 0, 'Xanh Nhạt', 39, 0),
(29, 'GIÀY STAN SMITH', 2600000, 0, '28.webp', 6, 1, 1, '0000-00-00', '', 0, 'Đen', 40, 0),
(30, 'GIÀY NMD_S1', 5000000, 0, 'a29.webp', 16, 1, 2, '0000-00-00', '', 0, 'Trắng', 40, 0),
(31, 'GIÀY CONTINENTAL 80', 1900000, 0, 'a30.jpg', 9, 1, 0, '0000-00-00', '', 0, 'Đen', 39, 0),
(32, 'GIÀY BÓNG ĐÁ PREDATOR MUTATOR 20.3 TURF', 1300000, 0, 'a31.webp', 10, 2, 0, '0000-00-00', '', 0, 'Trắng Xanh', 42, 0),
(33, 'GIÀY RACER TR ADIDAS X LEGO', 1445000, 1700000, 'a32.webp', 7, 2, 0, '0000-00-00', '', 0, 'Trắng Xanh', 39, 0),
(34, 'GIÀY SPORT PRO ADIDAS X LEGO', 500000, 1000000, 'a33.webp', 8, 2, 0, '0000-00-00', '', 0, 'Đen', 41, 0),
(35, 'GIÀY EQ21 RUN 2.0 BOUNCE SPORT RUNNING CÓ DÂY GIÀY CO GIÃN VÀ QUAI DÁN', 1400000, 0, 'a34.webp', 11, 1, 0, '0000-00-00', '', 0, 'Trắng Hồng', 40, 0),
(36, 'GIÀY SUPERSTAR', 2600000, 0, 'a35.webp', 14, 1, 0, '0000-00-00', '', 0, 'Đen', 37, 0),
(37, 'GIÀY FORUM', 1275000, 0, 'a36.webp', 12, 1, 1, '0000-00-00', '', 0, 'Trắng Xanh', 37, 0),
(38, 'GIÀY RACER TR ADIDAS X LEGO®', 1445000, 1700000, 'a37.webp', 13, 1, 0, '0000-00-00', '', 0, 'Trắng Cam Đỏ', 40, 0),
(39, 'ZX 2K BOOST 2.0 SHOES', 1850000, 3700000, 'a38.webp', 19, 2, 0, '0000-00-00', '', 0, 'Xanh ', 41, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 10, '2023-03-12', 3000000),
(2, 10, '2023-03-13', 1300000),
(3, 10, '2023-03-13', 6875000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenhh` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenhh`, `idmenu`) VALUES
(1, 'Fashion Shoes', 0),
(2, 'Sport Shoes', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spyeuthich`
--

CREATE TABLE `spyeuthich` (
  `makh` int(11) NOT NULL,
  `mahh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `spyeuthich`
--

INSERT INTO `spyeuthich` (`makh`, `mahh`) VALUES
(10, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `makh` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` int(12) NOT NULL,
  `img` varchar(255) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`makh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `img`, `vaitro`) VALUES
(1, 'Vũ', '123', 'vu@gmail.com', 'saigon', 334532345, '28.webp', 1),
(2, 'huy2610', '202cb962ac59075b964b07152d234b70', 'huy1@gmail.com', '12thd', 12357422, '', 0),
(3, 'huy123', '202cb962ac59075b964b07152d234b70', 'huy1@gmail.com', '123', 12354, '', 0),
(10, 'Huy Nguyễn', '462fda61bfecfa9e5030c8f8f4b5c0cc', 'huynguyen26102@gmail.com', '123', 123123000, 'images (1).jpg', 1),
(31, 'Thọ', '8b697bfdbe3f1fd1ad8f0cc338a4271d', 'tho@gmail.com', '123', 905033213, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `makh` (`makh`),
  ADD KEY `mahh` (`mahh`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`mahh`),
  ADD KEY `mahh` (`mahh`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`madg`),
  ADD KEY `dg_fk_mahh` (`mahh`),
  ADD KEY `dg_fk_makh` (`makh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`),
  ADD KEY `maloai` (`maloai`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `spyeuthich`
--
ALTER TABLE `spyeuthich`
  ADD KEY `makh` (`makh`),
  ADD KEY `mahh` (`mahh`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`makh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `madg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `taikhoan` (`makh`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`masohd`) REFERENCES `hoadon` (`masohd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `dg_fk_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE,
  ADD CONSTRAINT `dg_fk_makh` FOREIGN KEY (`makh`) REFERENCES `taikhoan` (`makh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `taikhoan` (`makh`);

--
-- Các ràng buộc cho bảng `spyeuthich`
--
ALTER TABLE `spyeuthich`
  ADD CONSTRAINT `spyeuthich_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `taikhoan` (`makh`) ON DELETE CASCADE,
  ADD CONSTRAINT `spyeuthich_ibfk_2` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
