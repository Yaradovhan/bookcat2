<?php

require_once '../config.php';

function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } elseif (file_exists('../model/' . $file . '.php')) {
        require_once '../model/' . $file . '.php';
    } elseif (file_exists('../model/BookRepository/' . $file . '.php')) {
        require_once '../model/BookRepository/' . $file . '.php';
    } elseif (file_exists('../model/AuthorRepository/' . $file . '.php')) {
        require_once '../model/AuthorRepository/' . $file . '.php';
    } elseif (file_exists('../model/CategoryRepository/' . $file . '.php')) {
        require_once '../model/CategoryRepository/' . $file . '.php';
    }
}

if (isset($_GET['add'])) {
    $init = new AdminAdd();
} elseif(isset($_GET['delete']) && !empty($_GET['delete'])) {
    $init = new AdminDelete();
} else {
    $init = new AdminIndex();
}

echo $init->execute();