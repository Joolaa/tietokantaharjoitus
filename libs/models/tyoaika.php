<?php

require_once "libs/tietokantayhteys.php";

class Tyoaika {

    private $id;
    private $alkuaika;
    private $loppuaika;
    private $tunteja;
    private $aihe;
    private $kayttaja_id;

    public function __construct($id, $alkuaika, $loppuaika,
        $aihe, $kayttaja_id) {

            $this->id = $id;
            $this->alkuaika = $alkuaika;
            $this->loppuaika = $loppuaika;
            $this->tunteja = date_diff($alkuaika, $loppuaika);
            $this->aihe = $aihe;
            $this->kayttaja_id = $kayttaja_id;
        }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public static function searchPagedSortByStartTime($amount,
        $page, $userId) {
        $sql = "SELECT * FROM tyoaikadata WHERE kayttaja_id = ? LIMIT ? OFFSET ? ORDER BY alkuaika";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($kayttaja_id, $amount,
            ($page-1) * $amount));

        $results = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $tyoaika = new Tyoaika($result->id,
                $result->alkuaika, $result->loppuaika,
                $result->aihe, $result->kayttaja_id);

            $results[] = $tyoaika;
        }

        return $results;
    }

    public static function countTotalRowsOfUser($userId) {
        $sql = "SELECT count(*) FROM tyoaikadata WHERE kayttaja_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($userId));

        return $query->fetchColumn();
    }

}
