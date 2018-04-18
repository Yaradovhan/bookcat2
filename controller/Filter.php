<?php

require_once 'AbstractController.php';
require_once 'model/BookRepository/BookRepository.php';
require_once 'model/AuthorRepository/AuthorRepository.php';
require_once 'model/CategoryRepository/CategoryRepository.php';

class Filter extends AbstractController
{
    /**
     * @return string
     */
    public function execute()
    {
        $authors = (!empty($_GET['authors']) ? $_GET['authors'] : null);
        $categories = (!empty($_GET['categories']) ? $_GET['categories'] : null);
        $bookRepository = new BookRepository();
        $authorRepository = new AuthorRepository();
        $categoryRepository = new CategoryRepository();
        $allBooksByFilter = $bookRepository->getAllByFilter($authors,$categories);
        $allAuthors = $authorRepository->getAll();
        $allCategories = $categoryRepository->getAll();

        return $this->render(
            'Index',
            [
                'title' => 'Filter Page',
                'allBooks' => $allBooksByFilter,
                'allAuthors' => $allAuthors,
                'allCategories' => $allCategories
            ]
        );

    }
}