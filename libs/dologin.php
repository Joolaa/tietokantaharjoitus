<?php

    if(empty($_POST["username"]) || empty($_POST["password"]) {
        showView("loginform.php", null);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    if("top" == $username && "lel" == $password) {
        header('Location: html-demo/index.html');
    } else {
        showView("loginform.php", array(
            'user' => $username,
        ));
    }
