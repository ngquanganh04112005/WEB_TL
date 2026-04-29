-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2026 lúc 04:13 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chongame_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_danh_muc` int(11) NOT NULL,
  `ten_danh_muc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`ma_danh_muc`, `ten_danh_muc`) VALUES
(1, 'Steam Key'),
(2, 'Tài khoản Steam Offline'),
(3, 'Tài khoản Steam Online'),
(4, 'Tài khoản Steam mới + Mail');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_don_hang` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `ma_kho_hang` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `tong_tien` decimal(10,2) DEFAULT NULL,
  `ngay_mua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trang_thai` varchar(50) NOT NULL DEFAULT 'Chờ xử lý' COMMENT 'Chờ xử lý / Hoàn thành / Đã huỷ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_don_hang`, `ma_nguoi_dung`, `ma_san_pham`, `ma_kho_hang`, `email`, `so_dien_thoai`, `tong_tien`, `ngay_mua`, `trang_thai`) VALUES
(1, 2, 45, 1, 'ngquanganh411205@gmail.com', '0909090909', 99000.00, '2026-04-22 08:54:22', 'Chờ xử lý'),
(2, 1, 45, 1, 'ngquanganh411205@gmail.com', '1', 99000.00, '2026-04-22 10:58:40', 'Chờ xử lý'),
(3, 1, 8, 1, 'ngquanganh411205@gmail.com', '1', 1149000.00, '2026-04-22 10:58:53', 'Chờ xử lý'),
(4, 2, 49, 1, 'ngquanganh411205@gmail.com', '0909090909', 49000.00, '2026-04-22 17:16:14', 'Chờ xử lý'),
(5, 2, 47, 1, 'ngquanganh411205@gmail.com', '0909090909', 49000.00, '2026-04-27 08:52:02', 'Chờ xử lý'),
(6, 2, 49, 1, 'ngquanganh411205@gmail.com', '0909090909', 49000.00, '2026-04-27 08:52:02', 'Chờ xử lý'),
(7, 1, 45, 1, 'ngquanganh411205@gmail.com', '0909090909', 99000.00, '2026-04-27 08:58:13', 'Chờ xử lý'),
(8, 1, 47, 1, 'ngquanganh411205@gmail.com', '0909090909', 49000.00, '2026-04-28 01:16:19', 'Chờ xử lý'),
(9, 1, 11, 1, 'ngquanganh411205@gmail.com', '0909090909', 650000.00, '2026-04-28 01:32:57', 'Chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho_hang`
--

CREATE TABLE `kho_hang` (
  `ma_kho_hang` int(11) NOT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `thong_tin_ban_giao` text NOT NULL,
  `trang_thai` varchar(50) DEFAULT 'Con Hang',
  `ngay_nhap` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kho_hang`
--

INSERT INTO `kho_hang` (`ma_kho_hang`, `ma_san_pham`, `thong_tin_ban_giao`, `trang_thai`, `ngay_nhap`) VALUES
(1, 1, 'REAN-KEY-ABCD-1234', 'Con Hang', '2026-04-21 02:13:33'),
(2, 2, 'RAIN-KEY-WORLD-9999', 'Con Hang', '2026-04-21 02:13:33'),
(3, 3, 'DISH-2-KEY-BSAD-5555', 'Con Hang', '2026-04-21 02:13:33'),
(4, 4, 'THYM-KEY-8888-ASDF', 'Con Hang', '2026-04-21 02:13:33'),
(5, 5, 'TEKK-7-KEY-FIGHT-0000', 'Con Hang', '2026-04-21 02:13:33'),
(6, 6, 'FFXV-KEY-FINAL-7777', 'Con Hang', '2026-04-21 02:13:33'),
(7, 7, 'DAEM-KEY-MACH-1111', 'Con Hang', '2026-04-21 02:13:33'),
(8, 8, 'TLOU2-KEY-SURV-2222', 'Con Hang', '2026-04-21 02:13:33'),
(9, 9, 'DS-REMA-KEY-DARK-3333', 'Con Hang', '2026-04-21 02:13:33'),
(10, 10, 'WOLO-KEY-FALL-4444', 'Con Hang', '2026-04-21 02:13:33'),
(11, 11, 'SPID-KEY-REMA-5555', 'Con Hang', '2026-04-21 02:13:33'),
(12, 12, 'GHOST-KEY-TSUS-6666', 'Con Hang', '2026-04-21 02:13:33'),
(13, 13, 'TK: re9_new_01 | MK: pass123 | Mail: re9_mail@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(14, 14, 'TK: crimson_new | MK: pass456 | Mail: crimson@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(15, 15, 'TK: ashes_new | MK: pass789 | Mail: ashes@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(16, 16, 'TK: silent_f_new | MK: pass000 | Mail: silentf@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(17, 17, 'TK: quarry_new | MK: pass111 | Mail: quarry@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(18, 18, 'TK: outlast_new | MK: pass222 | Mail: outlast@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(19, 19, 'TK: forest_new | MK: pass333 | Mail: forest@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(20, 20, 'TK: cyberpunk_new | MK: pass444 | Mail: cp2077@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(21, 21, 'TK: fatal_frame_off | MK: off123 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(22, 22, 'TK: elin_off | MK: off456 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(23, 23, 'TK: crimson_off | MK: off789 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(24, 24, 'TK: thantrung_off | MK: off000 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(25, 25, 'TK: re9_deluxe_off | MK: off111 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(26, 26, 'TK: nioh3_off | MK: off222 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(27, 27, 'TK: lad_gaiden_off | MK: off333 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(28, 28, 'TK: ln3_off | MK: off444 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(29, 29, 'TK: batman_combo_off | MK: off555 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(30, 30, 'TK: re_series_off | MK: off666 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(31, 31, 'TK: not_human_off | MK: off777 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(32, 32, 'TK: dylight_beast_off | MK: off888 | Huong dan: Cho vao che do Offline', 'Con Hang', '2026-04-21 02:13:33'),
(33, 33, 'TK: re9_onl_88 | MK: onl123 | Mail: re9_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(34, 34, 'TK: crimson_onl | MK: onl456 | Mail: crimson_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(35, 35, 'TK: silent_f_onl | MK: onl789 | Mail: silentf_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(36, 36, 'TK: dbd_onl_pro | MK: onl000 | Mail: dbd@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(37, 37, 'TK: nmrih2_onl | MK: onl111 | Mail: nmrih2@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(38, 38, 'TK: quarry_onl | MK: onl222 | Mail: quarry_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(39, 39, 'TK: b4b_onl | MK: onl333 | Mail: b4b@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(40, 40, 'TK: outlast_onl | MK: onl444 | Mail: outlast_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(41, 41, 'TK: forest_onl | MK: onl555 | Mail: forest_onl@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(42, 42, 'TK: rust_onl | MK: onl666 | Mail: rust@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(43, 43, 'TK: dayz_onl | MK: onl777 | Mail: dayz@gmail.com', 'Con Hang', '2026-04-21 02:13:33'),
(44, 44, 'TK: dst_onl | MK: onl888 | Mail: dst@gmail.com', 'Con Hang', '2026-04-21 02:13:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `vai_tro` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `email`, `so_dien_thoai`, `ngay_tao`, `vai_tro`) VALUES
(1, 'ngquanganh411205', 'Quanglato04112005.', 'ngquanganh0411205@gmail.com', NULL, '2026-04-21 03:49:11', 1),
(2, 'doanchibinh', 'Duongqua123.', 'tieulongnu@gmail.com', NULL, '2026-04-22 08:10:35', 0),
(3, 'duongqua', 'Quanhi123#', 'ngquanganh411205@gmail.com', NULL, '2026-04-23 01:52:01', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_san_pham` int(11) NOT NULL,
  `ten_game` varchar(255) NOT NULL,
  `the_loai` varchar(100) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `anh_bia` text DEFAULT NULL,
  `gia_ban` decimal(10,2) NOT NULL,
  `ma_danh_muc` int(11) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_san_pham`, `ten_game`, `the_loai`, `mo_ta`, `anh_bia`, `gia_ban`, `ma_danh_muc`, `is_hot`) VALUES
(1, 'REANIMAL', 'Action, Adventure', 'Steam Key Bản Quyền Chính Hãng', 'https://kamikey.com/wp-content/uploads/2026/01/re-animal-Digital-Deluxe-Edition-1000x563.jpg', 450000.00, 1, 0),
(2, 'Rain World', 'Survival, Indie', 'Steam Key Global Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/11/Rain-World-1000x563.jpg', 149000.00, 1, 0),
(3, 'Dishonored 2', 'Action, Stealth', 'Steam Key Bản Quyền Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/01/Dishonored-2-1000x563.jpg', 119000.00, 1, 0),
(4, 'Thymesia', 'Action RPG', 'Steam Key Bản Quyền Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/01/Thymesia-1000x563.jpg', 149000.00, 1, 0),
(5, 'TEKKEN 7', 'Fighting', 'Steam Key Asia Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/09/tekken-7-1000x563.jpg', 249000.00, 1, 0),
(6, 'FINAL FANTASY XV WINDOWS EDITION', 'RPG', 'Steam Key Global Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/01/FINAL-FANTASY-XV-WINDOWS-EDITION-1000x563.jpg', 449000.00, 1, 0),
(7, 'Daemon X Machina: Titanic Scion', 'Action, Mecha', 'Steam Key Asia Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/09/Daemon-X-Machina-Titanic-Scion-Digital-Deluxe-Edition-1000x563.jpeg', 1149000.00, 1, 0),
(8, 'The Last of Us Part II Remastered', 'Action, Survival', 'Steam Key Asia Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/08/The-Last-of-Us-Part-II-Remastered-steam-key-1000x563.jpg', 1149000.00, 1, 0),
(9, 'DARK SOULS: REMASTERED', 'Action RPG', 'Steam Key Bản Quyền Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/01/DARK-SOULS%E2%84%A2-REMASTERED-1000x563.jpg', 449000.00, 1, 0),
(10, 'Wo Long: Fallen Dynasty', 'Action RPG', 'Steam Key Bản Quyền Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/07/wo-long-1000x563.jpg', 449000.00, 1, 0),
(11, 'Marvels Spider-Man Remastered', 'Action, Adventure', 'Steam Key Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/01/Marvels-Spider-Man-Remastered-PC-1000x563.jpg', 650000.00, 1, 0),
(12, 'Ghost of Tsushima DIRECTOR\'S CUT', 'Action, Open World', 'Steam Key Asia Chính Hãng', 'https://kamikey.com/wp-content/uploads/2025/07/Ghost-of-Tsushima-DIRECTORS-CUT-1000x563.jpg', 1149000.00, 1, 0),
(13, 'Resident Evil Requiem (RE9)', 'Horror, Action', 'Tài Khoản Steam Online + Mail', ' https://kamikey.com/wp-content/uploads/2026/02/resident-evil-requiem-standard-1000x563.jpg', 450000.00, 4, 0),
(14, 'CRIMSON DESERT', 'Action RPG, Adventure', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2026/03/crimson-desert-standard-1000x563.jpg', 749000.00, 4, 0),
(15, 'Ashes of Creation', 'MMORPG', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2026/01/Ashes-of-Creation-1000x563.jpg', 419000.00, 4, 0),
(16, 'SILENT HILL f', 'Horror', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/08/SILENT-HILL-f-1000x563.jpg', 449000.00, 4, 0),
(17, 'The Quarry Deluxe Edition', 'Horror, Adventure', 'Tài Khoản Steam Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/01/The-Quarry-Deluxe-Edition-1000x563.jpg', 249000.00, 4, 0),
(18, 'The Outlast Trials', 'Horror, Survival', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/05/The-Outlast-Trials-1000x563.jpg', 149000.00, 4, 0),
(19, 'Sons Of The Forest', 'Survival, Horror', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/01/sons-of-the-forest-banner-1000x563.jpeg', 149000.00, 4, 0),
(20, 'Cyberpunk 2077', 'Action, Open World', 'Tài Khoản Steam Mới + Mail', ' https://kamikey.com/wp-content/uploads/2024/12/Cyberpunk-2077-1000x563.jpg', 249000.00, 4, 0),
(21, 'FATAL FRAME II: Crimson Butterfly REMAKE', 'Horror', 'Tài Khoản Steam Offline Digital Deluxe Edition', ' https://kamikey.com/wp-content/uploads/2026/03/FATAL-FRAME-II-Crimson-Butterfly-REMAK-1000x563.jpg', 49000.00, 2, 0),
(22, 'Elin', 'RPG, Adventure', 'Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2026/02/elin.jpg', 49000.00, 2, 0),
(23, 'CRIMSON DESERT DENUVO + Việt Hóa', 'Action RPG', 'Chơi Luôn Không Đợi - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2026/03/crimson-desert-1000x563.jpg', 49000.00, 2, 0),
(24, 'Thần Trùng + Cỏ Máu', 'Horror, Indie', 'Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2026/02/than-trung-1000x563.jpg', 19000.00, 2, 0),
(25, 'Resident Evil Requiem (RE9) Deluxe Edition', 'Horror', 'DENUVO + Việt Hóa - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2026/01/Resident-Evil-Requiem-Deluxe-Edition-1000x563.jpg', 49000.00, 2, 0),
(26, 'Nioh 3 Digital Deluxe Edition', 'Action, Souls-like', 'Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2026/01/nioh-3-deluxe-1000x563.jpg', 49000.00, 2, 0),
(27, 'Like a Dragon Gaiden: The Man Who Erased His Name', 'Action, Adventure', 'Deluxe DENUVO - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2025/11/Like-a-Dragon-Gaiden-The-Man-Who-Erased-His-Name-1000x563.jpg', 49000.00, 2, 0),
(28, 'Little Nightmares III Deluxe Edition', 'Adventure, Horror', 'Full DLC - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2025/09/Little-Nightmares-3-1-1000x563.jpg', 49000.00, 2, 0),
(29, 'Combo 8 Game Batman: Arkham Collection', 'Action', 'Full DLC - Tài Khoản Steam Offline Nhiều Game', ' https://kamikey.com/wp-content/uploads/2025/10/Batman-Arkham-Collection.jpeg', 50000.00, 2, 0),
(30, 'Combo 12 Game Resident Evil Series', 'Horror', 'Remake 2-3-4 + 5-6-7-8-9 + DLC DENUVO', ' https://kamikey.com/wp-content/uploads/2025/10/combo-resident-evil-full-game-1000x559.jpg', 149000.00, 2, 0),
(31, 'No, I am not a Human', 'Horror', 'Full DLC + Việt Hóa - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2025/09/No-Im-not-a-Human-1000x563.jpg', 29000.00, 2, 0),
(32, 'Dying Light: The Beast Deluxe Edition', 'Action, Survival', 'Việt Hóa - Tài Khoản Steam Offline', ' https://kamikey.com/wp-content/uploads/2025/09/dying-light-the-beast-1000x563.jpg', 49000.00, 2, 0),
(33, 'Resident Evil Requiem (RE9)', 'Horror', 'Tài Khoản Steam Online + Mail', ' https://kamikey.com/wp-content/uploads/2026/02/resident-evil-requiem-standard-1000x563.jpg', 549000.00, 3, 0),
(34, 'CRIMSON DESERT', 'Action RPG', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2026/03/crimson-desert-standard-1000x563.jpg', 749000.00, 3, 0),
(35, 'SILENT HILL f', 'Horror', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/08/SILENT-HILL-f-1000x563.jpg', 449000.00, 3, 0),
(36, 'Dead by Daylight', 'Horror, Survival', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/11/Dead-by-Daylight-1000x563.jpg', 149000.00, 3, 0),
(37, 'No More Room in Hell 2', 'Action, Horror', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/08/No-More-Room-in-Hell-2-1000x563.jpg', 249000.00, 3, 0),
(38, 'The Quarry Deluxe Edition', 'Horror, Adventure', 'Tài Khoản Steam Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/01/The-Quarry-Deluxe-Edition-1000x563.jpg', 149000.00, 3, 0),
(39, 'Back 4 Blood', 'Action, Shooter', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/02/back4blood-1000x563.jpg', 149000.00, 3, 0),
(40, 'The Outlast Trials', 'Horror, Survival', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/05/The-Outlast-Trials-1000x563.jpg', 149000.00, 3, 0),
(41, 'The Forest', 'Survival, Horror', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/04/the-forest.jpg', 49000.00, 3, 0),
(42, 'Rust', 'Survival', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/04/rust.jpg', 249000.00, 3, 0),
(43, 'DayZ', 'Survival, Horror', 'Tài Khoản Steam Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/04/day-z-1000x563.jpg', 449000.00, 3, 0),
(44, 'Do not Starve Together', 'Survival, Indie', 'Tài Khoản Steam Online Mới + Mail', ' https://kamikey.com/wp-content/uploads/2025/03/Dont-Starve-Together-1000x563.jpg', 49000.00, 3, 0),
(45, 'PRAGMATA Deluxe Edition', NULL, 'Chơi Ngay Khi Ra Mắt DENUVO – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2026/03/PRAGMATA-deluxe-banner-1000x563.jpg', 99000.00, 2, 1),
(46, 'The Scourge (Tai Ương 1 + 2)', NULL, 'Bản Full Mới Nhất – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2025/01/mua-game-the-scourge-tai-uong-1000x563.jpg', 19000.00, 2, 1),
(47, 'DEATH STRANDING 2: ON THE BEACH', NULL, 'Digital Deluxe + Việt Hóa – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2026/03/DEATH-STRANDING-2-ON-THE-BEACH-Deluxe-1000x563.jpg', 49000.00, 2, 1),
(49, 'Football Manager 26 + DLC', NULL, 'In-Game Editor DENUVO – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2025/10/football-manager-2026-1000x563.jpg', 49000.00, 2, 1),
(50, 'Stellar Blade Complete Edition', NULL, 'Việt Hóa DENUVO – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2025/05/stellar-blade-offline-1000x563.jpg', 49000.00, 2, 1),
(51, 'Black Myth: Wukong', NULL, 'DENUVO + Việt Hóa – Tài Khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2024/12/black-myth-wukong-steam-offline-mode-1000x563.jpg', 49000.00, 2, 1),
(53, 'Monster Hunter Stories 3', NULL, 'Việt Hóa DENUVO cực hay', 'https://kamikey.com/wp-content/uploads/2026/03/Monster-Hunter-Stories-3-Twisted-Reflection-1000x563.jpg', 49000.00, 2, 1),
(54, 'HELLDIVERS 2', NULL, 'Việt hoá + Denuvo - Tài khoản Steam Offline', 'https://kamikey.com/wp-content/uploads/2025/06/cach-mua-steam-key-helldivers-2.jpg', 65000.00, 2, 1),
(57, 'Grand Theft Auto V (GTA 5)', 'Action', 'Grand Theft Auto V (GTA 5) – Tài Khoản Steam Online Mới + Mail', 'https://kamikey.com/wp-content/uploads/2024/12/gta-5-steam-1000x563.jpg', 320000.00, 4, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_danh_muc`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_don_hang`),
  ADD KEY `ma_nguoi_dung` (`ma_nguoi_dung`),
  ADD KEY `ma_san_pham` (`ma_san_pham`),
  ADD KEY `ma_kho_hang` (`ma_kho_hang`);

--
-- Chỉ mục cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD PRIMARY KEY (`ma_kho_hang`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_san_pham`),
  ADD KEY `ma_danh_muc` (`ma_danh_muc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_danh_muc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  MODIFY `ma_kho_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`ma_kho_hang`) REFERENCES `kho_hang` (`ma_kho_hang`);

--
-- Các ràng buộc cho bảng `kho_hang`
--
ALTER TABLE `kho_hang`
  ADD CONSTRAINT `kho_hang_ibfk_1` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`ma_danh_muc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
