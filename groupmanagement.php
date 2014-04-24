<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';

$userobj = isLoggedDirectToLogin();

if(!isset($_GET['grpid'])) {
    header('Location: profile.php');
}

$grpid = $_GET['grpid'];

$invitations = Yhteiso::fetchInvitationsOfGroup($grpid);

$error = null;
$notice = null;

if(isset($_POST['invite'])) {

    $email = $_POST['invite'];
    $inviteobj = Kayttaja::fetchByEmailOnly($email);

    if(strcmp($userobj->getKayttaja(), $email) === 0) {
        $error = 'Et voi kutsua itseäsi';
    } elseif(Kayttaja::checkEmailAvailability($email)) {
        $error = 'Käyttäjää ei löytynyt';
    } elseif(Yhteiso::checkIfInvited($inviteobj->getId(), $grpid)) {
        $error = 'Käyttäjä on jo kutsuttu';
    }

    if(is_null($error)) {
        $notice = 'Kutsu on lähetetty käyttäjälle';
        Yhteiso::insertInvitation($inviteobj->getId(), $grpid);
    }

} elseif(isset($_POST['cancelsent'])) {
    Yhteiso::removeInvitation($_POST['cancelsent'], $grpid);
}

showView('groupmanageview.php', array(
    'title' => 'Hallinnoi ryhmää',
    'grpid' => $grpid,
    'notice' => $notice,
    'error' => $error,
    'invitations' => $invitations
));