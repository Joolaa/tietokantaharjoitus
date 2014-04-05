<?php

isLoggedDirectToLogin(null);

$page = 1;
$entriesDisplayed = 10;

if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

if(isset($_GET['entriesDisplayed'])) {
    $entriesDisplayed = (int) $_GET['entriesDisplayed'];
}

$pagedata = Tyoaika::searchPagedSortByStartTime($_SESSION['logged'], 
    $entriesDisplayed, $page);
$totalEntries = Tyoaika::countTotalRowsOfUser($_SESSION['logged']);
