CREATE DATABASE jongerenkansrijker;

USE DATABASE jongerenkansrijker;

CREATE TABLE activiteit(
	actiecode INT NOT NULL AUTO_INCREMENT,
	activiteit VARCHAR(40),
	PRIMARY KEY (activiteitcode)
);

CREATE TABLE medewerker(
   	medewerker_ID INT NOT NULL AUTO_INCREMENT,
   	username VARCHAR(255) NOT NULL UNIQUE,
    	password VARCHAR(255) NOT NULL,
    	PRIMARY KEY (medewerker_ID)
);

CREATE TABLE jongere(
	jongerecode INT NOT NULL AUTO_INCREMENT,
	roepnaam VARCHAR(255),
	tussenvoegsel VARCHAR(255),
	achternaam VARCHAR(255),
	inschrijfdatum DATE,
	PRIMARY KEY (jongerecode)
);

CREATE TABLE instituut(
	instituutcode INT NOT NULL AUTO_INCREMENT,
	instituut VARCHAR(255),
	instituuttelefoon VARCHAR(255) UNIQUE,
	PRIMARY KEY (instituutcode)
);

CREATE TABLE jongereinstituut(
	jongereinstituutcode INT NOT NULL AUTO_INCREMENT,
	jongerecode INT,
	instituutcode VARCHAR(255),
	startdatum DATE,
	PRIMARY KEY(jongereinstituutcode)
	FOREIGN KEY (jongerecode) REFERENCES jongere(jongerecode)
	FOREIGN KEY (instituutcode) REFERENCES instituut(instituutcode)
	ON DELETE CASCADE
);

CREATE TABLE jongereactiviteit(
	jongereactiviteitcode INT NOT NULL AUTO_INCREMENT,
	jongerecode INT,
	actiecode INT,
	startdatum DATE,
	afgerond INT,
	PRIMARY KEY (jongereactiviteitcode)
	FOREIGN KEY (jongerecode) REFERENCES jongere(jongerecode)
	FOREIGN KEY (actiecode) REFERENCES activiteit(actiecode)
	ON DELETE CASCADE
);