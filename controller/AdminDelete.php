<?php

class AdminDelete extends AdminAbstractController
{
    public function execute()
    {
        $bookRepository = new BookRepository();
        $bookRepository->deleteById($_GET['delete']);

    }
}

?>

<a href="javascript:history .go(-1)">Task edited <br> go back to dashboard</a>

