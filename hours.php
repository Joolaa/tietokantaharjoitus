<?php
require_once "libs/common.php";
require_once "libs/models/kayttaja.php";
require_once "libs/models/tyoaika.php";

$pagenum = 1;
$entriesDisplayed = 10;

if(isset($_GET['pagenum'])) {
    $pagenum = (int) $_GET['pagenum'];
}

if(isset($_GET['entriesDisplayed'])) {
    $entriesDisplayed = (int) $_GET['entriesDisplayed'];
}

require "libs/displayhours.php";
