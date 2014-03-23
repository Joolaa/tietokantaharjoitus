<?php
require_once 'tietokantayhteys.php';

class Yhteiso {

    private $id;
    private $nimi;

    public function __construct($id, $nimi) {
        $this->id = $id;
        $this->nimi = $nimi;
    }

    public function getID() {
        return $this->id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public static function etsiKaikkiYhteisot() {
        $sql = "SELECT id, nimi FROM yhteiso";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $yhteiso = new Yhteiso();
            $yhteiso->setID($tulos->id);
            $yhteiso->setNimi($tulos->nimi);
            $tulokset[] = $yhteiso;
        }

        return $tulokset;
    }
}
