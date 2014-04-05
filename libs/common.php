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
    return isset($_SESSION['logged']);
}

function isLoggedDirectToLogin() {

    if(isset($_SESSION['logged'])) {
        return true;
    }

    header('Location: ../login.php');
    return false;
}

function logoutUser() {
    unset($_SESSION['logged']);
    header('Location: ../login.php');
}
