<?php

    function showView($page, $data = array()) {
        $data = (object)$data;
        require 'views/template.php';
        exit();
    }

    function makeNavBar($activepage) {
        require 'views/nav.php';
        exit();
    }
