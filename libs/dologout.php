<?php
require_once 'common.php';

$userid = $_SERVER['QUERY_STRING'];

logoutUserById($userid);
