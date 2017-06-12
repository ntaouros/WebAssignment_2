CREATE SCHEMA IF NOT EXISTS `Movies` DEFAULT CHARACTER SET utf8 ;
USE `Movies`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Movie_Genre`;


DROP TABLE IF EXISTS `Movie`;
DROP TABLE IF EXISTS `Genre`;


CREATE TABLE Users (
	id int auto_increment not null,
    username  varchar(15) NOT NULL unique ,
    pass TEXT NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE Movie (
	id int auto_increment not null,
    title varchar (60) NOT NULL,
    realease_year int,
    image longtext NOT NULL,
    description text,
    rating float,
    PRIMARY KEY (id)
);

create table Genre(
	id int auto_increment not null,
	genre_description text not null,
	PRIMARY KEY (id)
);


create table Movie_Genre(
    Movie_id int not null,
	Genre_id int not null,
    Primary key ( Genre_id,Movie_id),
    FOREIGN KEY (Genre_id) REFERENCES Genre(id),
    FOREIGN KEY (Movie_id) REFERENCES Movie(id)

);
