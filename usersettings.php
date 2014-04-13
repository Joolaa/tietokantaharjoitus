<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';

$userid = isLoggedDirectToLogin();
$userobj = Kayttaja::getUserById($userid);
$useremail = $userobj->getKayttaja();

$error = null;
$notice = null;

if(isset($_GET['email'])) {
    $postfields = array('password', 'email');
    $setfields = arrayFieldsSet($_POST, $postfields);

    if($postfields === $setfields) {
        $userobj->setKayttaja($_POST['email']);
        $error = $userobj->updateThisUserConfirmPass($useremail,
            $_POST['password']);
        if(is_null($error)) {
            $notice = 'Sähköpostin vaihto onnistui';
        }
    } elseif(!empty($setfields)) {
        $error = 'Et täyttänyt kaikkia kenttiä';
    }

} elseif(isset($_GET['firstname'])) {

    if(isset($_POST['firstname'])) {
        $userobj->setEtunimi(htmlentities($_POST['firstname']));
        $error = $userobj->updateThisUser();

        if(is_null($error)) {
            $notice = 'Etunimen vaihto onnistui';
        }
    }
} elseif(isset($_GET['lastname'])) {

    if(isset($_POST['lastname'])) {
        $userobj->setSukunimi(htmlentities($_POST['lastname']));
        $error = $userobj->updateThisUser();

        if(is_null($error)) {
            $notice = 'Sukunimen vaihto onnistui';
        }
    }
} elseif(isset($_GET['password'])) {

    $postfields = array('oldpass', 'newpass', 'newpassconfirm');
    $setfields = arrayFieldsSet($_POST, $postfields);

    if($postfields === $setfields) {
        if(strcmp($_POST['newpass'],
            $_POST['newpassconfirm']) === 0) {
                $userobj->setSalasana($_POST['newpass']);
                $error = $userobj->updateThisUserConfirmPass(
                    $useremail, $_POST['oldpass']);
                if(is_null($error)) {
                    $notice = 'Salasanan vaihto onnistui';
                }
        } else {
            $error = 'Salasanat eivät täsmänneet';
        }
    } elseif(!empty($setfields)) {
        $error = 'Et täyttänyt kaikkia kenttiä';
    }
} elseif(isset($_GET['delete'])) {
}

showView('usersettingsform.php', array(
    'title' => 'Käyttäjän asetukset',
    'error' => $error,
    'notice' => $notice
));
