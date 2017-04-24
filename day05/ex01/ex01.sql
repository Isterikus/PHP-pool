CREATE TABLE ft_table (
	`id`			int									AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`login`			varchar(8)							DEFAULT 'toto' NOT NULL,
	`group` 		ENUM('staff', 'student', 'other')	NOT NULL,
	`creation_date` date								NOT NULL
	);