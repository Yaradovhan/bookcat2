<?php

require_once 'AbstractController.php';
require_once 'model/BookRepository/BookRepository.php';

class BookById extends AbstractController
{
    /**
     * @return string
     */
    public function execute()
    {
        $id = $_GET['book'];
        $bookRepository = new BookRepository();
//        $allBooks = $bookRepository->getAll();
        $bookById = $bookRepository->getAllById($id);
//        $allBooks = $bookRepository->deleteById(1);
        return $this->render(
            'BookById',
            [
                'title' => 'Book Page',
                'bookById' => $bookById
            ]
        );

    }
}