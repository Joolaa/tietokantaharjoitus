<?php
$userobj = isLoggedDirectToLogin();
$userid = $userobj->getId();
$memberships = Yhteiso::fetchAllMemberships($userid);
$supervisorships = Yhteiso::fetchAllSupervisorships($userid);

//memberships should only contains those groups which are not
//in supervisorships
$memberships = array_diff($memberships, $supervisorships);

showView('profileview.php', array(
    'title' => "Sinun profiilisi",
    'user' => $userobj,
    'memberships' => $memberships,
    'supervisorships' => $supervisorships
));
