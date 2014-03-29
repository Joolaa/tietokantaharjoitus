<?php
require_once 'libs/common.php';

if(isset($_POST['logout'])) {
    $userid = $_POST['logout'];
    unset($_POST['logout']);

    logoutUserById($userid);
}
