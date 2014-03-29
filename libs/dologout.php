<?php
require_once 'libs/common.php';

if(isset($_POST['logout']) && isset($data->user)) {
    unset($_POST['logout']);

    logoutUser($data->user);
}
