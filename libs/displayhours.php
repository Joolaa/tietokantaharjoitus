<?php

$user = isLoggedDirectToLogin();

$page = 1;
$entriesDisplayed = 10;

if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

if(isset($_GET['entriesDisplayed'])) {
    $entriesDisplayed = (int) $_GET['entriesDisplayed'];
}

$pagedata = Tyoaika::searchPagedSortByStartTime($user->getId(), 
    $entriesDisplayed, $page);
$totalEntries = Tyoaika::countTotalRowsOfUser($user->getId());

if($totalEntries == 0) {
    showView('hoursview.php', array(
        'notice' => 'Et ole kirjannut työtunteja',
        'title' => 'Työtuntisi',
        'entriesOnPage' => $pagedata,
        'totalEntries' => $totalEntries
    ));
}

showView('hoursview.php', array(
    'notice' => 'Et ole kirjannut työtunteja',
    'title' => 'Työtuntisi',
    'entriesOnPage' => $pagedata,
    'totalEntries' => $totalEntries
));
