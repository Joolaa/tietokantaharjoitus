<?php
require_once 'libs/models/kayttaja.php';
require_once 'libs/common.php';

    if(empty($_POST["username"]) && empty($_POST["password"])) {
        showView("loginform.php", array(
            'title' => "Kirjautuminen"
        ));
    }
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($_POST["username"])) {
        showView("loginform.php", array(
            'title' => "Kirjautuminen",
            'error' => "Unohdit antaa käyttäjätunnuksen."
        ));
    }
    $username = $_POST["username"];

    if(empty($_POST["password"])) {
        showView("loginform.php", array(
            'title' => "Kirjautuminen",
            'username' => $username,
            'error' => "Unohdit antaa salasanan."
        ));
    }
    $password = $_POST["password"];

    $user = Kayttaja::getUserByUsername($_POST["username"],
        $_POST["password"]);
    if($user == false) {
        showView("loginform.php", array(
            'username' => $username,
            'title' => "Kirjautuminen",
            'error' => "Käyttäjätunnus tai salasana virheellinen."
        ));
    } else {
        $_SESSION['_' - $user->getId()] = $user;

        showView("loggedintest.php", array(
            'user' => $user,
            'title' => "Olet kirjautunut"
        ));
    }
