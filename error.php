<?php


set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // 1024报错啦/home/vagrant/code/mhl/algorithm/error.php8
    echo $errno, $errstr, $errfile, $errline;
}, E_ALL);

trigger_error('报错啦');


































