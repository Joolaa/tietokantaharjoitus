<?php
require_once 'libs/models/kayttaja.php';
require_once 'libs/common.php';

function manageLogin($username, $password) {
    if(empty($username) && empty($password)) {
        return array(
            'title' => "Kirjautuminen"
        );
    }
    if(empty($username)) {
        return array(
            'title' => "Kirjautuminen",
            'error' => "Unohdit antaa käyttäjänimen"
        );
    }
    if(empty($password)) {
        return array(
            'title' => "Kirjautuminen",
            'username' => $username,
            'error' => "Unodit antaa salasanan"
        );
    }

    return null;
}


if(isset($_SESSION['logged'])) {
    $user = Kayttaja::getUserById($_SESSION['logged']);

    showView("profile.php", array(
        'title' => "Sinun profiilisi",
        'user' => $user
    ));
}

$fields = manageLogin($_POST["username"], $_POST["password"]);

if(!is_null($fields)) {
    showView("loginform.php", $fields);
}

$username = $_POST["username"];
$password = $_POST["password"];

$userid = Kayttaja::checkLogin($username, $password);

if(is_null($userid)) {
    showView("loginform.php", array(
        'username' => $username,
        'title' => "Kirjautuminen",
        'error' => "Käyttäjätunnus tai salasana virheellinen."
    ));
} else {
    $_SESSION['logged'] = $userid;

    header('Location: profile.php');
}
