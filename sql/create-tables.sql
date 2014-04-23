/* TODO: 'on delete' ja muut käyttörajoitteet puuttuvat */

CREATE TABLE kayttaja (
    id SERIAL PRIMARY KEY,
    email VARCHAR(50),
    salasana VARCHAR(256),
    etunimi VARCHAR(20),
    sukunimi VARCHAR(30)
);

CREATE TABLE yhteiso (
    id SERIAL PRIMARY KEY,
    nimi varchar(30)
);

CREATE TABLE asiakas (
    id SERIAL PRIMARY KEY,
    nimi VARCHAR(30),
    oletustuntitaksa REAL,
    yhteiso_id INTEGER REFERENCES yhteiso(id)
);

CREATE TABLE tyoaikadata (
    id SERIAL PRIMARY KEY,
    alkuaika TIMESTAMP,
    loppuaika TIMESTAMP,
    aihe VARCHAR(1000),
    kayttaja_id INTEGER REFERENCES kayttaja(id),
    asiakas_id INTEGER REFERENCES asiakas(id),
    yhteiso_id INTEGER REFERENCES yhteiso(id)
);

CREATE TABLE yhteiso_kayttaja (
    kayttaja_id INTEGER REFERENCES kayttaja(id),
    yhteiso_id INTEGER REFERENCES yhteiso(id),
    PRIMARY KEY(kayttaja_id, yhteiso_id)
);

CREATE TABLE yhteison_johtajat (
    kayttaja_id INTEGER REFERENCES kayttaja(id),
    yhteiso_id INTEGER REFERENCES yhteiso(id),
    PRIMARY KEY(kayttaja_id, yhteiso_id)
);

CREATE TABLE kutsut (
    kayttaja_id INTEGER REFERENCES kayttaja(id),
    yhteiso_id INTEGER REFERENCES yhteiso(id),
    PRIMARY KEY(kayttaja_id, yhteiso_id)
);
