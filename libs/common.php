<?php

    function showView($page, $data = array()) {
        $data = (object)$data;
        require 'views/template.php';
        exit();
    }

    function issetEcho($message, $var) {
        if(isset($var)) {
            echo $message;
        }
    }
