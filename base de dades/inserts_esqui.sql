INSERT INTO client VALUES 
('12345678a', 'Joan', 'Vilaseca', '645456456', 'jvilaseca@hotmail.com', 'user1', md5('12345')),		#fam_num
('12345678b', 'Pep', 'Plaza', '645985456', 'plaza@hotmail.es', 'user2', md5('12345')),				#federat
('12345678c', 'Marta', 'Capellades', '623556456', 'suica@gmail.com', 'user3', md5('12345')),		#fam_num
('12345678d', 'Montse', 'García', '600256456', 'montseGarcia@gmail.com', 'user4', md5('12345')),	#federat
('12345678e', 'Tom', 'Holland', '64545961', 'hello@outlook.com', 'user5', md5('12345'));

INSERT INTO federat VALUES 
('12345678b','6','00005','2025-2-28'),
('12345678d','9','00155','2030-10-14');

INSERT INTO fam_num VALUES 
('12345678a', '01095','2025-2-28'),
('12345678c', '20159','2030-10-14');
/*
INSERT INTO dies VALUES
(default, 'Dilluns'),
(default, 'Dimarts'),
(default, 'Dimecres'),
(default, 'Dijous'),
(default, 'Divendres'),
(default, 'Dissabte'),
(default, 'Diumenge');
*/
INSERT INTO monitor VALUES
('12345678o', 'Pamela', 'Anderson'),
('12345678p', 'John', 'Travolta'),
('12345678q', 'Mia', 'Farrow'),
('12345678r', 'Tom', 'Cruise'),
('12345678s', 'Alejandro', 'Sanz');

INSERT INTO curs VALUES 
(default, 'Curs esquí Iniciació','12345678o'),		#colectiu
(default, 'Curs Snow','12345678s'),					#individual
(default, 'Curs esquí avançat','12345678p'),		#colectiu
(default, 'Curs natació a la neu','12345678q'),		#colectiu
(default, 'Curs reabilitació','12345678p'),			#individual
(default, 'Curs esqui infantil','12345678r'),		#competicio
(default, 'Curs fer la croqueta','12345678o');		#competicio

INSERT INTO curs_individual VALUES 
(2, 12.00),
(5, 8.00);

INSERT INTO curs_colectiu VALUES 
(1, '2022-06-21', 0.00),
(3, '2022-06-14', 0.00),
(4, '2022-06-12', 0.00);

INSERT INTO curs_competicio VALUES 
(6, 6, '2022-06-12', '2022-07-18', 550.99),
(7, 4, '2022-05-29', '2022-07-11', 740.39);

INSERT INTO material VALUES
(default, 'Lacroix', 'lc-556', true, 55.99, 2 ),		#Pals	1
(default, 'Atomic', 'at-45', true, 269.99, 0 ),			#esquis	2
(default, 'Atomic', 'at-556', true, 24.99, 2 ),			#botes	3
(default, 'Blizzard', 'bl-852', true, 96.99, 2 ),		#esquis	4
(default, 'Atomic', 'at-596', true, 55.99, 2 ),			#esquis	5
(default, 'Atomic', 'at-5', true, 82.99, 2 ),			#Pals	6
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	7
(default, 'Atomic', 'at-gfg', true, 12.99, 2 ),			#esquis	8
(default, 'Fischer', 'fs-577', true, 23.99, 2 ),		#botes	9
(default, 'Lacroix', 'lc-8856', true, 55.99, 1 ),		#Pals	10
(default, 'Atomic', 'at-556', true, 36.99, 2 ),			#Pals	11
(default, 'Atomic', 'at-5998', true, 44.99, 0 ),		#botes	12
(default, 'Fischer', 'fs-df6', true, 78.99, 4 ),		#esquis	13
(default, 'Atomic', 'at-588', true, 55.99, 2 ),			#botes	14
(default, 'Blizzard', 'bl-rret4', true, 42.99, 3 ),		#esquis	15
(default, 'Blizzard', 'bl-778006', true, 112.99, 2 ),	#botes	16
(default, 'Atomic', 'at-5asd', true, 55.99, 2 ),		#botes	17
(default, 'Peltonen', 'pt-kk', true, 55.99, 2 ),		#botes	18
(default, 'Lacroix', 'lc-nini', true, 55.99, 5 ),		#esquis	19
(default, 'Lacroix', 'lc-mame', true, 33.99, 0 ),		#esquis	20
(default, 'Nordica', 'nd-df77', true, 11.99, 0 ),		#botes	21
(default, 'Lacroix', 'lc-5oopd', true, 10.99, 3 ),		#Pals	22
(default, 'Nordica', 'nd-234dd6', true, 95.99, 4 ),		#Pals	23
(default, 'Peltonen', 'pt-pipi3', true, 34.99, 2 ),		#esquis	24
(default, 'Lacroix', 'lc-errt', true, 250.99, 6 ),		#Pals	25
(default, 'Nordica', 'nd-96Op', true, 145.99, 1 ),		#Pals	26
(default, 'Atomic', 'at-45', true, 269.99, 0 ),			#esquis	27
(default, 'Atomic', 'at-45', true, 269.99, 0 ),			#esquis	28
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	29
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	30
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	31
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	32
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 ),		#botes	33
(default, 'Blizzard', 'bl-5786', true, 77.99, 7 );		#botes	34

INSERT INTO pals VALUES 
(1, '15'),			# kit 1
(6, '22'),			# kit 2
(10, '22'),			# kit 3
(11, '15'),			# kit 4
(22, '23'),
(23, '23'),
(25, '18'),
(26, '10');

INSERT INTO esquis VALUES
(2, '183'),			# kit 1
(4, '177'),			# kit 2
(5, '115'),			# kit 3
(8, '157'),			# kit 4
(13, '132'),
(15, '190'),
(19, '115'),
(20, '190'),
(24, '153'),
(27, '183'),
(28, '183');

INSERT INTO botes VALUES
(3, '39'),			# kit 1
(7, '25'),			# kit 2
(9, '42'),			# kit 3
(12, '41'),			# kit 4
(14, '41'),
(16, '42'),
(17, '39'),
(18, '42'),
(21, '25'),
(29, '25'),
(30, '25'),
(31, '25'),
(32, '25'),
(33, '25'),
(34, '25');


INSERT INTO kit VALUES
(default),			# 1
(default),			# 2
(default),			# 3
(default),			# 4
(default),			# 5
(default),			# 6
(default),			# 7
(default),			# 8
(default),			# 9
(default),			# 10
(default),			# 11
(default),			# 12
(default),			# 13
(default);			# 14

INSERT INTO kit_format VALUES
(1, 1, 2, 3),
(2, 6, 4, 7),
(3, 10, 5, 9),
(4, 11, 8, 12);

select * from client;
select * from curs;
select * from federat;
select * from material;
select * from botes;
select * from kit_format;