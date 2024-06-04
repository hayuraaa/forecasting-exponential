create table `tb_provinsi` (
	`id_kategori` int(5) not null primary key,
	`kota` varchar(30) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `tb_data` (
	`id` int(5) not null primary key AUTO_INCREMENT,
	`waktu` varchar(10) not null,
	`unit` char(8) not null,
	`id_kategori` int(5) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `tb_grafik` (
	`id` int(5) not null primary key AUTO_INCREMENT,
	`nama` varchar(10) not null,
	`waktu` text not null,
	`aktual` text not null,
	`prediksi` text not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `tb_user` (
	`id` int(5) not null primary key AUTO_INCREMENT,
	`nama` varchar(50) not null,
	`username` varchar(30) not null,
	`password` varchar(200) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tb_provinsi` (`id_kategori`, `kota`) values
(1, 'TOTAL'),
(2, 'Prov. Aceh'),
(3, 'Prov. Bali'),
(4, 'Prov. Banten'),
(5, 'Prov. Bengkulu'),
(6, 'Prov. D.I.Yogyakarta'),
(7, 'Prov. DKI Jakarta'),
(8, 'Prov. Gorontalo'),
(9, 'Prov. Jambi'),
(10, 'Prov. Jawa Barat'),
(11, 'Prov. Jawa Tengah'),
(12, 'Prov. Jawa Timur'),
(13, 'Prov. Kalimantan Barat'),
(14, 'Prov. Kalimantan Selatan'),
(15, 'Prov. Kalimantan Tengah'),
(16, 'Prov. Kalimantan Timur'),
(17, 'Prov. Bangka Belitung'),
(18, 'Prov. Kepulauan Riau'),
(19, 'Prov. Lampung'),
(20, 'Prov. Maluku Utara'),
(21, 'Prov. Nusa Tenggara Barat'),
(22, 'Prov. Nusa Tenggara Timur'),
(23, 'Prov. Papua'),
(24, 'Prov. Papua Barat'),
(25, 'Prov. Riau'),
(26, 'Prov. Sulawesi Barat'),
(27, 'Prov. Sulawesi Selatan'),
(28, 'Prov. Sulawesi Tengah'),
(29, 'Prov. Sulawesi Tenggara'),
(30, 'Prov. Sulawesi Utara'),
(31, 'Prov. Sumatera Barat'),
(32, 'Prov. Sumatera Selatan'),
(33, 'Prov. Sumatera Utara'),
(34, 'Prov. Maluku'),
(35, 'Prov. Kalimantan Utara');


INSERT INTO `tb_data` (`waktu`, `unit`, `id_kategori`) values
('2013Q3' ,68066, 1),
('2013Q4' ,102714, 1),
('2014Q1' ,5240, 1),
('2014Q2' ,18278, 1),
('2014Q3' ,29471, 1),
('2014Q4' ,76063, 1),
('2015Q1' ,4253, 1),
('2015Q2' ,34445, 1),
('2015Q3' ,70135, 1),
('2015Q4' ,76489, 1),
('2016Q1' ,3851, 1),
('2016Q2' ,7009, 1),
('2016Q3' ,37856, 1),
('2016Q4' ,58469, 1),
('2017Q1' ,2388, 1),
('2017Q2' ,6491, 1),
('2017Q3' ,10332, 1),
('2017Q4' ,23769, 1),
('2018Q1' ,1413, 1),
('2018Q2' ,8397, 1),
('2018Q3' ,7493, 1),
('2018Q4' ,40654, 1),
('2019Q1' ,27762, 1),
('2019Q2' ,45289, 1),

/*------Aceh------*/
('2013Q3' ,64, 2),
('2013Q4' ,107, 2),
('2014Q1' ,26, 2),
('2014Q2' ,21, 2),
('2014Q3' ,47, 2),
('2014Q4' ,156, 2),
('2015Q1' ,8, 2),
('2015Q2' ,115, 2),
('2015Q3' ,260, 2),
('2015Q4' ,278, 2),
('2016Q1' ,43, 2),
('2016Q2' ,63, 2),
('2016Q3' ,359, 2),
('2016Q4' ,437, 2),
('2017Q1' ,9, 2),
('2017Q2' ,13, 2),
('2017Q3' ,17, 2),
('2017Q4' ,23, 2),
('2018Q1' ,3, 2),
('2018Q2' ,15, 2),
('2018Q3' ,28, 2),
('2018Q4' ,234, 2),
('2019Q1' ,272, 2),
('2019Q2' ,510, 2),



/*--------------------------------Bali--------------------------------*/
('2013Q3' ,128, 3),
('2013Q4' ,151, 3),
('2014Q1' ,9, 3),
('2014Q2' ,30, 3),
('2014Q3' ,40, 3),
('2014Q4' ,103, 3),
('2015Q1' ,4, 3),
('2015Q2' ,26, 3),
('2015Q3' ,45, 3),
('2015Q4' ,45, 3),
('2016Q1' ,0, 3),
('2016Q2' ,1, 3),
('2016Q3' ,79, 3),
('2016Q4' ,87, 3),
('2017Q1' ,7, 3),
('2017Q2' ,25, 3),
('2017Q3' ,28, 3),
('2017Q4' ,63, 3),
('2018Q1' ,0, 3),
('2018Q2' ,50, 3),
('2018Q3' ,11, 3),
('2018Q4' ,155, 3),
('2019Q1' ,321, 3),
('2019Q2' ,374, 3),
/*-------------------------------------------------------------------------*/



/*------Banten------*/
('2013Q3' ,7207, 4),
('2013Q4' ,11033, 4),
('2014Q1' ,668, 4),
('2014Q2' ,2120, 4),
('2014Q3' ,3749, 4),
('2014Q4' ,8137, 4),
('2015Q1' ,208, 4),
('2015Q2' ,3450, 4),
('2015Q3' ,6973, 4),
('2015Q4' ,7691, 4),
('2016Q1' ,410, 4),
('2016Q2' ,814, 4),
('2016Q3' ,3476, 4),
('2016Q4' ,5472, 4),
('2017Q1' ,209, 4),
('2017Q2' ,534, 4),
('2017Q3' ,809, 4),
('2017Q4' ,1595, 4),
('2018Q1' ,56, 4),
('2018Q2' ,354, 4),
('2018Q3' ,203, 4),
('2018Q4' ,2570, 4),
('2019Q1' ,2362, 4),
('2019Q2' ,2985, 4),

/*------Bengkulu------*/
('2013Q3' ,457, 5),
('2013Q4' ,670, 5),
('2014Q1' ,24, 5),
('2014Q2' ,116, 5),
('2014Q3' ,280, 5),
('2014Q4' ,567, 5),
('2015Q1' ,36, 5),
('2015Q2' ,651, 5),
('2015Q3' ,1052, 5),
('2015Q4' ,1095, 5),
('2016Q1' ,148, 5),
('2016Q2' ,189, 5),
('2016Q3' ,774, 5),
('2016Q4' ,1029, 5),
('2017Q1' ,27, 5),
('2017Q2' ,50, 5),
('2017Q3' ,65, 5),
('2017Q4' ,121, 5),
('2018Q1' ,36, 5),
('2018Q2' ,105, 5),
('2018Q3' ,68, 5),
('2018Q4' ,278, 5),
('2019Q1' ,531, 5),
('2019Q2' ,758, 5),



/*---------------------------------Yogyakarta----------------------*/
('2013Q3' ,245, 6),
('2013Q4' ,347, 6),
('2014Q1' ,22, 6),
('2014Q2' ,59, 6),
('2014Q3' ,103, 6),
('2014Q4' ,194, 6),
('2015Q1' ,16, 6),
('2015Q2' ,11, 6),
('2015Q3' ,69, 6),
('2015Q4' ,73, 6),
('2016Q1' ,0, 6),
('2016Q2' ,0, 6),
('2016Q3' ,54, 6),
('2016Q4' ,84, 6),
('2017Q1' ,0, 6),
('2017Q2' ,0, 6),
('2017Q3' ,1, 6),
('2017Q4' ,13, 6),
('2018Q1' ,17, 6),
('2018Q2' ,12, 6),
('2018Q3' ,19, 6),
('2018Q4' ,20, 6),
('2019Q1' ,7, 6),
('2019Q2' ,46, 6),
/*-------------------------------------------------------------------------*/


/*--------------------------------jakarta------------------------------*/
('2013Q3' ,5, 7),
('2013Q4' ,54, 7),
('2014Q1' ,0, 7),
('2014Q2' ,0, 7),
('2014Q3' ,0, 7),
('2014Q4' ,4, 7),
('2015Q1' ,34, 7),
('2015Q2' ,0, 7),
('2015Q3' ,0, 7),
('2015Q4' ,6, 7),
('2016Q1' ,0, 7),
('2016Q2' ,1, 7),
('2016Q3' ,21, 7),
('2016Q4' ,36, 7),
('2017Q1' ,22, 7),
('2017Q2' ,36, 7),
('2017Q3' ,43, 7),
('2017Q4' ,62, 7),
('2018Q1' ,0, 7),
('2018Q2' ,1, 7),
('2018Q3' ,0, 7),
('2018Q4' ,3, 7),
('2019Q1' ,4, 7),
('2019Q2' ,4, 7),
/*-------------------------------------------------------------------------*/


/*---------------------------------Gorontalo--------------------------------*/
('2013Q3' ,315, 8),
('2013Q4' ,459, 8),
('2014Q1' ,15, 8),
('2014Q2' ,66, 8),
('2014Q3' ,84, 8),
('2014Q4' ,257, 8),
('2015Q1' ,13, 8),
('2015Q2' ,162, 8),
('2015Q3' ,292, 8),
('2015Q4' ,302, 8),
('2016Q1' ,26, 8),
('2016Q2' ,32, 8),
('2016Q3' ,173, 8),
('2016Q4' ,231, 8),
('2017Q1' ,0, 8),
('2017Q2' ,7, 8),
('2017Q3' ,9, 8),
('2017Q4' ,18, 8),
('2018Q1' ,0, 8),
('2018Q2' ,5, 8),
('2018Q3' ,7, 8),
('2018Q4' ,143, 8),
('2019Q1' ,86, 8),
('2019Q2' ,202, 8),
/*-------------------------------------------------------------------------*/



/*------jambi------*/
('2013Q3' ,1161, 9),
('2013Q4' ,1523, 9),
('2014Q1' ,80, 9),
('2014Q2' ,274, 9),
('2014Q3' ,629, 9),
('2014Q4' ,1154, 9),
('2015Q1' ,72, 9),
('2015Q2' ,713, 9),
('2015Q3' ,1260, 9),
('2015Q4' ,1351, 9),
('2016Q1' ,70, 9),
('2016Q2' ,188, 9),
('2016Q3' ,1050, 9),
('2016Q4' ,1554, 9),
('2017Q1' ,176, 9),
('2017Q2' ,360, 9),
('2017Q3' ,564, 9),
('2017Q4' ,1210, 9),
('2018Q1' ,110, 9),
('2018Q2' ,427, 9),
('2018Q3' ,389, 9),
('2018Q4' ,1037, 9),
('2019Q1' ,740, 9),
('2019Q2' ,1576, 9),

/*------Jawa Barat------*/
('2013Q3' ,27497, 10),
('2013Q4' ,41980, 10),
('2014Q1' ,1564, 10),
('2014Q2' ,6433, 10),
('2014Q3' ,10061, 10),
('2014Q4' ,28751, 10),
('2015Q1' ,1281, 10),
('2015Q2' ,13037, 10),
('2015Q3' ,26065, 10),
('2015Q4' ,28409, 10),
('2016Q1' ,1190, 10),
('2016Q2' ,1984, 10),
('2016Q3' ,11047, 10),
('2016Q4' ,17173, 10),
('2017Q1' ,253, 10),
('2017Q2' ,679, 10),
('2017Q3' ,1215, 10),
('2017Q4' ,3381, 10),
('2018Q1' ,95, 10),
('2018Q2' ,1255, 10),
('2018Q3' ,746, 10),
('2018Q4' ,12013, 10),
('2019Q1' ,8415, 10),
('2019Q2' ,11701, 10),

/*------Jawa Tengah------*/
('2013Q3' ,3848, 11),
('2013Q4' ,5639, 11),
('2014Q1' ,267, 11),
('2014Q2' ,973, 11),
('2014Q3' ,1536, 11),
('2014Q4' ,3955, 11),
('2015Q1' ,356, 11),
('2015Q2' ,1596, 11),
('2015Q3' ,3723, 11),
('2015Q4' ,4033, 11),
('2016Q1' ,147, 11),
('2016Q2' ,235, 11),
('2016Q3' ,1548, 11),
('2016Q4' ,2294, 11),
('2017Q1' ,58, 11),
('2017Q2' ,127, 11),
('2017Q3' ,182, 11),
('2017Q4' ,364, 11),
('2018Q1' ,26, 11),
('2018Q2' ,127, 11),
('2018Q3' ,218, 11),
('2018Q4' ,974, 11),
('2019Q1' ,909, 11),
('2019Q2' ,1366, 11),

/*------Jawa Timur------*/
('2013Q3' ,4979, 12),
('2013Q4' ,6988, 12),
('2014Q1' ,281, 12),
('2014Q2' ,1106, 12),
('2014Q3' ,1821, 12),
('2014Q4' ,4050, 12),
('2015Q1' ,315, 12),
('2015Q2' ,1713, 12),
('2015Q3' ,3333, 12),
('2015Q4' ,3647, 12),
('2016Q1' ,229, 12),
('2016Q2' ,395, 12),
('2016Q3' ,1986, 12),
('2016Q4' ,2699, 12),
('2017Q1' ,126, 12),
('2017Q2' ,237, 12),
('2017Q3' ,324, 12),
('2017Q4' ,646, 12),
('2018Q1' ,48, 12),
('2018Q2' ,353, 12),
('2018Q3' ,258, 12),
('2018Q4' ,1256, 12),
('2019Q1' ,1670, 12),
('2019Q2' ,2502, 12),

/*------Kalimantan Barat------*/
('2013Q3' ,2334, 13),
('2013Q4' ,3358, 13),
('2014Q1' ,415, 13),
('2014Q2' ,693, 13),
('2014Q3' ,1275, 13),
('2014Q4' ,3152, 13),
('2015Q1' ,87, 13),
('2015Q2' ,1067, 13),
('2015Q3' ,2068, 13),
('2015Q4' ,2420, 13),
('2016Q1' ,220, 13),
('2016Q2' ,408, 13),
('2016Q3' ,1621, 13),
('2016Q4' ,2388, 13),
('2017Q1' ,255, 13),
('2017Q2' ,511, 13),
('2017Q3' ,747, 13),
('2017Q4' ,1620, 13),
('2018Q1' ,114, 13),
('2018Q2' ,757, 13),
('2018Q3' ,521, 13),
('2018Q4' ,1459, 13),
('2019Q1' ,917, 13),
('2019Q2' ,2159, 13),

/*------Kalimantan Selatan------*/
('2013Q3' ,4218, 14),
('2013Q4' ,6755, 14),
('2014Q1' ,315, 14),
('2014Q2' ,1398, 14),
('2014Q3' ,2253, 14),
('2014Q4' ,5373, 14),
('2015Q1' ,468, 14),
('2015Q2' ,2087, 14),
('2015Q3' ,4796, 14),
('2015Q4' ,5085, 14),
('2016Q1' ,171, 14),
('2016Q2' ,321, 14),
('2016Q3' ,2316, 14),
('2016Q4' ,3199, 14),
('2017Q1' ,40, 14),
('2017Q2' ,119, 14),
('2017Q3' ,184, 14),
('2017Q4' ,680, 14),
('2018Q1' ,44, 14),
('2018Q2' ,239, 14),
('2018Q3' ,251, 14),
('2018Q4' ,1850, 14),
('2019Q1' ,1004, 14),
('2019Q2' ,2084, 14),

/*------Kalimantan Tengah------*/
('2013Q3' ,688, 15),
('2013Q4' ,1187, 15),
('2014Q1' ,84, 15),
('2014Q2' ,249, 15),
('2014Q3' ,365, 15),
('2014Q4' ,1352, 15),
('2015Q1' ,10, 15),
('2015Q2' ,784, 15),
('2015Q3' ,1506, 15),
('2015Q4' ,1614, 15),
('2016Q1' ,80, 15),
('2016Q2' ,187, 15),
('2016Q3' ,1222, 15),
('2016Q4' ,1736, 15),
('2017Q1' ,44, 15),
('2017Q2' ,160, 15),
('2017Q3' ,284, 15),
('2017Q4' ,633, 15),
('2018Q1' ,59, 15),
('2018Q2' ,205, 15),
('2018Q3' ,154, 15),
('2018Q4' ,942, 15),
('2019Q1' ,398, 15),
('2019Q2' ,862, 15),

/*------Kalimantan Tengah------*/
('2013Q3' ,368, 16),
('2013Q4' ,495, 16),
('2014Q1' ,106, 16),
('2014Q2' ,39, 16),
('2014Q3' ,149, 16),
('2014Q4' ,262, 16),
('2015Q1' ,11, 16),
('2015Q2' ,43, 16),
('2015Q3' ,235, 16),
('2015Q4' ,235, 16),
('2016Q1' ,34, 16),
('2016Q2' ,40, 16),
('2016Q3' ,349, 16),
('2016Q4' ,452, 16),
('2017Q1' ,7, 16),
('2017Q2' ,22, 16),
('2017Q3' ,29, 16),
('2017Q4' ,197, 16),
('2018Q1' ,3, 16),
('2018Q2' ,67, 16),
('2018Q3' ,75, 16),
('2018Q4' ,438, 16),
('2019Q1' ,215, 16),
('2019Q2' ,335, 16),

/*------Bangka Belitung------*/
('2013Q3' ,219, 17),
('2013Q4' ,253, 17),
('2014Q1' ,4, 17),
('2014Q2' ,65, 17),
('2014Q3' ,106, 17),
('2014Q4' ,223, 17),
('2015Q1' ,24, 17),
('2015Q2' ,294, 17),
('2015Q3' ,529, 17),
('2015Q4' ,593, 17),
('2016Q1' ,80, 17),
('2016Q2' ,132, 17),
('2016Q3' ,587, 17),
('2016Q4' ,921, 17),
('2017Q1' ,64, 17),
('2017Q2' ,171, 17),
('2017Q3' ,231, 17),
('2017Q4' ,596, 17),
('2018Q1' ,10, 17),
('2018Q2' ,138, 17),
('2018Q3' ,61, 17),
('2018Q4' ,424, 17),
('2019Q1' ,443, 17),
('2019Q2' ,564, 17),



/*--------------------------------Kepulauan Riau------------------------*/
('2013Q3' ,1979, 18),
('2013Q4' ,2781, 18),
('2014Q1' ,107, 18),
('2014Q2' ,433, 18),
('2014Q3' ,687, 18),
('2014Q4' ,1731, 18),
('2015Q1' ,105, 18),
('2015Q2' ,753, 18),
('2015Q3' ,1374, 18),
('2015Q4' ,1529, 18),
('2016Q1' ,33, 18),
('2016Q2' ,57, 18),
('2016Q3' ,583, 18),
('2016Q4' ,845, 18),
('2017Q1' ,11, 18),
('2017Q2' ,98, 18),
('2017Q3' ,153, 18),
('2017Q4' ,302, 18),
('2018Q1' ,0, 18),
('2018Q2' ,61, 18),
('2018Q3' ,66, 18),
('2018Q4' ,327, 18),
('2019Q1' ,265, 18),
('2019Q2' ,437, 18),
/*-------------------------------------------------------------------------*/


/*------Lampung------*/
('2013Q3' ,536, 19),
('2013Q4' ,771, 19),
('2014Q1' ,21, 19),
('2014Q2' ,109, 19),
('2014Q3' ,213, 19),
('2014Q4' ,435, 19),
('2015Q1' ,59, 19),
('2015Q2' ,250, 19),
('2015Q3' ,501, 19),
('2015Q4' ,546, 19),
('2016Q1' ,89, 19),
('2016Q2' ,165, 19),
('2016Q3' ,784, 19),
('2016Q4' ,953, 19),
('2017Q1' ,47, 19),
('2017Q2' ,100, 19),
('2017Q3' ,146, 19),
('2017Q4' ,286, 19),
('2018Q1' ,29, 19),
('2018Q2' ,104, 19),
('2018Q3' ,143, 19),
('2018Q4' ,757, 19),
('2019Q1' ,471, 19),
('2019Q2' ,1014, 19),



/*--------------------------------Maluku Utara--------------------------*/
('2013Q3' ,31, 20),
('2013Q4' ,52, 20),
('2014Q1' ,10, 20),
('2014Q2' ,16, 20),
('2014Q3' ,25, 20),
('2014Q4' ,64, 20),
('2015Q1' ,3, 20),
('2015Q2' ,11, 20),
('2015Q3' ,21, 20),
('2015Q4' ,26, 20),
('2016Q1' ,5, 20),
('2016Q2' ,10, 20),
('2016Q3' ,42, 20),
('2016Q4' ,46, 20),
('2017Q1' ,0, 20),
('2017Q2' ,0, 20),
('2017Q3' ,0, 20),
('2017Q4' ,0, 20),
('2018Q1' ,0, 20),
('2018Q2' ,0, 20),
('2018Q3' ,0, 20),
('2018Q4' ,10, 20),
('2019Q1' ,22, 20),
('2019Q2' ,31, 20),
/*-------------------------------------------------------------------------*/


/*--------------------------------------NTB---------------------------------*/
('2013Q3' ,24, 21),
('2013Q4' ,24, 21),
('2014Q1' ,0, 21),
('2014Q2' ,13, 21),
('2014Q3' ,19, 21),
('2014Q4' ,43, 21),
('2015Q1' ,3, 21),
('2015Q2' ,3, 21),
('2015Q3' ,76, 21),
('2015Q4' ,94, 21),
('2016Q1' ,29, 21),
('2016Q2' ,37, 21),
('2016Q3' ,300, 21),
('2016Q4' ,378, 21),
('2017Q1' ,7, 21),
('2017Q2' ,18, 21),
('2017Q3' ,23, 21),
('2017Q4' ,100, 21),
('2018Q1' ,10, 21),
('2018Q2' ,85, 21),
('2018Q3' ,66, 21),
('2018Q4' ,678, 21),
('2019Q1' ,300, 21),
('2019Q2' ,510, 21),
/*-------------------------------------------------------------------------*/



/*------NTT------*/
('2013Q3' ,184, 22),
('2013Q4' ,270, 22),
('2014Q1' ,11, 22),
('2014Q2' ,21, 22),
('2014Q3' ,33, 22),
('2014Q4' ,155, 22),
('2015Q1' ,16, 22),
('2015Q2' ,58, 22),
('2015Q3' ,119, 22),
('2015Q4' ,135, 22),
('2016Q1' ,8, 22),
('2016Q2' ,10, 22),
('2016Q3' ,111, 22),
('2016Q4' ,281, 22),
('2017Q1' ,2, 22),
('2017Q2' ,6, 22),
('2017Q3' ,99, 22),
('2017Q4' ,368, 22),
('2018Q1' ,9, 22),
('2018Q2' ,82, 22),
('2018Q3' ,135, 22),
('2018Q4' ,505, 22),
('2019Q1' ,167, 22),
('2019Q2' ,284, 22),

/*------Papua------*/
('2013Q3' ,329, 23),
('2013Q4' ,460, 23),
('2014Q1' ,40, 23),
('2014Q2' ,100, 23),
('2014Q3' ,146, 23),
('2014Q4' ,532, 23),
('2015Q1' ,17, 23),
('2015Q2' ,215, 23),
('2015Q3' ,396, 23),
('2015Q4' ,622, 23),
('2016Q1' ,50, 23),
('2016Q2' ,159, 23),
('2016Q3' ,516, 23),
('2016Q4' ,1085, 23),
('2017Q1' ,80, 23),
('2017Q2' ,291, 23),
('2017Q3' ,452, 23),
('2017Q4' ,933, 23),
('2018Q1' ,125, 23),
('2018Q2' ,237, 23),
('2018Q3' ,263, 23),
('2018Q4' ,581, 23),
('2019Q1' ,259, 23),
('2019Q2' ,459, 23),

/*------Papua Barat------*/
('2013Q3' ,26, 24),
('2013Q4' ,42, 24),
('2014Q1' ,1, 24),
('2014Q2' ,8, 24),
('2014Q3' ,9, 24),
('2014Q4' ,53, 24),
('2015Q1' ,2, 24),
('2015Q2' ,110, 24),
('2015Q3' ,143, 24),
('2015Q4' ,289, 24),
('2016Q1' ,88, 24),
('2016Q2' ,201, 24),
('2016Q3' ,588, 24),
('2016Q4' ,1572, 24),
('2017Q1' ,299, 24),
('2017Q2' ,972, 24),
('2017Q3' ,1396, 24),
('2017Q4' ,2456, 24),
('2018Q1' ,46, 24),
('2018Q2' ,362, 24),
('2018Q3' ,437, 24),
('2018Q4' ,742, 24),
('2019Q1' ,133, 24),
('2019Q2' ,399, 24),

/*------Riau------*/
('2013Q3' ,2653, 25),
('2013Q4' ,4024, 25),
('2014Q1' ,276, 25),
('2014Q2' ,887, 25),
('2014Q3' ,1316, 25),
('2014Q4' ,3658, 25),
('2015Q1' ,172, 25),
('2015Q2' ,1971, 25),
('2015Q3' ,3752, 25),
('2015Q4' ,3954, 25),
('2016Q1' ,157, 25),
('2016Q2' ,361, 25),
('2016Q3' ,2073, 25),
('2016Q4' ,3150, 25),
('2017Q1' ,109, 25),
('2017Q2' ,306, 25),
('2017Q3' ,465, 25),
('2017Q4' ,1367, 25),
('2018Q1' ,35, 25),
('2018Q2' ,583, 25),
('2018Q3' ,431, 25),
('2018Q4' ,3252, 25),
('2019Q1' ,1000, 25),
('2019Q2' ,1991, 25),



/*----------------------------------Sulawesi Barat-----------------------*/
('2013Q3' ,117, 26),
('2013Q4' ,249, 26),
('2014Q1' ,13, 26),
('2014Q2' ,71, 26),
('2014Q3' ,86, 26),
('2014Q4' ,231, 26),
('2015Q1' ,13, 26),
('2015Q2' ,138, 26),
('2015Q3' ,251, 26),
('2015Q4' ,263, 26),
('2016Q1' ,9, 26),
('2016Q2' ,10, 26),
('2016Q3' ,103, 26),
('2016Q4' ,158, 26),
('2017Q1' ,0, 26),
('2017Q2' ,0, 26),
('2017Q3' ,3, 26),
('2017Q4' ,101, 26),
('2018Q1' ,21, 26),
('2018Q2' ,43, 26),
('2018Q3' ,89, 26),
('2018Q4' ,532, 26),
('2019Q1' ,177, 26),
('2019Q2' ,360, 26),
/*-------------------------------------------------------------------------*/



/*------Sulawesi Selatan------*/
('2013Q3' ,1077, 27),
('2013Q4' ,1740, 27),
('2014Q1' ,76, 27),
('2014Q2' ,348, 27),
('2014Q3' ,509, 27),
('2014Q4' ,1473, 27),
('2015Q1' ,129, 27),
('2015Q2' ,954, 27),
('2015Q3' ,2124, 27),
('2015Q4' ,2223, 27),
('2016Q1' ,199, 27),
('2016Q2' ,339, 27),
('2016Q3' ,1507, 27),
('2016Q4' ,2375, 27),
('2017Q1' ,69, 27),
('2017Q2' ,154, 27),
('2017Q3' ,225, 27),
('2017Q4' ,874, 27),
('2018Q1' ,104, 27),
('2018Q2' ,586, 27),
('2018Q3' ,532, 27),
('2018Q4' ,2268, 27),
('2019Q1' ,1174, 27),
('2019Q2' ,2577, 27),

/*------Sulawesi Tengah------*/
('2013Q3' ,532, 28),
('2013Q4' ,754, 28),
('2014Q1' ,68, 28),
('2014Q2' ,108, 28),
('2014Q3' ,179, 28),
('2014Q4' ,649, 28),
('2015Q1' ,78, 28),
('2015Q2' ,261, 28),
('2015Q3' ,542, 28),
('2015Q4' ,641, 28),
('2016Q1' ,31, 28),
('2016Q2' ,79, 28),
('2016Q3' ,329, 28),
('2016Q4' ,475, 28),
('2017Q1' ,16, 28),
('2017Q2' ,58, 28),
('2017Q3' ,84, 28),
('2017Q4' ,240, 28),
('2018Q1' ,33, 28),
('2018Q2' ,77, 28),
('2018Q3' ,79, 28),
('2018Q4' ,142, 28),
('2019Q1' ,153, 28),
('2019Q2' ,283, 28),

/*------Sulawesi Tenggara------*/
('2013Q3' ,168, 29),
('2013Q4' ,244, 29),
('2014Q1' ,22, 29),
('2014Q2' ,74, 29),
('2014Q3' ,127, 29),
('2014Q4' ,322, 29),
('2015Q1' ,90, 29),
('2015Q2' ,280, 29),
('2015Q3' ,511, 29),
('2015Q4' ,582, 29),
('2016Q1' ,42, 29),
('2016Q2' ,79, 29),
('2016Q3' ,301, 29),
('2016Q4' ,593, 29),
('2017Q1' ,105, 29),
('2017Q2' ,266, 29),
('2017Q3' ,392, 29),
('2017Q4' ,882, 29),
('2018Q1' ,136, 29),
('2018Q2' ,456, 29),
('2018Q3' ,358, 29),
('2018Q4' ,687, 29),
('2019Q1' ,454, 29),
('2019Q2' ,937, 29),



/*-----------------------------------Sulawesi Utara--------------------------*/
('2013Q3' ,782, 29),
('2013Q4' ,1282, 29),
('2014Q1' ,15, 29),
('2014Q2' ,237, 29),
('2014Q3' ,260, 29),
('2014Q4' ,942, 29),
('2015Q1' ,24, 29),
('2015Q2' ,377, 29),
('2015Q3' ,841, 29),
('2015Q4' ,951, 29),
('2016Q1' ,38, 29),
('2016Q2' ,73, 29),
('2016Q3' ,534, 29),
('2016Q4' ,1033, 29),
('2017Q1' ,51, 29),
('2017Q2' ,172, 29),
('2017Q3' ,249, 29),
('2017Q4' ,825, 29),
('2018Q1' ,0, 29),
('2018Q2' ,195, 29),
('2018Q3' ,132, 29),
('2018Q4' ,909, 29),
('2019Q1' ,233, 29),
('2019Q2' ,714, 29),
/*-------------------------------------------------------------------------*/



/*------Sumatera Barat------*/
('2013Q3' ,456, 31),
('2013Q4' ,680, 31),
('2014Q1' ,38, 31),
('2014Q2' ,112, 31),
('2014Q3' ,154, 31),
('2014Q4' ,541, 31),
('2015Q1' ,79, 31),
('2015Q2' ,466, 31),
('2015Q3' ,894, 31),
('2015Q4' ,938, 31),
('2016Q1' ,17, 31),
('2016Q2' ,57, 31),
('2016Q3' ,607, 31),
('2016Q4' ,720, 31),
('2017Q1' ,4, 31),
('2017Q2' ,91, 31),
('2017Q3' ,149, 31),
('2017Q4' ,241, 31),
('2018Q1' ,4, 31),
('2018Q2' ,124, 31),
('2018Q3' ,100, 31),
('2018Q4' ,653, 31),
('2019Q1' ,494, 31),
('2019Q2' ,708, 31),

/*------Sumatera Selatan------*/
('2013Q3' ,2745, 32),
('2013Q4' ,4428, 32),
('2014Q1' ,465, 32),
('2014Q2' ,1247, 32),
('2014Q3' ,2079, 32),
('2014Q4' ,4617, 32),
('2015Q1' ,292, 32),
('2015Q2' ,1595, 32),
('2015Q3' ,3664, 32),
('2015Q4' ,3879, 32),
('2016Q1' ,68, 32),
('2016Q2' ,163, 32),
('2016Q3' ,1485, 32),
('2016Q4' ,2440, 32),
('2017Q1' ,141, 32),
('2017Q2' ,324, 32),
('2017Q3' ,436, 32),
('2017Q4' ,932, 32),
('2018Q1' ,97, 32),
('2018Q2' ,493, 32),
('2018Q3' ,659, 32),
('2018Q4' ,1983, 32),
('2019Q1' ,2183, 32),
('2019Q2' ,3209, 32),

/*------Sumatera Utara------*/
('2013Q3' ,2683, 33),
('2013Q4' ,3903, 33),
('2014Q1' ,197, 33),
('2014Q2' ,825, 33),
('2014Q3' ,1090, 33),
('2014Q4' ,2897, 33),
('2015Q1' ,262, 33),
('2015Q2' ,1253, 33),
('2015Q3' ,2709, 33),
('2015Q4' ,2935, 33),
('2016Q1' ,140, 33),
('2016Q2' ,219, 33),
('2016Q3' ,1331, 33),
('2016Q4' ,2573, 33),
('2017Q1' ,150, 33),
('2017Q2' ,584, 33),
('2017Q3' ,1298, 33),
('2017Q4' ,2630, 33),
('2018Q1' ,142, 33),
('2018Q2' ,793, 33),
('2018Q3' ,986, 33),
('2018Q4' ,2774, 33),
('2019Q1' ,1951, 33),
('2019Q2' ,3358, 33);



/*--------------------------------Maluku----------------------------------*/
('2013Q3' ,11, 34),
('2013Q4' ,11, 34),
('2014Q1' ,0, 34),
('2014Q2' ,0, 34),
('2014Q3' ,0, 34),
('2014Q4' ,0, 34),
('2015Q1' ,0, 34),
('2015Q2' ,0, 34),
('2015Q3' ,0, 34),
('2015Q4' ,0, 34),
('2016Q1' ,0, 34),
('2016Q2' ,0, 34),
('2016Q3' ,0, 34),
('2016Q4' ,0, 34),
('2017Q1' ,0, 34),
('2017Q2' ,0, 34),
('2017Q3' ,0, 34),
('2017Q4' ,0, 34),
('2018Q1' ,0, 34),
('2018Q2' ,0, 34),
('2018Q3' ,0, 34),
('2018Q4' ,0, 34),
('2019Q1' ,15, 34),
('2019Q2' ,23, 34),
/*-------------------------------------------------------------------------*/


/*--------------------------------Kalimantan Utara--------------------------*/
('2013Q3' ,0, 35),
('2013Q4' ,0, 35),
('2014Q1' ,0, 35),
('2014Q2' ,27, 35),
('2014Q3' ,37, 35),
('2014Q4' ,0, 35),
('2015Q1' ,0, 35),
('2015Q2' ,0, 35),
('2015Q3' ,5, 35),
('2015Q4' ,5, 35),
('2016Q1' ,0, 35),
('2016Q2' ,0, 35),
('2016Q3' ,0, 35),
('2016Q4' ,0, 35),
('2017Q1' ,0, 35),
('2017Q2' ,0, 35),
('2017Q3' ,0, 35),
('2017Q4' ,10, 35),
('2018Q1' ,1, 35),
('2018Q2' ,6, 35),
('2018Q3' ,8, 35),
('2018Q4' ,58, 35),
('2019Q1' ,17, 35),
('2019Q2' ,27, 35);
/*-------------------------------------------------------------------------*/