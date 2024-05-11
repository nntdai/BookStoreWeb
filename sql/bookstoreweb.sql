-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 12:50 PM
-- Server version: 8.3.0
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoreweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `idSach` varchar(30) NOT NULL,
  `idGioHang` int NOT NULL,
  `soLuong` int NOT NULL,
  `tongTien` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chucnangchitiet`
--

CREATE TABLE `chucnangchitiet` (
  `id` varchar(30) NOT NULL,
  `idChucNangLon` varchar(30) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chucnanglon`
--

CREATE TABLE `chucnanglon` (
  `id` varchar(30) NOT NULL,
  `ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int NOT NULL,
  `ten` varchar(30) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `ten`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Quản lý', 1),
(3, 'Nhân viên', 1),
(4, 'Khách hàng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE `chude` (
  `id` int NOT NULL,
  `tenChuDe` varchar(50) NOT NULL,
  `idDanhMuc` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`id`, `tenChuDe`, `idDanhMuc`, `status`) VALUES
(1, 'Văn Học', 1, 1),
(2, 'Kinh Tế', 1, 1),
(3, 'Tâm Lý - Kỹ Năng Sống', 1, 1),
(4, 'Sách Giáo Khoa - Tham Khảo', 1, 1),
(5, 'Fiction', 2, 1),
(6, 'Business & Managment', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `tenDanhMuc` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tenDanhMuc`, `status`) VALUES
(1, 'Sách Trong Nước', 1),
(2, 'Foreign Books', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int NOT NULL,
  `idGioHang` int NOT NULL,
  `diaChiGiao` varchar(50) NOT NULL,
  `idTinhTrang` int NOT NULL,
  `ngayDat` datetime NOT NULL,
  `ngayHoanThanhDonHang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `tongTien` decimal(15,4) NOT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsach`
--

CREATE TABLE `hinhanhsach` (
  `id` int NOT NULL,
  `url` varchar(200) NOT NULL,
  `idSach` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinhanhsach`
--

INSERT INTO `hinhanhsach` (`id`, `url`, `idSach`) VALUES
(1, './Image/caycamngotcuatoi1.png', '8935235228351'),
(2, './Image/caycamngotcuatoi2.png', '8935235228351'),
(3, './Image/caycamngotcuatoi3.png', '8935235228351'),
(4, './Image/caycamngotcuatoi4.png', '8935235228351'),
(5, './Image/image_195509_1_36793.jpg', '8935235226272'),
(6, './Image/8935235226272_1.jpg', '8935235226272'),
(7, './Image/8935235226272_2.jpg', '8935235226272');

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuc`
--

CREATE TABLE `hinhthuc` (
  `id` int NOT NULL,
  `ten` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinhthuc`
--

INSERT INTO `hinhthuc` (`id`, `ten`, `status`) VALUES
(1, 'Bìa mềm', 1),
(4, 'Bìa cứng', 1),
(5, 'Bộ hộp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngonngu`
--

CREATE TABLE `ngonngu` (
  `id` int NOT NULL,
  `tenNgonNgu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngonngu`
--

INSERT INTO `ngonngu` (`id`, `tenNgonNgu`) VALUES
(1, 'Tiếng Việt'),
(2, 'Tiếng Anh');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int NOT NULL,
  `tenNCC` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `tenNCC`, `status`) VALUES
(1, 'Nhã Nam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `id` int NOT NULL,
  `tenNXB` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`id`, `tenNXB`, `status`) VALUES
(1, 'NXB Hội Nhà Văn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quyenhan`
--

CREATE TABLE `quyenhan` (
  `idChucVu` int NOT NULL,
  `idChucNangChiTiet` varchar(30) NOT NULL,
  `ngayCap` binary(8) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `id` varchar(30) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `idTheLoai` int NOT NULL,
  `idNCC` int NOT NULL,
  `idNXB` int NOT NULL,
  `namXB` date NOT NULL,
  `tenNguoiDich` varchar(50) DEFAULT NULL,
  `idNgonNgu` int NOT NULL,
  `giagoc` decimal(15,2) NOT NULL,
  `phanTramKhuyenMai` tinyint NOT NULL,
  `soTrang` int NOT NULL,
  `idHinhThuc` int NOT NULL,
  `trongLuong` float NOT NULL,
  `kichThuocBaoBi` varchar(20) NOT NULL,
  `moTa` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soLuongCon` int NOT NULL,
  `soLuongDaBan` int NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`id`, `ten`, `idTheLoai`, `idNCC`, `idNXB`, `namXB`, `tenNguoiDich`, `idNgonNgu`, `giagoc`, `phanTramKhuyenMai`, `soTrang`, `idHinhThuc`, `trongLuong`, `kichThuocBaoBi`, `moTa`, `soLuongCon`, `soLuongDaBan`, `status`) VALUES
('8935235226272', 'Nhà Giả Kim', 3, 1, 1, '2020-01-01', 'Lê Chu Cầu', 1, 79000.00, 22, 227, 1, 220, '20.5 x 13 cm', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.” - The Economist, London, Anh\r\n\r\n \r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.” - Frankfurter Allgemeine Zeitung, Đức\r\n\r\nMã hàng	8935235226272\r\nTên Nhà Cung Cấp	Nhã Nam\r\nTác giả	Paulo Coelho\r\nNgười Dịch	Lê Chu Cầu\r\nNXB	NXB Hội Nhà Văn\r\nNăm XB	2020\r\nTrọng lượng (gr)	220\r\nKích Thước Bao Bì	20.5 x 13 cm\r\nSố trang	227\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nĐồ Chơi Cho Bé - Giá Cực Tốt\r\nNhã Nam\r\nTop sách được phiên dịch nhiều nhất\r\nRƯỚC DEAL LINH ĐÌNH VUI ĐÓN TRUNG THU\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiểu thuyết bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nChính sách khuyến mãi trên Fahasa.com không áp dụng cho Hệ thống Nhà sách Fahasa trên toàn quốc\r\nTất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.” - The Economist, London, Anh\r\n\r\n \r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.” - Frankfurter Allgemeine Zeitung, Đức', 100, 0, b'1'),
('8935235228351', 'Cây Cam Ngọt Của Tôi', 3, 1, 1, '2020-10-10', 'Nguyễn Bích Lan, Tô Yến Ly', 1, 108000.00, 22, 244, 1, 280, '20 x 14.5', '“Vị chua chat của cái nghèo hòa trộn với vị ngọt ngào khi khám phá ra những điều khiến cuộc đời này đáng sống... một tác phẩm kinh điển của Brazil.” - Booklist\n“Một cách nhìn cuộc sống gần như hoàn chỉnh từ con mắt trẻ thơ… có sức mạnh sưởi ấm và làm tan nát cõi lòng, dù người đọc ở lứa tuổi nào.” - The National\nHãy làm quen với Zezé, cậu bé tinh nghịch siêu hạng đồng thời cũng đáng yêu bậc nhất, với ước mơ lớn lên trở thành nhà thơ cổ thắt nơ bướm. Chẳng phải ai cũng công nhận khoản “đáng yêu” kia đâu nhé. Bởi vì, ở cái xóm ngoại ô nghèo ấy, nỗi khắc khổ bủa vây đã che mờ mắt người ta trước trái tim thiện lương cùng trí tưởng tượng tuyệt vời của cậu bé con năm tuổi.\nCó hề gì đâu bao nhiêu là hắt hủi, đánh mắng, vì Zezé đã có một người bạn đặc biệt để trút nỗi lòng: cây cam ngọt nơi vườn sau. Và cả một người bạn nữa, bằng xương bằng thịt, một ngày kia xuất hiện, cho cậu bé nhạy cảm khôn sớm biết thế nào là trìu mến, thế nào là nỗi đau, và mãi mãi thay đổi cuộc đời cậu.\nMở đầu bằng những thanh âm trong sáng và kết thúc lắng lại trong những nốt trầm hoài niệm, Cây cam ngọt của tôi khiến ta nhận ra vẻ đẹp thực sự của cuộc sống đến từ những điều giản dị như bông hoa trắng của cái cây sau nhà, và rằng cuộc đời thật khốn khổ nếu thiếu đi lòng yêu thương và niềm trắc ẩn. Cuốn sách kinh điển này bởi thế không ngừng khiến trái tim người đọc khắp thế giới thổn thức, kể từ khi ra mắt lần đầu năm 1968 tại Brazil.', 200, 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `id` int NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`id`, `hoTen`, `status`) VALUES
(1, 'José Mauro de Vasconcelos', 1),
(2, 'Paulo Coelho', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia_sach`
--

CREATE TABLE `tacgia_sach` (
  `idSach` varchar(30) NOT NULL,
  `idTacGia` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tacgia_sach`
--

INSERT INTO `tacgia_sach` (`idSach`, `idTacGia`, `status`) VALUES
('8935235228351', 1, 1),
('8935235226272', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `soDienThoai` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `mauKhau` varchar(40) NOT NULL,
  `idChucVu` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`soDienThoai`, `email`, `hoTen`, `mauKhau`, `idChucVu`, `status`) VALUES
('0900111122', 'nguyennhanvien@gmail.com', 'Nguyễn Nhân Viên', '123', 3, 1),
('0904814456', 'nguyenngocthanhdai@gmail.com', 'Nguyễn Ngọc Thành Đại', '123', 1, 1),
('0933222244', 'nguyenthilo@gmail.com', 'Nguyễn Thị Lọ', '123', 4, 1),
('0938113289', 'nguyenxuantruc@gmail.com', 'Nguyễn Xuân Trúc', '123', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int NOT NULL,
  `tenTheLoai` varchar(50) NOT NULL,
  `idChuDe` int NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `tenTheLoai`, `idChuDe`, `status`) VALUES
(1, 'Quản Trị - Lãnh Đạo', 2, 1),
(2, 'Kỹ Năng Sống', 3, 1),
(3, 'Tiểu Thuyết', 1, 1),
(4, 'Truyện Ngắn', 1, 1),
(5, 'Marketing - Bán hàng', 2, 1),
(6, 'Fiction', 5, 1),
(7, 'Fantasy', 5, 1),
(8, 'Economics', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `id` int NOT NULL,
  `tenTinhTrang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`idSach`,`idGioHang`),
  ADD KEY `FK_GioHangChiTiet` (`idGioHang`);

--
-- Indexes for table `chucnangchitiet`
--
ALTER TABLE `chucnangchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ChucNangLonChiTiet` (`idChucNangLon`);

--
-- Indexes for table `chucnanglon`
--
ALTER TABLE `chucnanglon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DanhMucChuDe` (`idDanhMuc`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GioHangDonHang` (`idGioHang`),
  ADD KEY `FK_TinhTrangDonHang` (`idTinhTrang`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TaiKhoanGioHang` (`soDienThoai`);

--
-- Indexes for table `hinhanhsach`
--
ALTER TABLE `hinhanhsach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SachHinhAnh` (`idSach`);

--
-- Indexes for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngonngu`
--
ALTER TABLE `ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`idChucVu`,`idChucNangChiTiet`),
  ADD KEY `FK_ChucNangChiTietQuyenHan` (`idChucNangChiTiet`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TheLoaiSach` (`idTheLoai`),
  ADD KEY `FK_NhaCungCapSach` (`idNCC`),
  ADD KEY `FK_NhaXuatBanSach` (`idNXB`),
  ADD KEY `FK_NgonNguSach` (`idNgonNgu`),
  ADD KEY `FK_HinhThucSach` (`idHinhThuc`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tacgia_sach`
--
ALTER TABLE `tacgia_sach`
  ADD PRIMARY KEY (`idTacGia`,`idSach`),
  ADD KEY `FK_SachTacGia` (`idSach`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`soDienThoai`),
  ADD KEY `FK_ChucVuTaiKhoan` (`idChucVu`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ChuDeTheLoai` (`idChuDe`);

--
-- Indexes for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chude`
--
ALTER TABLE `chude`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinhanhsach`
--
ALTER TABLE `hinhanhsach`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngonngu`
--
ALTER TABLE `ngonngu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `FK_GioHangChiTiet` FOREIGN KEY (`idGioHang`) REFERENCES `giohang` (`id`),
  ADD CONSTRAINT `FK_SachGioHang` FOREIGN KEY (`idSach`) REFERENCES `sach` (`id`);

--
-- Constraints for table `chucnangchitiet`
--
ALTER TABLE `chucnangchitiet`
  ADD CONSTRAINT `FK_ChucNangLonChiTiet` FOREIGN KEY (`idChucNangLon`) REFERENCES `chucnanglon` (`id`);

--
-- Constraints for table `chude`
--
ALTER TABLE `chude`
  ADD CONSTRAINT `FK_DanhMucChuDe` FOREIGN KEY (`idDanhMuc`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_GioHangDonHang` FOREIGN KEY (`idGioHang`) REFERENCES `giohang` (`id`),
  ADD CONSTRAINT `FK_TinhTrangDonHang` FOREIGN KEY (`idTinhTrang`) REFERENCES `tinhtrangdonhang` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_TaiKhoanGioHang` FOREIGN KEY (`soDienThoai`) REFERENCES `taikhoan` (`soDienThoai`);

--
-- Constraints for table `hinhanhsach`
--
ALTER TABLE `hinhanhsach`
  ADD CONSTRAINT `FK_SachHinhAnh` FOREIGN KEY (`idSach`) REFERENCES `sach` (`id`);

--
-- Constraints for table `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD CONSTRAINT `FK_ChucNangChiTietQuyenHan` FOREIGN KEY (`idChucNangChiTiet`) REFERENCES `chucnangchitiet` (`id`),
  ADD CONSTRAINT `FK_ChucVuQuyenHan` FOREIGN KEY (`idChucVu`) REFERENCES `chucvu` (`id`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `FK_HinhThucSach` FOREIGN KEY (`idHinhThuc`) REFERENCES `hinhthuc` (`id`),
  ADD CONSTRAINT `FK_NgonNguSach` FOREIGN KEY (`idNgonNgu`) REFERENCES `ngonngu` (`id`),
  ADD CONSTRAINT `FK_NhaCungCapSach` FOREIGN KEY (`idNCC`) REFERENCES `nhacungcap` (`id`),
  ADD CONSTRAINT `FK_NhaXuatBanSach` FOREIGN KEY (`idNXB`) REFERENCES `nhaxuatban` (`id`),
  ADD CONSTRAINT `FK_TheLoaiSach` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`);

--
-- Constraints for table `tacgia_sach`
--
ALTER TABLE `tacgia_sach`
  ADD CONSTRAINT `FK_SachTacGia` FOREIGN KEY (`idSach`) REFERENCES `sach` (`id`),
  ADD CONSTRAINT `FK_TacGiaSach` FOREIGN KEY (`idTacGia`) REFERENCES `tacgia` (`id`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_ChucVuTaiKhoan` FOREIGN KEY (`idChucVu`) REFERENCES `chucvu` (`id`);

--
-- Constraints for table `theloai`
--
ALTER TABLE `theloai`
  ADD CONSTRAINT `FK_ChuDeTheLoai` FOREIGN KEY (`idChuDe`) REFERENCES `chude` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
