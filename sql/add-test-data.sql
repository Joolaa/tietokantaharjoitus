ALTER TABLE tyoaikadata DROP COLUMN Asiakas_id;
ALTER TABLE tyoaikadata DROP COLUMN Yhteiso_id;

INSERT INTO yhteiso (id, nimi)
VALUES (DEFAULT, 'Yritys OY');

INSERT INTO yhteiso (id, nimi)
VALUES (DEFAULT, 'Pikakuljetus OY');

INSERT INTO kayttaja (id, email, salasana, etunimi, sukunimi)
VALUES (DEFAULT, 'test@testing.com', 'salasana', 'testi', 'testinen');

INSERT INTO tyoaikadata (id, alkuaika, loppuaika, aihe, kayttaja_id)
VALUES (DEFAULT, TIMESTAMP '2014-03-15 07:31:00', TIMESTAMP '2014-03-15 08:15:00', 'Auton vienti korjaukseen', 1);

INSERT INTO tyoaikadata (id, alkuaika, loppuaika, aihe, kayttaja_id)
VALUES (DEFAULT, TIMESTAMP '2014-03-16 09:57:00', TIMESTAMP '2014-03-16 16:15:00', 'Kuljetus Tampereelle', 1);
