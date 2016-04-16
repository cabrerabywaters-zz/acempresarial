INSERT INTO `company_segment` (`name`, `value`, `min_score`, `max_score`,`created_at`,`updated_at`)
VALUES
	('Micro1', 0, 0, 0.49,NOW(),NOW()),
	('Micro2', 1, 0.5, 1.49,NOW(),NOW()),
	('Micro3', 2, 1.5, 2.49,NOW(),NOW()),
	('Pequeña1', 3, 2.5, 4.49,NOW(),NOW()),
	('Pequeña2', 4, 4.5, 8.49,NOW(),NOW()),
	('Pequeña3', 5, 8.5, 12.49,NOW(),NOW()),
	('Mediana1', 6, 12.5, 16.49,NOW(),NOW()),
	('Mediana2', 7, 16.5, 21.49,NOW(),NOW()),
	('Mediana3', 8, 21.5, 30.49,NOW(),NOW()),
	('Grande1', 9, 30.5, 245,NOW(),NOW()),
	('Inactivas', 10, 9, 9,NOW(),NOW()),
	('Excluidas', 11, 9.01, 9.553,NOW(),NOW());
