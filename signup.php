<?php
require_once 'libs/common.php';

if(isLogged()) {
    //cant' use standard logout function because
    //we don't want to direct to login
    unset($_SESSION['logged']);
}

require 'libs/dosignup.php';
