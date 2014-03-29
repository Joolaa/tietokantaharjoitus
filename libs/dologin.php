<?php

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
            'error' => "Unohdit antaa salasanan."
        ));
    }
    $password = $_POST["password"];
    
    if("top" == $username && "lel" == $password) {
        header('Location: html-demo/index.html');
    } else {
        showView("loginform.php", array(
            'user' => $username,
            'title' => "Kirjautuminen",
            'error' => "Käyttäjätunnus tai salasana virheellinen."
        ));
    }
