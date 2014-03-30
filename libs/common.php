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
    return isset($_SESSION['_' . $user->getId()]);
}

function logoutUser() {
    unset($_SESSION['logged']);
    header('Location: ../login.php');
}
