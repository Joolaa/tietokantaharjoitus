<?php
$userobj = isLoggedDirectToLogin();
$userid = $userobj->getId();
$memberships = Yhteiso::fetchAllMemberships($userid);
$supervisorships = Yhteiso::fetchAllSupervisorships($userid);
$invitations = Yhteiso::fetchInvitationsOfUser($userid);

//memberships should only contain those groups which are not
//in supervisorships
$memberships = array_diff($memberships, $supervisorships);

showView('profileview.php', array(
    'title' => "Sinun profiilisi",
    'user' => $userobj,
    'memberships' => $memberships,
    'supervisorships' => $supervisorships,
    'invitations' => $invititations
));
