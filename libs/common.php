<?php

    function showView($page, $data = array()) {
        $data = (object) $data;
        require 'views/template.php';
        exit();
    }

    function issetEcho($var, $message) {
        if(isset($var)) {
            echo $message;
        }
    }
