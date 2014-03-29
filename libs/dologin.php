<?php
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
            'user' => $username,
            'error' => "Unohdit antaa salasanan."
        ));
    }
    $password = $_POST["password"];
    
    if(Kayttaja::getUserByUsername($_POST["username"],
                 $_POST["password"]) == false) {
        header('Location: html-demo/index.html');
    } else {
        showView("loginform.php", array(
            'user' => $username,
            'title' => "Kirjautuminen",
            'error' => "Käyttäjätunnus tai salasana virheellinen."
        ));
    }
