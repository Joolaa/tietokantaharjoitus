<?php
session_start();

function showView($page, $data = array()) {
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

function issetEcho($var, $message) {
    if(!empty($var)) {
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

function makeDate($days, $months,
    $years, $hours, $minutes) {
        return DateTime::createFromFormat('d-m-Y H:i',
            (string) "$days-$months-$years $hours:$minutes");
}

function makeDateString($days, $months, $years, $hours, $minutes) {
        return (string) "$years-$months-$days $hours:$minutes";
}

function formatDateStandard($datetime) {
    return (string) date_format($datetime, 'Y-m-d H:i');
}

function validateDate($date) {
    $format = 'Y-m-d H:i';
    $datetime = DateTime::createFromFormat($format, $date);
    return $datetime && $datetime->format($format) == $date;
}

function arrayKeysSet($array, $keys) {

    $result = array();

    foreach($keys as $keys) {
        if(array_key_exists($key, $array) &&
            (!empty($array[$key] || $array[$key] === '0'))) {
                $result[] = $key;
            }
    }

    return $result;
}
