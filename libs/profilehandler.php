<?php
require_once 'models/kayttaja.php';


$user = isLoggedDirectToLogin();

    showView('profileview.php', array(
        'title' => "Sinun profiilisi",
        'user' => $user
    ));
