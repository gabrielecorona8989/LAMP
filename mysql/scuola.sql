CREATE DATABASE IF NOT EXISTS scuola;
USE scuola; 
 
CREATE TABLE IF NOT EXISTS corso_studi( 
    id INT AUTO INCREMENT PRIMARY KEY,
    nome_corso VARCHAR(50) NOT NULL
); 

CREATE TABLE IF NOT EXISTS disciplina ( 
    id INT AUTO INCREMENT PRIMARY KEY, 
    nome_disciplina VARCHAR(50) NOT NULL
); 

CREATE TABLE IF NOT EXISTS studenti( 
    matricola INT AUTO INCREMENT PRIMARY KEY, 
    cognome VARCHAR(58) NOT NULL, 
    data nascita DATE NOT NULL, 
    corso studi INT NOT NULL, 
    FOREIGN KEY (corso_studi) REFERENCES corso_studi (id) 
); 

CREATE TABLE IF NOT EXISTS valutazioni (
    id INT AUTO INCREMENT PRIMARY KEY, 
    matricola INT NOT NULL, 
    data_svolgimento DATE NOT NULL, 
    disciplina INT NOT NULL, 
    voto INT NOT NULL,
    FOREIGN KEY (matricola) REFERENCES studenti (matricola), 
    FOREIGN KEY (disciplina) REFERENCES disciplina (id)
);

INSERT INTO corso studi (nome_corso) 
VALUES
    ('Informatica'), 
    ('Matematica'), 
    ('Letteratura'), 
    ('Architettura'), 
    ('Chimica'); 

 INSERT INTO studenti (matricola, cognome, data_nascita, corso_studi) 
 VALUES 
    (1, 'Zanirato', '1990-05-15', 1), 
    (2, 'Conti', '1992-08-10', 2),
    (3, 'Corona', '1995-02-12', 3);
 
  INSERT INTO disciplina (nome_disciplina) 
  VALUES
    ('Programmazione'),
    ('Matematica'),
    ('Italiano'), 
    ('Francese'), 
    ('Chimica'); 
  
  INSERT INTO valutazioni (matricola, data_svolgimento, disciplina, voto) 
  VALUES
    (1,' 2022-01-01', 1, 85), 
    (1, '2022-01-15', 2, 98),
    (2, '2022-02-01', 1, 78),
    (2, '2022-02-15', 2, 82), 
    (3, '2022-03-01', 1, 92), 
    (3, '2022-03-15', 2, 88),
    (1, '2022-04-01', 3, 75);