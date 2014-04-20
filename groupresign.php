<?php
require_once 'libs/commons.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';

$userobj = isLoggedDirectToLogin();

if(!isset($_GET['grpid'])) {
    header('Location: profile.php');
    exit();
}

$error = null;

if(isset($_POST['password'])) {
    if(Kayttaja::checkLogin($userobj->getKayttaja(), $_POST['password'])) {
        //remove from group
        header('Location: profile.php');
        exit();
    } else {
        $error = 'Salasana ei ollut kelvollinen';
    }
}

showView('groupresignconfirm.php', array(
    'error' => $error,
    'grpid' => $_GET['grpid'],
    'title' => 'Ryhmästä eroaminen'
));
