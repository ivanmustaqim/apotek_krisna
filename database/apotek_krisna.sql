-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `data_pegawai`;
CREATE TABLE `data_pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `data_pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `no_telp`) VALUES
('1',	'ivan',	'laki - laki',	'Jalan Dr. Wahidin Sudirohusodo',	'22 okt 2016',	'089693659996');

DROP TABLE IF EXISTS `data_supplier`;
CREATE TABLE `data_supplier` (
  `id_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `data_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('S-002',	'PT. Almaas Borneo Jaya',	'Jl. Tanjung Raya II Komp. Cendana Permai 1 A.14, Pontianak',	'056179444776'),
('S-003',	'PT. Anugrah Argon Medica',	'Jl. Perdana Komp. Pendana Square Blok E1/E2, Pontianak',	'05616655107'),
('S-004',	'PT. Antarmitra Sembada',	'Jl. Arteri Supadio Komp. Ruko Dju Tek Blok B no. 3A, Pontianak',	'0561733980'),
('S-005',	'PT. Anugrah Pharmindo Lestari',	'Jl. Arteri Supadio no. 55, Pontianak',	'0561721825'),
('S-006',	'PT. Bima San Prima',	'Jl. A.Yani no.6, Pontianak',	'0561738999'),
('S-007',	'PT. Buana Medistra Pharma',	'Jl. Cendrawasih no.56, Pontianak',	'0561743689'),
('S-008',	'PT. Dos Ni Roha',	'Jl. Merdeka Barat',	'0561737515'),
('S-009',	'PT. Enseval Putera Megatrading',	'Jl. A.Yani II, Komp. Pergudangan A Yani Prima Pontianak',	'0561777779'),
('S-011',	'PT. Glover Prima Mandiri',	'Jl. Komp. Pondok Agung VII no.A32, Pontianak',	'0561763668'),
('S-012',	'PT. Indexim Beta',	'Jl. Dewi Sartika no. 128, Pontianak',	'0561749266'),
('S-013',	'PT. Indofarma GM',	'Jl. Tanjungpura no.6, Pontianak',	'0561765976'),
('S-014',	'TO. Jenaka',	'Jl. KH. Ahmad Dahlan',	'0561731950'),
('S-015',	'PT. Kalimantan Riset',	'Jl. H. Agus Salim no.18, Pontianak',	'0561732804'),
('S-016',	'PT. Kimia Farma',	'Jl. KH. Wahid Hasyim no.188, Pontianak',	'0561734136'),
('S-017',	'PT. Kuburaya Mediafarma',	'Jl. Sungai Raya Dalam Komp. Ruko Taman Sei.Raya no.R3, Kabupaten Kuburaya',	'0561710377'),
('S-018',	'PT. KK Indonesia',	'Jl. Teuku Umar Komp. Pontianak Mall',	''),
('S-020',	'PT. Lenco Surya Perkasa',	'Jl. Martadinata',	''),
('S-021',	'PT. Mensa Bina Sukses',	'Jl. M. Sohor no.6 - 8, Pontianak',	'0561769557'),
('S-022',	'PT. Merapi Utama Pharma',	'Jl. Adisucipto Komp. Pergudangan Mandiri',	'0561724978'),
('S-024',	'Medika Raya',	'Jl. Setia Budi',	'0561740707'),
('S-025',	'PT. Mellenium Pharmacon International',	'Jl. Dr. Wahidin S. No. 88L - 88L',	'05616588379'),
('S-026',	'PT. Parit Padang Global',	'Jl. Arteri Supadio Gg. Jutek Pontianak',	'0561722994'),
('S-027',	'PT. Penta Valent',	'Jl. Budi Karya Komp. Villa Gama no.9-10, Pontianak',	'0561742854'),
('S-029',	'PT. Rajawali',	'Jl. Jendral Urip',	'081253435904'),
('S-030',	'PT. Septa Sari Tama',	'',	'05617054780'),
('S-031',	'PT. Sawah Besar Farma',	'Jl. Wan Sagaf no.128 Pontianak',	'0561739120'),
('S-032',	'PT. Sumber Fajar Inti Abadi',	'Jl. Sei. Raya Dalam no.9A Pontianak',	'0561725270'),
('S-033',	'PT. Tri Sapta Jaya',	'Jl. Dr. Wahidin S. No. 76, Pontianak',	'05616588669'),
('S-034',	'PT. Tempo',	'Jl. Tanjungpura',	'0561764112'),
('S-035',	'THS',	'',	'0561741650'),
('S-036',	'PT. Utama Binafarma',	'Jl. Tanjungpura no. 4 - 6, Pontianak',	'0561730400');

DROP TABLE IF EXISTS `jenis_obat`;
CREATE TABLE `jenis_obat` (
  `id_jenis_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `jenis_obat` (`id_jenis_obat`, `jenis_obat`) VALUES
('alt_kesehatan',	'Alat Kesehatan'),
('antibiotik',	'Antibiotik'),
('anti_alergi',	'Anti Alergi'),
('anti_jamur',	'Anti Jamur'),
('anti_reumatik',	'Anti Reumatik'),
('bt_keras',	'Obat Keras'),
('bt_luar',	'Obat Luar'),
('generik',	'Generik'),
('kardiovaskular',	'Kardiovaskular'),
('konstrasepsi',	'Kontrasepsi'),
('kosmetik',	'Kosmetik'),
('pencernaan',	'Pencernaan'),
('pernapasan',	'Pernapasan'),
('suppositoria',	'Suppositoria'),
('tetes_telinga',	'Obar Tetes Telinga'),
('vitamin',	'Vitamin');

DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id_obat` varchar(5) NOT NULL,
  `id_jenis_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `tgl_kadaluarsa` varchar(25) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `tgl_sales` date NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kadaluarsa` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `obat` (`id_obat`, `id_jenis_obat`, `nama_obat`, `tgl_kadaluarsa`, `jumlah`, `harga`, `tgl_sales`, `nama_supplier`, `nama`, `kadaluarsa`) VALUES
('I-001',	'generik',	'CTM TAB 1000',	'2025-11-23',	1,	'500',	'2014-11-29',	'PT. Antarmitra Sembada',	'Ivan Mustaqim',	0),
('I-002',	'generik',	'Paracetamol Syr Holy',	'2018-06-11',	43,	'6000',	'2012-11-29',	'TO. Jenaka',	'Ivan Mustaqim',	0),
('I-003',	'generik',	'Paracetamol Syr Meff',	'2024-01-31',	3,	'2500',	'2006-01-09',	'TO. Jenaka',	'Ivan Mustaqim',	0),
('I-008',	'kardiovaskular',	'Renabetic Tab',	'2019-08-26',	24,	'2000',	'2008-11-09',	'Medika Raya',	'Ivan Mustaqim',	0),
('I-009',	'kardiovaskular',	'Lipitor',	'2018-01-30',	5,	'202000',	'2006-08-06',	'PT. Anugrah Argon Medica',	'Ivan Mustaqim',	0),
('I-010',	'anti_jamur',	'Cazetin Drop',	'2017-05-04',	5,	'21900',	'2004-11-18',	'Medika Raya',	'Ivan Mustaqim',	0),
('I-011',	'pernapasan',	'Mucera Tab',	'2019-07-08',	110,	'10000',	'2010-11-09',	'PT. Mensa Bina Sukses',	'Ivan Mustaqim',	0),
('I-012',	'pernapasan',	'Perifas Tab',	'2023-03-09',	9,	'17500',	'2012-11-29',	'PT. Mensa Bina Sukses',	'Ivan Mustaqim',	0),
('I-013',	'pencernaan',	'Sanprima Cpl',	'2018-09-01',	60,	'10000',	'2003-11-17',	'PT. Utama Binafarma',	'Ivan Mustaqim',	0),
('I-016',	'antibiotik',	'loli',	'2017-02-23',	12,	'9000',	'2017-01-09',	'PT. Mellenium Pharmacon International',	'admin',	1),
('I-017',	'alt_kesehatan',	'asdfgvc',	'2017-01-28',	34,	'1000',	'2017-01-09',	'PT. Lenco Surya Perkasa',	'admin',	1),
('I-018',	'bt_luar',	'angka',	'2017-03-08',	9,	'9000',	'2017-01-10',	'Medika Raya',	'admin',	3),
('I-020',	'anti_jamur',	'jamor',	'2017-03-06',	29,	'2000',	'2017-01-10',	'PT. Antarmitra Sembada',	'admin',	2);

DROP TABLE IF EXISTS `receivings`;
CREATE TABLE `receivings` (
  `receiving_id` int(10) NOT NULL AUTO_INCREMENT,
  `receiving_time` datetime NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `total` int(10) DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`receiving_id`),
  KEY `customer_id` (`id_user`),
  CONSTRAINT `receivings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `receivings_items`;
CREATE TABLE `receivings_items` (
  `receivings_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiving_id` int(10) NOT NULL DEFAULT '0',
  `id_obat` varchar(5) NOT NULL DEFAULT '0',
  `receiving_qty` int(3) NOT NULL DEFAULT '0',
  `harga` int(15) NOT NULL,
  `deleted` int(2) DEFAULT '0',
  PRIMARY KEY (`receivings_item_id`),
  KEY `item_id` (`id_obat`),
  KEY `receiving_id` (`receiving_id`),
  CONSTRAINT `receivings_items_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `sale_time` datetime NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `total` int(10) DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sale_id`),
  KEY `customer_id` (`id_user`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sales` (`sale_id`, `sale_time`, `id_user`, `total`, `deleted`) VALUES
(17,	'2017-01-04 00:00:00',	'U-012',	10000,	0),
(18,	'2017-01-06 00:00:00',	'U-012',	10000,	0);

DROP TABLE IF EXISTS `sales_items`;
CREATE TABLE `sales_items` (
  `sales_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `id_obat` varchar(5) NOT NULL DEFAULT '0',
  `sales_qty` int(3) NOT NULL DEFAULT '0',
  `harga` int(15) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sales_item_id`),
  KEY `item_id` (`id_obat`),
  KEY `sale_id` (`sale_id`),
  CONSTRAINT `sales_items_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sales_items` (`sales_item_id`, `sale_id`, `id_obat`, `sales_qty`, `harga`, `deleted`) VALUES
(1,	17,	'I-013',	1,	10000,	0),
(2,	18,	'I-013',	1,	10000,	0);

DELIMITER ;;

CREATE TRIGGER `sales_items_ai` AFTER INSERT ON `sales_items` FOR EACH ROW
UPDATE obat SET jumlah=jumlah-NEW.sales_qty WHERE id_obat=NEW.id_obat;;

DELIMITER ;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8d03040595db5b50d09a660f86aa14d3',	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36',	1479784193,	'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:7:\"1607001\";s:4:\"nama\";s:7:\"fitroni\";s:5:\"level\";s:1:\"1\";s:4:\"foto\";s:16:\"boss_man-512.png\";}');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `level`, `img`) VALUES
('U-012',	'admin',	'admin',	'21232f297a57a5a743894a0e4a801fc3',	1,	NULL),
('U-003',	'fitroni',	'Kadier',	'e10adc3949ba59abbe56e057f20f883e',	2,	NULL),
('U-010',	'ivan',	'Ivan Mustaqim',	'e10adc3949ba59abbe56e057f20f883e',	1,	NULL),
('U-013',	'mustaqim',	'mustaqim',	'25d55ad283aa400af464c76d713c07ad',	2,	NULL);

-- 2017-01-12 04:44:35
