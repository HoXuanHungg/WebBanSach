-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 28, 2021 lúc 07:21 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ban_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `hinh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `rong` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `cao` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `hinh`, `rong`, `cao`) VALUES
(1, 'banner_2.png', '990px', '150px');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `html` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`id`, `html`) VALUES
(1, '<table width=\"990px\">\r\n<tbody>\r\n<tr>\r\n<td align=\"right\" width=\"495px\">Cửa h&agrave;ng :</td>\r\n<td width=\"495px\"> <strong>Kho Sách Online</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `ten_nguoi_mua` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `dien_thoai` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `hang_duoc_mua` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `ten_nguoi_mua`, `email`, `dia_chi`, `dien_thoai`, `noi_dung`, `hang_duoc_mua`) VALUES
(11, 'duy tường', 'daoduytuong.dhqn@gmail.com', '135', '9870', 'test lan 2', '25[|||]1[|||||]46[|||]17[|||||]'),
(12, 'Đào Duy Tường', 'daoduytuong.dhqn@gmail.com', 'PY', '9870', 'Test 3', '34[|||]99999[|||||]46[|||]17[|||||]45[|||]32[|||||]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_doc`
--

CREATE TABLE `menu_doc` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_doc`
--

INSERT INTO `menu_doc` (`id`, `ten`) VALUES
(1, 'Văn'),
(2, 'Lịch sử'),
(3, 'Tiếng Anh'),
(5, 'Tiểu thuyết'),
(6, 'Tâm lý'),
(9, 'Light Novel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_ngang`
--

CREATE TABLE `menu_ngang` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `loai_menu` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_ngang`
--

INSERT INTO `menu_ngang` (`id`, `ten`, `noi_dung`, `loai_menu`) VALUES
(1, 'Giới thiệu', '<p>\r\n Sách là một nguồn kiến thức vô tận, chính vì vậy ai cũng luôn mong muốn sở hữu cho mình những nguồn thông tin có giá trị một cách nhanh chóng với mức giá tốt nhất. Để đáp ứng được nhu cầu này, website bán sách mang tên <span class=\"blue\">KHO SÁCH ONLINE</span> đã có mặt để giúp khách hàng mua sách một cách nhanh nhất.</p> <p>Nếu bạn là một “mọt sách” chính hiệu, bạn không thể bỏ qua trang bán sách online của chúng tôi được. Ở đây bạn sẽ sở hữu được quyển sách mong muốn với mức giá cực tốt kèm nhiều ưu đãi.</p>', ''),
(2, 'Sản phẩm', '', 'san_pham'),
(4, 'Liên hệ', 'Đào Duy Tường<br><br>\r\nVõ Xuân Huy<br><br>\r\nCao Minh Bình<br><br>\r\nHồ Xuân Hưng<br><br>\r\n', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(255) NOT NULL,
  `hinh_anh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `thuoc_the_loai` int(255) NOT NULL,
  `noi_bat` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `trang_chu` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sap_xep_trang_chu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `hinh_anh`, `noi_dung`, `thuoc_the_loai`, `noi_bat`, `trang_chu`, `sap_xep_trang_chu`) VALUES
