<?php

$user = isLoggedDirectToLogin();

$pagedata = Tyoaika::searchPagedSortByStartTime($user->getId(), 
    $entriesDisplayed, $pagenum);
$totalEntries = Tyoaika::countTotalRowsOfUser($user->getId());

if($totalEntries == 0) {
    showView('hoursview.php', array(
        'notice' => 'Et ole kirjannut työtunteja',
        'title' => 'Työtuntisi',
        'entriesOnPage' => $pagedata,
        'amountOfPages' => $totalEntries,
        'pagenum' => $pagenum,
        'entriesPerPage' => $entriesDisplayed
    ));
}

showView('hoursview.php', array(
    'title' => 'Työtuntisi',
    'entriesOnPage' => $pagedata,
    'amountOfPages' => ceil($totalEntries/$entriesDisplayed),
    'pagenum' => $pagenum,
    'entriesPerPage' => $entriesDisplayed,
));
