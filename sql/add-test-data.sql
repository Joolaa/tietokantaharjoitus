ALTER TABLE tyoaikadata DROP COLUMN Asiakas_id;
ALTER TABLE tyoaikadata DROP COLUMN Yhteiso_id;

INSERT INTO yhteiso (id, nimi)
VALUES (DEFAULT, 'Yritys OY');

INSERT INTO yhteiso (id, nimi)
VALUES (DEFAULT, 'Pikakuljetus OY');

INSERT INTO kayttaja (id, email, salasana, etunimi, sukunimi)
VALUES (DEFAULT, 'test@testing.com', 'salasana', 'testi', 'testinen');
