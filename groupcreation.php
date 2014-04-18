<?php
require_once 'libs/common.php';
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
        $notice = 'Ryhmän luonti onnistui';
    }
}

showView('groupcreateform.php', array(
    'error' => $error,
    'notice' => $notice
));
