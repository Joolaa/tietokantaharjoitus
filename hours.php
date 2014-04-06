<?php
require_once "libs/common.php";
require_once "libs/models/kayttaja.php";
require_once "libs/models/tyoaika.php";

$page = 1;
$entriesDisplayed = 10;

if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

if(isset($_GET['entriesDisplayed'])) {
    $entriesDisplayed = (int) $_GET['entriesDisplayed'];
}

require "libs/displayhours.php";
