/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : tmo

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 27/12/2020 01:42:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bandara
-- ----------------------------
DROP TABLE IF EXISTS `bandara`;
CREATE TABLE `bandara`  (
  `id_bandara` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bandara` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_bandara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_bandara`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bandara
-- ----------------------------
INSERT INTO `bandara` VALUES (2, 'BTJ', 'Sultan Iskandar Muda, Banda Aceh');
INSERT INTO `bandara` VALUES (3, 'MES', 'Polonia, Medan');
INSERT INTO `bandara` VALUES (4, 'BTH', 'Hang Nadim, Batam');
INSERT INTO `bandara` VALUES (5, 'TNJ', 'Raja Haji Fisabilillah, Tanjung Pinang');
INSERT INTO `bandara` VALUES (6, 'PKU', 'Sultan Syarif Kasim II, Pekanbaru');
INSERT INTO `bandara` VALUES (7, 'PDG', 'Minangkabau, Padang');
INSERT INTO `bandara` VALUES (8, 'PLM', 'Sultan Mahmud Badaruddin II, Palembang');
INSERT INTO `bandara` VALUES (9, 'BKS', 'Fatmawati Soekarno, Bengkulu');
INSERT INTO `bandara` VALUES (10, 'TKG', 'Radin Inten II, Bandar Lampung');
INSERT INTO `bandara` VALUES (11, 'CGK', 'Soekarno-Hatta, Banten');
INSERT INTO `bandara` VALUES (12, 'HLP', 'Halim Perdanakusuma, Jakarta');
INSERT INTO `bandara` VALUES (13, 'SUB', 'Juanda');
INSERT INTO `bandara` VALUES (14, 'SOC', 'Adisumarmo, Solo');
INSERT INTO `bandara` VALUES (15, 'JOG', 'Adi Sucipto, Yogyakarta');
INSERT INTO `bandara` VALUES (16, 'SRG', 'Achmad Yani, Semarang');
INSERT INTO `bandara` VALUES (17, 'BDO', 'Husein Sastranegara, Bandung');
INSERT INTO `bandara` VALUES (18, 'DPS', 'Ngurah Rai, Denpasar');
INSERT INTO `bandara` VALUES (19, 'AMI', 'Selaparang, Mataram');
INSERT INTO `bandara` VALUES (20, 'KOE', 'El Tari, Kupang');
INSERT INTO `bandara` VALUES (21, 'BPN', 'Sepinggan, Balikpapan');
INSERT INTO `bandara` VALUES (22, 'PNK', 'Supadio, Pontianak');
INSERT INTO `bandara` VALUES (23, 'TRK', 'Juwata, Tarakan');
INSERT INTO `bandara` VALUES (24, 'UPG', 'Sultan Hasanuddin, Makassar');
INSERT INTO `bandara` VALUES (25, 'MDC', 'Sam Ratulangi, Manado');
INSERT INTO `bandara` VALUES (26, 'AMQ', 'Pattimura, Ambon');
INSERT INTO `bandara` VALUES (27, 'DJJ', 'Sentani, Jayapura');
INSERT INTO `bandara` VALUES (28, 'BIK', 'Frans Kaisiepo, Biak');
INSERT INTO `bandara` VALUES (29, 'TIM', 'Mozes Kilangin, Tembagapura');
INSERT INTO `bandara` VALUES (30, 'MKQ', 'Mopah, Merauke');
INSERT INTO `bandara` VALUES (31, 'SBG', 'Maimun Saleh, Sabang');
INSERT INTO `bandara` VALUES (32, 'LSX', 'Lhok Sukon, Aceh Utara');
INSERT INTO `bandara` VALUES (33, 'LSW', 'Malikus Saleh, Lhokseumawe');
INSERT INTO `bandara` VALUES (34, 'MEQ', 'Cut Nyak Dhien, Nagan Raya');
INSERT INTO `bandara` VALUES (35, 'TPK', 'Teuku Cut Ali, Tapaktuan');
INSERT INTO `bandara` VALUES (36, 'SKL', 'Syekh Hamzah Fansyuri, Singkil');
INSERT INTO `bandara` VALUES (37, 'SNB', 'Lasikin, Sinabang');
INSERT INTO `bandara` VALUES (38, 'SIW', 'Sibisa, Toba Samosir');
INSERT INTO `bandara` VALUES (39, 'SQT', 'Silangit, Siborong-borong');
INSERT INTO `bandara` VALUES (40, 'SIX', 'Dr. Ferdinand Lumban Tobing, Sibolga');
INSERT INTO `bandara` VALUES (41, 'AEG', 'Aek Godang, Padang Sidempuan');
INSERT INTO `bandara` VALUES (42, 'GNS', 'Binaka, Gunung Sitoli');
INSERT INTO `bandara` VALUES (43, 'LSE', 'Lasondre, Pulau-pulau Batu');
INSERT INTO `bandara` VALUES (44, 'DUM', 'Pinang Kampai, Dumai');
INSERT INTO `bandara` VALUES (45, 'SEQ', 'Sungai Pakning, Bengkalis');
INSERT INTO `bandara` VALUES (46, 'PPR', 'Pasir Pangaraian, Pasir Pangaraian');
INSERT INTO `bandara` VALUES (47, 'SIQ', 'Dabo, Singkep');
INSERT INTO `bandara` VALUES (48, 'RGT', 'Japura, Rengkat');
INSERT INTO `bandara` VALUES (49, 'TJB', 'Sei Bati, Karimun');
INSERT INTO `bandara` VALUES (50, 'NTX', 'Ranai, Natuna');
INSERT INTO `bandara` VALUES (51, 'MWK', 'Matak, Pal Matak');
INSERT INTO `bandara` VALUES (52, 'RKO', 'Rokot, Sipura');
INSERT INTO `bandara` VALUES (53, 'DJB', 'Sultan Thaha Syarifuddin, Jambi');
INSERT INTO `bandara` VALUES (54, 'KRC', 'Depati Parbo, Kerinci');
INSERT INTO `bandara` VALUES (55, 'MPC', 'Mukomuko, Mukomuko');
INSERT INTO `bandara` VALUES (56, 'PGK', 'Depati Amir, Pangkalpinang');
INSERT INTO `bandara` VALUES (57, 'TJQ', 'H.A.S. Hanandjoeddin, Tanjung Pandan');
INSERT INTO `bandara` VALUES (58, 'LLG', 'Silampari, Lubuklinggau');
INSERT INTO `bandara` VALUES (59, 'PDO', 'Pendopo, Empat Lawang');
INSERT INTO `bandara` VALUES (60, 'PCB', 'Pondok Cabe, Pamulang');
INSERT INTO `bandara` VALUES (61, 'PPJ', 'Pulau Panjang, Kepulauan Seribu');
INSERT INTO `bandara` VALUES (62, 'TSY', 'Cibeureum, Tasikmalaya');
INSERT INTO `bandara` VALUES (63, 'CBN', 'Cakrabhuwana, Cirebon');
INSERT INTO `bandara` VALUES (64, 'CXP', 'Tunggul Wulung, Cilacap');
INSERT INTO `bandara` VALUES (65, 'PWL', 'Wirasaba, Purbalingga');
INSERT INTO `bandara` VALUES (66, 'KWB', 'Dewa Baru, Karimunjawa');
INSERT INTO `bandara` VALUES (67, 'CPF', 'Ngloram, Cepu');
INSERT INTO `bandara` VALUES (68, 'MLG', 'Abdul Rachman Saleh, Malang');
INSERT INTO `bandara` VALUES (69, 'SUP', 'Trunojoyo, Sumenep');
INSERT INTO `bandara` VALUES (70, 'MSI', 'Masalembo, Masalembo');
INSERT INTO `bandara` VALUES (71, 'SWQ', 'Brangbiji, Sumbawa Besar');
INSERT INTO `bandara` VALUES (72, 'LYK', 'Lunyuk, Sumbawa');
INSERT INTO `bandara` VALUES (73, 'BMU', 'Muhammad Salahuddin, Bima');
INSERT INTO `bandara` VALUES (74, 'LBJ', 'Komodo, Manggarai Barat');
INSERT INTO `bandara` VALUES (75, 'RTG', 'Frans Sales Lega, Ruteng');
INSERT INTO `bandara` VALUES (76, 'TMC', 'Tambolaka, Waikabubak');
INSERT INTO `bandara` VALUES (77, 'WGP', 'Mau Hau, Waingapu');
INSERT INTO `bandara` VALUES (78, 'BJW', 'Soa, Bajawa');
INSERT INTO `bandara` VALUES (79, 'ENE', 'H Hasan Aroeboesman, Ende');
INSERT INTO `bandara` VALUES (80, 'MOF', 'Wai Oti, Maumere');
INSERT INTO `bandara` VALUES (81, 'LKA', 'Gewayantana, Larantuka');
INSERT INTO `bandara` VALUES (82, 'LWE', 'Wonopito, Lewoleba');
INSERT INTO `bandara` VALUES (83, 'ARD', 'Mali, Alor');
INSERT INTO `bandara` VALUES (84, 'RTI', 'Lekunik, Rote');
INSERT INTO `bandara` VALUES (85, 'SAU', 'Tardamu, Pulau Sawu');
INSERT INTO `bandara` VALUES (86, 'ABU', 'Haliwen, Atambua');
INSERT INTO `bandara` VALUES (87, 'KTG', 'Rahadi Oesman, Ketapang');
INSERT INTO `bandara` VALUES (88, 'SQG', 'Susilo, Sintang');
INSERT INTO `bandara` VALUES (89, 'NPO', 'Nanga Pinoh, Nanga Pinoh');
INSERT INTO `bandara` VALUES (90, 'PSU', 'Pangsuma, Putussibau');
INSERT INTO `bandara` VALUES (91, 'PKY', 'Tjilik Riwut, Palangka Raya');
INSERT INTO `bandara` VALUES (92, 'PKN', 'Iskandar, Pangkalan Bun');
INSERT INTO `bandara` VALUES (93, 'TBM', 'Tumbang Samba, Katingan');
INSERT INTO `bandara` VALUES (94, 'SMQ', 'H. Asan, Sampit');
INSERT INTO `bandara` VALUES (95, 'MTW', 'Beringin, Muara Teweh');
INSERT INTO `bandara` VALUES (96, 'BDJ', 'Syamsuddin Noor, Banjarmasin');
INSERT INTO `bandara` VALUES (97, 'TJG', 'Warukin, Tanjung');
INSERT INTO `bandara` VALUES (98, 'BTW', 'Bersujud, Batulicin');
INSERT INTO `bandara` VALUES (99, 'KBU', 'Stagen, Kotabaru');
INSERT INTO `bandara` VALUES (100, 'SRI', 'Temindung, Samarinda');
INSERT INTO `bandara` VALUES (101, 'NNX', 'Nunukan, Nunukan');
INSERT INTO `bandara` VALUES (102, 'LBW', 'Yuvai Semaring, Krayan');
INSERT INTO `bandara` VALUES (103, 'BYQ', 'Bunyu, Pulau Bunyu');
INSERT INTO `bandara` VALUES (104, 'MLN', 'R.A Bessing, Malinau');
INSERT INTO `bandara` VALUES (105, 'LPU', 'Long Ampung, Kayan Selatan');
INSERT INTO `bandara` VALUES (106, 'TJS', 'Tanjung Harapan, Tanjung Selor');
INSERT INTO `bandara` VALUES (107, 'NAF', 'Banaina, Bulungan');
INSERT INTO `bandara` VALUES (108, 'BEJ', 'Kalimarau, Tanjung Redeb');
INSERT INTO `bandara` VALUES (109, 'SGQ', 'Sangkimah, Sangatta');
INSERT INTO `bandara` VALUES (110, 'BXT', 'Bontang, Bontang');
INSERT INTO `bandara` VALUES (111, 'TSX', 'Tanjung Santan, Marang Kayu');
INSERT INTO `bandara` VALUES (112, 'KOD', 'Kotabangun, Kutai Kartanegara');
INSERT INTO `bandara` VALUES (113, 'SZH', 'Senipah, Kutai Kartanegara');
INSERT INTO `bandara` VALUES (114, 'MLK', 'Melalan, Melak');
INSERT INTO `bandara` VALUES (115, 'DTD', 'Datah Dawai, Kutai Barat');
INSERT INTO `bandara` VALUES (116, 'TNB', 'Tanah Grogot, Tanah Grogot');
INSERT INTO `bandara` VALUES (117, '???', 'Tanjung Bara, Sangatta');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `value` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_config`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 'Next Innovation', 'Company Name');
INSERT INTO `config` VALUES (2, 'Permata Buah Batu Residence', 'Company Address');
INSERT INTO `config` VALUES (3, '087709020299', 'Company Phone');
INSERT INTO `config` VALUES (4, 'images/logo/logo.png', 'Company Logo');
INSERT INTO `config` VALUES (5, 'images/logo/logo.png', 'Company Icon');
INSERT INTO `config` VALUES (6, 'light', 'Header Menu');
INSERT INTO `config` VALUES (7, 'light', 'Header Base');
INSERT INTO `config` VALUES (8, 'light', 'Aside');
INSERT INTO `config` VALUES (9, 'light', 'Brand');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `fid_maskapai_detail` int(11) NULL DEFAULT NULL,
  `kota_asal` int(11) NULL DEFAULT NULL,
  `kota_tujuan` int(11) NULL DEFAULT NULL,
  `jumlah_max` decimal(3, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES (1, '2020-12-27', 1, 2, 3, 1);

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota`  (
  `id_kota` int(4) NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kota`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES (1101, 'ACEH SELATAN');
INSERT INTO `kota` VALUES (1102, 'ACEH TENGGARA');
INSERT INTO `kota` VALUES (1103, 'ACEH TIMUR');
INSERT INTO `kota` VALUES (1104, 'ACEH TENGAH');
INSERT INTO `kota` VALUES (1105, 'ACEH BARAT');
INSERT INTO `kota` VALUES (1106, 'ACEH BESAR');
INSERT INTO `kota` VALUES (1107, 'P I D I E');
INSERT INTO `kota` VALUES (1108, 'ACEH UTARA');
INSERT INTO `kota` VALUES (1109, 'SIMEULUE');
INSERT INTO `kota` VALUES (1110, 'ACEH SINGKIL');
INSERT INTO `kota` VALUES (1111, 'ACEH TAMIANG');
INSERT INTO `kota` VALUES (1112, 'GAYO LUES');
INSERT INTO `kota` VALUES (1113, 'BIREUEN');
INSERT INTO `kota` VALUES (1114, 'ACEH JAYA');
INSERT INTO `kota` VALUES (1115, 'NAGAN RAYA');
INSERT INTO `kota` VALUES (1116, 'ACEH BARAT DAYA');
INSERT INTO `kota` VALUES (1171, 'KOTA BANDA ACEH');
INSERT INTO `kota` VALUES (1172, 'KOTA SABANG');
INSERT INTO `kota` VALUES (1173, 'KOTA LANGSA');
INSERT INTO `kota` VALUES (1201, 'NIAS');
INSERT INTO `kota` VALUES (1202, 'MANDAILING NATAL');
INSERT INTO `kota` VALUES (1203, 'TAP.SELATAN');
INSERT INTO `kota` VALUES (1204, 'TAP.TENGAH');
INSERT INTO `kota` VALUES (1205, 'LABUHAN BATU');
INSERT INTO `kota` VALUES (1206, 'ASAHAN');
INSERT INTO `kota` VALUES (1207, 'KAB. SIMALUNGUN');
INSERT INTO `kota` VALUES (1208, 'KAB. DAIRI');
INSERT INTO `kota` VALUES (1209, 'KAB. KARO');
INSERT INTO `kota` VALUES (1210, 'DELI SERDANG');
INSERT INTO `kota` VALUES (1211, 'LANGKAT');
INSERT INTO `kota` VALUES (1215, 'TOBA SAMOSIR');
INSERT INTO `kota` VALUES (1216, 'TAP.UTARA');
INSERT INTO `kota` VALUES (1271, 'KODYA SIBOLGA');
INSERT INTO `kota` VALUES (1272, 'KOTA TANJUNG BALAI');
INSERT INTO `kota` VALUES (1273, 'KOTA PEMATANG SIANTAR');
INSERT INTO `kota` VALUES (1274, 'TEBING TINGGI');
INSERT INTO `kota` VALUES (1275, 'KOTA MEDAN');
INSERT INTO `kota` VALUES (1276, 'BINJAI');
INSERT INTO `kota` VALUES (1278, 'KOTA PADANGSIDIMPUAN');
INSERT INTO `kota` VALUES (1301, 'KAB. PESISIR SELATAN');
INSERT INTO `kota` VALUES (1302, 'KABUPATEN SOLOK');
INSERT INTO `kota` VALUES (1303, 'KAB SWL/SIJUNJUNG');
INSERT INTO `kota` VALUES (1304, 'KAB TANAH DATAR');
INSERT INTO `kota` VALUES (1305, 'KAB. PADANG PARIAMAN');
INSERT INTO `kota` VALUES (1306, 'A G A M');
INSERT INTO `kota` VALUES (1307, 'LIMA PULUH KOTA');
INSERT INTO `kota` VALUES (1308, 'PASAMAN');
INSERT INTO `kota` VALUES (1309, 'KAB. KEPULAUAN MENTAWAI');
INSERT INTO `kota` VALUES (1371, 'KOTA PADANG');
INSERT INTO `kota` VALUES (1372, 'KODYA SOLOK');
INSERT INTO `kota` VALUES (1373, 'KOTAMADYA SAWAHLUNTO');
INSERT INTO `kota` VALUES (1374, 'KOTA PADANG PANJANG');
INSERT INTO `kota` VALUES (1375, 'BUKITTINGGI');
INSERT INTO `kota` VALUES (1376, 'PAYAKUMBUH');
INSERT INTO `kota` VALUES (1377, 'KOTA PARIAMAN');
INSERT INTO `kota` VALUES (1401, 'INDRAGIRI HULU');
INSERT INTO `kota` VALUES (1402, 'INDRAGIRI HILIR');
INSERT INTO `kota` VALUES (1403, 'KEPULAUAN RIAU');
INSERT INTO `kota` VALUES (1404, 'PELALAWAN');
INSERT INTO `kota` VALUES (1405, 'S I A K');
INSERT INTO `kota` VALUES (1406, 'K A M P A R');
INSERT INTO `kota` VALUES (1407, 'ROKAN HULU');
INSERT INTO `kota` VALUES (1408, 'BENGKALIS');
INSERT INTO `kota` VALUES (1409, 'ROKAN HILIR');
INSERT INTO `kota` VALUES (1410, 'KARIMUN');
INSERT INTO `kota` VALUES (1411, 'NATUNA');
INSERT INTO `kota` VALUES (1412, 'KUANTAN SINGINGI');
INSERT INTO `kota` VALUES (1471, 'PEKANBARU');
INSERT INTO `kota` VALUES (1473, 'KOTA BATAM');
INSERT INTO `kota` VALUES (1474, 'TANJUNGPINANG');
INSERT INTO `kota` VALUES (1475, 'D U M A I');
INSERT INTO `kota` VALUES (1501, 'KERINCI');
INSERT INTO `kota` VALUES (1502, 'MERANGIN');
INSERT INTO `kota` VALUES (1503, 'SAROLANGUN');
INSERT INTO `kota` VALUES (1504, 'KAB. BATANGHARI');
INSERT INTO `kota` VALUES (1505, 'KAB. MUARO JAMBI');
INSERT INTO `kota` VALUES (1506, 'KAB.TANJUNG JABUNG TIMUR');
INSERT INTO `kota` VALUES (1507, 'KAB.TANJUNG JABUNG BARAT');
INSERT INTO `kota` VALUES (1508, 'TEBO');
INSERT INTO `kota` VALUES (1509, 'BUNGO');
INSERT INTO `kota` VALUES (1571, 'KOTA JAMBI');
INSERT INTO `kota` VALUES (1601, 'OGAN KOM. ULU');
INSERT INTO `kota` VALUES (1602, 'OGAN KOMERING ILIR');
INSERT INTO `kota` VALUES (1603, 'MUARA ENIM');
INSERT INTO `kota` VALUES (1604, 'LAHAT');
INSERT INTO `kota` VALUES (1605, 'MUSI RAWAS');
INSERT INTO `kota` VALUES (1606, 'MUSI BANYUASIN');
INSERT INTO `kota` VALUES (1607, 'BANYUASIN');
INSERT INTO `kota` VALUES (1608, '');
INSERT INTO `kota` VALUES (1671, 'PALEMBANG');
INSERT INTO `kota` VALUES (1672, '');
INSERT INTO `kota` VALUES (1673, '');
INSERT INTO `kota` VALUES (1674, 'KOTA PRABUMULIH');
INSERT INTO `kota` VALUES (1675, 'PAGAR ALAM');
INSERT INTO `kota` VALUES (1676, 'LUBUK LINGGAU');
INSERT INTO `kota` VALUES (1701, 'BENGKULU SELATAN');
INSERT INTO `kota` VALUES (1702, 'REJANG LEBONG');
INSERT INTO `kota` VALUES (1703, 'BENGKULU UTARA');
INSERT INTO `kota` VALUES (1771, 'KOTA BENGKULU');
INSERT INTO `kota` VALUES (1801, 'LAMPUNG SELATAN');
INSERT INTO `kota` VALUES (1802, 'LAMPUNG TENGAH');
INSERT INTO `kota` VALUES (1803, 'LAMPUNG UTARA');
INSERT INTO `kota` VALUES (1804, 'LAMPUNG BARAT');
INSERT INTO `kota` VALUES (1805, 'TULANG BAWANG');
INSERT INTO `kota` VALUES (1806, 'TANGGAMUS');
INSERT INTO `kota` VALUES (1808, 'WAY KANAN');
INSERT INTO `kota` VALUES (1810, 'LAMPUNG TIMUR');
INSERT INTO `kota` VALUES (1811, 'LAMPUNG TENGAH');
INSERT INTO `kota` VALUES (1871, 'BANDAR LAMPUNG');
INSERT INTO `kota` VALUES (1872, 'METRO');
INSERT INTO `kota` VALUES (1879, 'METRO II');
INSERT INTO `kota` VALUES (1901, 'B A N G K A');
INSERT INTO `kota` VALUES (1902, 'B E L I T U N G');
INSERT INTO `kota` VALUES (1903, 'BANGKA BARAT');
INSERT INTO `kota` VALUES (1904, 'BANGKA TENGAH');
INSERT INTO `kota` VALUES (1905, 'BANGKA SELATAN');
INSERT INTO `kota` VALUES (1906, 'BELITUNG TIMUR');
INSERT INTO `kota` VALUES (1971, 'PANGKALPINANG');
INSERT INTO `kota` VALUES (3171, 'JAKARTA SELATAN');
INSERT INTO `kota` VALUES (3172, 'JAKARTA TIMUR');
INSERT INTO `kota` VALUES (3173, 'JAKARTA PUSAT');
INSERT INTO `kota` VALUES (3174, 'JAKARTA BARAT');
INSERT INTO `kota` VALUES (3175, 'JAKARTA UTARA');
INSERT INTO `kota` VALUES (3176, 'KEPULAUAN SERIBU');
INSERT INTO `kota` VALUES (3203, 'BOGOR');
INSERT INTO `kota` VALUES (3204, 'SUKABUMI');
INSERT INTO `kota` VALUES (3205, 'CIANJUR');
INSERT INTO `kota` VALUES (3206, 'KABUPATEN BANDUNG');
INSERT INTO `kota` VALUES (3207, 'GARUT');
INSERT INTO `kota` VALUES (3208, 'TASIKMALAYA');
INSERT INTO `kota` VALUES (3209, 'CIAMIS');
INSERT INTO `kota` VALUES (3210, 'KUNINGAN');
INSERT INTO `kota` VALUES (3211, 'KABUPATEN CIREBON');
INSERT INTO `kota` VALUES (3212, 'MAJALENGKA');
INSERT INTO `kota` VALUES (3213, 'SUMEDANG');
INSERT INTO `kota` VALUES (3214, 'KABUPATEN INDRAMAYU');
INSERT INTO `kota` VALUES (3215, 'S U B A N G');
INSERT INTO `kota` VALUES (3216, 'PURWAKARTA');
INSERT INTO `kota` VALUES (3217, 'KARAWANG');
INSERT INTO `kota` VALUES (3218, 'BEKASI');
INSERT INTO `kota` VALUES (3220, 'KARAWANG (DATA LAMA)');
INSERT INTO `kota` VALUES (3271, 'KOTA BOGOR');
INSERT INTO `kota` VALUES (3272, 'KOTA SUKABUMI');
INSERT INTO `kota` VALUES (3273, 'KOTA BANDUNG');
INSERT INTO `kota` VALUES (3274, 'KOTA CIREBON');
INSERT INTO `kota` VALUES (3275, 'KOTA BEKASI');
INSERT INTO `kota` VALUES (3276, 'KODYA BEKASI');
INSERT INTO `kota` VALUES (3277, 'KOTA DEPOK');
INSERT INTO `kota` VALUES (3278, 'CILEGON');
INSERT INTO `kota` VALUES (3279, 'BANJAR');
INSERT INTO `kota` VALUES (3280, 'KOTA CIMAHI');
INSERT INTO `kota` VALUES (3301, 'CILACAP');
INSERT INTO `kota` VALUES (3302, 'BANYUMAS');
INSERT INTO `kota` VALUES (3303, 'PURBALINGGA');
INSERT INTO `kota` VALUES (3304, 'BANJARNEGARA');
INSERT INTO `kota` VALUES (3305, 'KEBUMEN');
INSERT INTO `kota` VALUES (3306, 'PURWOREJO');
INSERT INTO `kota` VALUES (3307, 'WONOSOBO');
INSERT INTO `kota` VALUES (3308, 'KABUPATEN MAGELANG');
INSERT INTO `kota` VALUES (3309, 'BOYOLALI');
INSERT INTO `kota` VALUES (3310, 'KLATEN');
INSERT INTO `kota` VALUES (3311, 'SUKOHARJO');
INSERT INTO `kota` VALUES (3312, 'WONOGIRI');
INSERT INTO `kota` VALUES (3313, 'KARANGANYAR');
INSERT INTO `kota` VALUES (3314, 'SRAGEN');
INSERT INTO `kota` VALUES (3315, 'GROBOGAN');
INSERT INTO `kota` VALUES (3316, 'BLORA');
INSERT INTO `kota` VALUES (3317, 'REMBANG');
INSERT INTO `kota` VALUES (3318, 'PATI');
INSERT INTO `kota` VALUES (3319, 'KUDUS');
INSERT INTO `kota` VALUES (3320, 'JEPARA');
INSERT INTO `kota` VALUES (3321, 'DEMAK');
INSERT INTO `kota` VALUES (3322, 'SEMARANG');
INSERT INTO `kota` VALUES (3323, 'TEMANGGUNG');
INSERT INTO `kota` VALUES (3324, 'KAB.KENDAL');
INSERT INTO `kota` VALUES (3325, 'BATANG');
INSERT INTO `kota` VALUES (3326, 'PEKALONGAN');
INSERT INTO `kota` VALUES (3327, 'PEMALANG');
INSERT INTO `kota` VALUES (3328, 'KAB TEGAL');
INSERT INTO `kota` VALUES (3329, 'KAB BREBES');
INSERT INTO `kota` VALUES (3371, 'KOTA MAGELANG');
INSERT INTO `kota` VALUES (3372, 'SURAKARTA');
INSERT INTO `kota` VALUES (3373, 'KOTA SALATIGA');
INSERT INTO `kota` VALUES (3375, 'KOTA PEKALONGAN');
INSERT INTO `kota` VALUES (3376, 'KOTA TEGAL');
INSERT INTO `kota` VALUES (3401, 'KULONPROGO');
INSERT INTO `kota` VALUES (3402, 'B A N T U L');
INSERT INTO `kota` VALUES (3403, 'GUNUNGKIDUL');
INSERT INTO `kota` VALUES (3404, 'S L E M A N');
INSERT INTO `kota` VALUES (3471, 'KOTA JOGJAKARTA');
INSERT INTO `kota` VALUES (3501, 'KAB.PACITAN');
INSERT INTO `kota` VALUES (3502, 'KAB.PONOROGO');
INSERT INTO `kota` VALUES (3503, 'TRENGGALEK');
INSERT INTO `kota` VALUES (3504, 'TULUNGAGUNG');
INSERT INTO `kota` VALUES (3505, 'BLITAR');
INSERT INTO `kota` VALUES (3506, 'KAB. KEDIRI');
INSERT INTO `kota` VALUES (3507, 'KABUPATEN MALANG');
INSERT INTO `kota` VALUES (3508, 'LUMAJANG');
INSERT INTO `kota` VALUES (3509, 'JEMBER');
INSERT INTO `kota` VALUES (3510, 'BANYUWANGI');
INSERT INTO `kota` VALUES (3511, 'BONDOWOSO');
INSERT INTO `kota` VALUES (3513, 'KAB. PROBOLINGGO');
INSERT INTO `kota` VALUES (3514, 'KABUPATEN PASURUAN');
INSERT INTO `kota` VALUES (3515, 'SIDOARJO');
INSERT INTO `kota` VALUES (3516, 'MOJOKERTO');
INSERT INTO `kota` VALUES (3517, 'JOMBANG');
INSERT INTO `kota` VALUES (3518, 'KAB. NGANJUK');
INSERT INTO `kota` VALUES (3519, 'KAB.MADIUN');
INSERT INTO `kota` VALUES (3520, 'MAGETAN');
INSERT INTO `kota` VALUES (3521, 'NGAWI');
INSERT INTO `kota` VALUES (3522, 'BOJONEGORO');
INSERT INTO `kota` VALUES (3523, 'T U B A N');
INSERT INTO `kota` VALUES (3524, 'LAMONGAN');
INSERT INTO `kota` VALUES (3525, 'GRESIK');
INSERT INTO `kota` VALUES (3526, 'BANGKALAN');
INSERT INTO `kota` VALUES (3527, 'SAMPANG');
INSERT INTO `kota` VALUES (3528, 'PAMEKASAN');
INSERT INTO `kota` VALUES (3529, 'SUMENEP');
INSERT INTO `kota` VALUES (3571, 'KOTA KEDIRI');
INSERT INTO `kota` VALUES (3572, 'KOTA BLITAR');
INSERT INTO `kota` VALUES (3573, 'KOTA MALANG');
INSERT INTO `kota` VALUES (3574, 'KODYA PROBOLINGGO');
INSERT INTO `kota` VALUES (3575, 'KODYA PASURUAN');
INSERT INTO `kota` VALUES (3576, 'KODYA MOJOKERTO');
INSERT INTO `kota` VALUES (3577, 'KOTA MADIUN');
INSERT INTO `kota` VALUES (3578, 'SURABAYA');
INSERT INTO `kota` VALUES (3579, 'KOTA BATU');
INSERT INTO `kota` VALUES (3601, 'PANDEGLANG');
INSERT INTO `kota` VALUES (3602, 'LEBAK');
INSERT INTO `kota` VALUES (3604, 'SERANG');
INSERT INTO `kota` VALUES (3619, 'KAB. TANGERANG');
INSERT INTO `kota` VALUES (3672, 'CILEGON');
INSERT INTO `kota` VALUES (3675, 'KOTA TANGERANG');
INSERT INTO `kota` VALUES (5101, 'JEMBRANA');
INSERT INTO `kota` VALUES (5102, 'KAB.TABANAN');
INSERT INTO `kota` VALUES (5103, 'KAB.BADUNG');
INSERT INTO `kota` VALUES (5104, 'KAB.GIANYAR');
INSERT INTO `kota` VALUES (5105, 'KAB.KLUNGKUNG');
INSERT INTO `kota` VALUES (5106, 'KAB.BANGLI');
INSERT INTO `kota` VALUES (5107, 'KARANGASEM');
INSERT INTO `kota` VALUES (5108, 'BULELENG');
INSERT INTO `kota` VALUES (5171, 'KODYA DENPASAR');
INSERT INTO `kota` VALUES (5201, 'LOMBOK BARAT');
INSERT INTO `kota` VALUES (5202, 'LOMBOK TENGAH');
INSERT INTO `kota` VALUES (5203, 'LOMBOK TIMUR');
INSERT INTO `kota` VALUES (5204, 'SUMBAWA');
INSERT INTO `kota` VALUES (5205, 'DOMPU');
INSERT INTO `kota` VALUES (5206, 'BIMA');
INSERT INTO `kota` VALUES (5271, 'KOTA MATARAM');
INSERT INTO `kota` VALUES (5272, 'KOTA BIMA');
INSERT INTO `kota` VALUES (5301, 'SUMBA BARAT');
INSERT INTO `kota` VALUES (5302, 'SUMBA TIMUR');
INSERT INTO `kota` VALUES (5303, 'KUPANG');
INSERT INTO `kota` VALUES (5304, 'TIMOR TENGAH SELATAN');
INSERT INTO `kota` VALUES (5305, 'TIMOR TENGAH UTARA');
INSERT INTO `kota` VALUES (5306, 'BELU');
INSERT INTO `kota` VALUES (5307, 'ALOR');
INSERT INTO `kota` VALUES (5308, 'FLORES TIMUR');
INSERT INTO `kota` VALUES (5309, 'SIKKA');
INSERT INTO `kota` VALUES (5310, 'E N D E');
INSERT INTO `kota` VALUES (5311, 'N G A D A');
INSERT INTO `kota` VALUES (5312, 'MANGGARAI');
INSERT INTO `kota` VALUES (5313, 'PELABUHAN');
INSERT INTO `kota` VALUES (5314, 'LEMBATA');
INSERT INTO `kota` VALUES (5315, 'ROTE NDAO');
INSERT INTO `kota` VALUES (5371, 'KOTA KUPANG');
INSERT INTO `kota` VALUES (6101, 'SAMBAS');
INSERT INTO `kota` VALUES (6102, 'KAB. PONTIANAK');
INSERT INTO `kota` VALUES (6103, 'KAB.SANGGAU');
INSERT INTO `kota` VALUES (6104, 'KAB. KETAPANG');
INSERT INTO `kota` VALUES (6105, 'SINTANG');
INSERT INTO `kota` VALUES (6106, 'KAPUAS HULU');
INSERT INTO `kota` VALUES (6107, 'BENGKAYANG');
INSERT INTO `kota` VALUES (6108, 'KAB. LANDAK');
INSERT INTO `kota` VALUES (6171, 'KOTA PONTIANAK');
INSERT INTO `kota` VALUES (6172, 'SINGKAWANG');
INSERT INTO `kota` VALUES (6201, 'KOTAWARINGIN BARAT');
INSERT INTO `kota` VALUES (6202, 'KOTAWARINGIN TIMUR');
INSERT INTO `kota` VALUES (6203, 'KAPUAS');
INSERT INTO `kota` VALUES (6204, 'BARITO SELATAN');
INSERT INTO `kota` VALUES (6205, 'BARITO UTARA');
INSERT INTO `kota` VALUES (6206, 'BUNTOK BERSATU');
INSERT INTO `kota` VALUES (6207, 'GUNUNG MAS');
INSERT INTO `kota` VALUES (6208, 'LAMANDAU');
INSERT INTO `kota` VALUES (6209, 'SUKAMARA');
INSERT INTO `kota` VALUES (6210, 'SERUYAN');
INSERT INTO `kota` VALUES (6211, 'KATINGAN');
INSERT INTO `kota` VALUES (6212, 'BARITO TIMUR');
INSERT INTO `kota` VALUES (6213, 'MURUNG RAYA');
INSERT INTO `kota` VALUES (6271, 'PALANGKA RAYA');
INSERT INTO `kota` VALUES (6301, 'TANAH LAUT');
INSERT INTO `kota` VALUES (6302, 'KOTA BARU');
INSERT INTO `kota` VALUES (6303, 'BANJAR');
INSERT INTO `kota` VALUES (6304, 'BARITO KUALA');
INSERT INTO `kota` VALUES (6305, 'T A P I N');
INSERT INTO `kota` VALUES (6306, 'HULU SUNGAI SELATAN');
INSERT INTO `kota` VALUES (6307, 'HULU SUNGAI TENGAH');
INSERT INTO `kota` VALUES (6308, 'HULU SUNGAI UTARA');
INSERT INTO `kota` VALUES (6309, 'TABALONG');
INSERT INTO `kota` VALUES (6371, 'KODYA BANJARMASIN');
INSERT INTO `kota` VALUES (6372, 'BANJARBARU');
INSERT INTO `kota` VALUES (6401, 'PASIR');
INSERT INTO `kota` VALUES (6402, 'KUTAI KERTANEGARA');
INSERT INTO `kota` VALUES (6403, 'B E R A U');
INSERT INTO `kota` VALUES (6404, 'BULUNGAN');
INSERT INTO `kota` VALUES (6405, 'KUTAI BARAT');
INSERT INTO `kota` VALUES (6406, 'KUTAI TIMUR');
INSERT INTO `kota` VALUES (6407, 'MALINAU');
INSERT INTO `kota` VALUES (6408, 'NUNUKAN');
INSERT INTO `kota` VALUES (6409, 'PENAJAM PASER UTARA');
INSERT INTO `kota` VALUES (6471, 'BALIKPAPAN');
INSERT INTO `kota` VALUES (6472, 'SAMARINDA');
INSERT INTO `kota` VALUES (6473, 'TARAKAN');
INSERT INTO `kota` VALUES (6474, 'BONTANG');
INSERT INTO `kota` VALUES (7102, 'BOLAANG MONGONDOW');
INSERT INTO `kota` VALUES (7103, 'MINAHASA');
INSERT INTO `kota` VALUES (7104, 'SANGIHE TALAUD');
INSERT INTO `kota` VALUES (7141, 'TALAUD');
INSERT INTO `kota` VALUES (7172, 'MANADO');
INSERT INTO `kota` VALUES (7173, 'KODYA BITUNG');
INSERT INTO `kota` VALUES (7205, 'DONGGALA');
INSERT INTO `kota` VALUES (7206, 'TOLI TOLI');
INSERT INTO `kota` VALUES (7207, 'B U O L');
INSERT INTO `kota` VALUES (7208, 'PARIGI MOUTONG');
INSERT INTO `kota` VALUES (7271, 'KOTA PALU');
INSERT INTO `kota` VALUES (7301, 'SELAYAR');
INSERT INTO `kota` VALUES (7302, 'BULUKUMBA');
INSERT INTO `kota` VALUES (7303, 'BANTAENG');
INSERT INTO `kota` VALUES (7304, 'JENEPONTO');
INSERT INTO `kota` VALUES (7305, 'TAKALAR');
INSERT INTO `kota` VALUES (7306, 'GOWA');
INSERT INTO `kota` VALUES (7307, 'SINJAI');
INSERT INTO `kota` VALUES (7308, 'MAROS');
INSERT INTO `kota` VALUES (7309, 'PANGKEP');
INSERT INTO `kota` VALUES (7310, 'BARRU');
INSERT INTO `kota` VALUES (7311, 'BONE');
INSERT INTO `kota` VALUES (7312, 'SOPPENG');
INSERT INTO `kota` VALUES (7313, 'WAJO');
INSERT INTO `kota` VALUES (7314, 'SIDRAP');
INSERT INTO `kota` VALUES (7315, 'PINRANG');
INSERT INTO `kota` VALUES (7316, 'ENREKANG');
INSERT INTO `kota` VALUES (7317, 'L U W U');
INSERT INTO `kota` VALUES (7318, 'TANA TORAJA');
INSERT INTO `kota` VALUES (7322, 'LUWU UTARA');
INSERT INTO `kota` VALUES (7371, 'MAKASSAR');
INSERT INTO `kota` VALUES (7372, 'PAREPARE');
INSERT INTO `kota` VALUES (7373, 'P A L O P O');

-- ----------------------------
-- Table structure for maskapai
-- ----------------------------
DROP TABLE IF EXISTS `maskapai`;
CREATE TABLE `maskapai`  (
  `id_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_maskapai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '10  = Bus\r\n20 = Kereta\r\n30 = Pesawat',
  PRIMARY KEY (`id_maskapai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of maskapai
-- ----------------------------
INSERT INTO `maskapai` VALUES (1, 'Lion Air', '30');
INSERT INTO `maskapai` VALUES (2, 'Garuda', '30');
INSERT INTO `maskapai` VALUES (3, 'Batik', '30');

-- ----------------------------
-- Table structure for maskapai_detail
-- ----------------------------
DROP TABLE IF EXISTS `maskapai_detail`;
CREATE TABLE `maskapai_detail`  (
  `id_maskapai_detail` int(11) NOT NULL AUTO_INCREMENT,
  `fid_maskapai` int(11) NOT NULL,
  `kelas` enum('First Class','Business','Executive','Ekonomi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` float NOT NULL,
  PRIMARY KEY (`id_maskapai_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maskapai_detail
-- ----------------------------
INSERT INTO `maskapai_detail` VALUES (1, 2, 'Ekonomi', 500000);
INSERT INTO `maskapai_detail` VALUES (2, 2, 'Executive', 1000000);

-- ----------------------------
-- Table structure for metode_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `metode_pembayaran`;
CREATE TABLE `metode_pembayaran`  (
  `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `metode_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_metode_pembayaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of metode_pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for pesanan
-- ----------------------------
DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan`  (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Bus','Kereta','Pesawat') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '10  = Bus\r\n20 = Kereta\r\n30 = Pesawat',
  `nomor_pesanan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fid_jadwal` int(11) NULL DEFAULT NULL,
  `fid_pembayaran` int(11) NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `st` tinyint(1) NULL DEFAULT NULL COMMENT 'Status\r\n0 = Schedule\r\n1 = History',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pesanan
-- ----------------------------

-- ----------------------------
-- Table structure for pesanan_detail
-- ----------------------------
DROP TABLE IF EXISTS `pesanan_detail`;
CREATE TABLE `pesanan_detail`  (
  `id_pesanan_detail` int(11) NOT NULL AUTO_INCREMENT,
  `fid_pesanan` int(11) NULL DEFAULT NULL,
  `no_ktp_pemesan` decimal(16, 0) NULL DEFAULT NULL,
  `nama_pemesan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesanan_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pesanan_detail
-- ----------------------------

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `fid_user` int(11) NULL DEFAULT NULL,
  `token` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ip_address` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `device` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `login_at` timestamp(0) NULL DEFAULT NULL,
  `logout_at` timestamp(0) NULL DEFAULT NULL,
  `lates_activity_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES (1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjEi.mmDbrmOr4yH7quj5zk3b_Z0X5jkFxcSKc8iAp_WibLc', '::1', 'Chrome 87.0.4280.88', '2020-12-24 19:56:36', NULL, NULL, NULL, NULL);
INSERT INTO `token` VALUES (2, 3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjMi.T60cOUokukaIBjsQTvveCUyWQQCBzSPZkZU_cLFHhig', '::1', 'Chrome 87.0.4280.88', '2020-12-24 19:10:25', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Rizky Ramadhan', 'misterrizky', 'misterrizky@aol.com', 'default.jpg', '$2y$10$SQ.Wcgum/x2RwmRh95.GbO75D8ipPx1ko3ry7UXm7KnwzLyRmpZrS', '2', 1, '0000-00-00');
INSERT INTO `user` VALUES (2, 'Ugik', 'ugik', 'ugik@gmail.com', 'default.jpg', '$2y$10$/PNaH8Q1GlTOZczPegYXouYwRYF60paIwC1Iq3V16BD3Zj3b2gZsq', '2', 1, '0000-00-00');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_role
-- ----------------------------

-- ----------------------------
-- View structure for list_maskapai
-- ----------------------------
DROP VIEW IF EXISTS `list_maskapai`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `list_maskapai` AS SELECT
	maskapai_detail.id_maskapai_detail, 
	maskapai.nama_maskapai, 
	maskapai.type, 
	maskapai_detail.kelas, 
	maskapai_detail.harga
FROM
	maskapai_detail
	LEFT JOIN
	maskapai
	ON 
		maskapai_detail.fid_maskapai = maskapai.id_maskapai ;

SET FOREIGN_KEY_CHECKS = 1;
