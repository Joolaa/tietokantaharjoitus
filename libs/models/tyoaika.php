<?php

require_once "libs/tietokantayhteys.php";

class Tyoaika {

    private $id;
    private $alkuaika;
    private $loppuaika;
    private $tunteja;
    private $aihe;
    private $kayttaja_id;
    private $yhteiso_id;

    public function __construct($id, $alkuaika, $loppuaika,
        $aihe, $kayttaja_id, $yhteiso_id) {

            $this->id = $id;
            $this->alkuaika = new DateTime($alkuaika);
            $this->loppuaika = new DateTIme($loppuaika);
            $this->tunteja = date_diff($this->alkuaika, $this->loppuaika);
            $this->aihe = $aihe;
            $this->kayttaja_id = $kayttaja_id;
            $this->yhteiso_id = $yhteiso_id;
        }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStartDay() {
        return date("d", $this->alkuaika);
    }

    public function getStartMonth() {
        return date("m", $this->alkuaika);
    }

    public function getStartYear() {
        return date("d", $this->alkuaika);
    }

    public function getStartHour() {
        return date("H", $this->alkuaika);
    }

    public function getStartMinute() {
        return date("i", $this->alkuaika);
    }

    public function getEndDay() {
        return date("d", $this->loppuaika);
    }

    public function getEndMonth() {
        return date("m", $this->loppuaika);
    }

    public function getEndYear() {
        return date("d", $this->loppuaika);
    }

    public function getEndHour() {
        return date("H", $this->loppuaika);
    }

    public function getEndMinute() {
        return date("i", $this->loppuaika);
    }

    public function getAlkuaika() {
        return $this->alkuaika;
    }

    public function setAlkuaika($alkuaika) {
        $this->alkuaika = $alkuaika;
    }
    public function getLoppuaika() {
        return $this->loppuaika;
    }

    public function setLoppuaika($loppuaika) {
        $this->loppuaika = $loppuaika;
    }
    public function getTunteja() {
        return $this->tunteja;
    }
    public function getAihe() {
        return $this->aihe;
    }

    public function setAihe($aihe) {
        $this->aihe = $aihe;
    }
    public function getKayttajaId() {
        return $this->kayttaja_id;
    }

    public function setKayttajaId($kayttaja_id) {
        $this->kayttaja_id = $kayttaja_id;
    }

    public function getYhteisoId() {
        return $this->yhteiso_id;
    }

    public function setYhteisoId($yhteiso_id) {
        $this->yhteiso_id = $yhteiso_id;
    }

    //technically does not belong here, but is handy
    public function getYhteisoNimi() {
        if(!isset($this->yhteiso_id)) {
            return '';
        }
        $sql = "SELECT id, nimi FROM yhteiso WHERE id = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($this->yhteiso_id));

        $result = $query->fetchObject();

        if(!is_null($result)) {
            return $result->nimi;
        }
        return '';
    }

    public static function searchPagedSortByStartTime($userId,
        $amount, $page) {
        $sql = "SELECT * FROM Tyoaikadata WHERE kayttaja_id = ? ORDER BY alkuaika DESC LIMIT ? OFFSET ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($userId, $amount,
            ($page-1) * $amount));

        $results = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $tyoaika = new Tyoaika($result->id,
                $result->alkuaika, $result->loppuaika,
                $result->aihe, $result->kayttaja_id,
                $result->yhteiso_id);

            $results[] = $tyoaika;
        }

        return $results;
    }

    public static function countTotalRowsOfUser($userId) {
        $sql = "SELECT count(*) FROM Tyoaikadata WHERE kayttaja_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($userId));

        return $query->fetchColumn();
    }

    public static function deleteRow($rowId, $userId) {
        $sql = "DELETE FROM Tyoaikadata WHERE id = ? AND kayttaja_id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($rowId, $userId));
    }

    public static function updateRow($rowId,
        $userId, $tyoaika) {
        $sql = "UPDATE Tyoaikadata SET alkuaika = ?, loppuaika = ?, aihe = ?, yhteiso_id = ? WHERE id = ? AND kayttaja_id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array(formatDateStandard($tyoaika->getAlkuaika()),
            formatDateStandard($tyoaika->getLoppuaika()), $tyoaika->getAihe(), $tyoaika->getYhteisoId(),
            $rowId, $userId));
    }

    public static function addRow($userId, $tyoaika) {
        $sql = "INSERT INTO Tyoaikadata(id, alkuaika, loppuaika, aihe, kayttaja_id, yhteiso_id) VALUES(DEFAULT, ?, ?, ?, ?, ?)";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array(formatDateStandard($tyoaika->getAlkuaika()),
            formatDateStandard($tyoaika->getLoppuaika()), $tyoaika->getAihe(),
            $userId, $tyoaika->getYhteisoId()));
    }

    public static function fetchHoursById($id) {
        $sql = "SELECT * FROM tyoaikadata WHERE id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($id));

        $result = $query->fetchObject();

        if($result == null) {
            return null;
        }

        return new Tyoaika($id, $result->alkuaika,
            $result->loppuaika, $result->aihe, $result->kayttaja_id,
            $result->yhteiso_id);
    }
}
