-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Tem 2020, 01:03:40
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'dimg/29327DAU-ortalanmis-1-satir.png', 'DAÜ EVRAK TAKİP SİSTEMİ', 'DAÜ EVRAK TAKİP SİSTEMİ PROJESİ', 'evrak, daü', 'DAÜ EVRAK TAKİP SİSTEMİ', '+90 392 630 1484', '', '+90 392 365 0711', 'cmpe.info@emu.edu.tr', 'MAĞUSA', 'MAĞUSA', 'MAĞUSA', '7 * 24 ONLİNE', '', 'ayar_analystic', '1f42c312-9471-46ea-bfb0-662b876f3992', 'facebook.com/eastern.med.univ/', 'twitter.com/EMUOFFICIAL', 'www.google.com', 'www.youtube.com', 'mail.alanadiniz.com', '', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `derstencekilme`
--

CREATE TABLE `derstencekilme` (
  `id` int(11) NOT NULL,
  `ad` varchar(55) NOT NULL,
  `soyad` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `onum` varchar(55) NOT NULL,
  `oyil` varchar(55) NOT NULL,
  `derskod` varchar(55) NOT NULL,
  `odonem` varchar(55) NOT NULL,
  `otel` varchar(55) NOT NULL,
  `dctarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dcHoca` varchar(55) NOT NULL,
  `dcasama` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `derstencekilme`
--

INSERT INTO `derstencekilme` (`id`, `ad`, `soyad`, `email`, `onum`, `oyil`, `derskod`, `odonem`, `otel`, `dctarih`, `dcHoca`, `dcasama`) VALUES
(42, 'Oğulcan', 'Altunörgü', 'ogulcan.altunorgu@gmail.com', '15000075', '2019-2020', 'BLGM-344', 'Güz', '05338557345', '2020-07-01 00:48:47', '3', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dilekceornegi`
--

CREATE TABLE `dilekceornegi` (
  `id` int(11) NOT NULL,
  `dad` varchar(55) NOT NULL,
  `dsoyad` varchar(55) NOT NULL,
  `dnum` int(55) NOT NULL,
  `dfak` varchar(55) NOT NULL,
  `dbolum` varchar(55) NOT NULL,
  `dtel` int(55) NOT NULL,
  `dkonu` varchar(55) NOT NULL,
  `dmesaj` varchar(555) NOT NULL,
  `dasama` int(1) NOT NULL DEFAULT '0',
  `dtarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dHoca` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `dilekceornegi`
--

INSERT INTO `dilekceornegi` (`id`, `dad`, `dsoyad`, `dnum`, `dfak`, `dbolum`, `dtel`, `dkonu`, `dmesaj`, `dasama`, `dtarih`, `dHoca`) VALUES
(7, 'Ogulcan', 'Altunorgu', 15000075, 'Mühendislik Fakültesi', 'Bilgisayar Mühendisliği', 2147483647, 'Staj Evrak', 'Staj', 0, '2020-07-01 00:33:37', ''),
(8, 'Oğulcan', 'Altunorgu', 15000075, 'Mühendislik Fakültesi', 'Bilgisayar Mühendisliği', 2147483647, 'Lablar Hk.', 'Türkçe grup ve ingilizce grubun aynı anda lab yapmasını istemiyoruz. Gereğinin yapılmasını arz ederiz. ', 0, '2020-07-01 00:52:38', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `duyuru_id` int(11) NOT NULL,
  `duyuru_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duyuru_sahibi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `duyuru_icerik` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `duyuru_durum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`duyuru_id`, `duyuru_date`, `duyuru_sahibi`, `duyuru_icerik`, `duyuru_durum`) VALUES
(1, '2020-06-30 23:48:39', 'Admin', 'DAÜ Senatosunca alınan karar uyarınca, 2020 Bahar dönemi final sınavları ONLINE olarak Teams platformu üzerinden yapılacaktır.', 1),
(2, '2020-06-30 23:50:39', 'Admin', 'Yaz okulu için CMPE224 dersi açılmıştır.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `evraklar`
--

CREATE TABLE `evraklar` (
  `evrak_id` int(11) NOT NULL,
  `evrak_turu` enum('Staj Evrak','Kayıt Dondurma','Asistan Başvuru','Çift Anadal','Staj Değerlendirme Anketi','Yaz Okulu Formu','Not Değiştirme Talebi','Üniversiteden Ayrılma Talebi','Dersten Çekilme','Dilekçe') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `evrak_yolu` varchar(255) NOT NULL,
  `evrak_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `easama` int(1) DEFAULT '0',
  `ogrenciNo` int(11) NOT NULL,
  `hoca_ad` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `evraklar`
--

INSERT INTO `evraklar` (`evrak_id`, `evrak_turu`, `evrak_yolu`, `evrak_tarihi`, `easama`, `ogrenciNo`, `hoca_ad`) VALUES
(1381, 'Kayıt Dondurma', 'dimg/evrak/27027kayitdondurma (1).pdf', '2020-07-01 03:47:31', 1, 15000075, '3'),
(1382, 'Dersten Çekilme', 'dimg/evrak/25262Dersten Çekilme Talebi (22).pdf', '2020-07-01 03:50:53', 2, 15000075, '3'),
(1383, 'Dilekçe', 'dimg/evrak/31978Dilekce (8).pdf', '2020-07-01 03:53:05', 3, 15000075, '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 'digital-ad.zip', 56349, 5),
(2, 'Rapor.docx', 337159, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Temel Değerlerimiziiiiiiiii', '<p><strong>1. &Ouml;zg&uuml;r d&uuml;ş&uuml;nce </strong></p>\r\n\r\n<p><strong>2. Yaratıcılık</strong></p>\r\n\r\n<p><strong>3. Yenilik&ccedil;ilik </strong></p>\r\n\r\n<p><strong>4. Etik değerlere sahip olma </strong></p>\r\n\r\n<p><strong>5. Akademik &ouml;zg&uuml;rl&uuml;k </strong></p>\r\n\r\n<p><strong>6. Bilimsel &uuml;retkenlik </strong></p>\r\n\r\n<p><strong>7. &Ccedil;evreye duyarlılık </strong></p>\r\n\r\n<p><strong>8. Her t&uuml;rl&uuml; ayrımcılığa karşı olmak </strong></p>\r\n\r\n<p><strong>9. Toplumsal sorunlara duyarlı olmak </strong></p>\r\n\r\n<p><strong>10. Şeffaflık ve hesap verebilirlik </strong></p>\r\n\r\n<p><strong>11. İnsan odaklı y&ouml;netim </strong></p>\r\n\r\n<p><strong>12. Katılımcılık</strong></p>\r\n', 'qLAdO-jlZJY', 'Doğu Akdeniz Üniversitesi’nin vizyonu merkezinde oturduğumuz üç kıtayı birleştiren coğrafyada bilimsel üretime dayalı eğitim yapan, her zaman bölgede lider ve öğrenci ve akademisyenler tarafından en çok tercih edilen üniversite olmaktır.', 'Doğu Akdeniz Üniversitesi evrensel değerlere bağlı, uluslararası kabul görmüş akademik eğitim ölçütlerini kendine kılavuz edinmiş, toplumsal sorumluluk bilinciyle bölgesel ve uluslararası sorunlara çözüm üreten, çok kültürlülüğü, özgür düşünceyi, hoşgörüyü ve katılımcılığı içselleştirmiş mezunlar yetiştiren, uluslararası çerçevede üretim, bilim, sanat, ve sporun gelişmesine yönelik çalışmalar yürüten bir üniversite olmayı kendisine misyon edinmiştir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_resim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `kullanici_staj` int(1) DEFAULT '0',
  `kullanici_mezuniyet` int(1) DEFAULT '0',
  `kullanici_yetki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '0',
  `ogrenciNo` int(11) NOT NULL,
  `kullanici_sonip` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_staj`, `kullanici_mezuniyet`, `kullanici_yetki`, `kullanici_durum`, `ogrenciNo`, `kullanici_sonip`) VALUES
(1, '2020-01-01 15:21:45', 'dimg/kullanici/26530unnamed.jpg', 'o@gmail.com', '085084080763', 'e10adc3949ba59abbe56e057f20f883e', 'Yönetici', 'adres denemeee', 'il denemeee', 'ilçe denemeee', '1', 0, 0, '5', 1, 0, ''),
(2, '2020-03-29 00:07:55', '', 'ogulcan@gmail.com', '05338557345', 'e10adc3949ba59abbe56e057f20f883e', 'Öğrenci Oğulcan', 'Abaras Ap. Daire:3', 'İstanbul', 'Kadıköy', '0', 1, 1, '1', 1, 15000075, '::1'),
(3, '2020-03-29 00:07:55', 'dimg/kullanici/20159indir.jpg', 'ogulcan1@gmail.com', '053385573455', 'e10adc3949ba59abbe56e057f20f883e', 'Öğretmen Oğulcan', '', '', '', '0', 0, 0, '5', 1, 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_ad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_detay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '<p>adsadsads</p>\r\n', 'hakkimizda.php', 1, '1', 'hakkimizda'),
(2, '0', 'Duyurular', '', 'duyurular.php', 2, '1', 'duyurular'),
(3, '0', 'İletişim', '', 'iletisim.php', 3, '1', 'iletisim'),
(16, '', 'DENEMEM', '<p>DENEME</p>\r\n', '', 4, '0', 'denemem');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_link`, `slider_durum`) VALUES
(1, 'İlk slider', 'dimg/slider/271362343920591222331.png', 1, 'https://cmpe.emu.edu.tr/', '1'),
(2, 'İkinci Slider', 'dimg/slider/205382579030015283382.png', 2, '', '1'),
(3, 'Ücüncü Slider', 'dimg/slider/246642317925656237023.png', 3, 'https://cmpe.emu.edu.tr/', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `derstencekilme`
--
ALTER TABLE `derstencekilme`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dilekceornegi`
--
ALTER TABLE `dilekceornegi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`duyuru_id`);

--
-- Tablo için indeksler `evraklar`
--
ALTER TABLE `evraklar`
  ADD PRIMARY KEY (`evrak_id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`,`ogrenciNo`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `derstencekilme`
--
ALTER TABLE `derstencekilme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `dilekceornegi`
--
ALTER TABLE `dilekceornegi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `evraklar`
--
ALTER TABLE `evraklar`
  MODIFY `evrak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1384;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
