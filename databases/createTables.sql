USE webPage;

CREATE TABLE zakaznik (
    idZakaznika INT PRIMARY KEY AUTO_INCREMENT,
    meno VARCHAR(100) NOT NULL,
    priezvisko VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mobil VARCHAR(100) NOT NULL,
    heslo VARCHAR(100) NOT NULL
) Engine = Innodb;


CREATE TABLE adresa (
    idAdresa INT PRIMARY KEY AUTO_INCREMENT,
    stat VARCHAR(50) NOT NULL DEFAULT "Slovensko",
    kraj VARCHAR(100) NOT NULL,
    mesto VARCHAR(100) NOT NULL,
    psc CHAR(5) NOT NULL,
    adresa VARCHAR(100) NOT NULL,
    idZakaznika INT NOT NULL,
    FOREIGN KEY (idZakaznika) REFERENCES zakaznik(idZakaznika)
)Engine = Innodb;

CREATE TABLE produkt (
    idProduct INT PRIMARY KEY AUTO_INCREMENT, 
    img VARCHAR(100) NOT NULL, 
    meno VARCHAR(100) NOT NULL, 
    cena FLOAT(5.2) NOT NULL
)Engine = Innodb;

CREATE TABLE recenzie (
    idZakaznika INT(11),                    
    recenzia VARCHAR(500), 
    hviezdicky INT(5)
)Engine = Innodb;