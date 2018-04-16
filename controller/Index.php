<?php

require_once 'AbstractController.php';

class Index extends AbstractController
{
    public function execute()
    {
        $bookRepository = new BookRepository();
        $allBooks = $bookRepository->getAll();
        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allBooks
            ]
        );

    }
}