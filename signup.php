<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';

if(isLogged()) {
    //cant' use standard logout function because
    //we don't want to direct to login
    unset($_SESSION['logged']);
}

$postfields = array('email', 'password',
    'passwordconfirm', 'firstname',
    'lastname'
));

$setfields = arrayKeysSet($_POST, $postfields);

$error = null;

if($postfields === $setfields) {

    if($_POST['password'] === $_POST['passwordconfirm']) {
        $userobj = new Kayttaja(0, $_POST['email'],
            $_POST['password'], $_POST['firstname'],
            $_POST['lastname']);
        $error = $userobj->addThisUser();
        if(is_null($error)) {
            showView('signupsuccess.php', array(
                'title' => 'Rekisteröityminen onnistui'
            ));
        }
    } else {
        $error = 'Salasanat eivät täsmänneet';
    }

} elseif(!empty($setfields)) (
    $error = 'Et täyttänyt kaikkia kenttiä';
}

require 'libs/dosignup.php';
