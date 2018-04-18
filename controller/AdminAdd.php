<?php

class AdminAdd extends AdminAbstractController
{
     public function execute()
     {
         $authorRepository = new AuthorRepository();
         $categoryRepository = new CategoryRepository();
         $allAuthors = $authorRepository->getAll();
         $allCategories = $categoryRepository->getAll();

         return $this->render(
             'AdminAdd',
             [
                 'title' => 'Admin Add Page',
                 'allAuthors' => $allAuthors,
                 'allCategories' => $allCategories,
             ]
         );
     }
}