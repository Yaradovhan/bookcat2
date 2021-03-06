<?php

require_once 'AbstractController.php';
require_once 'model/BookRepository/BookRepository.php';
require_once 'model/AuthorRepository/AuthorRepository.php';
require_once 'model/CategoryRepository/CategoryRepository.php';

class Index extends AbstractController
{
    /**
     * @return string
     */
    public function execute()
    {
        $bookRepository = new BookRepository();
        $authorRepository = new AuthorRepository();
        $categoryRepository = new CategoryRepository();
        $allBooks = $bookRepository->getAll();
        $allAuthors = $authorRepository->getAll();
        $allCategories = $categoryRepository->getAll();

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allBooks' => $allBooks,
                'allAuthors' => $allAuthors,
                'allCategories' => $allCategories
            ]
        );

    }
}