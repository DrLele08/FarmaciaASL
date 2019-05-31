-- Creo Tabella Per Sedi Farmacie
CREATE TABLE SediFarmacie
(
  idSede int AUTO_INCREMENT,
  Nome VARCHAR(80) NOT NULL UNIQUE,
  Indirizzo VARCHAR(200) NOT NULL,
  Telefono VARCHAR(12) NOT NULL,
  FotoPrincipale VARCHAR(150) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  PEC VARCHAR(50) NOT NULL,
  Citta VARCHAR(22) NOT NULL,
  PRIMARY KEY(idSede)
);
-- Creo Tabella Utente Farmacia
CREATE TABLE UtentiF
(
  CF char(16) NOT NULL,
  Nome VARCHAR(30) NOT NULL,
  Cognome VARCHAR(30) NOT NULL,
  Email VARCHAR(50) NOT NULL UNIQUE ,
  Password VARCHAR(255) NOT NULL,
  FotoProfilo VARCHAR(255) NOT NULL DEFAULT 'img/Utenti/default.png',
  isAdmin BOOLEAN NOT NULL DEFAULT 0,
  ksFarmaciaPreferita INT NOT NULL,
  TokenPass VARCHAR(255),
  PRIMARY KEY (CF),
  FOREIGN KEY (ksFarmaciaPreferita) REFERENCES SediFarmacie(idSede)
);
-- Creo Tabella Servizi Offerti
CREATE TABLE Servizi
(
  idServizio INT AUTO_INCREMENT NOT NULL,
  Tipo VARCHAR(70) NOT NULL UNIQUE,
  Descrizione VARCHAR(250) NOT NULL,
  PRIMARY KEY(idServizio)
);
-- Inserimento Servizio
INSERT INTO Servizi(Tipo, Descrizione)
VALUES ("Test per le intolleranze alimentari","Quello delle intolleranze alimentari è un fenomeno sempre più diffuso e caratterizzato da una sintomatologia molto varia, più o meno sfumata.");