<?php

require_once "AdminAbstractController.php";
require_once "../model/BookRepository/BookRepository.php";
require_once "../model/AuthorRepository/AuthorRepository.php";
require_once "../model/CategoryRepository/CategoryRepository.php";

/**
 * @property BookRepository bookRepository
 */
class AdminEdit extends AdminAbstractController
{
    /**
     * AdminEdit constructor.
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param null $params
     * @return bool|mixed|mysqli_result
     */
    public function execute($params = null)
    {
        $book = new Book();
        $book->setBook($params['book']);
        $author = new Author();
        $author->setAuthor($params['author']);
        $category = new Category();
        $category->setCategory($params['category']);

        return $this->bookRepository->updateById($book);
    }
}