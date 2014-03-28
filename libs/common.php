<?php

    function showView($page, $data = array()) {
        $data = (object)$data;
        require 'views/pohja.php';
        exit();
    }
