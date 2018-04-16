<?php

require_once "config.php";

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } elseif (file_exists('model/' . $file . '.php')) {
        require_once 'model/' . $file . '.php';
    } elseif (file_exists('API/' . $file . '.php')) {
        require_once 'API/' . $file . '.php';
    }
}

if (isset($_GET['book'])) {
    $init = new Book();
} else {
    $init = new Index();
}

echo $init->execute();