<?php
require_once 'libs/tietokantayhteys.php';

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

    public function getNimiEncoded() {
        return htmlentities($this->nimi, ENT_QUOTES, "UTF-8", false);
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function __toString() {
        return serialize($this);
    }

    public static function fetchAll() {
        $sql = "SELECT id, nimi FROM yhteiso";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $yhteiso = new Yhteiso($tulos->id, $tulos->nimi);
            $yhteiso->setID($tulos->id);
            $yhteiso->setNimi($tulos->nimi);
            $tulokset[] = $yhteiso;
        }

        return $tulokset;
    }

    public static function fetchGroupByName($name) {
        $sql = "SELECT id, nimi FROM yhteiso WHERE nimi = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($name));

        $result = $query->fetchObject();

        if($result == null) {
            return null;
        }

        return new Yhteiso($result->id, $result->nimi);
    }

    public static function fetchGroupById($id) {
        $sql = "SELECT id, nimi FROM yhteiso WHERE id = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($id));

        $result = $query->fetchObject();

        if($result == null) {
            return null;
        }

        return new Yhteiso($result->id, $result->nimi);
    }

    public static function insertNewGroup($name) {
        $sql = "INSERT INTO yhteiso VALUES(DEFAULT, ?)";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($name));

    }

    public static function insertNewMember($usrId, $grpId) {
        $sql = "INSERT INTO yhteiso_kayttaja VALUES(?, ?)";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function insertNewSupervisor($usrId, $grpId) {
        $sql = "INSERT INTO yhteison_johtajat VALUES(?, ?)";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function fetchAllMembers($grpId) {
        $sql = "SELECT kayttaja_id, yhteiso_id FROM yhteiso_kayttaja WHERE yhteiso_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($grpId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $usrid = $result->kayttaja_id;

            $results[] = $usrid;
        }

        return $results;
    }

    public static function fetchAllSupervisors($grpId) {
        $sql = "SELECT kayttaja_id, yhteiso_id FROM yhteison_johtajat WHERE yhteiso_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($grpId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $usrid = $result->kayttaja_id;

            $results[] = $usrid;
        }

        return $results;
    }

    public static function fetchAllMemberships($usrId) {
        $sql = "SELECT kayttaja_id, yhteiso_id FROM yhteiso_kayttaja WHERE kayttaja_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($usrId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $grp = self::fetchGroupById($result->yhteiso_id);

            if($grp != null) {
                $results[] = $grp;
            }
        }

        return $results;
    }

    public static function fetchAllSupervisorships($usrId) {
        $sql = "SELECT kayttaja_id, yhteiso_id FROM yhteison_johtajat WHERE kayttaja_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($usrId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $grp = self::fetchGroupById($result->yhteiso_id);

            if($grp != null) {
                $results[] = $grp;
            }
        }

        return $results;
    }

    public static function removeMember($usrId, $grpId) {
        $sql = "DELETE FROM yhteiso_kayttaja WHERE kayttaja_id = ? AND yhteiso_id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function removeSupervisor($usrId, $grpId) {
        $sql = "DELETE FROM yhteison_johtajat WHERE kayttaja_id = ? AND yhteiso_id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function deleteGroup($grpId) {
        $sql = "DELETE FROM yhteiso WHERE id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($grpId));
    }

    public static function insertInvitation($usrId, $grpId) {
        $sql = "INSERT INTO kutsut VALUES(?, ?)";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function removeInvitation($usrId, $grpId) {
        $sql = "DELETE FROM kutsut WHERE kayttaja_id = ? AND yhteiso_id = ?";
        $sqlcmd = getTietokantayhteys()->prepare($sql);
        $sqlcmd->execute(array($usrId, $grpId));
    }

    public static function checkIfInvited($usrId, $grpId) {
        $sql = "SELECT * FROM kutsut WHERE kayttaja_id = ? AND yhteiso_id = ? LIMIT 1";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($usrId, $grpId));

        $result = $query->fetchObject();

        if($result == null) {
            return false;
        }
        return true;
    }

    public static function fetchInvitationsOfUser($usrId) {
        $sql = "SELECT * FROM kutsut WHERE kayttaja_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($usrId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {

            $grp = Yhteiso::fetchGroupById($result->yhteiso_id);

            $results[] = $grp;
        }

        return $results;
    }

    public static function fetchInvitationsOfGroup($grpId) {
        $sql = "SELECT * FROM kutsut WHERE yhteiso_id = ?";
        $query = getTietokantayhteys()->prepare($sql);
        $query->execute(array($grpId));

        $results = array();

        foreach($query->fetchAll(PDO::FETCH_OBJ) as $result) {

            $usr = Kayttaja::getUserById($result->id);

            $results[] = $usr;
        }

        return $results;
    }
}
