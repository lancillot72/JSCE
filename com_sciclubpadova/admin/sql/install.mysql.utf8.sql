DROP TABLE IF EXISTS `#__sciclubpadova`;

CREATE TABLE `#__sciclubpadova` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`greeting` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__sciclubpadova` (`greeting`) VALUES
('Sci Club 1'),
('Sci Club 2');
