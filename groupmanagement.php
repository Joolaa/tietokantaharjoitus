<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';

$userobj = isLoggedDirectToLogin();

if(!isset($_GET['grpid'])) {
    header('Location: profile.php');
}

$grpid = $_GET['grpid'];

$error = null;
$notice = null;

if(isset($_POST['invite'])) {

    $email = $_POST['invite'];
    $inviteobj = Kayttaja::fetchByEmailOnly($email);

    if(Kayttaja::checkEmailAvailability($email)) {
        $error = 'Käyttäjää ei löytynyt';
    } elseif(checkIfInvited($inviteobj->getId(), $grpId)) {
        $error = 'Käyttäjä on jo kutsuttu';
    }

    if(is_null($error)) {
        $notice = 'Kutsu on lähetetty käyttäjälle';
        Yhteiso::insertInvitation($inviteobj->getId(), $grpId);
    }

}

showView('groupmanageview.php' array(
    'title' => 'Hallinnoi ryhmää',
    'grpid' => $grpid,
    'notice' => $notice,
    'error' => $error
));
