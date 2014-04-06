<?php

$user = isLoggedDirectToLogin();

$pagedata = Tyoaika::searchPagedSortByStartTime($user->getId(), 
    $entriesDisplayed, $page);
$totalEntries = Tyoaika::countTotalRowsOfUser($user->getId());

if($totalEntries == 0) {
    showView('hoursview.php', array(
        'notice' => 'Et ole kirjannut työtunteja',
        'title' => 'Työtuntisi',
        'entriesOnPage' => $pagedata,
        'amountOfPages' => $totalEntries,
        'page' => $page
    ));
}

showView('hoursview.php', array(
    'title' => 'Työtuntisi',
    'entriesOnPage' => $pagedata,
    'amountOfPages' => ceil($totalEntries/$entriesDisplayed),
    'page' => $page
));
