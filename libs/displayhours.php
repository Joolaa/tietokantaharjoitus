<?php

$user = isLoggedDirectToLogin();

$pagedata = Tyoaika::searchPagedSortByStartTime($user->getId(), 
    $entriesDisplayed, $pagenum);
$totalEntries = Tyoaika::countTotalRowsOfUser($user->getId());

if(!is_null($deleteId)) {
    Tyoaika::deleteRow($deleteId, $user->getId());
    header('Location: hours.php?pagenum='.$pagenum.'&entriesDisplayed='.$entriesDisplayed);
}

if(!is_null($tyoaika) && is_null($error) && $allclear) {
    $tyoaika->setKayttajaId($user->getId());

    if(!is_null($editId)) {
        Tyoaika::updateRow($editId, $user->getId(),
            $tyoaika);
    } elseif($adding) {
        Tyoaika::addRow($user->getId(), $tyoaika);
    }
    header('Location: hours.php?pagenum='.$pagenum.'&entriesDisplayed='.$entriesDisplayed);
}

$notice = null;
if($totalEntries == 0) {
    $notice = 'Et ole kirjannut työtunteja';
}

$memberships = Yhteiso::fetchAllMemberships($user->getId());
if($adding && empty($memberships)) {
    $error = 'Sinun täytyy olla jonkin ryhmän jäsen jotta voisit kirjata työtunteja';
    $adding = false;
}

showView('hoursview.php', array(
    'notice' => $notice,
    'error' => $error,
    'title' => 'Työtuntisi',
    'entriesOnPage' => $pagedata,
    'amountOfPages' => ceil($totalEntries/$entriesDisplayed),
    'pagenum' => $pagenum,
    'entriesPerPage' => $entriesDisplayed,
    'editId' => $editId,
    'adding' => $adding,
    'groups' => $memberships,
    'hoursdata' => $tyoaika
));
