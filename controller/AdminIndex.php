<?php

class AdminIndex extends AdminAbstractController
{
    public function execute()
    {
        $bookRepository = new BookRepository();
        $authorRepository = new AuthorRepository();
        $categoryRepository = new CategoryRepository();
        $allBooks = $bookRepository->getAll();
        $allAuthors = $authorRepository->getAll();
        $allCategories = $categoryRepository->getAll();

        return $this->render(
            'AdminIndex',
            [
                'title' => 'Admin Page',
                'allBooks' => $allBooks,
                'allAuthors' => $allAuthors,
                'allCategories' => $allCategories
            ]
        );
    }
}