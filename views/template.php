<?php
    require_once 'libs/common.php'; ?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $title; ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>
    <?php require 'views/nav.php'; ?>
    <div class=shiftedtext>
        <?php require 'views/' .$page; ?>
    </div>
</body>
</html>
