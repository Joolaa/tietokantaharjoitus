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

    public function echoUserFullName() {
        echo $this->etunimi . ' ' . $this->sukunimi;
    }

    public static function checkLogin($kayttaja, $salasana) {
        $sql = "SELECT id, email, salasana FROM Kayttaja WHERE email = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($kayttaja));
        
        $result = $query->fetchObject();

        //HUOM HUOM, vain väliaikaisesti tässä muodossa testitarkoituksessa
        if(!empty($result) && (strcmp($salasana, $result->salasana) === 0 || password_verify($salasana, $result->salasana))) {
            return $result->id;
        }

        return null;
    }

    public static function getUserByUsername($kayttaja, $salasana) {
        $sql = "SELECT id, email, salasana, etunimi, sukunimi FROM Kayttaja WHERE email = ? AND salasana = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($kayttaja, $salasana));

        $result = $query->fetchObject();
        if($result == null) {
            return null;
        } else {
            $user = new Kayttaja($result->id, $result->email,
                $result->salasana, $result->etunimi, $result->sukunimi);
            $user->setId($result->id);
            $user->setKayttaja($result->email);
            $user->setSalasana($result->salasana);
            $user->setEtunimi($result->etunimi);
            $user->setSukunimi($result->sukunimi);

            return $user;
        }
    }

    public static function checkEmailAvailability($email) {
        $sql = "SELECT * FROM Kayttaja Where email = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($email));

        $result = $query->fetchObject();

        if($result == null) {
            return true;
        }

        return false;
    }

    public static function getUserById($id) {
        $sql = "SELECT id, email, salasana, etunimi, sukunimi FROM Kayttaja WHERE id = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($id));

        $result = $query->fetchObject();
        if($result == null) {
            return null;
        } else {
            $user = new Kayttaja($result->id, $result->email,
                $result->salasana, $result->etunimi, $result->sukunimi);
            $user->setId($result->id);
            $user->setKayttaja($result->email);
            $user->setSalasana($result->salasana);
            $user->setEtunimi($result->etunimi);
            $user->setSukunimi($result->sukunimi);

            return $user;
        }
    }
    private function convertNamesHtmlEntities() {
        $this->etunimi = htmlentities($this->etunimi, ENT_QUOTES);
        $this->sukunimi = htmlentities($this->sukunimi, ENT_QUOTES);
    }

    private function hashThisPassword() {
        $this->salasana = password_hash($this->salasana, PASSWORD_DEFAULT);
    }
    public function addThisUser() {

        if(!filter_var($this->kayttaja, FILTER_VALIDATE_EMAIL)) {
            return 'Sähköpostiosoite ei kelvannut';
        }
        if(!self::checkEmailAvailability($this->kayttaja)) {
            return 'Sähköpostiosoite on jo varattu';
        }

        $this->convertNamesHtmlEntities();
        $this->hashThisPassword();

        $sql = 'INSERT INTO Kayttaja VALUES(DEFAULT, ?, ?, ?, ?)';
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($this->kayttaja, $this->salasana,
            $this->etunimi, $this->sukunimi));

        return null;
    }
}
