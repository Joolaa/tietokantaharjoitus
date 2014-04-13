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
        if(!empty($result) && (strcmp($salasana, $result->salasana) === 0)) {
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
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    private function convertNamesHtmlEntities() {
        $this->etunimi = htmlentities($this->etunimi, ENT_QUOTES);
        $this->sukunimi = htmlentities($this->sukunimi, ENT_QUOTES);
    }

    private function handleEmailCheck() {
        $emailOfId = self::getUserById($this->id)->kayttaja;
        if(strcmp($emailOfId, $this->kayttaja) !== 0) {
            if(!self::validateEmail($this->kayttaja) || strlen($this->kayttaja) > 50) {
                return 'Sähköpostiosoite ei kelvannut';
            }
            if(!self::checkEmailAvailability($this->kayttaja)) {
                return 'Sähköpostiosoite on jo varattu';
            }
        }

        return null;
    }

    public function addThisUser() {

        $emailcheck = $this->handleEmailCheck();

        if(!is_null($emailcheck)) {
            return $emailcheck;
        }

        $this->convertNamesHtmlEntities();

        if(strlen($this->etunimi) > 20 || strlen($this->sukunimi) > 30) {
            return 'Etunimi tai sukunimi liian pitkä';
        }

        $sql = 'INSERT INTO Kayttaja VALUES(DEFAULT, ?, ?, ?, ?)';
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($this->kayttaja, $this->salasana,
            $this->etunimi, $this->sukunimi));

        return null;
    }

    public function updateThisUser() {

        $emailcheck = $this->handleEmailCheck();

        if(!is_null($emailcheck)) {
            return $emailcheck;
        }

        if(strlen($this->etunimi) > 20 || strlen($this->sukunimi) > 30) {
            return 'Etunimi tai sukunimi liian pitkä';
        }

        $sql = 'UPDATE kayttaja SET email = ?, salasana = ?, etunimi = ?, sukunimi = ? WHERE id = ?';
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($this->kayttaja, $this->salasana,
            $this->etunimi, $this->sukunimi, $this->id));

        return null;
    }

    public function updateThisUserConfirmPass($username, $password) {

        if(is_null(self::checkLogin($username, $password))) {
            return 'Salasana ei ollut kelvollinen';
        }

        return $this->updateThisUser();
    }

    public function deleteThisUser() {
        $sql = 'DELETE FROM kayttaja WHERE id = ?';
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($this->id));

        return null;
    }

    public function deleteThisUserConfirmPass($password) {

        if(is_null(self::checkLogin($this->kayttaja,
            $password))) {
                return 'Salasana ei ollut kelvollinen';
        }

        return $this->deleteThisUser();
    }
}
