USE `Movies`;

Insert into Users values
		(Default,'dionisis','0000'),
		(Default,'nikos','0000');


Insert into Genre values

	(Default, 'Action'),
    (Default, 'Comedy'),
    (Default, 'Drama'),
    (Default, 'Sci-Fi'),
    (Default, 'Mystery'),
    (Default, 'Horror'),
    (Default, 'Romance');


Insert into Movie values

	(Default,'Baywatch',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BNTA4MjQ0ODQzNF5BMl5BanBnXkFtZTgwNzA5NjYzMjI@._V1_UX182_CR0,0,182,268_AL_.jpg','Ναυαγωσοστες πνιγμοι και πιου πιου',null),
	(Default,'Pirates of the Caribbean 5',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTYyMTcxNzc5M15BMl5BanBnXkFtZTgwOTg2ODE2MTI@._V1_UX182_CR0,0,182,268_AL_.jpg','Πειρατες θησαυροι και καραβια',null),
	(Default,'Wonder Woman',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BNDFmZjgyMTEtYTk5MC00NmY0LWJhZjktOWY2MzI5YjkzODNlXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_UX182_CR0,0,182,268_AL_.jpg',' Before she was Wonder Woman she was Diana, princess of the Amazons, trained warrior. When a pilot crashes and tells of conflict in the outside world, she leaves home to fight a war to end all wars, discovering her full powers and true destiny.',null),
	(Default,'American Made',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTUxNzUwMjk1Nl5BMl5BanBnXkFtZTgwNDkwODI1MjI@._V1_UX182_CR0,0,182,268_AL_.jpg','Αναρωτιθηκατε ποτε απο τι φτιαχτηκε; Φτιαχτηκε απο αμερικη,',null),
	(Default,'Ted',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTQ1OTU0ODcxMV5BMl5BanBnXkFtZTcwOTMxNTUwOA@@._V1_UX182_CR0,0,182,268_AL_.jpg','Ενα αρκουδι που μιλαει πινει μπαφο ολη την ωρα και παιζει πλεηστεησο',null),
	(Default,'Justice League',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMjI2NjI2MDQ0NV5BMl5BanBnXkFtZTgwMTc1MjAwMjI@._V1_UX182_CR0,0,182,268_AL_.jpg','Μια ολοκαινουρια πρωτοποριακη ταινια γυρισμενη στον αριο παγο. Δικηγοροι χωρισμενοι σε ομιλους συμμετεχουν σε δικες και οποιος κερδιζει παιρνει ποντους. Ο καλυτερος θα παρει το πρωταθλημα',null),
	(Default,'Life',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMzAwMmQxNTctYjVmYi00MDdlLWEzMWUtOTE5NTRiNDhhNjI2L2ltYWdlXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX182_CR0,0,182,268_AL_.jpg','A team of scientists aboard the International Space Station discover a rapidly evolving life form, that caused extinction on Mars, and now threatens the crew and all life on Earth.',null),
	(Default,'Murder on the Orient Express',2017,'https://images-na.ssl-images-amazon.com/images/M/MV5BMTAxNDkxODIyMDZeQTJeQWpwZ15BbWU4MDQ2Mjg4NDIy._V1_UX182_CR0,0,182,268_AL_.jpg','Το γνωστο ησυχο δρομολογιο του orient express παυει να ειναι ησυχο. Φονοι ναρκωτικα πορνεια ολα στο πρωινο δρομολογιο Καρδιτσα-Πυργος. Ο μηχανοδηγος ανυμπορος να κανει το οτιδηποτε αφηνει το τιμονι και παει στο βαγονι να συμεμτασχει. Βασισμενη σε αληθινα γεγονοτα.',null);


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
    (8,6);

    
