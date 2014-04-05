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

function isLoggedDirectToLogin(&$pagedata) {

    if(isset($_SESSION['logged'])) {
        if(is_null($pagedata)) {
            return true;
        }
        if(!property_exists($pagedata, 'user')) {
            $pagedata->user = Kayttaja::getUserById($_SESSION['logged']);
        }
        return true;
    }

    header('Location: ../login.php');
    return false;
}

function logoutUser() {
    unset($_SESSION['logged']);
    header('Location: ../login.php');
}

function echoFormatDateFinnish($datetime) {
    echo date_format($datetime, H:i d.m.Y);
}
