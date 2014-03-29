<?php
require_once "libs/tietokantayhteys.php";

class Kayttaja {

    private $id;
    private $kayttaja;
    private $salasana;
    private $etunimi;
    private $sukunimi;

    public function __construct($id, $kayttaja, $salasana,
                                    $etunimi, $sukunimi) {
        $this->id = $id;
        $this->kayttaja = $kayttaja;
        $this->salasana = $salasana;
        $this->etunimi = $etunimi;
        $this->sukunimi = $sukunimi;
    }

    public function getId() {
        return $this->id;
    }

    public function getKayttaja() {
        return $this->kayttaja;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getSukunimi() {
        return $this->sukunimi;
    }

    public function getEtunimi() {
        return $this->etunimi;
    }

    public function setEtunimi($etunimi) {
        $this->etunimi = $etunimi;
    }

    public function setSukunimi($sukunimi) {
        $this->sukunimi = $sukunimi;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setKayttaja($kayttaja) {
        $this->kayttaja = $kayttaja;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public static function getUserByUsername($kayttaja, $salasana) {
        $sql = "SELECT id, email, salasana, etunimi, sukunimi FROM Kayttaja WHERE email = ? AND salasana = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($kayttaja, $salasana));

        $result = $query->fetchObject();
        if($result == null) {
            return null;
        } else {
            $user = new Kayttaja();
            $user->setId($result->id);
            $user->setKayttaja($result->email);
            $user->setSalasana($result->salasana);
            $user->setEtunimi($result->etunimi);
            $user->setSukunimi($result->sukunimi);

            return $user;
        }
    }
}
