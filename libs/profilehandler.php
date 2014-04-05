<?php
require_once 'models/kayttaja.php';

if(isLogged()) {

    $user = Kayttaja::getUserById($_SESSION['logged']);

    showView('profileview.php', array(
        'title' => "Sinun profiilisi",
        'user' => $user
    ));
}

header('Location: ../login.php');
