-- Database: `kawa_chama_group`


CREATE TABLE  `members` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`first_name` VARCHAR( 100 ) NOT NULL ,
`second_name` VARCHAR( 100 ) NOT NULL ,
`id_number` INTEGER( 100 ) NOT NULL ,
`mobile` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;

