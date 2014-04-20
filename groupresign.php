<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';

$userobj = isLoggedDirectToLogin();
$username = $userobj->getKayttaja();
$userid = $userobj->getId();

if(!isset($_GET['grpid'])) {
    header('Location: profile.php');
    exit();
}

$grpid = $_GET['grpid'];
$error = null;

if(isset($_POST['password'])) {
    if(Kayttaja::checkLogin($username, $_POST['password'])) {
        Yhteiso::removeMember($userid, $grpid);
        Yhteiso::removeSupervisor($userid, $grpid);

        //if a group does not have any members or supervisors left,
        //then delete the group 
        if(empty(Yhteiso::fetchAllSupervisors($grpid)) ||
            empty(Yhteiso::fetchAllMembers($grpid))) {
                Yhteiso::deleteGroup($grpid);
        }

        header('Location: profile.php');
        exit();
    } else {
        $error = 'Salasana ei ollut kelvollinen';
    }
}

showView('groupresignconfirm.php', array(
    'error' => $error,
    'grpid' => $grpid,
    'title' => 'Ryhmästä eroaminen'
));
