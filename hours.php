<?php
require_once "libs/common.php";
require_once "libs/models/kayttaja.php";
require_once "libs/models/tyoaika.php";
require_once "libs/models/yhteiso.php";

$pagenum = 1;
$entriesDisplayed = 10;

$tyoaika = null;

if(isset($_GET['pagenum'])) {
    $pagenum = (int) $_GET['pagenum'];
}

if(isset($_GET['entriesDisplayed'])) {
    $entriesDisplayed = (int) $_GET['entriesDisplayed'];
}

if(isset($_GET['edit'])) {
    $editId = (int) $_GET['edit'];
    $tyoaika = Tyoaika::fetchHoursById($editId);
} else {
    $editId = null;
}

if(isset($_GET['add'])) {
    $adding = true;
} else {
    $adding = false;
}

if(isset($_GET['delete'])) {
    $deleteId = (int) $_GET['delete'];
} else {
    $deleteId = null;
}

//$sometrue = false;
//$alltrue = true;

$postfields = array('group', 'startday', 'startmonth',
    'startyear', 'starthour', 'startminute', 'endday', 'endmonth',
    'endyear', 'endhour', 'endminute');

$keysSet = arrayKeysSet($_POST, $postfields);

/*
foreach($postfields as $postfield) {
    $sometrue = $sometrue || !empty($_POST[$postfield]) || $_POST[$postfield] === '0';
    $alltrue = $alltrue && (!empty($_POST[$postfield]) || $_POST[$postfield] === '0');
}

 */
$error = null;


if($postfields === $keysSet) {
    $startdate = makeDateString($_POST['startday'], $_POST['startmonth'], $_POST['startyear'], $_POST['starthour'], $_POST['startminute']);
    $enddate = makeDateString($_POST['endday'], $_POST['endmonth'], $_POST['endyear'], $_POST['endhour'], $_POST['endminute']);
    if(isset($_POST['topic'])) {
        $topic = prepareTextInput($_POST['topic']);
    } else {
        $topic = '-';
    }

    $groupid = $_POST['group'];


    if(validateDate($startdate) && validateDate($enddate)) {
        $tyoaika = new Tyoaika(0, $startdate, $enddate, $topic, 0, $groupid);
    } else {
        $error = 'Päivämäärä tai kellonaika ei ollut kelvollinen';
    }
} elseif(!empty($keysSet)) {
    $error = 'Et täyttänyt kaikkia pakollisia kenttiä';
}

require "libs/displayhours.php";
