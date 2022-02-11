<?php

namespace App\Library\Controller\Book;

use App\Library\Controller\ControllerHtml;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class Catalog extends ControllerHtml
{
    public function request(): void
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $bookList = $bookRepository->read();

        echo $this->htmlRender('livros/catalog.php', [
            'bookList' => $bookRepository->read(),
            'title' => "Catálogo"
        ]);
    }
}