<?php
    require_once 'libs/common.php';

    $title = 'Kirjautuminen';
    require 'dologin.php';
    showView('loginform.php', array(
        'title' => 'Kirjautuminen'));
