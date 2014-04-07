<?php
require_once 'libs/models/kayttaja.php';
require_once 'libs/common.php';

function manageLogin($postarray) {
    $setfields = arrayKeysSet($postarray,
        array('username', 'password'));

    if(empty($setfields)) {
        return array(
            'title' => "Kirjautuminen"
        );
    } elseif(!in_array('username', $setfields)) {
        return array(
            'title' => "Kirjautuminen",
            'error' => "Unohdit antaa käyttäjänimen"
        );
    } elseif(!in_array('password', $setfields)) {
        return array(
            'title' => "Kirjautuminen",
            'username' => $_POST['username'],
            'error' => "Unodit antaa salasanan"
        );
    }

    return null;
}


if(isLogged()) {

    header('Location: profile.php');
    exit();
}

$fields = manageLogin($_POST);

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
    exit();
}
