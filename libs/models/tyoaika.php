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
        return $this->alkuaika->format('d');
    }

    public function getStartMonth() {
        return $this->alkuaika->format('m');
    }

    public function getStartYear() {
        return $this->alkuaika->format('Y');
    }

    public function getStartHour() {
        return $this->alkuaika->format('H');
    }

    public function getStartMinute() {
        return $this->alkuaika->format('i');
    }

    public function getEndDay() {
        return $this->loppuaika->format('d');
    }

    public function getEndMonth() {
        return $this->loppuaika->format('m');
    }

    public function getEndYear() {
        return $this->loppuaika->format('Y');
    }

    public function getEndHour() {
        return $this->loppuaika->format('h');
    }

    public function getEndMinute() {
        return $this->loppuaika->format('i');
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

    public static function searchPagedByGroupSortByStartTime($userId,
        $amount, $page, $groupId) {
        $sql = "SELECT * FROM Tyoaikadata WHERE kayttaja_id = ? AND yhteiso_id = ? ORDER BY alkuaika DESC LIMIT ? OFFSET ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($userId, $groupId, $amount,
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

    public static function countRowsOfUserByGroup($userId, $groupId) {
        $sql = "SELECT count(*) FROM Tyoaikadata WHERE kayttaja_id = ? AND yhteiso_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($userId, $groupId));

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
