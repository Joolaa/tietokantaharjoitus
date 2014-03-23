<?php
require 'tietokantayhteys.php';

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

    public static function etsiKaikkiYhteisot() {
        $sql = "SELECT id, nimi FROM yhteiso";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $yhteiso = new Yhteiso($tulos->id, $tulos->nimi);
            $tulokset[] = $yhteiso;
        }

        return $tulokset;
}
