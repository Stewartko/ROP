USE webPage;

CREATE TABLE zakaznik (
    idZakaznika INT PRIMARY KEY AUTO_INCREMENT,
    meno VARCHAR(100) NOT NULL,
    priezvisko VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    mobil VARCHAR(100) NOT NULL,
    heslo VARCHAR(100) NOT NULL
) Engine = Innodb;