-- Create table JOUEUR(
-- 	Idjoueur int PRIMARY KEY AUTO_INCREMENT,
-- 	Nom varchar(20) not null,
-- 	prenom varchar(20) not null,
-- 	ville varchar(50) not null
-- );
-- Create table CLUB(
-- 	idclub int PRIMARY KEY AUTO_INCREMENT,
-- 	nomclub varchar(20) not null
-- );
Create table INSCRIPTION(
	Idjoueur int,
	saison varchar(20),
	Categorie varchar(20) not null,
	idclub int not null,
	FOREIGN KEY(Idjoueur) REFERENCES JOUEUR(Idjoueur),
	FOREIGN KEY(idclub) REFERENCES CLUB(idclub),
	PRIMARY KEY(Idjoueur, saison)
);
-- Create table UTILISATEUR(
-- 	login VARCHAR(10) PRIMARY KEY,
-- 	motdepass varchar(10) not null
-- );
-- foreign KEY REFERENCES JOUEUR
-- ALTER TABLE INSCRIPTION ADD CONSTRAINT inscrit FOREIGN KEY (Idjoueur) REFERENCES JOUEUR;
-- ALTER TABLE INSCRIPTION ADD CONSTRAINT inscri_u FOREIGN KEY (idclub) REFERENCES CLUB;
-- drop TABLE inscription;