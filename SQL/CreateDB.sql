CREATE USER if not exists'dionizi'@'localhost' IDENTIFIED BY 'kodik';
CREATE SCHEMA IF NOT EXISTS `Movies` DEFAULT CHARACTER SET utf8 ;
USE `Movies`;
GRANT ALL PRIVILEGES ON Movies.* TO 'dionizi'@'localhost';

DROP TABLE IF EXISTS `User_Rating`;

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


create table User_Rating(
	User_id int not null,
	Movie_id int not null,
	Rate int not null,
    Primary key ( User_id,Movie_id),
    FOREIGN KEY (User_id) REFERENCES Users(id),
    FOREIGN KEY (Movie_id) REFERENCES Movie(id)
);

USE `Movies`;

Insert into Users values
		(Default,'dionisis','0000'),
		(Default,'nikos','0000');


Insert into Genre values

	(Default, 'Action'), #1
    (Default, 'Comedy'),#2
    (Default, 'Drama'),#3
    (Default, 'Sci-Fi'),#4
    (Default, 'Mystery'),#5
    (Default, 'Horror'),#6
    (Default, 'Romance');#7


Insert into Movie values

	(Default,'Baywatch',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BNTA4MjQ0ODQzNF5BMl5BanBnXkFtZTgwNzA5NjYzMjI@._V1_UX182_CR0,0,182,268_AL_.jpg','Devoted lifeguard Mitch Buchannon butts heads with a brash new recruit, as they uncover a criminal plot that threatens the future of the bay.',null),
	(Default,'Pirates of the Caribbean 5',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTYyMTcxNzc5M15BMl5BanBnXkFtZTgwOTg2ODE2MTI@._V1_UX182_CR0,0,182,268_AL_.jpg','Captain Jack Sparrow searches for the trident of Poseidon while being pursued by an undead sea captain and his crew.',null),
	(Default,'Wonder Woman',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BNDFmZjgyMTEtYTk5MC00NmY0LWJhZjktOWY2MzI5YjkzODNlXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_UX182_CR0,0,182,268_AL_.jpg',' Before she was Wonder Woman she was Diana, princess of the Amazons, trained warrior. When a pilot crashes and tells of conflict in the outside world, she leaves home to fight a war to end all wars, discovering her full powers and true destiny.',null),
	(Default,'American Made',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTUxNzUwMjk1Nl5BMl5BanBnXkFtZTgwNDkwODI1MjI@._V1_UX182_CR0,0,182,268_AL_.jpg','A pilot lands work for the CIA and as a drug runner in the south during the 1980s',null),
	(Default,'Ted',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTQ1OTU0ODcxMV5BMl5BanBnXkFtZTcwOTMxNTUwOA@@._V1_UX182_CR0,0,182,268_AL_.jpg','John Bennett, a man whose childhood wish of bringing his teddy bear to life came true, now must decide between keeping the relationship with the bear or his girlfriend, Lori.',null),
	(Default,'Justice League',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMjI2NjI2MDQ0NV5BMl5BanBnXkFtZTgwMTc1MjAwMjI@._V1_UX182_CR0,0,182,268_AL_.jpg','Fueled by his restored faith in humanity and inspired by Supermans selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.',null),
	(Default,'Life',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMzAwMmQxNTctYjVmYi00MDdlLWEzMWUtOTE5NTRiNDhhNjI2L2ltYWdlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX182_CR0,0,182,268_AL_.jpg','A team of scientists aboard the International Space Station discover a rapidly evolving life form, that caused extinction on Mars, and now threatens the crew and all life on Earth.',null),
	(Default,'Murder on the Orient Express',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTAxNDkxODIyMDZeQTJeQWpwZ15BbWU4MDQ2Mjg4NDIy._V1_UX182_CR0,0,182,268_AL_.jpg','A lavish train ride unfolds into a stylish & suspenseful mystery. From the novel by Agatha Christie, Murder on the Orient Express tells of thirteen stranded strangers & one mans race to solve the puzzle before the murderer strikes again.',null),
	(Default,'Marshall',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BNjQwMTMwNjQ3OV5BMl5BanBnXkFtZTgwMjY0NDk2MjI@._V1_UY268_CR2,0,182,268_AL_.jpg','About a young Thurgood Marshall, the first African American Supreme Court Justice, as he battles through one of his career-defining cases.',null),
	
    (Default,'The bad batch',2016,'https://images-na.ssl-images-amazon.com/images/M/MV5BOTA3NTI2MzMwMF5BMl5BanBnXkFtZTgwNzY0OTcyMjI@._V1_UY268_CR1,0,182,268_AL_.jpg','A dystopian love story in a Texas wasteland and set in a community of cannibals.',null ),
    (Default,'The bye bye man',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTcxOTE5NzQwNF5BMl5BanBnXkFtZTgwOTMzMTc1ODE@._V1_UX182_CR0,0,182,268_AL_.jpg','Three friends stumble upon the horrific origins of a mysterious figure they discover is the root cause of the evil behind unspeakable acts.',null),
	(default,'Underworld:blood worse',2016,'https://images-na.ssl-images-amazon.com/images/M/MV5BMjI5Njk0NTIyNV5BMl5BanBnXkFtZTgwNjU4MjY5MDI@._V1_UX182_CR0,0,182,268_AL_.jpg','Vampire death dealer, Selene (Kate Beckinsale) fights to end the eternal war between the Lycan clan and the Vampire faction that betrayed her.',null),
	(Default,'The Sfssfhachk',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMjI3MDMxNzcxNl5BMl5BanBnXkFtZTgwODc4MzkwOTE@._V1_UX182_CR0,0,182,268_AL_.jpg','A grieving man receives a mysterious, personal invitation to meet with God at a place called "The Shack."',null);
Insert into Movie_Genre values
	(7,4),
	(7,6), #life
    (1,2),
	(1,1), #bay
    (5,4),
    (7,2), #ted
    (2,1),
    (2,4), #pirates
    (3,4),
    (3,1),#WW
    (4,5),
    (4,1), #amerimade
    (6,4),
    (7,7),
    (8,5),
    (8,6),
	(9,3),
    (10,4),
    (10,7),
    (11,6),
    (11,1),
    (12,1),
	(12,5),
	(13,3),
	(13,5);
insert into User_Rating values
	(1,1,4),
    (1,2,5);
    
