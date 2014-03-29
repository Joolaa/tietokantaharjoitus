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

function logoutUser($user) {
    unset($_SESSION['_' . $user->getId()]);

    header('Location: login.php');
}

function logoutUserById($userid) {
    unset($_SESSION['_' . $userid]);
    header('Location: ../login.php');
}
