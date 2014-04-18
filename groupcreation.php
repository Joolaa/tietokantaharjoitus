<?php
require_once 'libs/common.php';
require_once 'libs/models/yhteiso.php';
require_once 'libs/models/kayttaja.php';

$userobj = isLoggedDirectToLogin();

$error = null;
$notice = null;

if(isset($_POST['name'])) {
    $name = prepareTextInput($_POST['name']);

    if(is_null($name)) {
        $error = 'Nimi ei saa olla tyhjä';
    } elseif(strlen($name) > 30) {
        $error = 'Ryhmän nimi liian pitkä';
    }

    if(is_null($error)) {
        Yhteiso::insertNewGroup($name);
        $grpobj = Yhteiso::fetchGroupByName($name);

        Yhteiso::insertNewMember($userobj->getId(),
            $grpobj->getId());
        Yhteiso::insertNewSupervisor($userobj->getId(),
            $grpobj->getId());
        $notice = 'Ryhmän luonti onnistui';
    }
}

showView('groupcreateform.php', array(
    'error' => $error,
    'notice' => $notice
));
