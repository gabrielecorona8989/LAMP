 Creare un nuovo database
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- Creare la tabella degli autori
CREATE TABLE IF NOT EXISTS autori (
    id_autore INT AUTO_INCREMENT PRIMARY KEY,
    nome_autore VARCHAR(50) NOT NULL,
    nazionalita VARCHAR(50),
    data_nascita DATE,
    data_morte DATE
);

-- Inserire alcuni dati nella tabella degli autori
INSERT INTO autori (nome_autore, nazionalita, data_nascita, data_morte)
VALUES
    ('Jane Austen', 'Inglese', '1775-12-16', '1817-07-18'),
    ('George Orwell', 'Inglese', '1903-06-25', '1950-01-21'),
    ('Harper Lee', 'Americana', '1926-04-28', '2016-02-19');

-- Verifico il corretto inserimento dei dati
SELECT * FROM autori;



 Creare un nuovo database
CREATE DATABASE IF NOT EXISTS VIDEOTECA;
USE VIDEOTECA;

-- Creare la tabella degli autori
CREATE TABLE IF NOT EXISTS autori (
    id_film INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(50) NOT NULL,
    anno_uscita YEAR,
    id_regista INT,
    
);


-- Inserire alcuni dati nella tabella degli autori
INSERT INTO autori (titolo, anno_uscita, id_regista)
VALUES
    ('1984', 1949, 1),
    ('1989', 1995, 2),
    ('Inception', 2010, 3);

-- Inserire alcuni dati nella tabella dei registi