(4, 'xu xu đừng khóc', 97000, '1_3.jpg', '', 5, '', 'co', 3),
(10, '5 centimet trên giây', 160000, '1_9.jpg', '', 9, '', 'co', 7),
(12, 'nếu anh là truyền thuyết của em', 55000, '1_11.jpg', 'nếu anh là truyền thuyết của em', 1, '', 'co', 13),
(15, 'tôi bị bố bắt cóc', 123000, '1_14.jpg', 'Nội dung', 1, '', 'co', 0),
(16, 'Go set a watchman', 125000, '1_15.jpg', 'Nội dung', 3, 'co', 'co', 5),
(17, 'Tôi thất tình', 99000, '1_16.jpg', 'Tôi thất tình', 1, '', '', 0),
(18, 'Ngôi nhà hành lang', 145000, '1_17.jpg', 'Ngôi nhà hành lang', 1, '', 'co', 1),
(19, 'thừa nhận cậu yêu tôi', 145000, '1_18.jpg', 'thừa nhận cậu yêu tôi', 1, '', '', 0),
(20, 'Lá rơi trong thành phố', 170000, '1_19.jpg', '', 5, '', '', 0),
(21, 'Báo cáo chính phủ', 85000, '1_20.jpg', 'Báo cáo chính phủ', 1, '', '', 0),
(22, 'mắt con rồng', 30000, '1_21.jpg', 'Nội dung mắt con rồng', 1, '', 'co', 8),
(24, 'Tắt đèn', 50000, '1_23.jpeg', 'Nội dung Tắt đèn', 1, '', '', 0),
(25, 'nếu anh là truyền thuyết của em', 60000, '1_24.jpg', 'Nội dung nếu anh là truyền thuyết của em', 6, '', '', 9),
(26, 'sách', 70000, '3_6.jpg', 'Nội dung sách', 3, '', '', 12),
(27, 'Sông nhùng', 80000, '3_7.jpg', 'Nội dung Sông nhùng', 3, '', '', 0),
(28, 'đi về phía an yên', 90000, '3_8.jpg', 'Nội dung đi về phía an yên', 3, '', '', 8),
(29, 'Hoàng tử bé', 100000, '3_9.jpg', 'Nội dung Hoàng tử bé', 1, '', '', 0),
(30, 'thanh xuân', 110000, '3_10.jpg', 'Nội dung của thanh xuân', 3, '', '', 7),
(31, 'Xác ấm', 120000, '3_11.jpg', 'Xác ấm', 3, '', '', 9),
(33, 'paris', 60000, '3_13.jpg', 'paris', 3, '', '', 1),
(34, 'Hạ đỏ có chàng tới hỏi', 70000, '3_14.jpg', '', 3, '', '', 11),
(45, 'Đừng Lựa Chọn An Nhàn Khi Còn Trẻ', 50000, '0e56b45bddc01b57277484865818ab9b.jpg', '', 11, 'co', 'co', 14),
(46, 'Thời Gian: Minh Họa Sinh Động Bằng Tranh', 50000, '376265d0b5abea810c385885ba0e224f.jfif', 'Dẫn nhập ngắn về khoa học là lựa chọn sáng suốt nhất cho bất kỳ ai muốn truy cập nhanh và hiệu quả vào kho kiến thức khổng lồ. Khai thác thông tin khoa học khách quan từ những nguồn xác tín và sử dụng phong cách truyện tranh hài hước, bộ sách độc đáo này sẽ mở ra con đường sáng rõ nhất để tìm đến những ý tưởng khoa học đột phá của nhân loại.\r\n\r\nÝ thức của nhân loại đã phát triển ra sao kể từ thời đại của tổ tiên chúng ta? Nếu ý thức con người cấu thành từ những gen vị kỷ, tại sao chúng ta có thể hợp tác ăn ý tới vậy? Có thể giải thích khác biệt tâm lý giữa nam và nữ dưới góc nhìn của sự tiến hóa không? Ngành tâm lý học tiến hóa sẽ đề xuất một cách trả lời mới cho những câu hỏi căn bản trên, cùng nhiều câu hỏi khác.\r\n\r\nCuốn sách này là công trình nghiên cứu đặc biệt thuyết phục của Dylan Evans và Oscar Zarate, sẽ đem đến cho độc giả một góc nhìn sáng rõ về lịch sử của ý thức.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', 11, 'co', 'co', 15),
(50, 'Nhà Giả Kim', 50000, 'nhaGiaKim.jfif', 'Nhà giả kim là một cuốn sách được xuất bản lần đầu ở Brasil năm 1988 và là cuốn sách nổi tiếng nhất của nhà văn Paulo Coelho. Nó được dịch ra 67 ngôn ngữ và bán ra tới 65 triệu bản, trở thành một trong những quyển sách bán chạy nhất mọi thời đại. Đây là một câu chuyện thúc giục độc giả theo đuổi giấc mơ của mình', 6, '', 'co', 16),
(51, 'Chủ Nghĩa Khắc Kỷ - Phong Cách Sống Bản Lĩnh Và Bình Thản', 79000, 'cnkk.jpg', 'Chủ Nghĩa Khắc Kỷ - Phong Cách Sống Bản Lĩnh Và Bình Thản (Tặng Kèm Bộ Bookmark Độc Quyền TiKi)\r\n\r\nBạn mong muốn điều gì từ cuộc sống này? Có thể câu trả lời của bạn là muốn có một người bạn đời biết quan tâm, một công việc tốt và một ngôi nhà đẹp, nhưng chúng thực ra chỉ là một số thứ bạn muốn có trong cuộc sống. Khi hỏi bạn mong muốn điều gì từ cuộc sống này, tôi đang hỏi theo nghĩa rộng nhất. Tôi không hỏi về những mục tiêu mà bạn đề ra khi thực hiện các hoạt động hằng ngày, mà tôi đang hỏi về mục tiêu lớn lao trong cuộc sống của bạn. Nói cách khác, trong số những thứ bạn có thể theo đuổi trong cuộc sống, thứ nào bạn tin là có giá trị nhất?\r\n\r\nNhiều người sẽ khó lòng nêu ra được mục tiêu này. Họ biết mình muốn gì trong từng phút một hoặc thậm chí từng thập kỷ một trong suốt cuộc đời mình, nhưng họ chưa bao giờ dành thời gian để suy ngẫm về mục tiêu sống lớn lao của bản thân. Chuyện này có lẽ cũng dễ hiểu. Nền văn hóa của chúng ta vốn không khuyến khích mọi người nghĩ về những điều như vậy, mà chỉ tạo ra hết xao lãng này đến xao lãng khác, để chúng ta không bao giờ phải bận tâm đến chúng. Nhưng một mục tiêu lớn lao trong đời là thành phần đầu tiên của một triết lý sống. Nếu bạn không có một mục tiêu lớn lao trong đời, tức là bạn không có một triết lý sống chặt chẽ.\r\n\r\nNhưng tại sao có một triết lý sống lại quan trọng? Vì nếu không có nó, bạn sẽ có nguy cơ sống lầm lạc – bất kể bạn đã làm gì, bất kể mọi niềm vui thú mà bạn đã thụ hưởng lúc sinh thời, chung quy bạn vẫn sẽ sống một cuộc đời tồi tệ. Nói cách khác, có nguy cơ là lúc bạn đang nằm hấp hối trên giường, bạn sẽ nhìn lại và nhận ra rằng mình đã uổng phí một cơ hội sống. Thay vì dành cuộc đời mình để theo đuổi điều gì đó thực sự đáng giá, bạn đã phung phí nó khi mặc cho bản thân bị xao lãng trước vô số thứ phù phiếm mà cuộc đời đưa đến.\r\n\r\nGiờ giả sử bạn đã xác định được mục tiêu lớn lao trong đời mình. Và bạn cũng biết rõ tại sao mục tiêu này lại đáng để phấn đấu. Dù thế, bạn vẫn có nguy cơ sống lầm lạc. Bạn có thể sẽ không đạt được mục tiêu này, nhất là nếu không có một chiến lược hiệu quả. Do đó, thành phần thứ hai của một triết lý sống là một chiến lược để đạt được mục tiêu lớn lao của bạn. Chiến lược này sẽ chỉ rõ cho bạn phải làm những gì trong cuộc sống hằng ngày, từ đó tối đa hóa khả năng đạt được điều mà bạn xem là đáng giá nhất trong cuộc đời mình.\r\n\r\nCuốn sách này dành cho những người đang tìm kiếm một triết lý sống. Trong các trang tiếp theo, tôi sẽ tập trung vào một triết lý mà tôi thấy hữu ích và tôi nghĩ rằng nhiều độc giả cũng sẽ thấy như vậy. Đó là triết lý của trường phái Khắc kỷ cổ đại. Tuy triết lý sống này đã lâu đời nhưng ngày nay nó xứng đáng nhận được sự chú ý của bất kỳ cá nhân nào mong muốn có được một cuộc sống vừa ý nghĩa vừa trọn vẹn – những người mong muốn có được một cuộc sống tốt đẹp.\r\n\r\nNói cách khác, cuốn sách này đưa ra lời khuyên mọi người nên sống như thế nào. Đúng hơn, tôi sẽ là cầu nối mang đến cho bạn lời khuyên của các triết gia Khắc kỷ từ hai ngàn năm trước. Đây là điều mà các triết gia đồng nghiệp của tôi thường miễn cưỡng thực hiện, nhưng nói đi cũng phải nói lại, họ chủ yếu quan tâm đến “tính học thuật” của triết học; tức là họ chuyên nghiên cứu về lý thuyết hoặc lịch sử. Ngược lại, tôi quan tâm đến tính thực tiễn của chủ nghĩa Khắc kỷ: mục tiêu của tôi là áp dụng triết lý này vào cuộc sống của mình và khuyến khích người khác áp dụng nó vào cuộc sống của họ. Tôi cho rằng các triết gia Khắc kỷ cổ đại sẽ khuyến khích cả hai đường hướng này, nhưng họ cũng sẽ khẳng định rằng lý do chính để tìm hiểu về chủ nghĩa Khắc kỷ là nhằm áp dụng nó vào thực tiễn.', 1, '', 'co', 17),
(52, 'IELTS Reading: Phương pháp và chiến thuật làm bài thi IELTS Reading', 109000, 'ielts.png', 'IELTS Reading (Academic Module) là bài thi đánh giá kỹ năng đọc hiểu của thí sinh gồm 40 câu hỏi, thời gian làm bài trong đúng 60 phút (không có thời gian dành cho ghi lại câu trả lời vào phiếu trả lời Answer Sheet cuối bài thi), kết quả của phần Reading sẽ chỉ được tính dựa trên phiếu trả lời, không dựa vào đáp án mà thí sinh ghi chú ở tờ đề Bài thi thông thường bao gồm 3 phần và phần trả lời câu hỏi. Mỗi phần là 1 bài đọc dài khoảng  1000 – 1500 từ với câu hỏi được chia tương đối đều. Các đề tài thường trích dẫn từ sách, báo, tạp chí hoặc tập san và những đề tài này không mang tính chất chuyên môn sâu, nếu bài đọc chứa các thuật ngữ hoặc khái niệm chuyên môn phức tạp có thể được giải thích trong phần chú giải (glossary)\r\n\r\nPhần thi Reading Academic được thiết kế để kiểm tra một loạt các kỹ năng của thí sinh bao gồm khả năng đọc nhanh và hiểu ý chính của văn bản, đọc hiểu chi tiết, lập luận logic và đánh giá ý kiến, thái độ và mục đích của người viết. Để giải quyết vấn đề thời gian và năng lượng trong bài thi IELTS Reading, ZIM đề xuất một số kỹ thuật phổ biến trong luyện tập kỹ năng Reading nói chung, tùy biến và áp dụng vào trong bài thi IELTS. Các kỹ thuật và phương pháp làm bài gồm:\r\n\r\nSkimming: là kỹ thuật đọc nhanh để tìm ý chính của bài đọc, các đoạn trong bài đọc. Mỗi bài đọc luôn nói về một chủ đề nhất định, trong bài đọc chứa nhiều đoạn (paragraph) và mỗi đoạn luôn nói về một ý chính (main idea). Skimming để tìm ra chủ đề của bài đọc và ý chính của các đoạn.', 3, 'co', '', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `hinh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lien_ket` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`id`, `hinh`, `lien_ket`) VALUES
(1, 'a_1.jpg', '#'),
(2, 'a_2.jpg', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_quan_tri`
--

CREATE TABLE `thong_tin_quan_tri` (
  `id` int(11) NOT NULL,
  `ky_danh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_quan_tri`
--

INSERT INTO `thong_tin_quan_tri` (`id`, `ky_danh`, `mat_khau`) VALUES
(1, 'admin', 'admin'),
(4, 'a', '1'),
(8, 'TaiKhoanAdmin1', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_doc`
--
ALTER TABLE `menu_doc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_ngang`
--
ALTER TABLE `menu_ngang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `menu_doc`
--
ALTER TABLE `menu_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `menu_ngang`
--
ALTER TABLE `menu_ngang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
