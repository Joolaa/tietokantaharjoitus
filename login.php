<?php
    require_once 'libs/common.php';

    $title = 'Kirjautuminen';
    showView('loginform.php', array(
        'title' => 'Kirjautuminen'));
    require 'dologin.php';
