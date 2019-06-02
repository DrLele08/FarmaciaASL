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
  CF CHAR(16) NOT NULL,
  Nome VARCHAR(30) NOT NULL,
  Cognome VARCHAR(30) NOT NULL,
  Email VARCHAR(50) NOT NULL UNIQUE,
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
-- Creo Tabella Per Prenotazioni
CREATE TABLE Prenotazioni
(
  idPreno INT AUTO_INCREMENT NOT NULL,
  ksServizio INT NOT NULL,
  ksFarmacia INT NOT NULL,
  ksMedico CHAR(16) NOT NULL,
  ksPersona CHAR(16),
  Data DATE NOT NULL,
  Orario TIME NOT NULL,
  Esito VARCHAR(255),
  PRIMARY KEY(idPreno),
  FOREIGN KEY (ksServizio) REFERENCES Servizi(idServizio),
  FOREIGN KEY (ksFarmacia) REFERENCES SediFarmacie(idSede),
  FOREIGN KEY (ksMedico) REFERENCES UtentiF(CF),
  FOREIGN KEY(ksPersona) REFERENCES UtentiF(CF)
);
