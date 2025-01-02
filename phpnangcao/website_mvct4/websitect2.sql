-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 06:41 AM
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
-- Database: `websitect2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_product`
--

CREATE TABLE `ad_product` (
  `ma_loaisp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `mota` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_product`
--

INSERT INTO `ad_product` (`ma_loaisp`, `masp`, `tensp`, `hinhanh`, `soluong`, `gianhap`, `giaxuat`, `khuyenmai`, `mota`, `create_date`) VALUES
('003', '00301', ' Máy chiếu', '38671_panasonic_pt_lb386_anphatcomputer.jpg', 3, 13000000, 16000000, 10000, '                         Panasonic PT-LB386                    ', '2024-11-17'),
('004', '00401', ' bảng chiếu', 'man-chieu-dien-dalite-avt.jpg', 13, 1000000, 1500000, 10000, '                                                                        bảng chiếu cũ                                                                                                          ', '2024-11-20'),
('005', '00501', ' bảng phấn', 'bang-viet-phan-co-chan-di-dong-19.jpg', 36, 400000, 500000, 0, 'bảng phấn có chân', '2024-12-01'),
('006', '00601', ' phấn trắng', 'Phan-khong-bui-Thien-Long-DC02-27.jpg', 293, 10000, 15000, 0, 'phấn trắng không màu', '2024-12-01'),
('008', '00801', ' bút lazer', 'butlazer.jpg', 299, 150000, 180000, 0, '               bút chiếu lazer                              ', '2024-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `content`, `thumbnail`, `author`, `status`) VALUES
(8, 'DTCL mùa 13: Cùng \"Gia Đình\" lên đỉnh nhờ bài đấu reroll 1 tiền siêu mạnh siêu dễ đánh', 'DTCL mùa 13: Cùng \"Gia Đình\" lên đỉnh nhờ bài đấu reroll 1 tiền siêu mạnh siêu dễ đánh', 'Bài đấu reroll Gia Đình có thể coi là bài quốc dân đầu mùa DTCL mùa 13, khi vừa dễ chơi lại có liên kết mạnh mẽ với bộ phim Arcane, thích hợp cho những ai mới tiếp cận mùa này.\r\n\r\nĐặc biệt bài đấu này có thể phát triển ra khá nhiều hướng, khi Riot Games rất ưu ái buff cho nó rất nhiều lõi anh hùng riêng biệt cho các tướng quan trọng trong đội hình như Powder hay Vander.\r\n\r\nDTCL mùa 13: Bài đấu reroll 1 tiền Gia Đình siêu mạnh siêu dễ đánh\r\n\r\nMục lục\r\nẨn\r\n1. Sức mạnh của Gia Đình trong DTCL mùa 13\r\n2. Cách chơi và đội hình\r\nSức mạnh của Gia Đình trong DTCL mùa 13\r\nCơ bản đây là một bài reroll với chủ lực 1 tiền là Powder, đi cùng tanker chính 2 tiền là Vander. Điểm bá đạo của bài này là tương tác giữa các tướng, khi Powder có trí mạng và giảm hồi máu từ tộc hệ với kỹ năng, trong khi Vander thì được tăng sức mạnh khi có càng nhiều tướng 1 với 2 vàng trên bàn. Điểm yếu của bộ này có lẽ là dễ bị tranh giành bởi nó đang là bài reroll cực hot, còn Powder kích được rất nhiều hệ nên cũng hay được kẹp kèm các nhà đánh Tái Chế hay Phục Kích.\r\n\r\nĐồ cho Powder yêu cầu đồ chuẩn bao gồm Shojin, Nanh Nashor và Găng Bảo Thạch, để một cú nổ của nó phải kết liễu hoàn toàn các tướng râu ria xung quanh. Trong khi đó Vander có thể lên đồ theo 2 kiểu là thuần chống chịu với Thú Tượng, Giáp Máu hay Dây Chuyền Chuộc Tội, hoặc là theo kiểu đấu sĩ với Huyết Kiếm, Quyền Năng và Móng Vuốt - kiểu chơi này thường là khi có lõi anh hùng của Vander. Bài này có thể kẹp rất nhiều tướng về sau, nên không lo chuyện thừa đồ bất kể là AP hay AD.\r\n\r\nDTCL mùa 13: Bài đấu reroll 1 tiền Gia Đình siêu mạnh siêu dễ đánh\r\nĐồ chuẩn cho Powder\r\nLõi nên lấy: Đêm Đầy Sao, Huy Hiệu Gia Đình, Pandora, Nhắm Mắt Chơi Bừa, Tháo Găng (lõi anh hùng Vander), Ý Chỉ Xích Chùy, Huy Hiệu Giám Sát/Phục Kích...\r\n\r\nCách chơi và đội hình\r\nReroll Gia Đình là một bài mạnh, đánh rất dễ vào top 4 nhưng nếu muốn cao hơn thì nó phải phụ thuộc nhiều vào lõi. Đây có lẽ là tộc hệ được Riot Games ưu ái nhất DTCL mùa 13, khi có cực nhiều lõi ăn theo hỗ trợ cho nó, nhưng trong đó có 2 lõi là Chào Mừng Đến Sân Chơi và Mong Là Nó Sẽ Hoạt Động siêu troll bạn chắc chắn không nên lấy. Chào Mừng Đến Sân Chơi sẽ cho ngẫu nhiên 1 trong 3 tướng Gia Đình nếu có tối thiểu 2 tướng Gia Đình của bạn sống sót sau 15 giây, lúc đầu chúng ta toàn đánh chuỗi thua nên coi như chấp lõi, về sau thì roll cho nhanh chứ không chờ được. Mong Là Nó Sẽ Hoạt Động thì kỹ năng của Powder sẽ gây sát thương to hơn nhưng lên cả đồng minh, bạn đánh chưa quen mà lấy lõi này thì chẳng khác gì tự hủy.\r\n\r\nBài này lúc đầu nên đánh chuỗi thua, vì các tướng như Powder chưa có đồ rất yếu, Vander thì chắc chắn là chưa 2 sao còn Violet chỉ như tướng kích hệ nên bỏ qua. Cố gắng tích tiền và chỉ bắt Powder với Vander, còn có thể bỏ qua Violet, vì đằng nào về sau bạn cũng chẳng chơi tới tướng này. Có hai hướng đánh cho Gia Đình, một là chơi full sát thương với càng nhiều Phục Kích để kích trí mạng với sát thương cho Powder, còn hai là chơi full thủ với Giám Sát để giúp Vander trâu hơn, hiện tại tộc Giám Sát đang rất mạnh nên mọi người ưu tiên hướng 2 hơn.\r\n\r\nDTCL mùa 13: Bài đấu reroll 1 tiền Gia Đình siêu mạnh siêu dễ đánh\r\nĐội hình đầu game\r\nBạn sẽ roll ở cấp 5 cho tới khi được Powder 3 sao, những tướng khác như Violet hay Darius thì lên 3 sao được thì lên, còn không thì bỏ qua cũng được không thành vấn đề. Sau đó chúng ta sẽ lên 6 và tiếp tục tìm kiếm Vander 3 sao, tương tự như vậy các tướng như Camile hay Scar nếu bắt mà không ảnh hưởng tới tài chính thì có thể bắt, còn không thì bỏ qua. Riêng Scar đang là tướng siêu siêu lỗi trong DTCL mùa 13, nó là tanker mạnh gấp đôi Vander, nhưng do là tướng 3 tiền lại bị tranh dữ dội từ các nhà khác, nên thường là chúng ta sẽ không thể lên nó 3 sao được mà đánh bằng Vander an toàn hơn.\r\n\r\nBài này đánh rất đơn giản, bạn chỉ cho càng nhiều Giám Sát vào càng tốt để tăng độ trâu cho Vander tank cho Powder thả khỉ, sau khi đã lên được 2 core này 3 sao thì tích tiền để thẳng lên cấp 8, đừng quá quan trọng các tướng lẻ tẻ như Camile hay Violet, chúng chỉ dùng để kích hệ là chính, roll được 3 sao thì tốt còn không thì bỏ qua cũng chả sao.\r\n\r\nDTCL mùa 13: Bài đấu reroll 1 tiền Gia Đình siêu mạnh siêu dễ đánh\r\nĐội hình khi reroll\r\nBài này ở cấp 8 có thể kẹp rất nhiều tướng 4 - 5 tiền khác nhau mà vẫn mạnh, tùy thuộc đồ của bạn mà lựa chọn phù hợp, thí dụ đồ AP thì lấy Ekko vừa có Tái Chế vừa có Phục Kích và được lợi một đồ lớn, còn không thì đánh Vi khi đã có sẵn Võ Sĩ Lồng Sắt từ Violet, còn không thì bạn có thể kẹp Jinx để có Phục Kích và ra gia đình hoàn hảo luôn. Thường là mọi người sẽ ưu tiên Ekko, vì kích được 3 hệ khác nhau, với lại do là Tái Chế nên có mảnh đồ nào thừa ra lắp cho nó cũng coi như một đồ hoàn chỉnh.\r\n\r\nBài này đánh khá đơn giản, xếp Vander lên hàng đầu và lùi đội hình xuống một ô, để đối phương bu vào đánh Vander rồi Powder tung chiêu vào cái đống đó sẽ giúp dọn dẹp rất nhanh. Điểm yếu của bài này là sát thương của bạn phải xuyên qua dàn tanker trước, nên đối phương có nhiều carry hơn là sẽ rất dễ bị thua khi kéo dài, do Powder tung chiêu rất chậm, khi carry 2 bên solo với nhau thì khỉ nó chạy tới nơi thì bên kia đã tung chiêu trước rồi.\r\n\r\nDTCL mùa 13: Bài đấu reroll 1 tiền Gia Đình siêu mạnh siêu dễ đánh\r\nĐội hình hoàn chỉnh\r\nBài Gia Đình reroll là bài quốc dân của DTCL mùa 13, hãy đánh nó khi có thể nhé.', 'tft powder.jpg', 'an', 'đăng'),
(9, 'DTCL mùa 13: Những lý do khiến bạn cần tránh xa Hóa Chủ nếu Riot không ra tay giải cứu', 'DTCL mùa 13: Những lý do khiến bạn cần tránh xa Hóa Chủ nếu Riot không ra tay giải cứu', 'Tộc Hóa Chủ được đưa vào DTCL mùa 13 để đại diện cho cơ chế Thần Tài quen thuộc, tuy vậy với những gì đang thể hiện trên máy chủ thử nghiệm PBE, thì Hóa Chủ đang tỏ ra rất đuối so với cơ chế \"nổ hũ\" kiểu cũ.\r\n\r\nĐiều quan trọng nhất là khi đánh Hóa Chủ bạn bắt buộc sẽ phải chơi thuần các tướng thuộc tộc này, vì phần thưởng khi tích số của Hóa Chủ sẽ là các trang bị chỉ có thể dùng được trên các tướng Hóa Chủ, hết còn cảnh đánh thua nổ hũ xong xoay full 5 vàng như trước nữa.\r\n\r\n\r\n\r\nMục lục\r\nẨn\r\n1. Sơ lược về Hóa Chủ\r\n2. Hóa Chủ không thực sự mạnh\r\nSơ lược về Hóa Chủ\r\nHóa Chủ: Nhận điểm Shimmer sau mỗi giao tranh, nếu chuỗi thua của bạn nhiều hơn 3 nhận thêm điểm Shimmer. Khi đủ 100 điểm, mở Chợ Đen với các món đồ đặc biệt chỉ dành riêng cho tướng Hóa Chủ, các tướng Hóa Chủ sẽ nhận thêm máu với mỗi lần bạn bỏ qua Chợ Đen.\r\n\r\nMốc 3 tướng: 15 điểm hoặc 30 nếu là chuỗi thua, 20 máu cộng thêm.\r\nMốc 4 tướng: 20 điểm hoặc 40 nếu là chuỗi thua, 50 máu cộng thêm.\r\nMốc 5 tướng: 20 điểm hoặc 60 nếu là chuỗi thua, 90 máu cộng thêm.\r\nMốc 6 tướng: 30 điểm hoặc 80 nếu là chuỗi thua, 125 máu cộng thêm.\r\nMốc 7 tướng: 30 điểm hoặc 120 nếu là chuỗi thua, 180 máu cộng thêm.\r\nNói chung cơ chế của Hóa Chủ rất đơn giản, bạn sẽ được thưởng điểm Shimmer sau mỗi trận đánh bất kể thắng thua, từ chuỗi thua 3 trở lên thì điểm Shimmer sẽ được tăng nhiều hơn, lưu ý nó không có cộng dồn, nghĩa là chuỗi thua 3 hay chuỗi thua 10 cũng chỉ cộng điểm Shimmer giống nhau. Điều này khác biệt với các tộc Thần Tài trước đây vốn theo kiểu chuỗi thua càng cao cộng càng nhiều điểm, Hóa Chủ thì điểm sẽ theo mốc tộc hệ chứ không liên quan tới chuỗi thua dài hay ngắn.\r\n\r\n\r\n\r\nMỗi khi đủ 100 điểm bạn sẽ được mở ra Chợ Đen, chứa các món đồ độc quyền chỉ có tướng Hóa Chủ dùng được, đi kèm theo đó là những thứ như tướng hay máy nhân bản cỡ nhỏ. Lưu ý kể cả tướng hay máy nhân bản cũng thuộc hệ Hóa Chủ, vì máy nhân bản này chỉ dùng được lên các tướng Hóa Chủ dưới 3 sao, còn tướng trả về luôn luôn là tướng Hóa Chủ, tức là đã đánh tộc này thì bạn phải đánh nó full hệ, không đánh thuê như các tộc Thần Tài trước được.\r\n\r\nBạn có quyền bỏ qua Chợ Đen để tích điểm, Chợ Đen điểm càng lớn thì đồ và tướng trả ra càng xịn. Hơn nữa là mỗi khi bỏ qua Chợ Đen, thì các tướng Hóa Chủ sẽ được nhận thêm máu. Ví dụ bạn có mốc 6 Hóa Chủ và bỏ quan 4 lần Chợ Đen, thì số máu cộng thêm sẽ là 125 nhân 4 = 600 máu. Trang bị trong Chợ Đen sẽ được nâng cấp theo mốc tương ứng, mặc dù chúng không thể dùng lên các tướng nào khác ngoài Hóa Chủ, nhưng bạn có thể tháo ra lắp vào tự do - chỉ cần bỏ tướng đang cầm lên hàng chờ là chúng sẽ tự bay ra ngoài, cho phép chúng ta tùy biến thoải mái.\r\n\r\n\r\n\r\nĐặc biệt ở các mốc Chợ Đen nhiều điểm các trang bị này sẽ được nhận nâng cấp tối thượng, ngoài chỉ số được tăng cường thì còn có thêm hiệu ứng cộng thêm. Ví dụ như Perfected Unleashed Toxins mỗi khi tướng đang cầm sử dụng chiêu, nó sẽ phóng ra một luồng chất độc làm choáng mọi kẻ địch trên đường bay. Hay Perfected Executioner\'s Chainblade là hành quyết kẻ địch dưới 20%, những kẻ địch bị hành quyết sẽ rơi ra 3 vàng và hồi cho chủ sở hữu 400 máu.\r\n\r\nHóa Chủ không thực sự mạnh\r\nDo ấn Hóa Chủ không thể ghép từ Xẻng hay Chảo, nên để có thể sử dụng tộc này hiệu quả bạn sẽ buộc phải đánh thuần Hóa Chủ chứ rất khó kẹp cờ như bình thường. Điểm Shimmer được tích ở thời điểm nó được bỏ vào, thí dụ bạn đang thua 2 trận và có 3 Hóa Chủ ở trận thứ 3, thì sau khi thua trận đó bạn sẽ được 30 điểm. Điểm tính theo mốc Hóa Chủ chứ không phải theo chuỗi, nên đỡ lo hơn việc bị phá chuỗi dài. Tất nhiên nếu bị mất chuỗi thì chúng ta vẫn phải đánh thua lại, nhưng khác ở chỗ chỉ cần thua 3 là trở về điểm như cũ nên phần nào đỡ khổ hơn.\r\n\r\nCác món đồ từ Chợ Đen sẽ có chất lượng luôn giống nhau nhưng thứ tự xuất hiện ngẫu nhiên, tạo ra vấn đề lớn nhất của Hóa Chủ trong DTCL mùa 13 là trang bị vô cùng khó lắp. Thường thì là bạn sẽ muốn dùng trang bị từ chợ, nhưng cũng phải lắp đồ như bình thường để còn giữ máu, từ đây nảy sinh vấn đề đồ bị trùng.\r\n\r\n\r\n\r\nLý thuyết thì đồ từ Chợ Đen sẽ dùng được cho mọi tướng Hóa Chủ, nhưng đồ trong Chợ Đen cũng chia ra đồ cho AP, AD hay Đỡ Đòn, thí dụ như Unleashed Toxins tăng AP và hồi mana theo đòn đánh giống Shojin, trong khi Destabilized Chemtank là hồi lại máu khi xuống dưới ngưỡng 50%. Nếu lỡ carry của bạn là Silco AP đã lắp 3 đồ, xong đi tích Chợ Đen cho nhiều số rồi lại mở ra Perfected Unleashed Toxins thì coi như bị trùng mất một món, cực kỳ phí.\r\n\r\nVậy nên khi chơi Hóa Chủ, dù bạn có thể sống sót được đến cuối game thì đôi khi đồ cấp cao trả về sẽ không như ý của người chơi, rất khó để tối ưu mà nhiều khi cũng không có nam châm để tháo đồ ra tối ưu lại. Do đó Hóa Chủ đang khá bị ghẻ lạnh trên PBE, các game thủ thích đánh Chinh Phục hơn vì nó cũng tích số rồi nổ hũ, nhưng hũ của Chinh Phục là mảnh đồ, vàng hay tướng... những thứ dùng trong mọi trường hợp dễ dàng. Có lẽ tộc Thần Tài của DTCL mùa 13 này sẽ phải được buff kha khá, để có thể chơi được ở bản chính thức.', 'silco.jpg', 'an', 'đăng');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `updated_at` date DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `shipping_address`, `phone_number`, `order_date`, `total_amount`, `payment_method`, `order_status`, `updated_at`, `detail`, `note`) VALUES
(27, 2, 'an', 'fadfasd', '0977551414', '2024-12-03', 15990000, 'tiền mặt', 'paid', '2024-12-03', 'x1  Máy chiếu', ''),
(28, 2, 'sadf', 'ádasd', '0977551414', '2024-12-02', 500000, 'tiền mặt', 'paid', '2024-12-03', 'x1  bảng phấn', ''),
(29, 2, 'hưng', 'long biên', '0977551414', '2024-12-04', 49475000, 'tiền mặt', 'paid', '2024-12-04', 'x1  bảng chiếu, x3  Máy chiếu, x1  phấn trắng', 'ko cần ship tận nhà đâu');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ma_loaisp` varchar(50) NOT NULL,
  `ten_loaisp` varchar(100) NOT NULL,
  `mota_loaisp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('001', 'dienthoai', '                                         nghe goi liên lacj với người ngoài                               '),
('002', ' may nghe', ' nghe nhac'),
('003', ' maychieu', 'may chieu day hoc  cho họi sinh               '),
('004', ' bangchieu', 'bảng chiếu để chiếu lên'),
('005', ' bangphan', ' bảng đển viết phấn lên'),
('006', ' phan', ' phấn viết bảng'),
('007', ' laubang', ' lau bảng phấn'),
('008', ' butlazer', 'bút chiếu lazer cho giảng viên\r\n               ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(225) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `sex` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access_lvl` int(255) NOT NULL,
  `user_create_date` date NOT NULL,
  `total_spend` int(255) NOT NULL,
  `buy_state` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`, `phone`, `sex`, `address`, `access_lvl`, `user_create_date`, `total_spend`, `buy_state`) VALUES
(1, 'minh an', 'minhanzone@gmail.com', 'an123456', 'admin', 988331616, 'male', '                                                                        hà nội                                                                                                                                                                                     ', 0, '0000-00-00', 0, ''),
(2, 'minh an', 'minhan123@gmail.com', 'an123456', 'user', 988331616, 'female', '                                                                                         hà nội, long biên                                                                                                                               ', 25, '2024-11-17', 200467000, 'have'),
(3, 'minh an', 'minhan@gmail.com', 'an123456', 'user', 0, 'male', '                                            ', 5, '2024-11-17', 18991000, 'have');

-- --------------------------------------------------------

--
-- Table structure for table `websitect2`
--

CREATE TABLE `websitect2` (
  `ma_loaisp` varchar(50) NOT NULL,
  `ten_loaisp` varchar(100) NOT NULL,
  `mota_loaisp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websitect2`
--

INSERT INTO `websitect2` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('001', 'nokia', 'dien thoai den tu thuy dien\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_product`
--
ALTER TABLE `ad_product`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitect2`
--
ALTER TABLE `websitect2`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
