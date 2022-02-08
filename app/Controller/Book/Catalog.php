<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class Catalog
{
    public function request(): void
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $bookList = $bookRepository->read();

        $title = "Catálogo";
        require __DIR__ . '/../../../view/livros/catalog.php';
    }
}