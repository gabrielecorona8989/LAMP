-- mysql -u root

CREATE DATABASE IF NOT EXISTS scuola;
USE scuola; 
 
CREATE TABLE IF NOT EXISTS corso_studi( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_corso VARCHAR(50) NOT NULL
); 
DESC disciplina;

CREATE TABLE IF NOT EXISTS disciplina ( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome_disciplina VARCHAR(50) NOT NULL
); 

CREATE TABLE IF NOT EXISTS studenti( 
    matricola INT AUTO_INCREMENT PRIMARY KEY, 
    cognome VARCHAR(58) NOT NULL, 
    data_nascita DATE NOT NULL, 
    corso_studi INT NOT NULL, 
    FOREIGN KEY (corso_studi) REFERENCES corso_studi (id) 
); 

CREATE TABLE IF NOT EXISTS valutazioni (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    matricola INT NOT NULL, 
    data_svolgimento DATE NOT NULL, 
    disciplina INT NOT NULL, 
    voto INT NOT NULL,
    FOREIGN KEY (matricola) REFERENCES studenti (matricola), 
    FOREIGN KEY (disciplina) REFERENCES disciplina (id)
);
SHOW TABLES;

INSERT INTO corso_studi (nome_corso) 
VALUES
    ('Informatica'), 
    ('Matematica'), 
    ('Letteratura'), 
    ('Architettura'), 
    ('Chimica'); 
SELECT * FROM corso_studi;

INSERT INTO studenti (matricola, cognome, data_nascita, corso_studi) 
VALUES 
    (1, 'Zanirato', '2006-06-12', 1), 
    (2, 'Conti', '2006-05-10', 2),
    (3, 'Corona', '2007-03-10', 3),
    (4,'rossi','2004-02-03',4);
 
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
    (1, '2022-04-01', 3, 75),
    (1, '2022-04-15', 4, 87),
    (2, '2022-05-01', 3, 80),
    (2, '2022-05-15', 4, 90);

-- query 
select s.cognome, v.voto,d.nome_disciplina as materia, YEAR(CURDATE())-YEAR(s.data_nascita) as età
from studenti s, valutazioni v,disciplina d
where s.matricola = v.matricola and v.disciplina = d.id and s.cognome like 'C%'
order by cognome;

select s.cognome
from studenti s
where YEAR(CURDATE())-YEAR(s.data_nascita)>=18;


select s.cognome, , s.data_nascita
from studenti s;

select s.cognome
from studenti s
where s.cognome like 'C%';

select v.voto
from valutazioni v
where v.matricola='1';
