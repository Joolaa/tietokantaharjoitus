<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';

$userobj = isLoggedDirectToLogin();
$grpid = null;

if(isset($_GET['cancel'])) {
    $grpid = $_GET['cancel'];
} elseif(isset($_GET['join'])) {
    $grpid = $_GET['join'];
    Yhteiso::insertNewMember($userobj->getId(), $grpid);
}

if(!is_null($grpid)) {
    Yhteiso::removeInvitation($userobj->getId(), $grpid);
}

header('Location: profile.php');
