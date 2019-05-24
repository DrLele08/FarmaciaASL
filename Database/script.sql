--Creo Tabella Per Sedi Farmacie
CREATE TABLE SediFarmacie
(
  idSede int AUTO_INCREMENT,
  Nome VARCHAR(80) NOT NULL,
  Indirizzo VARCHAR(200) NOT NULL,
  Telefono VARCHAR(12) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  PEC VARCHAR(50) NOT NULL,
  Citta VARCHAR(22) NOT NULL,
  PRIMARY KEY(idSede)
);
--Inserisco Sedi Farmacie
INSERT INTO SediFarmacie(Nome,Indirizzo,Telefono,Email,PEC,Citta) 
VALUES("Farmacia Comunale di Crispano","Via Provinciale Fratta Crispano, 69","0818348070","farcomcrispano@libero.it","farcomacrispano@pec.it","Crispano(NA)");