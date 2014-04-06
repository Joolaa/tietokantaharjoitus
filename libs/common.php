<?php
session_start();

function showView($page, $data = array()) {
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

function issetEcho($var, $message) {
    if(isset($var)) {
        echo $message;
    }
}

function isLogged() {
    return !empty($_SESSION['logged']);
}

function isLoggedDirectToLogin() {

    if(isset($_SESSION['logged'])) {
        return Kayttaja::getUserById($_SESSION['logged']);
    }
    header('Location: ../login.php');
    exit();
    return null;
}

function logoutUser() {
    unset($_SESSION['logged']);
    header('Location: ../login.php');
}

function echoFormatDateFinnish($datetime) {
    echo date_format($datetime, 'H:i d.m.Y');
}

function echoFormatHoursMins($dateinterval) {
    echo $dateinterval->format('%h h, %i min');
}
