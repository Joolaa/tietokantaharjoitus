<?php 
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/yhteiso.php';
require_once 'libs/models/tyoaika.php';

$usrobj = isLoggedDirectToLogin();

$usrid = $_GET['usrid'];
$grpid = $_GET['grpid'];

if(!Yhteiso::checkPrivileges($usrobj->getId(), $grpid) {
    header('Location: profile.php');
}

$perpage = 10;
$page = 1;

if(isset($_GET['entriesDisplayed'])) {
    $perpage = $_GET['entriesDisplayed'];
}

if(isset($_GET['pagenum'])) {
    $page = $_GET['pagenum'];
}

$results = Tyoaika::searchPagedByGroupSortByStartTime($usrid, $perpage,
    $page, $grpid);
$resultsamount = Tyoaika::countRowsOfUserByGroup($usrid, $grpid);

showView('listusershoursingroup.php', array(
    'title' => 'Jäsenen työtunnit',
    'entriesOnPage' => $results,
    'pagenum' => $page,
    'entriesPerPage' => $perpage,
    'grpid' => $grpid,
    'usrid' => $usrid,
    'amountOfPages' => ceil($resultsamount/$perpage)
));
