CREATE SCHEMA IF NOT EXISTS `Movies` DEFAULT CHARACTER SET utf8 ;
USE `Movies`;
DROP TABLE IF EXISTS `Users`;

CREATE TABLE Users (
	id int auto_increment not null,
    username  varchar(15) NOT NULL unique ,
    pass TEXT NOT NULL,
    PRIMARY KEY (id)
);
