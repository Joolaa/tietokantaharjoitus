<?php

isLoggedDirectToLogin(null);

$user = Kayttaja::getUserById($_SESSION['logged']);

showView('profileview.php', array(
    'title' => "Sinun profiilisi",
    'user' => $user
));
