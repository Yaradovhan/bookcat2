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

if (isset($_POST['book']) && isset($_POST['author']) && isset($_POST['category'])) {

    $bookRepo = new BookRepository();
    $authorRepo = new AuthorRepository();
    $categoryRepo = new CategoryRepository();
    $arrayBook = [
        'title' => $_POST['book']['title'],
        'text' => $_POST['book']['text'],
        'description' => $_POST['book']['description'],
        'price' => $_POST['book']['price']
    ];
    $authorId = $_POST['author']['id'];
    $categoryId = $_POST['category']['id'];

    $bookRepo->addBook($arrayBook,$authorId,$categoryId);
}
?>

<a href="javascript:history .go(-1)">Task edited <br> go back to dashboard</a>

