#
# TABLE STRUCTURE FOR: addons
#

DROP TABLE IF EXISTS `addons`;

CREATE TABLE `addons` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name_addons` varchar(20) NOT NULL,
  `technical_support` varchar(100) NOT NULL,
  `status_addons` tinyint(1) NOT NULL,
  `description` tinytext,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('1', 'home', 'trefast development', '1', 'Module addons Home Administrator ', NULL);
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('3', 'menu_backend', 'Trefast Development', '1', 'Module addonsmenu_backend', NULL);
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('4', 'menu_frontend', 'Trefast Development', '1', 'Module addons menu_frontend', NULL);
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('5', 'addons', 'Trefast Development', '1', 'Module addons addons', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('6', 'groups', 'Trefast Development', '1', 'Module addons groups', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('7', 'schema_database', 'Trefast Development', '1', 'Module addons schema_database', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('8', 'backup', 'Trefast Development', '1', 'Modul Backup Database Addons', 'fa fa-download');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('9', 'restore', 'trefast Development', '1', 'Module Addons Restore Database ', 'fa fa-upload');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('10', 'settings', 'Trefast Development', '1', 'Modul addons Settings System ', NULL);
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('11', 'pages', 'Trefast Development', '1', 'Module addons pages', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('12', 'album_photos', 'Trefast Development', '1', 'Module addons album_photos', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('13', 'contact', 'Trefast Development', '1', 'Module addons contact', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('14', 'link_external', 'Trefast Development', '1', 'Module addons link_external', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('15', 'galery', 'Trefast Development', '1', 'Module addons galery', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('16', 'articles', 'Trefast Development', '1', 'Module addons articles', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('17', 'download', 'Trefast Development', '1', 'Module addons download', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('18', 'users', 'Trefast Development', '1', 'Menu Users Addons module', 'fa fa-users');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('19', 'categori_articles', 'Trefast Development', '1', 'Module addons categori_articles', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('21', 'partner_team', 'Trefast Development', '1', 'Module addons partner_team', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('22', 'product', 'Trefast Development', '1', 'Module addons product', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('23', 'group_product', 'Trefast Development', '1', 'Module addons group_product', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('24', 'promo_iklan', 'Trefast Development', '1', 'Module addons promo_iklan', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('25', 'routerapp', 'Trefast Development', '1', 'Module addons routerapp', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('31', 'order_pemesan', 'Trefast Development', '1', 'Module addons order_pemesan', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('32', 'order_detail_pemesan', 'Trefast Development', '1', 'Module addons order_detail_pemesan', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('33', 'invoice_order', 'Trefast Development', '1', 'Modul Custom Addon Invoice Order ', NULL);
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('34', 'bank_account', 'Trefast Development', '1', 'Module addons bank_account', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('35', 'confirm_payment', 'Trefast Development', '1', 'Module addons confirm_payment', '-');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('36', 'group_download', 'Trefast Development', '1', 'Module addons group_download', '-');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('37', 'brand_product', 'Trefast Development', '1', 'Module addons brand_product', '');
INSERT INTO `addons` (`id`, `name_addons`, `technical_support`, `status_addons`, `description`, `icon`) VALUES ('38', 'shipping_kurir', 'Trefast Development', '1', 'Module addons shipping_kurir', '');


#
# TABLE STRUCTURE FOR: album_photos
#

DROP TABLE IF EXISTS `album_photos`;

CREATE TABLE `album_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(200) NOT NULL,
  `sampul_album` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('2', 'Diklat Angkatan 1', 'fcf74a49311a4c7e336aff1b6f8d31f5.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('3', 'Diklat Angkatan 2', '67d21cdf0232e4bdd450edaef6eb1f26.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('4', 'Diklat Angkatan 3', '3180c3448e7fd02543f1465fa5e725b1.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('5', 'Diklat Angkatan 4', '737acb98df844a82ea9ba5817ecce3c8.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('7', 'Ujian Proposal', '11e4cf41dab7bf41d9a447f30d9faba8.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('8', 'Seminar Proposal', '5bf8edc7a34a44a9340b33072f70d148.jpg');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('9', 'Uji Nyali', '084fc4339e8378e3083ef1145ae58c66.png');
INSERT INTO `album_photos` (`id`, `nama_album`, `sampul_album`) VALUES ('10', 'Apple', 'e2d6fdfdba007b28f061e1d83f266cd0.png');


#
# TABLE STRUCTURE FOR: articles
#

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `author` varchar(100) NOT NULL,
  `img_header` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `link_video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `articles` (`id`, `title`, `slug`, `date`, `time`, `author`, `img_header`, `content`, `category`, `status`, `link_video`) VALUES ('22', 'Membuat XML Dinamis', 'membuat-xml-dinamis', '2017-03-03', '13:03:38', 'mucharomtzaka@yahoo.co.id', 'd5d87a73e09b86ac3690c4b4ae5ede4d.jpg', '<p>\r\nSitemap merupakan salah satu langkah yang digunakan oleh webmaster atau \r\npengembang aplikasi berbasis web untuk memberitahu atau menginformasikan\r\n kepada mesin pencarian seperti Google tentang halaman yang telah dibuat\r\n untuk ditelusuri atau di <em>index</em>. Mudahnya, sitemap \r\nmenginformasikan kalau kita telah menulis sesuatu di web atau blog kita.\r\n Sitemap berisi daftar alamat url yang ada pada sebuah web dengan \r\nmetadata tentang kapan tulisan itu dibuat, seberapa sering tulisan itu \r\ndiperbaharui, seberapa penting tulisan itu untuk ditelusuri dan \r\nlain-lain\r\n\r\n<br></p>', 'Tutorial', '1', '');


#
# TABLE STRUCTURE FOR: bank_account
#

DROP TABLE IF EXISTS `bank_account`;

CREATE TABLE `bank_account` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `img_bank` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: brand_product
#

DROP TABLE IF EXISTS `brand_product`;

CREATE TABLE `brand_product` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brand` varchar(100) NOT NULL,
  `kode_brand` varchar(80) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `brand_product` (`id_brand`, `nama_brand`, `kode_brand`) VALUES ('1', 'Trefastsoft', 'TR0001');


#
# TABLE STRUCTURE FOR: captcha
#

DROP TABLE IF EXISTS `captcha`;

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('20', '1489287387', '::1', 'zhoPtFOa');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('21', '1489287420', '::1', 'WId37cV4');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('22', '1489287524', '::1', 'aARNvt73');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('23', '1489287553', '::1', 'wXxrcuZ3');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('24', '1489287655', '::1', 'cGIocI7p');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('25', '1489287723', '::1', 'q16Ib1vN');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('26', '1489288091', '::1', 'sveAu7dS');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('27', '1489288239', '::1', '7etpriPC');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('28', '1489288376', '::1', 'Qe8xMMW1');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('29', '1489288408', '::1', '5CEQGYVw');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('30', '1489288571', '::1', 'IpbMZS44');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('31', '1489288633', '::1', 'J4w6trMZ');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('32', '1489288677', '::1', 'Pv9r0aA4');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('33', '1489291152', '::1', 'K3FEpOxd');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('34', '1489291220', '::1', 'p2ZCA4rt');
INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES ('35', '1489291301', '::1', '6K5Upfp7');


#
# TABLE STRUCTURE FOR: categori_articles
#

DROP TABLE IF EXISTS `categori_articles`;

CREATE TABLE `categori_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_categories` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('2', 'Artikel');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('5', 'Berita');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('7', 'Tutorial');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('9', 'Portofolio');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('11', 'Komunitas');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('12', 'Aplikasi');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('13', 'Video');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('14', 'Karir');
INSERT INTO `categori_articles` (`id`, `name_categories`) VALUES ('15', 'Event');


#
# TABLE STRUCTURE FOR: comment
#

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` enum('Pria','Wanita') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `produk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`id`, `article_id`, `name`, `gender`, `email`, `comment`, `date`, `rate`, `produk`) VALUES ('1', '22', 'mm', 'Pria', 'mm@yahoo.co.id', 'gwqhh', '2017-03-08 14:27:41', NULL, NULL);
INSERT INTO `comment` (`id`, `article_id`, `name`, `gender`, `email`, `comment`, `date`, `rate`, `produk`) VALUES ('2', '2', 'drhjeekek', 'Wanita', 'adya@yahoo.co.id', 'wtqqq', '2017-03-08 14:30:24', NULL, 'op');
INSERT INTO `comment` (`id`, `article_id`, `name`, `gender`, `email`, `comment`, `date`, `rate`, `produk`) VALUES ('3', '22', 'wqff', 'Pria', 'cinta@yahoo.co.id', 'nininini', '2017-03-12 10:17:56', NULL, NULL);


#
# TABLE STRUCTURE FOR: confirm_payment
#

DROP TABLE IF EXISTS `confirm_payment`;

CREATE TABLE `confirm_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(100) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `no_rekening_dari` varchar(100) NOT NULL,
  `no_rekening_tujuan` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `keterangan_lain` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: contact
#

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(25) DEFAULT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `contact` (`id`, `fullname`, `email`, `website`, `message`, `date`, `time`) VALUES ('1', 'testadmin', 'admin@admin', 'trefastsoft.com', 'testadmin', '2017-02-19', '13:34:02');


#
# TABLE STRUCTURE FOR: download
#

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(100) NOT NULL,
  `file` varchar(150) NOT NULL,
  `status` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `lock_account` tinyint(1) NOT NULL DEFAULT '0',
  `deskripsi` text NOT NULL,
  `group_download` varchar(100) NOT NULL,
  `link_demo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `download` (`id`, `judul_file`, `file`, `status`, `tanggal`, `lock_account`, `deskripsi`, `group_download`, `link_demo`) VALUES ('6', 'wd', '8db677b6649df5b6c383ddcb7213af3a.png', '1', '2017-02-28', '0', '<p>gambar logo <br></p>', 'Gambar', 'http://www.4shared.com/extev');


#
# TABLE STRUCTURE FOR: galery
#

DROP TABLE IF EXISTS `galery`;

CREATE TABLE `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `title_img` varchar(50) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('1', '2', 'Galeri Sampel 1', '4550a7aa1f2deacc7af0d36485306420.jpg', 'Galeri Sampel 1', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('2', '2', 'Galeri Sampel 2', 'dfa0f99ca0db3d21b046a19b425f1328.jpg', 'galeri dua', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('3', '3', 'Galeri Sampel 1', '99df9409d53c396db1097d7e701ca407.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('4', '3', 'Sampel Galery', 'e8e0971e490b31ee827bdb371d65d735.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('5', '4', 'Sampel Galery', '16255bdaadaf38c70e802a6a8b0f8930.jpg', 'Sampel Galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('6', '4', 'Galeri Sampel 1', '03ec1d0385eb0dad98a26a084c9aac6b.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('7', '5', 'Sampel Galery', '37f9aecc3b0a82cb68ffde2392853beb.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('8', '5', 'Sampel Galery', '3a4992cc1844586df5dc32c96e3f0340.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('9', '5', 'Sampel Galery', 'ee6113ce7973c175849baacb81297786.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('10', '5', 'Sampel Galery', '1ff4fec289c6478072680ae613e4d3f1.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('11', '5', 'Sampel Galery', '139759876323facfdc28108f037b5c72.jpg', 'Sampel galery', '1', '1');
INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES ('12', '5', 'Sampel Galery', '4247ec8159b2e05ec1e403e08f0b1fc8.jpg', 'Sampel galery', '1', '1');


#
# TABLE STRUCTURE FOR: group_download
#

DROP TABLE IF EXISTS `group_download`;

CREATE TABLE `group_download` (
  `id_group_download` int(11) NOT NULL AUTO_INCREMENT,
  `group_download_list` varchar(100) NOT NULL,
  PRIMARY KEY (`id_group_download`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `group_download` (`id_group_download`, `group_download_list`) VALUES ('1', 'Aplikasi');
INSERT INTO `group_download` (`id_group_download`, `group_download_list`) VALUES ('2', 'Musik');
INSERT INTO `group_download` (`id_group_download`, `group_download_list`) VALUES ('3', 'Dokumen');
INSERT INTO `group_download` (`id_group_download`, `group_download_list`) VALUES ('4', 'Gambar');


#
# TABLE STRUCTURE FOR: group_product
#

DROP TABLE IF EXISTS `group_product`;

CREATE TABLE `group_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_product_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `group_product` (`id`, `group_product_name`) VALUES ('2', 'Jaket');
INSERT INTO `group_product` (`id`, `group_product_name`) VALUES ('3', 'Sepatu');


#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('2', 'members', 'General User Member');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('3', 'IT-Support', 'IT-Support');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('4', 'Premium', 'General User Premium');


#
# TABLE STRUCTURE FOR: link_external
#

DROP TABLE IF EXISTS `link_external`;

CREATE TABLE `link_external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `link_external` (`id`, `nama_link`, `url`) VALUES ('5', 'Trefast Development', 'http://www.trefastsoft.com');


#
# TABLE STRUCTURE FOR: login_attempts
#

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(16) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: menu_backend
#

DROP TABLE IF EXISTS `menu_backend`;

CREATE TABLE `menu_backend` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_backend_parent` tinyint(11) NOT NULL DEFAULT '0',
  `menu_backend_title` varchar(100) NOT NULL,
  `menu_url_title` varchar(100) DEFAULT NULL,
  `menu_backend_status` tinyint(1) DEFAULT '0',
  `menu_backend_icon` varchar(100) DEFAULT NULL,
  `menu_backend_description` tinytext,
  PRIMARY KEY (`id`,`menu_backend_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('1', '0', 'Dashboard', 'home?halaman=dashboard', '1', 'fa fa-dashboard', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('3', '0', 'Menu', '#', '1', 'fa fa-crop', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('4', '0', 'Users', '#', '1', 'fa fa-users', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('14', '11', 'Menu Backend', 'menu_backend', '1', '-', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('15', '0', 'Content', '#', '1', 'fa fa-th', NULL);
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('16', '15', 'Pages', 'pages', '1', 'fa fa-list', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('17', '15', 'Eksternal Link', 'link_external', '1', 'fa fa-link', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('18', '15', 'Galeri', 'galery', '1', 'fa fa-globe', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('19', '15', 'Articles', 'articles', '1', '-', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('20', '15', 'Album Photos', 'album_photos', '1', '-', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('21', '15', 'Download', 'download', '1', '-', '<p>Menu Download<br></p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('22', '4', 'All Users', 'users', '1', '', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('23', '4', 'All Groups', 'groups', '1', '', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('24', '15', 'Categori Articles', 'categori_articles', '1', '-', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('25', '0', 'Sale', '#', '1', 'fa fa-dollar', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('26', '15', 'Partner', 'partner_team', '1', '-', '<p>-<br></p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('27', '25', 'Product', 'product', '1', '-', '<p>-<br></p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('28', '25', 'Categori product', 'group_product', '1', '-', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('29', '25', 'Promo ads Product', 'promo_iklan', '1', '-', '<p>-<br></p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('30', '3', 'Url redirect', 'routerapp', '1', 'fa fa-reload', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('31', '3', 'All Menu', 'menu_frontend', '1', '-', '<p>-<br></p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('32', '25', 'Order', 'order_pemesan', '1', '-', '<p>-</p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('33', '25', 'Detail Order', 'order_detail_pemesan', '1', '', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('34', '25', 'Invoice Order', 'invoice_order', '0', '-', '<p>-</p>');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('35', '25', 'Bank Account', 'bank_account', '1', 'fa fa-bank', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('36', '25', 'Confirm Payment', 'confirm_payment', '1', '-', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('37', '25', 'Brand Product', 'brand_product', '1', '-', '-');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('38', '25', 'Tracke product', 'track', '1', 'fa  fa-truck', '');
INSERT INTO `menu_backend` (`id`, `menu_backend_parent`, `menu_backend_title`, `menu_url_title`, `menu_backend_status`, `menu_backend_icon`, `menu_backend_description`) VALUES ('39', '25', 'Shipping Kurir', 'shipping_kurir', '1', '', '');


#
# TABLE STRUCTURE FOR: menu_frontend
#

DROP TABLE IF EXISTS `menu_frontend`;

CREATE TABLE `menu_frontend` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_frontend_parent` tinyint(11) NOT NULL,
  `menu_frontend_title` varchar(100) NOT NULL,
  `menu_url_title` varchar(100) NOT NULL,
  `menu_frontend_status` tinyint(1) NOT NULL,
  `menu_frontend_icon` varchar(100) NOT NULL,
  `menu_frontend_description` tinytext,
  PRIMARY KEY (`id`,`menu_frontend_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('2', '0', 'Main Navigasi', '#', '1', 'fa fa-th-large', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('4', '0', 'Profil', '#', '1', 'fa fa-star', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('5', '4', 'Trefast Soft', 'welcome/getpages/50/Tentang-trefast-soft', '1', 'fa fa-file', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('7', '0', 'Galeri', 'welcome/galeries', '1', 'fa fa-camera', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('8', '0', 'Feed RSS', 'rss', '0', 'fa fa-rss', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('9', '0', 'Artikel', 'welcome/categori/Artikel', '1', 'glyphicon glyphicon-send', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('10', '0', 'Tutorial', 'welcome/categori/Tutorial', '1', 'fa fa-book', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('11', '0', 'Video', 'welcome/categori/Video', '1', 'fa fa-youtube', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('12', '0', 'Aplikasi', 'welcome/categori/Aplikasi', '0', 'fa fa-fire', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('13', '0', 'Karirnews', 'welcome/categori/Karir', '1', 'glyphicon glyphicon-bullhorn', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('14', '0', 'Halaman', 'welcome/gethalaman', '1', 'glyphicon glyphicon-folder-open', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('16', '0', 'Proyek', 'welcome/categori/Portofolio', '1', 'glyphicon glyphicon-calendar', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('17', '0', 'Download Area', 'welcome/DownloadArea', '1', 'fa fa-bullhorn', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('18', '0', 'Promo Iklan', 'welcome/iklan', '1', 'glyphicon glyphicon-retweet', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('19', '0', 'Berita', 'welcome/categori/Berita', '1', 'fa fa-globe', NULL);
INSERT INTO `menu_frontend` (`id`, `menu_frontend_parent`, `menu_frontend_title`, `menu_url_title`, `menu_frontend_status`, `menu_frontend_icon`, `menu_frontend_description`) VALUES ('20', '0', 'RSS Feed', 'rss.xml', '1', 'fa fa-rss', NULL);


#
# TABLE STRUCTURE FOR: order_detail_pemesan
#

DROP TABLE IF EXISTS `order_detail_pemesan`;

CREATE TABLE `order_detail_pemesan` (
  `id_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(100) NOT NULL,
  `kode_invoice_order` varchar(100) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `status` enum('pending','progres','terkirim') NOT NULL DEFAULT 'pending',
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: order_pemesan
#

DROP TABLE IF EXISTS `order_pemesan`;

CREATE TABLE `order_pemesan` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `kode_invoice_order` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email_pemesan` varchar(100) NOT NULL,
  `contact_pemesan` varchar(12) NOT NULL,
  `status_order` enum('pending','terkirim','progres') NOT NULL DEFAULT 'pending',
  `alamat_pemesan` tinytext NOT NULL,
  `metode_pembayaran` enum('transfer','COD') NOT NULL,
  `biaya_delivery` varchar(95) DEFAULT '0',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: pages
#

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `status`) VALUES ('50', 'Profil Trefast Soft', 'Tentang-trefast-soft', '<p>     Trefastsoft merupakan produk startup dari pengembangan trefast development yang bergerak pada  bidang teknologi khususnya web development.</p>', '1');
INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `status`) VALUES ('51', 'Peraturan dan Keamanan', 'term-security', '<p>Peraturan dan Keamanan  Trefast Soft <br></p><p><br></p>', '1');


#
# TABLE STRUCTURE FOR: partner_team
#

DROP TABLE IF EXISTS `partner_team`;

CREATE TABLE `partner_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `partner_team` (`id`, `team`, `url`, `img`) VALUES ('1', 'odoo Team', 'http://www.odoo.com', '41dce70e45dd8013b9a05e39e15fd4c4.png');
INSERT INTO `partner_team` (`id`, `team`, `url`, `img`) VALUES ('2', 'Codeigniter', 'http://www.codeigniter.com', '39f881c9fe04c22ace1bea3bb69a3094.png');


#
# TABLE STRUCTURE FOR: product
#

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi_produk` text NOT NULL,
  `link_video` varchar(100) NOT NULL,
  `url_demo` varchar(100) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `group_product` int(11) NOT NULL,
  `id_produk` varchar(100) DEFAULT NULL,
  `qty` int(12) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `product` (`id`, `produk`, `tanggal`, `deskripsi_produk`, `link_video`, `url_demo`, `images`, `status`, `group_product`, `id_produk`, `qty`, `harga`, `brand`) VALUES ('1', 'op', '2017-03-01', '<p>op</p>', '', '', 'b0d73ab517f947f688d3b19e396f9d5b.png', '1', '2', 'TR00001', '12', '40000', 'Trefastsoft');
INSERT INTO `product` (`id`, `produk`, `tanggal`, `deskripsi_produk`, `link_video`, `url_demo`, `images`, `status`, `group_product`, `id_produk`, `qty`, `harga`, `brand`) VALUES ('2', 'sepatu', '2017-03-01', '<p>sepatu</p>', '', '', '899769c55bc7ea5228fdbf831e78924f.png', '1', '2', 'TR00002', '12', '50000', 'Trefastsoft');


#
# TABLE STRUCTURE FOR: promo_iklan
#

DROP TABLE IF EXISTS `promo_iklan`;

CREATE TABLE `promo_iklan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_promo` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `group_product` int(11) NOT NULL,
  `link_video` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `promo_iklan` (`id`, `title_promo`, `slug`, `date`, `author`, `content`, `status`, `group_product`, `link_video`, `banner`) VALUES ('1', 'vimax bergairah sex', 'vimax-bergairah-sex', '2017-02-20 00:00:00', 'admin@admin.com', '<p>vimax bergairah sex<br></p>', '0', '3', '', NULL);
INSERT INTO `promo_iklan` (`id`, `title_promo`, `slug`, `date`, `author`, `content`, `status`, `group_product`, `link_video`, `banner`) VALUES ('2', 'VRO', 'VRO', '2017-02-19 20:36:54', 'admin@admin.com', '<p>VRO<br></p>', '1', '3', '', 'c6030592377930b17e77666a1bbb39d0.png');


#
# TABLE STRUCTURE FOR: routerapp
#

DROP TABLE IF EXISTS `routerapp`;

CREATE TABLE `routerapp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(192) NOT NULL,
  `controller` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `routerapp` (`id`, `slug`, `controller`) VALUES ('3', 'halaman', 'welcome/gethalaman');
INSERT INTO `routerapp` (`id`, `slug`, `controller`) VALUES ('7', 'rss.xml', 'welcome/rss');


#
# TABLE STRUCTURE FOR: schema_database
#

DROP TABLE IF EXISTS `schema_database`;

CREATE TABLE `schema_database` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `schema_database` (`version`) VALUES ('20170219225101');


#
# TABLE STRUCTURE FOR: settings
#

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `logo_header` varchar(100) DEFAULT NULL,
  `title_header` varchar(100) DEFAULT NULL,
  `description` text,
  `keyword` tinytext,
  `text_contact` tinytext,
  `runningtext` varchar(255) DEFAULT NULL,
  `title_footer` tinytext,
  `google_analyst` tinytext,
  `peta_lokasi` tinytext,
  `text_profil` tinytext,
  `ads` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `protocol` varchar(80) NOT NULL DEFAULT 'smtp',
  `smtp_host` varchar(100) NOT NULL,
  `smtp_user` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_port` char(12) NOT NULL,
  `newline` varchar(20) NOT NULL,
  `appidfb` varchar(100) DEFAULT NULL,
  `appid_secret` varchar(100) DEFAULT NULL,
  `sosmed_fb` varchar(95) DEFAULT NULL,
  `sosmed_inst` varchar(95) DEFAULT NULL,
  `sosmed_git` varchar(95) DEFAULT NULL,
  `sosmed_google` varchar(95) DEFAULT NULL,
  `sosmed_butc` varchar(95) DEFAULT NULL,
  `sosmed_tweet` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`logo_header`, `title_header`, `description`, `keyword`, `text_contact`, `runningtext`, `title_footer`, `google_analyst`, `peta_lokasi`, `text_profil`, `ads`, `favicon`, `protocol`, `smtp_host`, `smtp_user`, `smtp_password`, `smtp_port`, `newline`, `appidfb`, `appid_secret`, `sosmed_fb`, `sosmed_inst`, `sosmed_git`, `sosmed_google`, `sosmed_butc`, `sosmed_tweet`) VALUES ('Trefast Soft', 'WebTrefast', '<p>\r\n\r\ntrefastsoft,ecommerce,toko online,tutorial,web design,IT,Sistem Aplikasi,Sistem Informasi.\r\n\r\n<br></p>', 'trefastsoft,ecommerce,toko online,tutorial,web design,IT,Sistem Aplikasi,Sistem Informasi.', '<p>Jl. Pagersari - Patean  ,  Kab Kendal , Jawa Tengah<br></p><p>HP/WA:089692412261<br></p>', 'Trefast Soft  segera  terbit !!!!!', '', '', '', '<p>Trefast Development merupakan  start up bisnis pengembangan teknologi berbasis web <br></p><p><a target=\"_blank\" rel=\"nofollow\" href=\"http://localhost/trefastsoft/welcome/getpages/50/Tentang-trefast-soft\">lihat selengkapnya </a></p>', '', 'favicon.png', 'smtp', 'ssl://smtp.gmail.com', 'mucharomtzaka@gmail.com', 'kotajogja', '465', '\"\\r\\n\"', '1727167984172253', '', 'https://www.facebook.com/trefastsoft', '-', '-', '-', '-', '-');


#
# TABLE STRUCTURE FOR: shipping_kurir
#

DROP TABLE IF EXISTS `shipping_kurir`;

CREATE TABLE `shipping_kurir` (
  `id_kurir` int(11) NOT NULL AUTO_INCREMENT,
  `name_shipping` varchar(100) NOT NULL,
  `kode_shipping` varchar(100) NOT NULL,
  `img_shipping` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kurir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `shipping_kurir` (`id_kurir`, `name_shipping`, `kode_shipping`, `img_shipping`) VALUES ('1', 'JNE', 'SP00001', '6d0557c06cf8b55f6de4ce14f894b084.png');


#
# TABLE STRUCTURE FOR: trackbacks
#

DROP TABLE IF EXISTS `trackbacks`;

CREATE TABLE `trackbacks` (
  `tb_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `excerpt` text NOT NULL,
  `blog_name` varchar(100) NOT NULL,
  `tb_date` int(10) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  PRIMARY KEY (`tb_id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, '9XvwxyG8lHcV1S2TXsB90u', '1268889823', '1488171519', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('2', '::1', 'gunawan@gmail.com', '$2y$08$t75GOCupAOWWm.ZBKM3Zb..bQB7iBz.S/4vqy6iTvUohSuaPqMOPa', 'zN2YHmwt0cd9DaymaKKr.O', 'gunawan@gmail.com', NULL, NULL, NULL, NULL, '1487312483', NULL, '1', 'gunawan', 'santoso', 'trefast development', '123456');
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('3', '::1', 'cinta@yahoo.co.id', '$2y$08$NAzILZiTU8oCP0fvVpAZcuVgIqyzrNi7dXBYEhorjiFbQ8Yh3hkeO', 'SpYbNDoDlL4S9WsLOI/bZO', 'cinta@yahoo.co.id', NULL, 'rjN8wpHFCRb2cI-jyvcZHe237982350c7492878e', '1488380019', NULL, '1487314984', '1489288558', '1', 'cinta', 'cinta', 'trefast development', '12245666');
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('4', '127.0.0.1', 'mucharomtzaka@yahoo.co.id', '$2y$08$ugK/B9Zy4cViGZwKyjAfDu8mhnpnw5QzY9Y5bTla/y9t3m5U4jMfW', 'Kn0sqhRbOQAdw4karWob1e', 'mucharomtzaka@yahoo.co.id', NULL, 'ZjyDQ6zz75iPMlDa1T7ISOca46ef9a93df3caca6', '1488481217', NULL, '1487943997', '1489400701', '1', 'Mucha', 'rom', 'Trefastsoft', '089692412261');


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('4', '1', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('5', '1', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('7', '2', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('8', '3', '2');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('10', '4', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('11', '4', '3');


