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

function isLogged($user) {
    return isset($_SESSION[$user->getId()]);
}

function logoutUser($user) {
    unset($_SESSION[$user->getId()]);

    header('Location: login.php');
}
