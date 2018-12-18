-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2018 lúc 09:48 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `searchjobit`
--
DROP DATABASE IF EXISTS `searchjobit`;
CREATE DATABASE IF NOT EXISTS `searchjobit` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `searchjobit`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE `cv` (
  `id` int(10) NOT NULL,
  `idPer` int(10) DEFAULT NULL,
  `Exp` text COLLATE utf8_unicode_ci,
  `skills` text COLLATE utf8_unicode_ci,
  `achievement` text COLLATE utf8_unicode_ci,
  `otherInfor` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE `employer` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `perContact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `logo` text COLLATE utf8_unicode_ci,
  `buildDate` date NOT NULL,
  `nameCompany` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employer`
--

INSERT INTO `employer` (`id`, `username`, `password`, `email`, `perContact`, `country`, `address`, `phoneNumber`, `description`, `logo`, `buildDate`, `nameCompany`, `level`) VALUES
(1, 'emp_1', '12345', 'emp1@gmail.com', 'Ngyen Van A', 'Việt Nam', 'Hà Nội', '0123456789', NULL, NULL, '2011-11-11', 'Công ty A', 1),
(2, 'emp_2', '12345', 'emp2@gmail.com', 'Ngyên Văn B', 'Việt Nam', 'Hà Nội', '0123456789', NULL, NULL, '2011-11-11', 'Công ty B', 1),
(3, 'emp_3', '12345', 'emp3@gmail.com', 'Trần Thị C', 'Việt Nam', 'Hà Nội', '0123456789', NULL, NULL, '2011-11-11', 'Công ty C', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inforper`
--

DROP TABLE IF EXISTS `inforper`;
CREATE TABLE `inforper` (
  `id` int(10) NOT NULL,
  `idUser` int(10) DEFAULT NULL,
  `fullname` text COLLATE utf8_unicode_ci,
  `brithday` date DEFAULT NULL,
  `gender` text COLLATE utf8_unicode_ci,
  `phonenumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobposting`
--

DROP TABLE IF EXISTS `jobposting`;
CREATE TABLE `jobposting` (
  `id` int(10) NOT NULL,
  `timePost` datetime DEFAULT NULL,
  `idEmployer` int(10) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workPlace` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'linh vuc chuyen mon',
  `salary` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workingForm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hinh thuc lam viec',
  `deadline` date DEFAULT NULL COMMENT 'ngay het han',
  `desJob` text COLLATE utf8_unicode_ci COMMENT 'mo ta cv',
  `reqJob` text COLLATE utf8_unicode_ci COMMENT 'yc cv',
  `benefit` text COLLATE utf8_unicode_ci COMMENT 'loi ich'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobposting`
--

INSERT INTO `jobposting` (`id`, `timePost`, `idEmployer`, `title`, `workPlace`, `fields`, `salary`, `workingForm`, `deadline`, `desJob`, `reqJob`, `benefit`) VALUES
(1, '2018-12-10 18:28:11', 1, 'Lập trình viên Java', 'hà nội', 'java', '$800-$1000', 'full time', '2018-12-30', '- Tham gia phát triển các ứng dụng trên nền tảng Java cho khách hàng Nhật Bản\r\n- Được tham gia đồng hành cũng với các startup trẻ hoặc những tập đoàn lớn của Nhật để xây dựng các sản phẩm y tế hướng tới hàng triệu người dùng tại thị trường Nhật Bản và Việt Nam\r\n- Làm việc theo sự phân công của trưởng nhóm / quản lý dự án, phối hợp giữa các nhóm để phát triển sản phẩm.\r\n- Hỗ trợ các thành viên trong nhóm với các chức năng phức tạp, tham gia nhận xét, đánh giá sourcecode của các thành viên trong nhóm.\r\n- Tham gia các công đoạn tìm hiểu yêu cầu, phân tích, thiết kế, nghiên cứu công nghệ khi được phân công.', '- Có trên 01 năm kinh nghiệm làm các dự án Java, sử dụng thành thạo các Framework: Spring, Hibernate, JPA, Struts.\r\n- Hiểu biết sâu về Java Core, OOP, Design Pattern.\r\n- Có kinh nghiệm lập trình Front End: HTML5, CSS3, Javascript. Sử dụng thành thạo jQuery, Angular là một lợi thế.\r\n- Có khả năng thiết kế, tối ưu database (SQL, NoSQL)\r\n- Có kiến thức web service (RESTful)\r\n- Có khả năng nhận xét, đánh giá sourcecode của các thành viên khác trong nhóm.\r\n- Có kinh nghiệm application servers như Tomcat\r\n- Có kinh nghiệm sử dụng các dịch vụ AWS, Heroku là một lợi thế.\r\n- Có kinh nghiệm làm việc với kiến trúc Microservice là một lợi thế lớn.\r\n- Có khả năng đọc hiểu tiếng Anh, biết tiếng Nhật là một lợi thế.\r\n- Có niềm đam mê, khám phá, học hỏi công nghệ mới. Sẵn sàng chuyển đổi công nghệ, ngôn ngữ mới.\r\n- Nhiệt tình và cẩn thận trong công việc.', '- Lương khởi điểm hấp dẫn, lên tới $1500 \r\n- Chính sách thưởng phong phú: Thưởng tháng lương 13 + thưởng nóng dự án + thưởng nhân viên xuất sắc hàng tháng + thưởng tân binh xuất sắc + các khoản thưởng khác\r\n- Xét tăng lương 2 lần/năm dựa trên hiệu quả công việc\r\n- Được khám sức khỏe định kỳ 1 lần/năm\r\n- Được hưởng các chế độ BHYT, BHXH, BHTN theo quy định nhà nước\r\n- Được tặng quà, thăm hỏi nhân các dịp cưới hỏi, hiếu hỉ, ốm đau…\r\n- Trợ cấp thai sản hấp dẫn cho nhân viên nữ\r\n- Trợ cấp ngoại ngữ 12 tháng liên tục theo trình độ để khuyến khích nhân viên trau dồi vốn tiếng Nhật:\r\n+N1: 5.000.000 VNĐ/tháng\r\n+N2: 3.000.000 VNĐ/tháng\r\n+N3: 1.000.000 VNĐ/tháng\r\n- Thời gian làm việc:\r\n+ Từ 8:00 - 17:30 (nghỉ trưa 1 giờ 30’) từ thứ Hai đến thứ Sáu\r\n+ Nghỉ thứ Bảy, Chủ nhật, nghỉ các ngày lễ, Tết theo quy định của Pháp luật, nghỉ ngày nghỉ riêng của công ty'),
(2, '2018-12-10 05:12:13', 1, 'Lập trình viên PHP', 'Hồ Chí Minh', 'PHP', '800-1000', 'full time', '2018-12-30', '- Tham gia phát triển các ứng dụng trên nền tảng Java cho khách hàng Nhật Bản\r\n- Được tham gia đồng hành cũng với các startup trẻ hoặc những tập đoàn lớn của Nhật để xây dựng các sản phẩm y tế hướng tới hàng triệu người dùng tại thị trường Nhật Bản và Việt Nam\r\n- Làm việc theo sự phân công của trưởng nhóm / quản lý dự án, phối hợp giữa các nhóm để phát triển sản phẩm.\r\n- Hỗ trợ các thành viên trong nhóm với các chức năng phức tạp, tham gia nhận xét, đánh giá sourcecode của các thành viên trong nhóm.\r\n- Tham gia các công đoạn tìm hiểu yêu cầu, phân tích, thiết kế, nghiên cứu công nghệ khi được phân công.', '- Có trên 01 năm kinh nghiệm làm các dự án Java, sử dụng thành thạo các Framework: Spring, Hibernate, JPA, Struts.\r\n- Hiểu biết sâu về Java Core, OOP, Design Pattern.\r\n- Có kinh nghiệm lập trình Front End: HTML5, CSS3, Javascript. Sử dụng thành thạo jQuery, Angular là một lợi thế.\r\n- Có khả năng thiết kế, tối ưu database (SQL, NoSQL)\r\n- Có kiến thức web service (RESTful)\r\n- Có khả năng nhận xét, đánh giá sourcecode của các thành viên khác trong nhóm.\r\n- Có kinh nghiệm application servers như Tomcat\r\n- Có kinh nghiệm sử dụng các dịch vụ AWS, Heroku là một lợi thế.\r\n- Có kinh nghiệm làm việc với kiến trúc Microservice là một lợi thế lớn.\r\n- Có khả năng đọc hiểu tiếng Anh, biết tiếng Nhật là một lợi thế.\r\n- Có niềm đam mê, khám phá, học hỏi công nghệ mới. Sẵn sàng chuyển đổi công nghệ, ngôn ngữ mới.\r\n- Nhiệt tình và cẩn thận trong công việc.', '- Lương khởi điểm hấp dẫn, lên tới $1500 \r\n- Chính sách thưởng phong phú: Thưởng tháng lương 13 + thưởng nóng dự án + thưởng nhân viên xuất sắc hàng tháng + thưởng tân binh xuất sắc + các khoản thưởng khác\r\n- Xét tăng lương 2 lần/năm dựa trên hiệu quả công việc\r\n- Được khám sức khỏe định kỳ 1 lần/năm\r\n- Được hưởng các chế độ BHYT, BHXH, BHTN theo quy định nhà nước\r\n- Được tặng quà, thăm hỏi nhân các dịp cưới hỏi, hiếu hỉ, ốm đau…\r\n- Trợ cấp thai sản hấp dẫn cho nhân viên nữ\r\n- Trợ cấp ngoại ngữ 12 tháng liên tục theo trình độ để khuyến khích nhân viên trau dồi vốn tiếng Nhật:\r\n+N1: 5.000.000 VNĐ/tháng\r\n+N2: 3.000.000 VNĐ/tháng\r\n+N3: 1.000.000 VNĐ/tháng\r\n- Thời gian làm việc:\r\n+ Từ 8:00 - 17:30 (nghỉ trưa 1 giờ 30’) từ thứ Hai đến thứ Sáu\r\n+ Nghỉ thứ Bảy, Chủ nhật, nghỉ các ngày lễ, Tết theo quy định của Pháp luật, nghỉ ngày nghỉ riêng của công ty'),
(3, '2018-12-10 23:24:12', 2, 'Lập trình form end', 'Hà Nội', 'HTML, CSS, JavaScript', '500-1000', 'full time', '2018-12-30', '\r\n- Tham gia phát triển các ứng dụng trên nền tảng Java cho khách hàng Nhật Bản\r\n- Được tham gia đồng hành cũng với các startup trẻ hoặc những tập đoàn lớn của Nhật để xây dựng các sản phẩm y tế hướng tới hàng triệu người dùng tại thị trường Nhật Bản và Việt Nam\r\n- Làm việc theo sự phân công của trưởng nhóm / quản lý dự án, phối hợp giữa các nhóm để phát triển sản phẩm.\r\n- Hỗ trợ các thành viên trong nhóm với các chức năng phức tạp, tham gia nhận xét, đánh giá sourcecode của các thành viên trong nhóm.\r\n- Tham gia các công đoạn tìm hiểu yêu cầu, phân tích, thiết kế, nghiên cứu công nghệ khi được phân công.', '- Có trên 01 năm kinh nghiệm làm các dự án Java, sử dụng thành thạo các Framework: Spring, Hibernate, JPA, Struts.\r\n- Hiểu biết sâu về Java Core, OOP, Design Pattern.\r\n- Có kinh nghiệm lập trình Front End: HTML5, CSS3, Javascript. Sử dụng thành thạo jQuery, Angular là một lợi thế.\r\n- Có khả năng thiết kế, tối ưu database (SQL, NoSQL)\r\n- Có kiến thức web service (RESTful)\r\n- Có khả năng nhận xét, đánh giá sourcecode của các thành viên khác trong nhóm.\r\n- Có kinh nghiệm application servers như Tomcat\r\n- Có kinh nghiệm sử dụng các dịch vụ AWS, Heroku là một lợi thế.\r\n- Có kinh nghiệm làm việc với kiến trúc Microservice là một lợi thế lớn.\r\n- Có khả năng đọc hiểu tiếng Anh, biết tiếng Nhật là một lợi thế.\r\n- Có niềm đam mê, khám phá, học hỏi công nghệ mới. Sẵn sàng chuyển đổi công nghệ, ngôn ngữ mới.\r\n- Nhiệt tình và cẩn thận trong công việc.', '- Lương khởi điểm hấp dẫn, lên tới $1500 \r\n- Chính sách thưởng phong phú: Thưởng tháng lương 13 + thưởng nóng dự án + thưởng nhân viên xuất sắc hàng tháng + thưởng tân binh xuất sắc + các khoản thưởng khác\r\n- Xét tăng lương 2 lần/năm dựa trên hiệu quả công việc\r\n- Được khám sức khỏe định kỳ 1 lần/năm\r\n- Được hưởng các chế độ BHYT, BHXH, BHTN theo quy định nhà nước\r\n- Được tặng quà, thăm hỏi nhân các dịp cưới hỏi, hiếu hỉ, ốm đau…\r\n- Trợ cấp thai sản hấp dẫn cho nhân viên nữ\r\n- Trợ cấp ngoại ngữ 12 tháng liên tục theo trình độ để khuyến khích nhân viên trau dồi vốn tiếng Nhật:\r\n+N1: 5.000.000 VNĐ/tháng\r\n+N2: 3.000.000 VNĐ/tháng\r\n+N3: 1.000.000 VNĐ/tháng\r\n- Thời gian làm việc:\r\n+ Từ 8:00 - 17:30 (nghỉ trưa 1 giờ 30’) từ thứ Hai đến thứ Sáu\r\n+ Nghỉ thứ Bảy, Chủ nhật, nghỉ các ngày lễ, Tết theo quy định của Pháp luật, nghỉ ngày nghỉ riêng của công ty');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` text COLLATE utf8_unicode_ci,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1:kh, 0ckh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `salt`, `level`, `status`) VALUES
(8, 'admin', 'admin', NULL, NULL, 2, 1),
(23, 'chinhdm', '$2y$12$cd2161206a759e5e491c0uyUdEyaD7Pu0KYniY7HaKtRVyzNlsAvy', 'balabololala@gmail.com', 'cd2161206a759e5e491c02935fa3cf7f', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPer` (`idPer`);

--
-- Chỉ mục cho bảng `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `inforper`
--
ALTER TABLE `inforper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `jobposting`
--
ALTER TABLE `jobposting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmployer` (`idEmployer`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `inforper`
--
ALTER TABLE `inforper`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobposting`
--
ALTER TABLE `jobposting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`idPer`) REFERENCES `inforper` (`id`);

--
-- Các ràng buộc cho bảng `inforper`
--
ALTER TABLE `inforper`
  ADD CONSTRAINT `inforper_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `jobposting`
--
ALTER TABLE `jobposting`
  ADD CONSTRAINT `jobposting_ibfk_1` FOREIGN KEY (`idEmployer`) REFERENCES `employer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
